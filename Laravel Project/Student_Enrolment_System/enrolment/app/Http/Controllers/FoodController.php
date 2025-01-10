<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class FoodController extends Controller
{
    function food() {
  
        $foodstudent_info=DB::table('student_tb1')->where(['student_department'=>5])->get();

        $manage_student=view('admin.food')
                        ->with('food_student_info',$foodstudent_info);
        return view('layout')
                    ->with('food',$manage_student) ;
        
    
        
    }
    function fooddelete($student_id) {
        DB::table('student_tb1')
                ->where('student_id',$student_id)  
                ->delete();
        return Redirect::to('/food');        

        
    }
}
