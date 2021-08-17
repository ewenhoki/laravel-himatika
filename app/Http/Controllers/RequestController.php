<?php

namespace App\Http\Controllers;

use App\Models\Activestudent;
use Illuminate\Http\Request;
use App\Models\Generation;
use App\Models\Studentrequest;
use App\Models\Alumnirequest;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class RequestController extends Controller
{
    public function studentRequest(){
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
        return view('dashboards.request.student', compact(['generation']));
    }

    public function addStudentRequest(Request $request){
        if($request->reason == NULL){
            return redirect()->route('student.request')->with('reason','required');
        }
        if($request->generation_id == NULL){
            return redirect()->route('student.request')->with('gen','required');
        }
        $request->merge([
            'user_id' => auth()->user()->id,
            'npm' => 1,
            'name'=> 1,
        ]);
        Studentrequest::create($request->all());
        return redirect()->route('student.request')->with('sent','success');
    }

    public function alumniRequest(){
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
        return view('dashboards.request.alumni', compact(['generation']));
    }

    public function addAlumniRequest(Request $request){
        if($request->reason == NULL){
            return redirect()->route('alumni.request')->with('reason','required');
        }
        if($request->generation_id == NULL){
            return redirect()->route('alumni.request')->with('gen','required');
        }
        $request->merge([
            'user_id' => auth()->user()->id,
            'npm' => 1,
            'name'=> 1,
        ]);
        Alumnirequest::create($request->all());
        return redirect()->route('alumni.request')->with('sent','success');
    }

    public function studentDetail(Studentrequest $studentrequest){
        if($studentrequest->confirm != 1 || $studentrequest->user->id != auth()->user()->id){
            return redirect()->route('student.request')->with('denied','fail');
        }
        $count = 0;
        foreach($studentrequest->getAttributes() as $key => $value){
            if($key != 'id' && $key != 'user_id' && $key != 'generation_id' && $key != 'reason' && $key != 'confirm'){
                if($value == 1){
                    $count++;
                }
            }
        }
        $student = $studentrequest->generation->activestudents()->get();
        return view('dashboards.request.student-detail', compact(['student','count','studentrequest']));
    }

    public function alumniDetail(Alumnirequest $alumnirequest){
        if($alumnirequest->confirm != 1 || $alumnirequest->user->id != auth()->user()->id){
            return redirect()->route('alumni.request')->with('denied','fail');
        }
        $count = 0;
        foreach($alumnirequest->getAttributes() as $key => $value){
            if($key != 'id' && $key != 'user_id' && $key != 'generation_id' && $key != 'reason' && $key != 'confirm'){
                if($value == 1){
                    $count++;
                }
            }
        }
        $alumni = $alumnirequest->generation->inactivestudents()->get();
        return view('dashboards.request.alumni-detail', compact(['alumni','count','alumnirequest']));
    }
}
