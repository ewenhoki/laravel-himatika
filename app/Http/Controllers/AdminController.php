<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function update(Request $request){
        if(strtolower(trim($request->email)) != auth()->user()->email){
            $message = [
                'unique' => 'Data :attribute sudah terdaftar.',
            ];
            $this->validate($request, [
                'email' => 'unique:users',
            ], $message);
        }
        $user = User::find(auth()->user()->id);
        $user->name = ucwords(strtolower(trim($request->name)));
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('admin.index')->with('success','Berhasil perbaharui data !');
    }
}
