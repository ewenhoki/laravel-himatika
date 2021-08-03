<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $users = User::all();
        return view('dashboards.admin.index', compact(['users']));
    }

    public function profile(){
        return view('dashboards.admin.profile');
    }

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
        return redirect()->route('admin.profile')->with('success','Berhasil perbaharui data !');
    }

    public function updatePassword(Request $request){
        $user = User::find(auth()->user()->id);
        if (Hash::check($request->password, $user->password)) {
            if($request->new_password!=NULL){
                $user->password = bcrypt($request->new_password);
            }
            $user->save();
        }
        else{
            return back()->with('fail','wrong passsword');
        }
        return redirect()->route('admin.profile')->with('updated','success');
    }

    public function verification(User $user){
        $user->email_verified_at = Carbon::now()->toDateTimeString();
        $user->save();
        return redirect()->route('admin.index')->with('verif','Success');
    }

    public function deleteUser(User $user){
        $user->delete();
        return redirect()->route('admin.index')->with('deleted','success');
    }
}
