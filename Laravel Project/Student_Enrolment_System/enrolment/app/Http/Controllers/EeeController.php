<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class EeeController extends Controller
{
    function eee() {
  
        $eeestudent_info=DB::table('student_tb1')->where(['student_department'=>3])->get();

        $manage_student=view('admin.eee')
                        ->with('eee_student_info',$eeestudent_info);
        return view('layout')
                    ->with('eee',$manage_student) ;
        
    
        
    }

    function eeedelete($student_id) {
        DB::table('student_tb1')
                ->where('student_id',$student_id)  
                ->delete();
        return Redirect::to('/eee');        

        
    }
    function studentview($student_id) {
        $student_description_view=DB::table('student_tb1')
                                ->select('*')         
                                ->where('student_id',$student_id)
                                ->first();
      /*   echo "</pre>";
        print_r($student_description_view);
        echo "</pre>"; */

        $manage_student_view=view('admin.eeeview')
                        ->with('student_description_profile',$student_description_view);
        return view('layout')
                    ->with('eeeview',$manage_student_view) ;      

        
    }
}
