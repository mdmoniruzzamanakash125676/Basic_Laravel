<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
   function MyName($firstname,$secondname,$thirdname){

    return "First Name:". $firstname . " <br> Middle Name:". $secondname . " <br>Last Name:". $thirdname ;

   }
}
