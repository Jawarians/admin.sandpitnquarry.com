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

    // Prepare for efficient totals and chart data
    $insideTypes = ['reload', 'tonne_refund', 'refund', 'bonus', 'order'];
    $outsideTypes = ['waiting_charges', 'withdrawal', 'purchase'];

    // Pagination: allow only 5, 10, 25, 50, 100
    $allowedPerPage = [5, 10, 25, 50, 100];
    $perPage = (int) ($request->per_page ?? 10);
    if (!in_array($perPage, $allowedPerPage)) {
        $perPage = 10;
    }

    $coins = $query->paginate($perPage);

    // Totals (sum amounts by type, in cents)
    $totals = DB::table('coins')
        ->when($request->filled('search'), function($q) use ($request) {
            $searchTerm = $request->search;
            $escapedSearchTerm = addcslashes($searchTerm, '%_');
            $q->where(function($q2) use ($escapedSearchTerm) {
                $q2->where('id', 'like', "%{$escapedSearchTerm}%");
            });
        })
        ->when($request->filled('type') && $request->type !== 'Type', function($q) use ($request) {
            $q->where('coinable_type', $request->type);
        })
        ->selectRaw('coinable_type, SUM(amount) as total_amount')
        ->groupBy('coinable_type')
        ->get();

    $totalInside = 0;
    $totalOutside = 0;
    foreach ($totals as $row) {
        if (in_array($row->coinable_type, $insideTypes)) {
            $totalInside += $row->total_amount;
        } elseif (in_array($row->coinable_type, $outsideTypes)) {
            $totalOutside += $row->total_amount;
        }
    }

    // Chart data: only fetch needed fields, order by created_at
    $chartRecords = DB::table('coins')
        ->when($request->filled('search'), function($q) use ($request) {
            $searchTerm = $request->search;
            $escapedSearchTerm = addcslashes($searchTerm, '%_');
            $q->where(function($q2) use ($escapedSearchTerm) {
                $q2->where('id', 'like', "%{$escapedSearchTerm}%");
            });
        })
        ->when($request->filled('type') && $request->type !== 'Type', function($q) use ($request) {
            $q->where('coinable_type', $request->type);
        })
        ->select(['created_at', 'coinable_type as type', 'amount'])
        ->orderBy('created_at', 'asc')
        ->get()
        ->map(function($row) {
            return [
                'date' => (new \Carbon\Carbon($row->created_at))->format('Y-m-d H:i:s'),
                'type' => $row->type,
                'amount' => ($row->amount ?? 0) / 100
            ];
        })
        ->toArray();

    // Distinct coin types for filter dropdown
    $coinTypes = DB::table('coins')
        ->select('coinable_type')
        ->distinct()
        ->pluck('coinable_type')
        ->toArray();

    return view('coins.index', compact('coins', 'coinTypes', 'perPage', 'totalInside', 'totalOutside', 'chartRecords'));
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