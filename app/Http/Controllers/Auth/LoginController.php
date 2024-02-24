<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use ThrottlesLogins;
    public function store(LoginRequest $request)
    {
        if ($this->hasTooManyLoginAttempts($request))
        {
            return $this->sendLockoutResponse($request);
        }
        if (!Auth::attempt($request->only('email','password'),$request->remember))
        {
            throw ValidationException::withMessages([
                'email' => __('auth.failed')
            ]);
        }
        session()->regenerate();

        return redirect()->intended();
    }

    public function username()
    {
        return 'email';
    }
}
