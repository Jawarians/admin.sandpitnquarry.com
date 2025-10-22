<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('model')->orderBy('permission')->get();
        $roles = Role::orderBy('role')->get();
        return view('permissions.index', compact('permissions', 'roles'));
    }
    public function assign(Request $request)
    {
        $request->validate([
            'permission' => 'required|string',
            'role' => 'required|string',
            'assign' => 'required|boolean',
        ]);

        $permission = $request->input('permission');
        $role = $request->input('role');
        $assign = $request->boolean('assign');

        $exists = DB::table('role_permissions')
            ->where('permission', $permission)
            ->where('role', $role)
            ->exists();

        if ($assign && !$exists) {
            DB::table('role_permissions')->insert([
                'permission' => $permission,
                'role' => $role,
            ]);
        } elseif (!$assign && $exists) {
            DB::table('role_permissions')
                ->where('permission', $permission)
                ->where('role', $role)
                ->delete();
        }

        return response()->json(['success' => true]);
    }
}
