<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(){
        return view('register');
    }

    public function store(Request $request){
        $formFields=$request->validate([
            'name'=>'required',
            'email'=>['required','email'],
            'password'=>'required|confirmed|min:6'
        ]);

        //hash password
        $formFields['password']=bcrypt($formFields['password']);

        //create user
        $user=User::create($formFields);

        Auth::login($user);

        return redirect('/')->with('message','User created and logged in');
    }
}
