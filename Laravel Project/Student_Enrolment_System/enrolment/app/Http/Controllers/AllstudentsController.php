<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;

use Session;
session_start();

class AllstudentsController extends Controller
{
    function allstudent() {
  
        $allstudent_info=DB::table('student_tb1')->get();

        $manage_student=view('admin.allstudent')
                        ->with('all_student_info',$allstudent_info);
        return view('layout')
                    ->with('allstudent',$manage_student) ;               
        
    }
    function studentdelete($student_id) {
        DB::table('student_tb1')
                ->where('student_id',$student_id)  
                ->delete();
        return Redirect::to('/allstudent');        

        
    }
}
