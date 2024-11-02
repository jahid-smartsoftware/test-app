<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class FrontendController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return to_route('home.index');
        } else {
            return view('frontend.login');
        }
    }
    public function verify(Request $request)
    {
        if (!Auth::check()) {
            if (!Auth::attempt($request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string'
            ]), true)) {
                throw ValidationException::withMessages([
                    'verify' => 'Authentication Failed!'
                ]);
            }
            $request->session()->regenerate();
        }
        return to_route('home.index');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('login');
    }
}
