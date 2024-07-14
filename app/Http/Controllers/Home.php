<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\kamar;

class Home extends Controller
{
    
     public function welcome(){
        $kamar = kamar::all();
        return Inertia::render('Home' , [ 
          'kamar' => $kamar , 
          'nama' => 'Frans'
        ]);
     }

}
