<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class signin extends Controller
{
    //

    public function showRegistrationForm(){
        return inertia::render('Form/Signin');
    }

    public function create(Request $request){
        $request->validate([
            'email' => 'required|email|length:191',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(10),
            'type' => 'admin',
        ]);

        return redirect()->route('login')->with('status', 'User created successfully!');
    }

}
