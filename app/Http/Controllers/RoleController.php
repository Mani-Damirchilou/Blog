<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->only('name'));
        $role->givePermissionTo($request->permissions);

        return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('roles.edit',compact('permissions','role'));
    }

    public function update(Role $role,UpdateRoleRequest $request)
    {
        $role->update($request->only('name'));
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index');
    }

    public function delete(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index');
    }
}
