<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class Bedroom extends Controller
{
    //
    public function index(){
        return inertia::render('Bedroom');
    }
}
