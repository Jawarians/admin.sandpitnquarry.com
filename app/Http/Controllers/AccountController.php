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
            // Add fields as needed
        ]);
        
        $account->update($validated);
        
        return redirect()->route('accounts.index')->with('success', 'Account updated successfully');
    }
    
    public function destroy(Account $account)
    {
        $account->delete();
        
        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully');
    }
}