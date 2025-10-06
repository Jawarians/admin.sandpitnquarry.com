<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use App\Models\Transporter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TruckController extends Controller
{
    public function index(Request $request)
    {
        // Selective eager loading to reduce query load
        $query = Truck::with([
            'transporter',
            'current.driver.user',
            'latest',
        ]);
        
        // Filter by search term using parameter binding to prevent SQL injection
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            // Escape LIKE wildcards to prevent LIKE injection attacks
            $escapedSearchTerm = addcslashes($searchTerm, '%_');
            
            $query->where(function ($q) use ($escapedSearchTerm) {
                $q->where('registration_plate_number', 'like', '%' . $escapedSearchTerm . '%')
                  ->orWhereHas('transporter', function ($subQuery) use ($escapedSearchTerm) {
                      $subQuery->where('name', 'like', '%' . $escapedSearchTerm . '%');
                  });
            });
        }
        
        // Filter by status - using proper parameter binding and validation
        if ($request->filled('status') && $request->status != 'Status') {
            $statusValue = $request->status;
            $query->whereHas('latest', function ($subQuery) use ($statusValue) {
                $subQuery->where('status', $statusValue);
            });
        }
        
        // Cast pagination parameter to integer to prevent injection
        $perPage = (int) ($request->per_page ?? 10);
        // Limit reasonable pagination size
        $perPage = min(max($perPage, 5), 100);
        
        // Add index hint if you have an index on id (for larger tables)
        // $query->from(DB::raw('trucks USE INDEX (primary)'));
        
        $trucks = $query->orderBy('id', 'desc')->paginate($perPage);
        
        return view('trucks.index', compact('trucks'));
    }
    
    public function create()
    {
        $transporters = Transporter::all();
        return view('trucks.create', compact('transporters'));
    }
    
    public function store(Request $request)
    {
        // Add more validation for better security
        $validated = $request->validate([
            'registration_plate_number' => 'required|string|max:255|unique:trucks',
            'transporter_id' => 'required|integer|exists:transporters,id',
            'package_id' => 'nullable|integer|exists:packages,id',
            'status' => 'required|string|in:Active,Pending,Reject,Deleted',
            'remark' => 'nullable|string|max:1000',
        ]);
        
        // Use database transaction to ensure data integrity
        try {
            DB::beginTransaction();
            
            // Create the truck
            $truck = Truck::create([
                'registration_plate_number' => trim($validated['registration_plate_number']),
                'transporter_id' => (int) $validated['transporter_id'],
                'package_id' => isset($validated['package_id']) ? (int) $validated['package_id'] : null,
                'creator_id' => Auth::id(),
            ]);
            
            // Create the truck detail
            $truck->truck_details()->create([
                'status' => $validated['status'],
                'remark' => isset($validated['remark']) ? trim($validated['remark']) : null,
                'creator_id' => Auth::id(),
            ]);
            
            DB::commit();
            
            return redirect()->route('trucks.index')->with('success', 'Truck created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            
            // Log the error but don't expose details to the user
            Log::error('Truck creation failed: ' . $e->getMessage());
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create truck. Please try again.');
        }
    }
    
    public function show(Truck $truck)
    {
        // Optimize eager loading with selective columns
        $truck->load([
            'transporter',
            'current.driver.user',
            'latest',
            'truck_details' => function($query) {
                // Order by newest first and limit to recent details for performance
                $query->orderBy('created_at', 'desc')
                      ->limit(10);
            }
        ]);
        
        return view('trucks.show', compact('truck'));
    }
    
    public function edit(Truck $truck)
    {
        // Cache transporters for better performance if this is a frequently accessed page
        $transporters = cache()->remember('all_transporters', now()->addMinutes(30), function() {
            return Transporter::all();
        });
        
        // Selective loading of relations
        $truck->load(['transporter', 'latest', 'package']);
        
        return view('trucks.edit', compact('truck', 'transporters'));
    }
    
    public function update(Request $request, Truck $truck)
    {
        // Enhanced validation with more specific rules
        $validated = $request->validate([
            'registration_plate_number' => 'required|string|max:255|unique:trucks,registration_plate_number,' . $truck->id,
            'transporter_id' => 'required|integer|exists:transporters,id',
            'package_id' => 'nullable|integer|exists:packages,id',
            'status' => 'required|string|in:Active,Pending,Reject,Deleted',
            'remark' => 'nullable|string|max:1000',
        ]);
        
        // Use transaction to ensure data integrity
        try {
            DB::beginTransaction();
            
            // Update truck with proper type casting for security and performance
            $truck->update([
                'registration_plate_number' => trim($validated['registration_plate_number']),
                'transporter_id' => (int) $validated['transporter_id'],
                'package_id' => isset($validated['package_id']) ? (int) $validated['package_id'] : null,
            ]);
            
            // Create new truck detail only if status or remark has changed (avoid unnecessary records)
            if ($truck->latest && ($truck->latest->status != $validated['status'] || $truck->latest->remark != ($validated['remark'] ?? null))) {
                $truck->truck_details()->create([
                    'status' => $validated['status'],
                    'remark' => isset($validated['remark']) ? trim($validated['remark']) : null,
                    'creator_id' => Auth::id(),
                ]);
            }
            
            DB::commit();
            
            // Clear any relevant caches that might contain this truck's data
            cache()->forget('truck_'.$truck->id);
            
            return redirect()->route('trucks.index')->with('success', 'Truck updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            
            Log::error('Truck update failed: ' . $e->getMessage());
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update truck. Please try again.');
        }
    }
    
    public function destroy(Truck $truck)
    {
        try {
            DB::beginTransaction();
            
            // Instead of deleting, mark as deleted
            $truck->truck_details()->create([
                'status' => 'Deleted',
                'remark' => 'Truck deleted by admin',
                'creator_id' => Auth::id(),
            ]);
            
            DB::commit();
            
            // Clear any caches related to this truck
            cache()->forget('truck_'.$truck->id);
            
            return redirect()->route('trucks.index')->with('success', 'Truck marked as deleted');
        } catch (\Exception $e) {
            DB::rollBack();
            
            Log::error('Truck deletion failed: ' . $e->getMessage());
            
            return redirect()->back()->with('error', 'Failed to delete truck. Please try again.');
        }
    }
}