<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class CivilController extends Controller
{
    function civil() {
  
        $civilstudent_info=DB::table('student_tb1')->where(['student_department'=>4])->get();

        $manage_student=view('admin.civil')
                        ->with('civil_student_info',$civilstudent_info);
        return view('layout')
                    ->with('civil',$manage_student) ;
        
    
        
    }
    function civildelete($student_id) {
        DB::table('student_tb1')
                ->where('student_id',$student_id)  
                ->delete();
        return Redirect::to('/civil');        

        
    }
    function studentview($student_id) {
        $student_description_view=DB::table('student_tb1')
                                ->select('*')         
                                ->where('student_id',$student_id)
                                ->first();
      /*   echo "</pre>";
        print_r($student_description_view);
        echo "</pre>"; */

        $manage_student_view=view('admin.civilview')
                        ->with('student_description_profile',$student_description_view);
        return view('layout')
                    ->with('civilview',$manage_student_view) ;      

        
    }
}
