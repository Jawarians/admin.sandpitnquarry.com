<?php

namespace App\Http\Controllers;

use App\Models\CustomerAccount;
use App\Models\Customer;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class CustomerAccountController extends Controller
{
    /**
     * Display a listing of customer accounts
     */
    public function index(Request $request)
    {
        $query = CustomerAccount::with(['customer', 'document']);
        
        // Apply search if it exists
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('number', 'like', "%{$search}%")
                  ->orWhere('bank', 'like', "%{$search}%")
                  ->orWhere('id', 'like', "%{$search}%")
                  ->orWhereHas('customer', function($q2) use ($search) {
                      $q2->where('name', 'like', "%{$search}%");
                  });
            });
        }
        
        // Apply status filter if it exists
        if ($request->has('status') && $request->status != 'Status') {
            $query->where('status', $request->status);
        }
        
        // Default sorting
        $customerAccounts = $query->orderBy('id', 'desc')
            ->paginate($request->per_page ?? 10);
        
        return view('customer-accounts.index', compact('customerAccounts'));
    }
    
    /**
     * Show the form for creating a new customer account
     */
    public function create()
    {
        $customers = Customer::all();
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
        $customerAccount->load(['customer', 'document', 'creator', 'approver']);
        return view('customer-accounts.show', compact('customerAccount'));
    }
    
    /**
     * Show the form for editing the specified customer account
     */
    public function edit(CustomerAccount $customerAccount)
    {
        $customers = Customer::all();
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
        
        $customerAccount->name = $validated['name'];
        $customerAccount->number = $validated['number'];
        $customerAccount->bank = $validated['bank'];
        $customerAccount->status = $validated['status'];
        
        // Only update approver details if status is changing to Approved
        if ($oldStatus !== 'Approved' && $validated['status'] === 'Approved') {
            $customerAccount->approver_id = Auth::id();
            $customerAccount->approved_at = Carbon::now();
        }
        
        $customerAccount->save();
        
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
        // Delete associated document if exists
        if ($customerAccount->document) {
            $path = str_replace('/storage', 'public', $customerAccount->document->path);
            Storage::delete($path);
            $customerAccount->document()->delete();
        }
        
        $customerAccount->delete();
        
        return redirect()->route('customer-accounts.index')
            ->with('success', 'Customer account deleted successfully');
    }
    
    /**
     * View the bank statement document
     */
    public function viewDocument(CustomerAccount $customerAccount)
    {
        if (!$customerAccount->document) {
            return back()->with('error', 'No document available');
        }
        
        return redirect($customerAccount->document->path);
    }
}