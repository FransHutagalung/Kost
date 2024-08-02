<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class customerControl extends Controller
{
    //
    public function ShowLoginForm(){
        return Inertia::render('Partial/Login');
    }

    public function ShowSignUpForm()
    {
        if(session('errors')){
            $errors = session('errors') ? session('errors')->getBag('default')->getMessages() : [];
            $errors = $errors[0][0];
            return Inertia::render('Partial/Register', [
                'errorfromServer' => $errors,
            ]);
        }
    
        return Inertia::render('Partial/Register');
    }
    

    public function StoreCustomer(Request $request){
        // dd($request);
        $data = $request->validate([
            'username' => ['required', 'string', 'max:255' , 'bail'],
            'email' => ['required', 'string', 'email', 'max:255', ],
            'password' => ['required', 'string', 'min:8', ],
            'type' => ['required', 'string'],
        ]);

        // dd($data);
        $user = User::create([
            'name' => $data['username'],
            'email' => $data['email'],
            'password' => $data['password'],
            'type' => $data['type']
        ]);

        if($user){
            return redirect()->route('customer.login');
        }
    }

    public function Login(Request $request){
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        if (Auth::attempt(['name' => $credentials['username'], 'password' => $credentials['password']])) {
            $user = Auth::guard('web')->user();
            // dd($user);
            if($user->type == 'user'){
                Auth::guard('web')->login($user);
                return redirect()->route('homepage');
            }else{
                return redirect()->route('login')->withErrors('Invalid credentials');
            }
    
        } else {
            return redirect()->route('login')->withErrors('Invalid credentials');
        }
    }
    

    public function Register(Request $request){
        
    }
}
