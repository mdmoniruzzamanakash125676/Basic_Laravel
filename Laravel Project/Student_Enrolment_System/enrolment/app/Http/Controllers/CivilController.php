<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CivilController extends Controller
{
    function civil() {
  
        $civilstudent_info=DB::table('student_tb1')->where(['student_department'=>4])->get();

        $manage_student=view('admin.civil')
                        ->with('civil_student_info',$civilstudent_info);
        return view('layout')
                    ->with('civil',$manage_student) ;
        
    
        
    }
}
