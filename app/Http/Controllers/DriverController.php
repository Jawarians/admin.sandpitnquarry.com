<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Transporter;
use App\Models\User;
use App\Models\Truck;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::with(['user', 'transporter', 'current.truck', 'latest'])
            ->where('id', '>', 0)
            ->orderBy('id', 'desc')
            ->paginate(10);
            
        return view('drivers.index', compact('drivers'));
    }
    
    public function create()
    {
        $users = User::all();
        $transporters = Transporter::all();
        $trucks = Truck::all();
        
        return view('drivers.create', compact('users', 'transporters', 'trucks'));
    }
    
    public function store(Request $request)
    {
        // Validation logic
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'transporter_id' => 'required|exists:transporters,id',
            // Add other fields as needed
        ]);
        
        $driver = Driver::create($validated);
        
        // If truck_id is provided, create a driver-truck assignment
        if ($request->filled('truck_id')) {
            $driver->assignments()->create([
                'truck_id' => $request->truck_id,
                'status' => 'Active'
            ]);
        }
        
        // Create initial driver status
        $driver->statuses()->create([
            'status' => $request->status ?? 'Active'
        ]);
        
        return redirect()->route('drivers.index')->with('success', 'Driver created successfully');
    }
    
    public function show(Driver $driver)
    {
        $driver->load(['user', 'transporter', 'current.truck', 'latest', 'assignments.truck']);
        return view('drivers.show', compact('driver'));
    }
    
    public function edit(Driver $driver)
    {
        $users = User::all();
        $transporters = Transporter::all();
        $trucks = Truck::all();
        
        return view('drivers.edit', compact('driver', 'users', 'transporters', 'trucks'));
    }
    
    public function update(Request $request, Driver $driver)
    {
        // Validation logic
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'transporter_id' => 'required|exists:transporters,id',
            // Add other fields as needed
        ]);
        
        $driver->update($validated);
        
        // Update truck assignment if provided
        if ($request->filled('truck_id') && $driver->current && $driver->current->truck_id != $request->truck_id) {
            $driver->assignments()->create([
                'truck_id' => $request->truck_id,
                'status' => 'Active'
            ]);
        }
        
        // Update status if provided
        if ($request->filled('status') && $driver->latest && $driver->latest->status != $request->status) {
            $driver->statuses()->create([
                'status' => $request->status
            ]);
        }
        
        return redirect()->route('drivers.index')->with('success', 'Driver updated successfully');
    }
    
    public function destroy(Driver $driver)
    {
        // You might want to add logic here to check if the driver can be deleted
        $driver->delete();
        
        return redirect()->route('drivers.index')->with('success', 'Driver deleted successfully');
    }
}