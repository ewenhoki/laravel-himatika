<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function login(){
        return redirect('/login');
    }

    public function adminDashboard(){
        return view('dashboards.admin.index');
    }

    public function check(){
        if(auth()->user()->role == 'Admin'){
            return redirect()->route('admin.index');
        }
        return redirect()->route('login');
    }
}
