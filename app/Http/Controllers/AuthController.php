<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login(){
        if (Auth::check()) {
            if(auth()->user()->role=='Admin'){
                return redirect()->route('admin.index');
            }
        }
        return view('auth.login');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            if(auth()->user()->role == 'Admin'){
                return redirect()->route('admin.index');
            }
        }
        else{
            return back()->with('fail','Login Failed !!');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
