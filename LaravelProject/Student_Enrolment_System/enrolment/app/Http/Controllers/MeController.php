<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class MeController extends Controller
{
    function me() {
  
        $mestudent_info=DB::table('student_tb1')->where(['student_department'=>2])->get();

        $manage_student=view('admin.me')
                        ->with('me_student_info',$mestudent_info);
        return view('layout')
                    ->with('me',$manage_student) ;
        
    
        
    }
    function medelete($student_id) {
        DB::table('student_tb1')
                ->where('student_id',$student_id)  
                ->delete();
        return Redirect::to('/me');        

        
    }
    function studentview($student_id) {
        $student_description_view=DB::table('student_tb1')
                                ->select('*')         
                                ->where('student_id',$student_id)
                                ->first();
      /*   echo "</pre>";
        print_r($student_description_view);
        echo "</pre>"; */

        $manage_student_view=view('admin.meview')
                        ->with('student_description_profile',$student_description_view);
        return view('layout')
                    ->with('meview',$manage_student_view) ;      

        
    }
}
