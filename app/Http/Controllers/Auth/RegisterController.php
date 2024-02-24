<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function store(RegisterRequest $request)
    {
        $user = User::create($request->only('name','email','password'));
        Auth::login($user);
        session()->regenerate();
        return redirect()->route('index');
    }
}
