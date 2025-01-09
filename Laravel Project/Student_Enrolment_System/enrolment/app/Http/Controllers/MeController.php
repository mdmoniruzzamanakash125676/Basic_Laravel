<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MeController extends Controller
{
    function me() {
  
        $mestudent_info=DB::table('student_tb1')->where(['student_department'=>2])->get();

        $manage_student=view('admin.me')
                        ->with('me_student_info',$mestudent_info);
        return view('layout')
                    ->with('me',$manage_student) ;
        
    
        
    }
}
