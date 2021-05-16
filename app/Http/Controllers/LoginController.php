<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \App\Models\User;
class LoginController extends Controller
{
    

    public function authenticate(Request $request){

        $credentials = $request->only('email', 'password');
            
        if(Auth::attempt($credentials)){
            
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'errors'=>'Email ou senha incorretos!'
        ]);
        
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');

    }

    public function showForm(){
        return view('auth.index');
    }
   
   
}
