<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ClassController extends Controller
{
   public function __construct(){
    $this->middleware('auth');
   } 

   function index(){
    $class=DB::table('classes')->get();
    return view('admin.class.index',compact('class'));
    
   }
   function create() {
      return view('admin.class.create');
      
   }
   function store(Request $request){
      $request->validate([
         'class_name' => 'required|unique:classes',
      ]);

      $data=array(
         'class_name' => $request->class_name,
      );

      DB::table('classes')->insert($data);
      return redirect()->back()->with('success','successfully inserted!');
     
      
   }
}
