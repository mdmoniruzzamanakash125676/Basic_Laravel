<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

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
            Session::put('exception','Email or Password Invalid');
           return Redirect::to('/backend');
        }


       
      

        //return view('admin.dashboard');
        
    }

function admin_dashboard() {
  
    return view('admin.dashboard');
    
}

  //__logout method__//
    function logout() {
        return Redirect::to('/backend');
        
    }


    function viewprofile() {
  
        return view('admin.view');
        
    }

    
    function setting() {
  
        return view('admin.setting');
        
    }
    
}
