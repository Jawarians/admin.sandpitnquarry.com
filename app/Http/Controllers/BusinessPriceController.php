<?php

namespace App\Http\Controllers;

use App\Models\BusinessPrice;
use Illuminate\Http\Request;

class BusinessPriceController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');
        $query = BusinessPrice::with(['user', 'address', 'creator', 'latest']);
        if ($search) {
            $searchLower = strtolower($search);
            $query->whereHas('user', function($q) use ($searchLower) {
                $q->whereRaw('LOWER(name) LIKE ?', ["%{$searchLower}%"]);
            });
        }
        $businessPrices = $query->orderByDesc('id')->paginate($perPage)->appends($request->all());
        return view('business-prices.index', compact('businessPrices'));
    }

    public function editStatus($id)
    {
        $businessPrice = BusinessPrice::with('latest')->findOrFail($id);
        return view('business-prices.edit-status', compact('businessPrice'));
    }

    public function updateStatus(Request $request, $id)
    {
        $businessPrice = BusinessPrice::with('latest')->findOrFail($id);
        $request->validate([
            'status' => 'required|string|max:255',
        ]);
        if ($businessPrice->latest) {
            $businessPrice->latest->status = $request->input('status');
            $businessPrice->latest->save();
        }
        return redirect()->route('business-prices.index')->with('success', 'Status updated!');
    }
}
