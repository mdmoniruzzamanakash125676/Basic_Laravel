<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class StudentController extends Controller
{
    function student_login(Request $request){                    
       
        $email=$request->student_email;
        $password=md5($request->student_password);

        $result=DB::table('student_tb1')
        ->where('student_email',$email)
        ->where('student_password',$password)
        ->get();

        /* echo "</pre>";
        print_r ($result); */

        if ($result){
            return view('student.dashbord'); 
        }
        else{
            Session::put('exception','Email or Password Invalid');
           return Redirect::to('/');
        }
    }
    function student_dashboard() {
  
        return view('student.dashbord');
        
    }
    
    
}
