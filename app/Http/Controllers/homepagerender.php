<?php

namespace App\Http\Controllers;

use App\Models\kamar;
use Illuminate\Http\Request;
use Inertia\Inertia;

class homepagerender extends Controller
{
    //
    public function homepage(){
        $bedroom = kamar::all();
        // dd($bedroom);
        return Inertia::render('homepage' , [
                'Bedrooms' => $bedroom
        ]); 
    }
}
