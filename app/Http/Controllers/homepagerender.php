<?php

namespace App\Http\Controllers;

use App\Models\kamar;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class homepagerender extends Controller
{
    //
    public function homepage(){
        $user = Auth::guard('web')->user();
        // dd($user);
        if($user){
            if($user->type == 'user'){
                $isLogin = true ;
            }else{
                $isLogin = false ;
            }
        }else{
            $isLogin = false ;
        }
        $bedroom = kamar::limit(10)->get();      
        return Inertia::render('homepage' , [
                'Bedrooms' => $bedroom ,
                'isLogin' => $isLogin ,
                'user' => $user
        ]); 
    }
}
