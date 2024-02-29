<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        abort_if(auth()->user()->email === 'admin@admin',403);
        return view('profile.edit');
    }
    public function update(UpdateProfileRequest $request)
    {
        $request->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'profile_path' => $request->has('profile') ? $request->profile->store('public/profiles') : $request->user()->profile_path
        ]);

        if (!is_null($request->password))
        {
            $request->user()->update($request->only('password'));
        }

        return back();
    }
}
