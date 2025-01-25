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
    //student delete method here
    function studentdelete($student_id) {
       
        DB::table('student_tb1')
                ->where('student_id',$student_id)  
                ->delete();
        return Redirect::to('/allstudent');        

        
    }
    //student view method here
    function studentview($student_id) {
        
        $student_description_view=DB::table('student_tb1')
                                ->select('*')         
                                ->where('student_id',$student_id)
                                ->first();
      /*   echo "</pre>";
        print_r($student_description_view);
        echo "</pre>"; */

        $manage_student_view=view('admin.studentview')
                        ->with('student_description_profile',$student_description_view);
        return view('layout')
                    ->with('studentview',$manage_student_view) ;      

        
    }

    //student edit method here
    function studentedit($student_id) {
        $student_description_view=DB::table('student_tb1')
                                ->select('*')         
                                ->where('student_id',$student_id)
                                ->first();
   /*      echo "</pre>";
        print_r($student_description_view);
        echo "</pre>"; */

       $manage_student_view=view('admin.studentedit')
                        ->with('student_description_profile',$student_description_view);
        return view('layout')
                    ->with('studentedit',$manage_student_view) ;      

        
    }
    //student update mathod here

    function studentupdate(Request $request,$student_id) {
        $data = array();
        $data['student_name'] = $request->student_name;
        $data['student_roll'] = $request->student_roll;
        $data['student_mothersname'] = $request->student_mothersname;
        $data['student_fathersname'] = $request->student_fathersname;
        $data['student_email'] = $request->student_email;
        $data['student_phone'] = $request->student_phone;
        $data['student_address'] = $request->student_address;
        $data['student_password'] = md5($request->student_password);
        $data['student_admissionyear'] = $request->student_admissionyear;
        
    
        
        DB::table('student_tb1')->where('student_id',$student_id)->update($data);
    
        Session::put('exception', 'Student Update successfully!');
        return Redirect::to('/allstudent');
       

        
    }

}
