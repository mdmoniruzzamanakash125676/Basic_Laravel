<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    function allteacher() {
  
        return view('admin.allteacher');
        
    }
}
