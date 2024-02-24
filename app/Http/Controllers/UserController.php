<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
       $user = User::create($request->only('name','email','password'));
       $user->assignRole($request->role);
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));
    }

    public function update(User $user,UpdateUserRequest $request)
    {
        $user->update($request->only('name','email'));
        $user->syncRoles($request->role);
        return redirect()->route('users.index');
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
