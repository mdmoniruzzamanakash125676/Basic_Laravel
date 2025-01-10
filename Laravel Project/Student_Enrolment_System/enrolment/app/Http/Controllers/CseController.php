<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class CseController extends Controller
{
    function cse() {
  
        $csestudent_info=DB::table('student_tb1')->where(['student_department'=>1])->get();

        $manage_student=view('admin.cse')
                        ->with('cse_student_info',$csestudent_info);
        return view('layout')
                    ->with('cse',$manage_student) ;
        
    
        
    }
    function csedelete($student_id) {
        DB::table('student_tb1')
                ->where('student_id',$student_id)  
                ->delete();
        return Redirect::to('/cse');        

        
    }
}
