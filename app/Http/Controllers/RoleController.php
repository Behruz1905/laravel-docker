<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::query()->where('name', '!=', 'super-user')->orderBy('name')->get();
        return view('roles.index' , compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::query()->orderBy('name')->get();
        return view('roles.create',['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'permissions' => 'required',
            'permissions.*' => 'required|integer|exists:permissions,id',
        ]);

        $role = Role::create([
            'name' => $validated['name'],
        ]);

        $permissions = Permission::query()->whereIn('id',$validated['permissions'])->get();

        $role->syncPermissions($permissions);

        return redirect()->back()->with('status', 'Role created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::query()->orderBy('name')->get();

        return view('roles.edit',[
                'permissions' => $permissions,
                'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'permissions' => 'required',
            'permissions.*' => 'required|integer|exists:permissions,id',
        ]);

        $role->update([
            'name' => $validated['name']
        ]);

        $permissions = Permission::query()->whereIn('id',$validated['permissions'])->get();
        $role->syncPermissions($permissions);
        return redirect()->back()->with('status', 'Role updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
