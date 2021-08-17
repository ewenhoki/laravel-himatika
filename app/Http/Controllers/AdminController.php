<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Generation;
use App\Models\Activestudent;
use App\Models\Inactivestudent;
use App\Models\Studentrequest;
use App\Models\Alumnirequest;

class AdminController extends Controller
{
    public function index(){
        $users = User::all();
        $activestudent = Activestudent::count();
        $inactivestudent = Inactivestudent::count();
        $student_request = Studentrequest::whereNull('confirm')->count();
        $alumni_request = Alumnirequest::whereNull('confirm')->count();
        $requests = $alumni_request + $student_request;
        return view('dashboards.admin.index', compact(['users','activestudent','inactivestudent','requests']));
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
        if($request->generation_id == NULL){
            $student = Activestudent::orderBy('generation_id')->get();
            return view('dashboards.admin.students', compact(['student','generation']));
        }
        $gen = Generation::find($request->generation_id);
        $student = $gen->activestudents()->get();
        return view('dashboards.admin.students', compact(['student','gen','generation']));
    }

    public function alumniData(){
        $generations_all = Generation::all();
        $generations = array();
        foreach($generations_all as $gen){
            if($gen->inactivestudents()->first()){
                $generations[] = $gen->id;
            }
        }
        $generation = Generation::whereIn('id',$generations)
            ->orderBy('year')
            ->pluck('year','id');
        return view('dashboards.admin.alumni', compact(['generation']));
    }

    public function alumniDetail(Request $request){
        $generations_all = Generation::all();
        $generations = array();
        foreach($generations_all as $gen){
            if($gen->inactivestudents()->first()){
                $generations[] = $gen->id;
            }
        }
        $generation = Generation::whereIn('id',$generations)
            ->orderBy('year')
            ->pluck('year','id');
        if($request->generation_id == NULL){
            $alumni = Inactivestudent::orderBy('generation_id')->get();
            return view('dashboards.admin.alumni', compact(['alumni','generation']));
        }
        $gen = Generation::find($request->generation_id);
        $alumni = $gen->inactivestudents()->get();
        return view('dashboards.admin.alumni', compact(['alumni','gen','generation']));
    }

    public function studentRequests(){
        $requests = Studentrequest::orderBy('confirm')->orderBy('created_at', 'DESC')->get();
        return view('dashboards.admin.student-request', compact(['requests']));
    }

    public function alumniRequests(){
        $requests = Alumnirequest::orderBy('confirm')->orderBy('created_at', 'DESC')->get();
        return view('dashboards.admin.alumni-request', compact(['requests']));
    }

    public function acceptStudentRequests(Studentrequest $studentrequest){
        $studentrequest->update(['confirm' => 1]);
        return redirect()->route('admin.student.request')->with('accepted','success');
    }

    public function rejectStudentRequests(Studentrequest $studentrequest){
        $studentrequest->update(['confirm' => 2]);
        return redirect()->route('admin.student.request')->with('rejected','success');
    }

    public function deleteStudentRequests(Studentrequest $studentrequest){
        $studentrequest->delete();
        return redirect()->route('admin.student.request')->with('deleted','success');
    }

    public function acceptAlumniRequests(Alumnirequest $alumnirequest){
        $alumnirequest->update(['confirm' => 1]);
        return redirect()->route('admin.alumni.request')->with('accepted','success');
    }

    public function rejectAlumniRequests(Alumnirequest $alumnirequest){
        $alumnirequest->update(['confirm' => 2]);
        return redirect()->route('admin.alumni.request')->with('rejected','success');
    }

    public function deleteAlumniRequests(Alumnirequest $alumnirequest){
        $alumnirequest->delete();
        return redirect()->route('admin.alumni.request')->with('deleted','success');
    }
}
