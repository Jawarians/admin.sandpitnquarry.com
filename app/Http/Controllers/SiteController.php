<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Site;
use App\Models\State;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sites = Site::with(['city', 'state'])->latest()->paginate(10);
        return view('sites.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        return view('sites.create', compact('states', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'postcode' => 'required|string|max:10',
            'city_id' => 'required|exists:cities,id',
            'state_id' => 'required|exists:states,id',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'phone' => 'nullable|string|max:20',
        ]);

        Site::create($request->all());
        
        return redirect()->route('sites.index')
            ->with('success', 'Quarry added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $site = Site::with(['city', 'state'])->findOrFail($id);
        return view('sites.show', compact('site'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $site = Site::findOrFail($id);
        $states = State::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        return view('sites.edit', compact('site', 'states', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'postcode' => 'required|string|max:10',
            'city_id' => 'required|exists:cities,id',
            'state_id' => 'required|exists:states,id',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'phone' => 'nullable|string|max:20',
        ]);
        
        $site = Site::findOrFail($id);
        $site->update($request->all());
        
        return redirect()->route('sites.index')
            ->with('success', 'Quarry updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $site = Site::findOrFail($id);
        $site->delete();
        
        return redirect()->route('sites.index')
            ->with('success', 'Quarry deleted successfully');
    }
}
