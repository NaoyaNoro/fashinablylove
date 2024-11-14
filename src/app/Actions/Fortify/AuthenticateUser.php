<?php

namespace App\Actions\Fortify;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\Login;

class AuthenticateUser
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return Auth::user();
        }

        return null;
    }
}