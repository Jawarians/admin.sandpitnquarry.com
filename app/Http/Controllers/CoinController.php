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
        // Basic list query
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

        // Type filter (coinable_type)
        if ($request->filled('type') && $request->type !== 'Type') {
            $query->where('coinable_type', $request->type);
        }

        // Define In / Out purpose lists
        $inTypes = ['Reload','Order','Tonne_refund','Bonus','Refund'];
        $outTypes = ['Waiting_charges','Withdrawal','Purchase'];

        // Direction filter: in / out / all - use explicit lists
        $direction = $request->get('direction', 'all');
        if ($direction === 'in') {
            $query->whereIn('coinable_type', $inTypes);
        } elseif ($direction === 'out') {
            $query->whereIn('coinable_type', $outTypes);
        }

        // Date range filter
        $from = $request->get('date_from');
        $to = $request->get('date_to');
        if ($from && $to) {
            try {
                $fromDate = Carbon::parse($from)->startOfDay();
                $toDate = Carbon::parse($to)->endOfDay();
                $query->whereBetween('created_at', [$fromDate, $toDate]);
            } catch (\Exception $e) {
                // invalid dates — ignore
            }
        }

        // Pagination
        $allowedPerPage = [5, 10, 25, 50, 100];
        $perPage = (int) ($request->per_page ?? 10);
        if (!in_array($perPage, $allowedPerPage)) {
            $perPage = 10;
        }

        $coins = $query->paginate($perPage)->appends($request->except('page'));

        // Distinct coin types for dropdown
        $coinTypes = DB::table('coins')->select('coinable_type')->distinct()->pluck('coinable_type')->toArray();

        // Chart range (default last 30 days)
        $chartFrom = $from ? Carbon::parse($from)->startOfDay() : Carbon::now()->subDays(29)->startOfDay();
        $chartTo = $to ? Carbon::parse($to)->endOfDay() : Carbon::now()->endOfDay();

        // Build SQL-safe lists (values controlled)
        $inSqlList = "'" . implode("','", $inTypes) . "'";
        $outSqlList = "'" . implode("','", $outTypes) . "'";

        $chartData = DB::table('coins')
            ->select(
                DB::raw("DATE(created_at) as date"),
                DB::raw("SUM(CASE WHEN coinable_type IN ($inSqlList) THEN amount ELSE 0 END) as total_in"),
                DB::raw("SUM(CASE WHEN coinable_type IN ($outSqlList) THEN amount ELSE 0 END) as total_out")
            )
            ->whereBetween('created_at', [$chartFrom, $chartTo])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Ensure each date in range is present
        $period = [];
        $cursor = $chartFrom->copy();
        while ($cursor->lte($chartTo)) {
            $period[] = $cursor->format('Y-m-d');
            $cursor->addDay();
        }

        $chartMap = $chartData->keyBy('date');
        $seriesDates = [];
        $seriesIn = [];
        $seriesOut = [];
        foreach ($period as $d) {
            $seriesDates[] = $d;
            if (isset($chartMap[$d])) {
                $seriesIn[] = (float) $chartMap[$d]->total_in;
                $seriesOut[] = (float) $chartMap[$d]->total_out;
            } else {
                $seriesIn[] = 0;
                $seriesOut[] = 0;
            }
        }

        $chartSeries = [
            ['name' => 'In', 'data' => $seriesIn],
            ['name' => 'Out', 'data' => $seriesOut],
        ];

        return view('coins.index', compact('coins', 'coinTypes', 'perPage', 'chartSeries', 'seriesDates', 'direction'));
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