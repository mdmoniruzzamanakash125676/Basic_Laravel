<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AllstudentsController extends Controller
{
    function allstudent() {
  
        $allstudent_info=DB::table('student_tb1')->get();

        $manage_student=view('admin.allstudent')
                        ->with('all_student_info',$allstudent_info);
        return view('layout')
                    ->with('allstudent',$manage_student) ;               
        
    }
}
