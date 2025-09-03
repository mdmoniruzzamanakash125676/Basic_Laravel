<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class MmeController extends Controller
{
    function mme() {
  
        $mmestudent_info=DB::table('student_tb1')->where(['student_department'=>6])->get();

        $manage_student=view('admin.mme')
                        ->with('mme_student_info',$mmestudent_info);
        return view('layout')
                    ->with('mme',$manage_student) ;
        
    }
    function mmedelete($student_id) {
        DB::table('student_tb1')
                ->where('student_id',$student_id)  
                ->delete();
        return Redirect::to('/mme');        

        
    }
    function studentview($student_id) {
        $student_description_view=DB::table('student_tb1')
                                ->select('*')         
                                ->where('student_id',$student_id)
                                ->first();
      /*   echo "</pre>";
        print_r($student_description_view);
        echo "</pre>"; */

        $manage_student_view=view('admin.mmeview')
                        ->with('student_description_profile',$student_description_view);
        return view('layout')
                    ->with('mmeview',$manage_student_view) ;      

        
    }
}
