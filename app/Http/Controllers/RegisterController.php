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
        
        
        $request->validate([
            "name"=> "required | string",
            "email"=>"required | email | unique:users",
            "address"=>"required | string"
        ]);

        $data = $request->only('name', 'email', 'password', 'address');
        
      
        
        foreach($data as $value){
            if($value === null){
                return back()->withErrors(['msg'=>'Preencha todos os campos!']);
            }
        }
    
        $user = User::create($data);
        
        Auth::login($user);

        return redirect('/');
    }
}
