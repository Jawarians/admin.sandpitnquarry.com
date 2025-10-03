<?php

namespace App\Http\Controllers;

use App\Models\Reload;
use Illuminate\Http\Request;

class ReloadController extends Controller
{
    public function index(Request $request)
    {
        $query = Reload::query()->with('customer');
        
        // Handle search
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('billplz_id', 'ILIKE', "%{$searchTerm}%")
                  ->orWhere('name', 'ILIKE', "%{$searchTerm}%")
                  ->orWhere('email', 'ILIKE', "%{$searchTerm}%");
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