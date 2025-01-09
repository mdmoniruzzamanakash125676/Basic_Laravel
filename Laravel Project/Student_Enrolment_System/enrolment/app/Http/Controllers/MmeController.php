<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MmeController extends Controller
{
    function mme() {
  
        $mmestudent_info=DB::table('student_tb1')->where(['student_department'=>6])->get();

        $manage_student=view('admin.mme')
                        ->with('mme_student_info',$mmestudent_info);
        return view('layout')
                    ->with('mme',$manage_student) ;
        
    
        
    }
}
