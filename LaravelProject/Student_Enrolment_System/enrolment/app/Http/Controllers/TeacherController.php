<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class TeacherController extends Controller
{
    function allteacher() {
  
        $allteacher_info=DB::table('teachers_tb1')->get();

        $manage_teacher=view('admin.allteacher')
                        ->with('all_teacher_info',$allteacher_info);
        return view('layout')
                    ->with('allteacher',$manage_teacher) ;
        
    }
    function addteacher() {
  
        return view('admin.addteacher');
        
    }
    public function saveteacher(Request $request) {
        $data = array();
        $data['teachers_name'] = $request->teachers_name;
        $data['teachers_email'] = $request->teachers_email;
        $data['teachers_phone'] = $request->teachers_phone;
        $data['teachers_address'] = $request->teachers_address;
        $data['teachers_department'] = $request->teachers_department;
    
        // Handle Image Upload
        $image = $request->file('teachers_image');
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('media/'), $imageName);
            $data['teachers_image'] = 'media/' . $imageName;
        }
    
        DB::table('teachers_tb1')->insert($data);
    
        Session::put('exception', 'Teachers added successfully!');
        return Redirect::to('/addteacher');
    }
}
