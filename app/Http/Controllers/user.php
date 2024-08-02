<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User as us;use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class user extends Controller
{
    
    //
    public function showRegisterForm(){
        return Inertia::render('User/Register' , [

        ]);
    }


    public function createUser(Request $request){
        // dd($request);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255' , 'bail'],
            'email' => ['required', 'string', 'email', 'max:255', ],
            'password' => ['required', 'string', 'min:8', ],
        ]);

        $user = us::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

    }

    public function sessionCreate(Request $request){
            $credential = $request->validate([
                'name' => ['required', 'string', 'max:255', ],
                'password' => ['required', 'string', 'min:8', ],
            ]);
            if(Auth::guard('Admin')->attempt($credential)){
               if(Auth::guard('Admin')->user()->type == 'admin'){
                return redirect()->route('user.dashboard');
               }
               return redirect()->route('user.login'  , [
                'status' => 'Kesalahan Login',      
            ]);
            }
            return redirect()->route('user.login'  , [
                'status' => 'Kesalahan Login',      
            ]);
            
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/admin');
    }


}
