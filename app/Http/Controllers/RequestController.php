<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Generation;
use App\Models\Studentrequest;
use App\Models\Alumnirequest;

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
}
