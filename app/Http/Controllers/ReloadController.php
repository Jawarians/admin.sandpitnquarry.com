<?php

namespace App\Http\Controllers;

use App\Models\Reload;
use Illuminate\Http\Request;

class ReloadController extends Controller
{
    public function index(Request $request)
    {
        $query = Reload::query()->with('customer');
        
        // Handle search (case-insensitive)
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = strtolower($request->search);
            $pattern = "%{$searchTerm}%";
            $query->where(function($q) use ($pattern) {
                $q->whereRaw('LOWER(billplz_id) LIKE ?', [$pattern])
                  ->orWhereRaw('LOWER(name) LIKE ?', [$pattern])
                  ->orWhereRaw('LOWER(email) LIKE ?', [$pattern]);
            });
        }
        
        // Handle status filter
        if ($request->has('status') && $request->status !== 'Status') {
            if ($request->status === 'Paid') {
                $query->where('paid', true);
            } elseif ($request->status === 'Unpaid') {
                $query->where('paid', false);
            }
        }
        
        // Paginate results
        $perPage = $request->get('per_page', 10);
        $reloads = $query->orderBy('created_at', 'desc')->paginate($perPage);
        
        return view('reloads.index', compact('reloads'));
    }

    public function show($id)
    {
        $reload = Reload::with('customer')->findOrFail($id);
        return view('reloads.show', compact('reload'));
    }
}