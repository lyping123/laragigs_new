<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login(){
        return view('login');
    }

    public function authenticate(Request $request){
        $formFields=$request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);

        if(Auth::attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message','You are now logged in');
        }

        return back()->withErrors(['email'=>'Invalid credentials'])->onlyInput('email');
    }

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

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','You have been logged out');
    }   
}
