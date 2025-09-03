<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    // Student Login Function
    public function student_login(Request $request)
    {
        $email = $request->student_email;
        $password = md5($request->student_password);

       
        $result = DB::table('student_tb1')
            ->where('student_email', $email)
            ->where('student_password', $password)
            ->first();

        if ($result) {
           
            Session::put('student_id', $result->student_id);
            Session::put('student_name', $result->student_name);

            return view ('student.dashbord'); 
        } else {
            
            Session::put('exception', 'Email or Password Invalid');
            return Redirect::to('/');
        }
    }

  
    public function student_dashboard()
    {
        // Check if student is logged in
        $student_id = Session::get('student_id');

        if (!$student_id) {
            return Redirect::to('/'); 
        }

        return view('student.dashbord');
    }


 function studentprofile() {
        $student_id=Session::get('student_id');
        $student_description_view=DB::table('student_tb1')
                                ->select('*')         
                                ->where('student_id',$student_id)
                                ->first(); 
            /* echo "</pre>";
            print_r($student_description_view);
            echo "</pre>"; */ 

        $manage_student_view=view('student.studentview')
        ->with('student_description_profile',$student_description_view);
        return view('student_layout')
        ->with('studentview',$manage_student_view) ; 
    } 
//student settings 
    function studentsetting() {
        $student_id=Session::get('student_id');
        $student_description_view=DB::table('student_tb1')
                                ->select('*')         
                                ->where('student_id',$student_id)
                                ->first(); 
            /* echo "</pre>";
            print_r($student_description_view);
            echo "</pre>"; */ 

        $manage_student_view=view('student.studentsetting')
        ->with('student_description_profile',$student_description_view);
        return view('student_layout')
        ->with('studentsetting',$manage_student_view) ; 
        
        
    }
    function studentprofileupdate(Request $request) {
        $student_id=Session::get('student_id');
        $data = array();
       
     
        $data['student_phone'] = $request->student_phone;
        $data['student_address'] = $request->student_address;
        $data['student_password'] = md5($request->student_password);
        
    
        
        DB::table('student_tb1')
        ->where('student_id',$student_id)
        ->update($data);
    
        Session::put('exception', 'Student Profile Update successfully!');
        return Redirect::to('/student_setting');
    }


} 
    
    

