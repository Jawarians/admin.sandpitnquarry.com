<?php

namespace App\Http\Controllers;

use App\Models\CustomerAccount;
use App\Models\User;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CustomerAccountController extends Controller
{
    /**
     * Display a listing of customer accounts
     */
    public function index(Request $request)
    {
        // Select only needed columns for better performance
        $query = CustomerAccount::select('customer_accounts.*')
            ->with([
                'customer:id,name,email', // Select only needed fields from customer
                'document:id,documentable_id,documentable_type,path' // Select only needed fields from document
            ]);
        
        // Apply search if it exists - using LIKE with indexes when possible
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            
            // For ID search, check if it's numeric for more efficient query
            if (is_numeric($search)) {
                $query->where('id', $search);
            } else {
                // Use indexed columns first if possible
                $query->where(function($q) use ($search) {
                    $search = '%' . $search . '%'; // Create search pattern once
                    $q->where('name', 'like', $search)
                      ->orWhere('number', 'like', $search)
                      ->orWhere('bank', 'like', $search)
                      ->orWhereHas('customer', function($q2) use ($search) {
                          $q2->where('name', 'like', $search);
                      }, '>', 0); // Using the > 0 parameter improves performance for whereHas
                });
            }
        }
        
        // Apply status filter if it exists - use strict comparison and avoid redundant check
        if ($request->status && $request->status !== 'Status') {
            $query->where('status', $request->status);
        }
        
        // Eager load only for non-empty result sets for better performance
        // Default sorting - specify the table name for clarity on indexed columns
        $perPage = (int)($request->per_page ?? 10);
        $customerAccounts = $query->orderBy('customer_accounts.id', 'desc')
            ->paginate($perPage);
        
        return view('customer-accounts.index', compact('customerAccounts'));
    }
    
    /**
     * Show the form for creating a new customer account
     */
    public function create()
    {
        // Select only needed fields instead of retrieving all columns
        $customers = User::select('id', 'name', 'email')->get();
        return view('customer-accounts.create', compact('customers'));
    }
    
    /**
     * Store a newly created customer account
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'bank' => 'required|string|max:255',
            'user_id' => 'required|exists:customers,id',
            'status' => 'required|in:Approved,Pending,Reject',
        ]);
        
        $customerAccount = CustomerAccount::create([
            'name' => $validated['name'],
            'number' => $validated['number'],
            'bank' => $validated['bank'],
            'user_id' => $validated['user_id'],
            'status' => $validated['status'],
            'creator_id' => Auth::id(),
            'approver_id' => $validated['status'] === 'Approved' ? Auth::id() : null,
            'approved_at' => $validated['status'] === 'Approved' ? Carbon::now() : null,
        ]);
        
        // Handle document upload if present
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('documents/bank_statements', $fileName, 'public');
            
            $document = new Document([
                'path' => Storage::url($filePath),
                'name' => $fileName,
                'type' => $file->getClientOriginalExtension(),
                'size' => $file->getSize(),
                'creator_id' => Auth::id(),
            ]);
            
            $customerAccount->document()->save($document);
        }
        
        return redirect()->route('customer-accounts.index')
            ->with('success', 'Customer account created successfully');
    }
    
    /**
     * Display the specified customer account
     */
    public function show(CustomerAccount $customerAccount)
    {
        // Select only necessary fields from related models for performance
        $customerAccount->load([
            'customer:id,name,email',
            'document:id,documentable_id,documentable_type,path',
            'creator:id,name',
            'approver:id,name'
        ]);
        return view('customer-accounts.show', compact('customerAccount'));
    }
    
    /**
     * Show the form for editing the specified customer account
     */
    public function edit(CustomerAccount $customerAccount)
    {
        // Select only needed fields for better performance
        $customers = User::select('id', 'name', 'email')->get();
        return view('customer-accounts.edit', compact('customerAccount', 'customers'));
    }
    
    /**
     * Update the specified customer account
     */
    public function update(Request $request, CustomerAccount $customerAccount)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'bank' => 'required|string|max:255',
            'status' => 'required|in:Approved,Pending,Reject',
        ]);
        
        $oldStatus = $customerAccount->status;
        
        // Prepare update data
        $updateData = [
            'name' => $validated['name'],
            'number' => $validated['number'],
            'bank' => $validated['bank'],
            'status' => $validated['status'],
        ];
        
        // Only update approver details if status is changing to Approved
        if ($oldStatus !== 'Approved' && $validated['status'] === 'Approved') {
            $updateData['approver_id'] = Auth::id();
            $updateData['approved_at'] = Carbon::now();
        }
        
        // Direct update with a single query for better performance
        $customerAccount->update($updateData);
        
        // Handle document upload if present
        if ($request->hasFile('document')) {
            // Remove old document if exists
            if ($customerAccount->document) {
                $oldPath = str_replace('/storage', 'public', $customerAccount->document->path);
                Storage::delete($oldPath);
                $customerAccount->document()->delete();
            }
            
            $file = $request->file('document');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('documents/bank_statements', $fileName, 'public');
            
            $document = new Document([
                'path' => Storage::url($filePath),
                'name' => $fileName,
                'type' => $file->getClientOriginalExtension(),
                'size' => $file->getSize(),
                'creator_id' => Auth::id(),
            ]);
            
            $customerAccount->document()->save($document);
        }
        
        return redirect()->route('customer-accounts.index')
            ->with('success', 'Customer account updated successfully');
    }
    
    /**
     * Remove the specified customer account
     */
    public function destroy(CustomerAccount $customerAccount)
    {
        // Load only document to minimize data retrieval
        $document = $customerAccount->document()->first(['id', 'path']);
        
        // Use DB transaction to ensure both operations succeed or fail together
        DB::beginTransaction();
        try {
            // Delete associated document if exists
            if ($document) {
                $path = str_replace('/storage', 'public', $document->path);
                Storage::delete($path);
                // Direct query for better performance
                Document::where('id', $document->id)->delete();
            }
            
            // Direct delete for better performance
            $customerAccount->delete();
            
            DB::commit();
            return redirect()->route('customer-accounts.index')
                ->with('success', 'Customer account deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('customer-accounts.index')
                ->with('error', 'Failed to delete customer account: ' . $e->getMessage());
        }
    }
    
    /**
     * View the bank statement document
     */
    public function viewDocument(CustomerAccount $customerAccount)
    {
        // Direct query for only the needed field, more efficient than loading entire relationship
        $document = Document::where('documentable_id', $customerAccount->id)
                          ->where('documentable_type', 'customer_account')
                          ->select('path')
                          ->first();
                          
        if (!$document) {
            return back()->with('error', 'No document available');
        }
        
        return redirect($document->path);
    }
}