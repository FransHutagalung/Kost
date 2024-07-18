<?php

namespace App\Http\Controllers;

use App\Models\customer as ModelsCustomer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Customer extends Controller
{
    
    //

    public function index()
    {
        $customer = ModelsCustomer::all();
        // dd($customer);
        return Inertia::render('Customer/index' , [
            'customer' => $customer
        ]);
    }

}
