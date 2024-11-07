<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


class HomeController extends Controller
{
    function Home(){
       return view('HomePage');
    }

    function About(){
        return view('AboutPage');
    }

    function Contact(){
        return view('ContactPage');  
      }

      function Country(){
        return view ('country');
      }


      public function store(Request $request)
      {

        $validated = $request->validate([
          'name' => 'required|max:55',
          'email' => 'required|max:80',
          'password' => 'required|min:6|max:12',
      ]);

      \Log::channel('contactstore')->info('the contact form submited by'.rand(1,20));
      return redirect()->back();
         
      }

      public function details($id){
       $id = Crypt::decryptString($id);
       echo $id;
      
      }




}
