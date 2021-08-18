<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function login(){
        return redirect('/login');
    }

    public function check(){
        if(auth()->user()->role == 'Admin'){
            return redirect()->route('admin.index');
        }
        else if(auth()->user()->role == 'A'){
            return redirect()->route('alumni.index');
        }
        else{
            return redirect()->route('student.index');
        }
    }

    public function locked(){
        return view('errors.locked');
    }
}
