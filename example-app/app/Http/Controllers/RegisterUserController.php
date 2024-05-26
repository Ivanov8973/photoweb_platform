<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use \App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //validate the fields
        $request->validate([
            'name' => ['required', 'max:255', 'min:5', 'string'],
            'email' => 'required|email|unique:users',
            'password' => ['required', 'confirmed', Password::defaults()]
        ]);

        //create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //log the user in
        // auth()->login($user);

        //redirect
        return to_route('photos.index')->with('success', 'Registered successfully');
    }
}
