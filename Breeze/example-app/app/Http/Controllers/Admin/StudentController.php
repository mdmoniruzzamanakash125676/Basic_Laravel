<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$students=DB::table('students')->orderBy('roll','ASC')->get();
       $students=DB::table('students')->join('classes','students.class_id','classes.id')->get();
       //dd($students);
      return view('admin.students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $classes=DB::table('classes')->get();
        return view('admin.students.create',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'roll' => 'required',
         ]);
   
         $data=array(
            'class_id' => $request->class_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'roll' => $request->roll,
         );
   
         DB::table('students')->insert($data);
         return redirect()->back()->with('success','successfully inserted!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $students=DB::table('students')->where('id',$id)->first();
      
      return view('admin.students.view',compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classes=DB::table('classes')->get();
        $students=DB::table('students')->where('id',$id)->first();
        return view('admin.students.edit',compact('classes','students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'class_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'roll' => 'required',
         ]);
         $data=array(
            'class_id' => $request->class_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'roll' => $request->roll,
         );
         DB::table('students')->where('id',$id)->update($data);
         return redirect()->route('students.index')->with('success','successfully updated!');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('students')->where('id',$id)->delete();
        return redirect()->back()->with('success','successfully deleted!');
    }
}
