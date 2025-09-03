<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class AddstudentsController extends Controller
{
    function addstudent() {
     return view('admin.addstudent'); 
    
     }
     public function savestudent(Request $request) {
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
        $data['student_department'] = $request->student_department;
    
        // Handle Image Upload
        $image = $request->file('student_image');
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('media/'), $imageName);
            $data['student_image'] = 'media/' . $imageName;
        }
    
        DB::table('student_tb1')->insert($data);
    
        Session::put('exception', 'Student added successfully!');
        return Redirect::to('/addstudent');
    }
    
}
