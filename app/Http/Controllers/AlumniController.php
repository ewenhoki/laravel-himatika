<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AlumniController extends Controller
{
    public function index(){
        return view('dashboards.alumni.index');
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
        $user->update([
            'name' => ucwords(strtolower(trim($request->name))),
            'email' => strtolower(trim($request->email)),
            'phone' => $request->phone,
            'birth_place' => ucwords(strtolower(trim($request->birth_place))),
            'birth_date' => $request->birth_date,
            'blood_group' => $request->blood_group,
            'religion' => $request->religion,
            'address' => $request->address,
        ]);
        $user->inactivestudent->update($request->all());
        return redirect()->route('alumni.index')->with('success','success');
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
        return redirect()->route('alumni.index')->with('updated','success');
    }
}
