<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::where('id', '>', 0)
            ->has('roles')
            ->with(['roles' => function($query) {
                $query->withPivot('company_id');
            }]);
        
        // Handle search (case-insensitive)
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $searchTermLower = strtolower($searchTerm);
            $pattern = "%{$searchTermLower}%";
            $query->where(function($q) use ($pattern) {
                $q->whereRaw('LOWER(name) LIKE ?', [$pattern])
                  ->orWhereRaw('LOWER(email) LIKE ?', [$pattern]);
            });
        }
        
        // Handle status filter
        if ($request->has('status') && $request->status !== 'Status') {
            if ($request->status === 'Active') {
                $query->whereNotNull('email_verified_at');
            } elseif ($request->status === 'Inactive') {
                $query->whereNull('email_verified_at');
            }
        }
        
        // Paginate results
        $perPage = $request->get('per_page', 10);
        $employees = $query->orderBy('created_at', 'desc')->paginate($perPage);
        
        return view('employees.index', compact('employees'));
    }
    
    public function create()
    {
        return view('employees.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'department' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $employeeData = [
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'designation' => $request->designation,
            'password' => bcrypt('password'), // Default password - should be changed
            'email_verified_at' => now(), // Mark as active by default
        ];
        
        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $employeeData['profile_photo_path'] = $path;
        }
        
        $employee = Customer::create($employeeData);
        
        // Assign roles if provided
        if ($request->has('roles')) {
            foreach ($request->roles as $company_id => $roles) {
                foreach ($roles as $role) {
                    $employee->roles()->attach($role, ['company_id' => $company_id]);
                }
            }
        }
        
        return redirect()->route('employees.index')->with('success', 'Employee added successfully!');
    }
    
    public function edit($id)
    {
        $employee = Customer::with(['roles' => function($query) {
            $query->withPivot('company_id');
        }])->findOrFail($id);
        return view('employees.edit', compact('employee'));
    }
    
    public function update(Request $request, $id)
    {
        $employee = Customer::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $employee->id,
            'department' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $employeeData = [
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'designation' => $request->designation,
        ];
        
        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($employee->profile_photo_path && file_exists(storage_path('app/public/' . $employee->profile_photo_path))) {
                unlink(storage_path('app/public/' . $employee->profile_photo_path));
            }
            
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $employeeData['profile_photo_path'] = $path;
        }
        
        $employee->update($employeeData);
        
        // Update roles if provided
        if ($request->has('roles')) {
            // Remove all existing roles
            $employee->roles()->detach();
            
            // Add new roles
            foreach ($request->roles as $company_id => $roles) {
                foreach ($roles as $role) {
                    $employee->roles()->attach($role, ['company_id' => $company_id]);
                }
            }
        }
        
        return redirect()->route('employees.edit', $employee->id)->with('success', 'Employee updated successfully!');
    }
    
    public function destroy($id)
    {
        $employee = Customer::findOrFail($id);
        
        // Remove all roles
        $employee->roles()->detach();
        
        // Delete profile photo if exists
        if ($employee->profile_photo_path && file_exists(storage_path('app/public/' . $employee->profile_photo_path))) {
            unlink(storage_path('app/public/' . $employee->profile_photo_path));
        }
        
        $employee->delete();
        
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
    
    public function show($id)
    {
        $employee = Customer::with(['roles' => function($query) {
            $query->withPivot('company_id');
        }])->findOrFail($id);
        return view('employees.show', compact('employee'));
    }
}