<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Education;
use App\Models\Job;
use App\Models\Certification;

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

    public function addEducation(Request $request){
        $education = new Education;
        $education->inactivestudent_id = auth()->user()->inactivestudent->id;
        $education->level = $request->level;
        $education->major = ucwords(strtolower(trim($request->major)));
        $education->university = ucwords(strtolower(trim($request->university)));
        $education->year = $request->year;
        $education->save();
        return redirect()->route('alumni.index')->with('success','success');
    }

    public function deleteEducation(Education $education){
        $education->delete();
        return redirect()->route('alumni.index')->with('deleted','success');
    }

    public function editEducation(Request $request){
        $education = Education::find($request->education_id);
        $education->year = $request->year;
        $education->university = ucwords(strtolower(trim($request->university)));
        $education->major = ucwords(strtolower(trim($request->major)));
        $education->save();
        return redirect()->route('alumni.index')->with('success','success');
    }

    public function addJob(Request $request){
        $job = new Job;
        $job->inactivestudent_id = auth()->user()->inactivestudent->id;
        $job->company_name = trim($request->company_name);
        $job->position = ucwords(strtolower(trim($request->position)));
        $job->year = $request->year;
        $job->save();
        return redirect()->route('alumni.index')->with('success','success');
    }

    public function deleteJob(Job $job){
        $job->delete();
        return redirect()->route('alumni.index')->with('deleted','success');
    }

    public function editJob(Request $request){
        $job = Job::find($request->job_id);
        $job->year = $request->year;
        $job->company_name = trim($request->company_name);
        $job->position = ucwords(strtolower(trim($request->position)));
        $job->save();
        return redirect()->route('alumni.index')->with('success','success');
    }

    public function addCertification(Request $request){
        $certification = new Certification;
        $certification->inactivestudent_id = auth()->user()->inactivestudent->id;
        $certification->name = ucwords(strtolower(trim($request->name)));
        $certification->year = $request->year;
        $certification->save();
        return redirect()->route('alumni.index')->with('success','success');
    }

    public function deleteCtf(Certification $certification){
        $certification->delete();
        return redirect()->route('alumni.index')->with('deleted','success');
    }

    public function editCertification(Request $request){
        $certification = Certification::find($request->ctf_id);
        $certification->year = $request->year;
        $certification->name = ucwords(strtolower(trim($request->name)));
        $certification->save();
        return redirect()->route('alumni.index')->with('success','success');
    }
}
