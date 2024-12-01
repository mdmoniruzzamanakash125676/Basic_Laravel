<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class AdminController extends Controller
{
    function login_dashboard(Request $request){
       
        $email=$request->admin_email;
        $password=md5($request->admin_password);

        $result=DB::table('admin_tb1')
        ->where('admin_email',$email)
        ->where('admin_password',$password)
        ->first();

        if ($result){
            return view('admin.dashboard'); 
        }
        else{
           return Redirect::to('/backend');
        }
       
      

        //return view('admin.dashboard');
        
    }
}
