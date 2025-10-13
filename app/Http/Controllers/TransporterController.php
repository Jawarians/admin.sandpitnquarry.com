<?php

namespace App\Http\Controllers;

use App\Models\Transporter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransporterController extends Controller
{
    public function addTransporter()
    {
        return view('transporters/addTransporter');
    }

    public function transportersList(Request $request)
    {
        $query = Transporter::query();
        
        // Handle search
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'ILIKE', "%{$searchTerm}%")
                  ->orWhere('registration_number', 'ILIKE', "%{$searchTerm}%");
            });
        }
        // Handle type filter
        if ($request->has('type') && $request->type !== 'Type') {
            $query->where('type', $request->type);
        }
        
        // Cast pagination parameter to integer to prevent injection
        $perPage = (int) ($request->per_page ?? 10);
        // Limit reasonable pagination size
        $perPage = min(max($perPage, 5), 100);
        
        // Add index hint if you have an index on id (for larger tables)
        // $query->from(DB::raw('trucks USE INDEX (primary)'));
        
        $transporters = $query->orderBy('id', 'desc')->paginate($perPage);        
        // Get all transporter types for filter dropdown
        $types = DB::table('company_types')->pluck('type');
        
        return view('transporters/transportersList', compact('transporters', 'types'));
    }
    
    public function viewTransporter($id)
    {
        $transporter = Transporter::with('owner')->findOrFail($id);
        return view('transporters/viewTransporter', compact('transporter'));
    }
    
    public function editTransporter($id)
    {
        $transporter = Transporter::with('owner')->findOrFail($id);
        // Get potential owners (users)
        $users = User::all();
        // Get company types
        $types = DB::table('company_types')->pluck('type');
        
        return view('transporters/editTransporter', compact('transporter', 'users', 'types'));
    }
    
    public function updateTransporter(Request $request, $id)
    {
        $transporter = Transporter::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'registration_number' => 'required|string|max:255|unique:transporters,registration_number,' . $transporter->id,
            'type' => 'required|exists:company_types,type',
            'user_id' => 'required|exists:users,id',
        ]);
        
        $transporter->update([
            'name' => $request->name,
            'registration_number' => $request->registration_number,
            'type' => $request->type,
            'user_id' => $request->user_id,
        ]);
        
        return redirect()->route('transportersList')->with('success', 'Transporter updated successfully');
    }
    
    public function deleteTransporter($id)
    {
        $transporter = Transporter::findOrFail($id);
        $transporter->delete();
        
        return redirect()->route('transportersList')->with('success', 'Transporter deleted successfully');
    }
    
    public function storeTransporter(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'registration_number' => 'required|string|max:255|unique:transporters',
            'type' => 'required|exists:company_types,type',
            'user_id' => 'required|exists:users,id',
        ]);
        
        $transporter = Transporter::create([
            'name' => $request->name,
            'registration_number' => $request->registration_number,
            'type' => $request->type,
            'user_id' => $request->user_id,
            'creator_id' => $request->user_id, // Using user_id as creator_id
        ]);
        
        return redirect()->route('transportersList')->with('success', 'Transporter created successfully');
    }
}