<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $query = Package::query();
        if ($request->filled('search')) {
            $searchLower = strtolower($request->search);
            $query->whereRaw('LOWER(name) LIKE ?', ['%' . $searchLower . '%']);
        }
        $packages = $query->orderBy('id', 'desc')->paginate($request->get('per_page', 10));
        return view('packages.index', compact('packages'));
    }

    public function create()
    {
        return view('packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'order_delay_minutes' => 'nullable|integer|min:0',
            'payment_term' => 'nullable|integer|min:0',
            'period' => 'nullable|string|max:255',
            'service_charge' => 'nullable|numeric|min:0',
        ]);
        Package::create($validated);
        return redirect()->route('packages.index')->with('success', 'Package created successfully.');
    }

    public function edit(Package $package)
    {
        return view('packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'order_delay_minutes' => 'nullable|integer|min:0',
            'payment_term' => 'nullable|integer|min:0',
            'period' => 'nullable|string|max:255',
            'service_charge' => 'nullable|numeric|min:0',
        ]);
        $package->update($validated);
        return redirect()->route('packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('packages.index')->with('success', 'Package deleted successfully.');
    }
}
