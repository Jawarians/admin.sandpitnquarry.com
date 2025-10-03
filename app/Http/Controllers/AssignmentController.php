<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::with([
            'truck', 
            'truck.transporter', 
            'driver', 
            'driver.user'
        ])
        ->orderBy('id', 'desc')
        ->paginate(10);
            
        return view('assignments.index', compact('assignments'));
    }
    
    public function create()
    {
        return view('assignments.create');
    }
    
    public function store(Request $request)
    {
        // Validation logic
        $validated = $request->validate([
            'truck_id' => 'required|exists:trucks,id',
            'driver_id' => 'required|exists:drivers,id',
            // Add other fields as needed
        ]);
        
        Assignment::create([
            'truck_id' => $validated['truck_id'],
            'driver_id' => $validated['driver_id'],
            'creator_id' => 1, // Default to admin/system user (you should adjust this based on your auth system)
        ]);
        
        return redirect()->route('assignments.index')->with('success', 'Assignment created successfully');
    }
    
    public function show(Assignment $assignment)
    {
        $assignment->load(['truck', 'truck.transporter', 'driver', 'driver.user']);
        return view('assignments.show', compact('assignment'));
    }
    
    public function edit(Assignment $assignment)
    {
        return view('assignments.edit', compact('assignment'));
    }
    
    public function update(Request $request, Assignment $assignment)
    {
        // Validation logic
        $validated = $request->validate([
            'truck_id' => 'required|exists:trucks,id',
            'driver_id' => 'required|exists:drivers,id',
            'cancelled' => 'nullable|boolean',
            // Add other fields as needed
        ]);
        
        $updateData = [
            'truck_id' => $validated['truck_id'],
            'driver_id' => $validated['driver_id'],
        ];
        
        // Handle cancellation status
        if (isset($request->cancelled) && $request->cancelled) {
            $updateData['cancelled_at'] = $assignment->cancelled_at ?? now();
            $updateData['cancelled_by'] = 1; // Default to admin/system user
        } else {
            $updateData['cancelled_at'] = null;
            $updateData['cancelled_by'] = null;
        }
        
        $assignment->update($updateData);
        
        return redirect()->route('assignments.index')->with('success', 'Assignment updated successfully');
    }
    
    public function destroy(Assignment $assignment)
    {
        $assignment->delete();
        
        return redirect()->route('assignments.index')->with('success', 'Assignment deleted successfully');
    }
}