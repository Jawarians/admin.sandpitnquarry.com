<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::with(['latest.latest', 'user'])
            ->orderBy('id', 'desc')
            ->paginate(10);
            
        return view('accounts.index', compact('accounts'));
    }
    
    public function create()
    {
        return view('accounts.create');
    }
    
    public function store(Request $request)
    {
        // Validation logic
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            // Add other fields as needed
        ]);
        
        Account::create([
            'user_id' => $validated['user_id'],
            'creator_id' => 1, // Default to admin user (you may want to adjust this)
        ]);
        
        return redirect()->route('accounts.index')->with('success', 'Account created successfully');
    }
    
    public function show(Account $account)
    {
        return view('accounts.show', compact('account'));
    }
    
    public function edit(Account $account)
    {
        return view('accounts.edit', compact('account'));
    }
    
    public function update(Request $request, Account $account)
    {
        // Validation logic
        $validated = $request->validate([
            'code' => 'required|string',
            'term' => 'required|integer|min:0',
            'limit' => 'required|numeric|min:0',
            'status' => 'required|string|in:Pending,Approve,Reject',
            'remark' => 'nullable|string',
        ]);
        
        // Create or update AccountDetail record
        $accountDetail = $account->latest;
        if (!$accountDetail) {
            $accountDetail = $account->account_details()->create([
                'code' => $validated['code'],
                'status' => $validated['status'],
                'remark' => $validated['remark'],
                'creator_id' => 1, // Default to admin or system user
            ]);
        } else {
            $accountDetail->update([
                'code' => $validated['code'],
                'status' => $validated['status'],
                'remark' => $validated['remark'],
            ]);
        }
        
        // Create or update AccountDetailItem
        $accountDetailItem = $accountDetail->latest;
        if (!$accountDetailItem) {
            $accountDetail->account_detail_items()->create([
                'term' => $validated['term'],
                'limit' => $validated['limit'],
                'creator_id' => 1, // Default to admin or system user
            ]);
        } else {
            $accountDetailItem->update([
                'term' => $validated['term'],
                'limit' => $validated['limit'],
            ]);
        }
        
        return redirect()->route('accounts.index')->with('success', 'Account updated successfully');
    }
    
    public function destroy(Account $account)
    {
        $account->delete();
        
        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully');
    }
}