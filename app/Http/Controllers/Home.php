<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\kamar;
use Illuminate\Support\Facades\Auth;

class Home extends Controller
{
    
     public function welcome(){
        $kamar = kamar::all();
        $user = Auth::guard('Admin')->user();
        // dd($user->name);
        // dd($user);
        return Inertia::render('Home' , [ 
          'user' => $user,
          'kamar' => $kamar , 
          // 'nama' => 'Frans'
        ]);
     }

}
