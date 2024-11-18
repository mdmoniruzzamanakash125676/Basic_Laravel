<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class CategoryController extends Controller
{
//__index method__//
  function index(){
    //__query builder
   // $category=DB::table('categories')->get();

    //__eleoquent__//
    $category=Category::all();
    return view('admin.category.index',compact('category'));
  }
 //__create method__//
  function create() {
   return view('admin.category.create');
    
  }
  //__store method__//
  function store(Request $request) {
    
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
            
        ]);
        /*  $category=new Category;
            $category->category_name=$request->category_name;
            $category->category_slug=Str::of($request->category_name)->slug('-');
            $category->save(); */

        Category::insert([
            'category_name'=>$request->category_name,
            'category_slug'=>Str::of($request->category_name)->slug('-'),
        ]);
        return redirect()->back()->with('success', 'Category added successfully!');
     
   
      }

    //__edit method__//

    function edit($id) {
        //$data=DB::table('categories')->where('id',$id)->first();
        $data=Category::find($id);
        return view('admin.category.edit',compact('data'));

        
    }
    function update(Request $request ,$id){
        $category=Category::find($id);
      /*   $category->update([
            'category_name'=>$request->category_name,
            'category_slug'=>Str::of($request->category_name)->slug('-'),
        ]); */

        $category->category_name=$request->category_name;
        $category->category_slug=Str::of($request->category_name)->slug('-');
        $category->save();
        return redirect()->route('category.index')->with('success', 'Category updated successfully!');

        
    }

    //__delete method__//

/*  function destroy($id){
   // DB::table('categories')->where('id',$id)->delete();

   $category=Category::find($id);
   $category->delete();
    return redirect()->back()->with('success', 'Category deleted successfully!');
    
 } */
 public function destroy($id){
  $category = Category::find($id);
  if ($category) {
      $category->delete();
      return redirect()->back()->with('success', 'Category deleted successfully!');
  } else {
      return redirect()->back()->with('error', 'Category not found!');
  }
}


}

