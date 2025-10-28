<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Transporter;
use App\Models\User;
use App\Models\Truck;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index(Request $request)
{
    $query = Driver::with([
        'user:id,name,email,phone',
        'transporter:id,name',
        'current.truck:id,registration_plate_number',
        'latest'
    ]);

    // Filter by search term (case-insensitive)
    if ($request->filled('search')) {
        $searchTerm = addcslashes($request->search, '%_');
        $searchTermLower = strtolower($searchTerm);
        $query->where(function ($q) use ($searchTermLower) {
            $q->whereHas('user', function ($subQuery) use ($searchTermLower) {
                $subQuery->whereRaw('LOWER(name) LIKE ?', ['%' . $searchTermLower . '%'])
                         ->orWhereRaw('LOWER(email) LIKE ?', ['%' . $searchTermLower . '%'])
                         ->orWhereRaw('LOWER(phone) LIKE ?', ['%' . $searchTermLower . '%']);
            })
            ->orWhereHas('transporter', function ($subQuery) use ($searchTermLower) {
                $subQuery->whereRaw('LOWER(name) LIKE ?', ['%' . $searchTermLower . '%']);
            });
        });
    }

    // Filter by status
    if ($request->filled('status') && $request->status != 'Status') {
        $statusValue = $request->status;
        $query->whereHas('latest', function ($subQuery) use ($statusValue) {
            $subQuery->where('status', $statusValue);
        });
    }

    // Pagination size
    $perPage = (int) ($request->per_page ?? 10);
    $perPage = min(max($perPage, 5), 100);

    $drivers = $query->orderBy('id', 'desc')->paginate($perPage);

    return view('drivers.index', compact('drivers'));
}
    
    public function create()
    {
        $users = User::select('id', 'name', 'email')->get();
        $transporters = Transporter::select('id', 'name')->get();
        $trucks = Truck::select('id', 'registration_plate_number')->get();
        
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
        $driver->load([
            'user:id,name,email,phone',
            'transporter:id,name',
            'current.truck:id,registration_plate_number',
            'latest',
            'assignments.truck:id,registration_plate_number'
        ]);
        return view('drivers.show', compact('driver'));
    }
    
    public function edit(Driver $driver)
    {
        $users = User::select('id', 'name', 'email')->get();
        $transporters = Transporter::select('id', 'name')->get();
        $trucks = Truck::select('id', 'registration_plate_number')->get();
        
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
    // Delete related driver_details and assignments first to avoid foreign key violation
    $driver->driver_details()->delete();
    $driver->assignments()->delete();
    $driver->delete();
    return redirect()->route('drivers.index')->with('success', 'Driver deleted successfully');
    }
}