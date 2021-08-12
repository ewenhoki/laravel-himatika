<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Generation;
use App\Models\Activestudent;
use App\Models\Inactivestudent;

class AdminController extends Controller
{
    public function index(){
        $users = User::all();
        $activestudent = Activestudent::count();
        $inactivestudent = Inactivestudent::count();
        return view('dashboards.admin.index', compact(['users','activestudent','inactivestudent']));
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
        $user->email = strtolower(trim($request->email));
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
        if($user->role == 'A'){
            $generation = Generation::find($user->inactivestudent->generation_id);
            $user->inactivestudent->delete();
        }
        else{
            $generation = Generation::find($user->activestudent->generation_id);
            $user->activestudent->delete();
        }
        if($generation->activestudents()->count() == 0 && $generation->inactivestudents()->count() == 0){
            $generation->delete();
        }
        $user->delete();
        return redirect()->route('admin.index')->with('deleted','success');
    }

    public function switchStudent(User $user){
        $generation = $user->inactivestudent->generation_id;
        $user->inactivestudent->delete();
        $activestudent = Activestudent::create([
            'user_id' => $user->id,
            'generation_id' => $generation,
        ]);
        $user->role = 'M';
        $user->save();
        return redirect()->route('admin.index')->with('switched','success');
    }

    public function switchAlumni(User $user){
        $generation = $user->activestudent->generation_id;
        $user->activestudent->delete();
        $inactivestudent = Inactivestudent::create([
            'user_id' => $user->id,
            'generation_id' => $generation,
        ]);
        $user->role = 'A';
        $user->save();
        return redirect()->route('admin.index')->with('switched','success');
    }

    public function studentData(){
        $generations_all = Generation::all();
        $generations = array();
        foreach($generations_all as $gen){
            if($gen->activestudents()->first()){
                $generations[] = $gen->id;
            }
        }
        $generation = Generation::whereIn('id',$generations)
            ->orderBy('year')
            ->pluck('year','id');
        return view('dashboards.admin.students', compact(['generation']));
    }

    public function studentDetail(Request $request){
        $generations_all = Generation::all();
        $generations = array();
        foreach($generations_all as $gen){
            if($gen->activestudents()->first()){
                $generations[] = $gen->id;
            }
        }
        $generation = Generation::whereIn('id',$generations)
            ->orderBy('year')
            ->pluck('year','id');
        $gen = Generation::find($request->generation_id);
        $student = $gen->activestudents()->get();
        return view('dashboards.admin.students', compact(['student','gen','generation']));
    }
}
