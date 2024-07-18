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

            // $user = us::where('name', $credential['name'])->first();
            if(Auth::attempt($credential)){
                return redirect()->route('user.dashboard');
            }
            // if($user){
            //     // dd('ada');
            //     if(Hash::check($credential['password'], $user->password)){
            //         $_SESSION['admin'] = $user->name;
            //        return redirect()->route('user.dashboard');
            //     }
            //     return redirect()->route('user.login' , 
            //     [
            //         'status' => 'Password Salah',
            //     ]);
            // }
            
            return redirect()->route('user.login'  , [
                'status' => 'Kesalahan Login',      
            ]);
            
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }


}
