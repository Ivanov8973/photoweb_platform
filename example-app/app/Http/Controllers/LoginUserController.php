<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        //Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8, string'
        ]);

        //Attempt to log the user in
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('photos.index'));
        } else {
            return back()->withErrors(['email' => 'The provided credentials do not match']);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        //destroy the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('photos.index');
    }
}
