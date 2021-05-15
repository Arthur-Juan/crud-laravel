<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \App\Models\User;


class RegisterController extends Controller
{
    public function showFormReg(){
        return view('auth.register');
    }



    public function register(Request $request){
        
        if(Auth::check()){
            dd(Auth::check());
        }

        $data = $request->only('name', 'email', 'password', 'address');
        
        
    
        $user = User::create($data);
        
        Auth::login($user);

        return redirect('/');
    }
}
