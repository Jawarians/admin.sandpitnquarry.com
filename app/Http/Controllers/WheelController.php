<?php

namespace App\Http\Controllers;

use App\Models\Wheel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WheelController extends Controller
{
    /**
     * Display a listing of the wheels.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Wheel::where('wheel', '>', 0);
        
        // Apply search filters if provided (case-insensitive)
        if ($request->filled('search')) {
            $search = $request->input('search');
            $searchLower = strtolower($search);
            $pattern = "%{$searchLower}%";
            $query->where(function ($q) use ($pattern) {
                $q->whereRaw('CAST(wheel AS CHAR) LIKE ?', [$pattern])
                  ->orWhereRaw('CAST(capacity AS CHAR) LIKE ?', [$pattern]);
            });
        }
        
        // Filter by load/tonne
        if ($request->filled('filter')) {
            $filter = $request->input('filter');
            if ($filter === 'load') {
                $query->where('load', true);
            } elseif ($filter === 'tonne') {
                $query->where('tonne', true);
            } elseif ($filter === 'both') {
                $query->where('load', true)->where('tonne', true);
            }
        }
        
        $perPage = $request->input('per_page', 10);
        $wheels = $query->orderBy('wheel')->paginate($perPage);
        
        return view('wheels.index', compact('wheels'));
    }

    /**
     * Show the form for creating a new wheel.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('wheels.create');
    }

    /**
     * Store a newly created wheel in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'wheel' => 'required|integer|min:1|unique:wheels',
            'capacity' => 'required|integer|min:0',
            'load' => 'boolean',
            'tonne' => 'boolean',
            'rgba' => 'nullable|string',
        ]);

        // Set default values
        $validated['load'] = $request->has('load');
        $validated['tonne'] = $request->has('tonne');
        $validated['rgba'] = $validated['rgba'] ?? 'rgba(0, 0, 0, 1)';
        $validated['creator_id'] = Auth::id();
        
        Wheel::create($validated);
        
        return redirect()->route('wheels.index')
                        ->with('success', 'Wheel created successfully');
    }

    /**
     * Display the specified wheel.
     *
     * @param  \App\Models\Wheel  $wheel
     * @return \Illuminate\View\View
     */
    public function show(Wheel $wheel)
    {
        return view('wheels.show', compact('wheel'));
    }

    /**
     * Show the form for editing the specified wheel.
     *
     * @param  \App\Models\Wheel  $wheel
     * @return \Illuminate\View\View
     */
    public function edit(Wheel $wheel)
    {
        return view('wheels.edit', compact('wheel'));
    }

    /**
     * Update the specified wheel in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wheel  $wheel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Wheel $wheel)
    {
        $validated = $request->validate([
            'capacity' => 'required|integer|min:0',
            'load' => 'boolean',
            'tonne' => 'boolean',
            'rgba' => 'nullable|string',
        ]);
        
        // Set default values
        $validated['load'] = $request->has('load');
        $validated['tonne'] = $request->has('tonne');
        $validated['rgba'] = $validated['rgba'] ?? 'rgba(0, 0, 0, 1)';
        
        $wheel->update($validated);
        
        return redirect()->route('wheels.index')
                        ->with('success', 'Wheel updated successfully');
    }

    /**
     * Remove the specified wheel from storage.
     *
     * @param  \App\Models\Wheel  $wheel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Wheel $wheel)
    {
        $wheel->delete();
        
        return redirect()->route('wheels.index')
                        ->with('success', 'Wheel deleted successfully');
    }
    
    /**
     * Get wheels for API use.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWheels()
    {
        $wheels = Wheel::select('wheel', 'capacity')
                      ->where(function ($query) {
                          $query->orWhere('load', '=', true)
                              ->orWhere('tonne', '=', true);
                      })
                      ->orderBy('wheel', 'desc')
                      ->get();

        if ($wheels->isNotEmpty()) {
            return response()->json([
                'success' => true,
                'error' => false,
                'data' => $wheels,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => true,
                'data' => [],
            ]);
        }
    }
    
    /**
     * Toggle a specific property (load or tonne) for a wheel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleProperty(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:wheels,id',
            'property' => 'required|in:load,tonne',
            'value' => 'required|boolean',
        ]);
        
        try {
            $wheel = Wheel::findOrFail($validated['id']);
            $property = $validated['property'];
            $value = (bool) $validated['value'];
            
            // Update the property
            $wheel->$property = $value;
            $wheel->save();
            
            return response()->json([
                'success' => true,
                'message' => ucfirst($property) . ' setting updated successfully',
                'wheel' => $wheel->only(['id', 'wheel', 'load', 'tonne'])
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update wheel property: ' . $e->getMessage()
            ], 500);
        }
    }
}