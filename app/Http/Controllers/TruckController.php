<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use App\Models\Transporter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TruckController extends Controller
{
    public function index(Request $request)
    {
        $query = Truck::with([
            'transporter',
            'current.driver.user',
            'latest',
        ]);
        
        // Filter by search term
        if ($request->has('search') && !empty($request->search)) {
            $query->where('registration_plate_number', 'like', '%' . $request->search . '%')
                  ->orWhereHas('transporter', function ($query) use ($request) {
                      $query->where('name', 'like', '%' . $request->search . '%');
                  });
        }
        
        // Filter by status
        if ($request->has('status') && $request->status != 'Status') {
            $query->whereHas('latest', function ($query) use ($request) {
                $query->where('status', $request->status);
            });
        }
        
        $perPage = $request->per_page ?? 10;
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
        $validated = $request->validate([
            'registration_plate_number' => 'required|string|unique:trucks',
            'transporter_id' => 'required|exists:transporters,id',
            'package_id' => 'nullable|exists:packages,id',
            'status' => 'required|string|in:Active,Pending,Reject,Deleted',
            'remark' => 'nullable|string',
        ]);
        
        // Create the truck
        $truck = Truck::create([
            'registration_plate_number' => $validated['registration_plate_number'],
            'transporter_id' => $validated['transporter_id'],
            'package_id' => $validated['package_id'] ?? null,
            'creator_id' => Auth::id(),
        ]);
        
        // Create the truck detail
        $truck->truck_details()->create([
            'status' => $validated['status'],
            'remark' => $validated['remark'] ?? null,
            'creator_id' => Auth::id(),
        ]);
        
        return redirect()->route('trucks.index')->with('success', 'Truck created successfully');
    }
    
    public function show(Truck $truck)
    {
        $truck->load(['transporter', 'current.driver.user', 'latest', 'truck_details']);
        return view('trucks.show', compact('truck'));
    }
    
    public function edit(Truck $truck)
    {
        $transporters = Transporter::all();
        $truck->load(['transporter', 'latest', 'package']);
        return view('trucks.edit', compact('truck', 'transporters'));
    }
    
    public function update(Request $request, Truck $truck)
    {
        $validated = $request->validate([
            'registration_plate_number' => 'required|string|unique:trucks,registration_plate_number,' . $truck->id,
            'transporter_id' => 'required|exists:transporters,id',
            'package_id' => 'nullable|exists:packages,id',
            'status' => 'required|string|in:Active,Pending,Reject,Deleted',
            'remark' => 'nullable|string',
        ]);
        
        // Update truck
        $truck->update([
            'registration_plate_number' => $validated['registration_plate_number'],
            'transporter_id' => $validated['transporter_id'],
            'package_id' => $validated['package_id'] ?? null,
        ]);
        
        // Create new truck detail with updated status
        if ($truck->latest && ($truck->latest->status != $validated['status'] || $truck->latest->remark != ($validated['remark'] ?? null))) {
            $truck->truck_details()->create([
                'status' => $validated['status'],
                'remark' => $validated['remark'] ?? null,
                'creator_id' => Auth::id(),
            ]);
        }
        
        return redirect()->route('trucks.index')->with('success', 'Truck updated successfully');
    }
    
    public function destroy(Truck $truck)
    {
        // Instead of deleting, mark as deleted
        $truck->truck_details()->create([
            'status' => 'Deleted',
            'remark' => 'Truck deleted by admin',
            'creator_id' => Auth::id(),
        ]);
        
        return redirect()->route('trucks.index')->with('success', 'Truck marked as deleted');
    }
}