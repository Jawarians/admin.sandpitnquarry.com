<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CoinController extends Controller
{
    public function index(Request $request)
{
    $query = Coin::with('user')->orderBy('id', 'desc');

    // Search filter
    if ($request->filled('search')) {
        $searchTerm = $request->search;
        $escapedSearchTerm = addcslashes($searchTerm, '%_');
        $query->where(function($q) use ($escapedSearchTerm) {
            $q->where('id', 'like', "%{$escapedSearchTerm}%")
              ->orWhereHas('user', function($userQuery) use ($escapedSearchTerm) {
                  $userQuery->where('name', 'like', "%{$escapedSearchTerm}%");
              });
        });
    }

    // Type filter
    if ($request->filled('type') && $request->type !== 'Type') {
        $query->where('coinable_type', $request->type);
    }

    // Clone query for all-coins (for totals/chart)
    $allCoinsQuery = clone $query;

    // Pagination: allow only 5, 10, 25, 50, 100
    $allowedPerPage = [5, 10, 25, 50, 100];
    $perPage = (int) ($request->per_page ?? 10);
    if (!in_array($perPage, $allowedPerPage)) {
        $perPage = 10;
    }

    $coins = $query->paginate($perPage);
    $allCoins = $allCoinsQuery->get();

    // Distinct coin types for filter dropdown
    $coinTypes = DB::table('coins')
        ->select('coinable_type')
        ->distinct()
        ->pluck('coinable_type')
        ->toArray();

    return view('coins.index', compact('coins', 'allCoins', 'coinTypes', 'perPage'));
}
    
    public function create()
    {
        $users = User::orderBy('name', 'asc')->get();
        return view('coins.create', compact('users'));
    }
    
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|integer',
            'coinable_type' => 'required|string',
        ]);
        
        // Create the coin
        Coin::create([
            'user_id' => $validated['user_id'],
            'amount' => $validated['amount'],
            'coinable_id' => 1, // Default value, should be adjusted based on your needs
            'coinable_type' => $validated['coinable_type'],
            'creator_id' => Auth::id(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        return redirect()->route('coins.index')
            ->with('success', 'Coin added successfully');
    }
    
    public function edit(Coin $coin)
    {
        $users = User::orderBy('name', 'asc')->get();
        
        // Get distinct coin types for dropdown
        $coinTypes = DB::table('coins')
            ->select('coinable_type')
            ->distinct()
            ->pluck('coinable_type')
            ->toArray();
            
        return view('coins.edit', compact('coin', 'users', 'coinTypes'));
    }
    
    public function update(Request $request, Coin $coin)
    {
        // Validate the request
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|integer',
            'coinable_type' => 'required|string',
        ]);
        
        // Update the coin
        $coin->update([
            'user_id' => $validated['user_id'],
            'amount' => $validated['amount'],
            'coinable_type' => $validated['coinable_type'],
            'updated_at' => Carbon::now(),
        ]);
        
        return redirect()->route('coins.index')
            ->with('success', 'Coin updated successfully');
    }
    
    public function destroy(Coin $coin)
    {
        $coin->delete();
        
        return redirect()->route('coins.index')
            ->with('success', 'Coin deleted successfully');
    }
}