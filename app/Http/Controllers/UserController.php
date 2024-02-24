<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        User::create($request->only('name','email','password'));
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    public function update(User $user,UpdateUserRequest $request)
    {
        $user->update($request->only('name','email'));
        return redirect()->route('users.index');
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
