<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Business;
use App\Models\Organization;
use App\Models\Committee;
use App\Models\Seminar;
use App\Models\Achievment;

class StudentController extends Controller
{
    public function index(){
        return view('dashboards.student.index');
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
        $mod_father_name = ucwords(strtolower(trim($request->father_name)));
        $mod_father_job = ucwords(strtolower(trim($request->father_job)));
        $mod_mother_name = ucwords(strtolower(trim($request->mother_name)));
        $mod_mother_job = ucwords(strtolower(trim($request->mother_job)));
        $request->merge([
            'father_name' => $mod_father_name,
            'father_job' => $mod_father_job,
            'mother_name' => $mod_mother_name,
            'mother_job' => $mod_mother_job,
        ]);
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
        if($request->income == 1){
            $mod_business_name = ucwords(strtolower(trim($request->name_business)));
            $mod_type = ucwords(strtolower(trim($request->type)));
            $request->merge([
                'name_business' => $mod_business_name,
                'type' => $mod_type,
            ]);
            if(auth()->user()->activestudent->business == NULL){
                $business = new Business;
                $business->activestudent_id = auth()->user()->activestudent->id;
            }
            else{
                $business = Business::find(auth()->user()->activestudent->business->id);
            }
            $business->name = $request->name_business;
            $business->type = $request->type;
            $business->income = $request->income_business;
            $business->line = $request->line_business;
            $business->instagram = $request->instagram;
            $business->save();
        }
        else{
            if(auth()->user()->activestudent->business != NULL){
                $business = Business::find(auth()->user()->activestudent->business->id);
                $business->delete();
            }
        }
        $user->activestudent->update($request->all());
        return redirect()->route('student.index')->with('success','success');
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
        return redirect()->route('student.index')->with('updated','success');
    }

    public function addOrganization(Request $request){
        $organization = new Organization;
        $organization->activestudent_id = auth()->user()->activestudent->id;
        $organization->name = trim($request->name);
        $organization->position = ucwords(strtolower(trim($request->position)));
        $organization->period = $request->period;
        $organization->save();
        return redirect()->route('student.index')->with('success','success');
    }

    public function deleteOrganization(Organization $organization){
        $organization->delete();
        return redirect()->route('student.index')->with('deleted','success');
    }

    public function editOrganization(Request $request){
        $organization = Organization::find($request->organization_id);
        $organization->name = trim($request->name);
        $organization->position = ucwords(strtolower(trim($request->position)));
        $organization->period = $request->period;
        $organization->save();
        return redirect()->route('student.index')->with('success','success');
    }

    public function addCommittee(Request $request){
        $committee = new Committee;
        $committee->activestudent_id = auth()->user()->activestudent->id;
        $committee->name = trim($request->name);
        $committee->position = ucwords(strtolower(trim($request->position)));
        $committee->year = $request->year;
        $committee->save();
        return redirect()->route('student.index')->with('success','success');
    }

    public function deleteCommittee(Committee $committee){
        $committee->delete();
        return redirect()->route('student.index')->with('deleted','success');
    }

    public function editCommittee(Request $request){
        $committee = Committee::find($request->committee_id);
        $committee->name = trim($request->name);
        $committee->position = ucwords(strtolower(trim($request->position)));
        $committee->year = $request->year;
        $committee->save();
        return redirect()->route('student.index')->with('success','success');
    }

    public function addSeminar(Request $request){
        $seminar = new Seminar;
        $seminar->activestudent_id = auth()->user()->activestudent->id;
        $seminar->name = trim($request->name);
        $seminar->year = $request->year;
        $seminar->save();
        return redirect()->route('student.index')->with('success','success');
    }

    public function deleteSeminar(Seminar $seminar){
        $seminar->delete();
        return redirect()->route('student.index')->with('deleted','success');
    }

    public function editSeminar(Request $request){
        $seminar = Seminar::find($request->seminar_id);
        $seminar->name = trim($request->name);
        $seminar->year = $request->year;
        $seminar->save();
        return redirect()->route('student.index')->with('success','success');
    }

    public function addAchievment(Request $request){
        $achievment = new Achievment;
        $achievment->activestudent_id = auth()->user()->activestudent->id;
        $achievment->name = trim($request->name);
        $achievment->level = ucwords(strtolower(trim($request->level)));
        $achievment->year = $request->year;
        $achievment->save();
        return redirect()->route('student.index')->with('success','success');
    }

    public function deleteAchievment(Achievment $achievment){
        $achievment->delete();
        return redirect()->route('student.index')->with('deleted','success');
    }

    public function editAchievment(Request $request){
        $achievment = Achievment::find($request->achievment_id);
        $achievment->name = trim($request->name);
        $achievment->level = ucwords(strtolower(trim($request->level)));
        $achievment->year = $request->year;
        $achievment->save();
        return redirect()->route('student.index')->with('success','success');
    }
}
