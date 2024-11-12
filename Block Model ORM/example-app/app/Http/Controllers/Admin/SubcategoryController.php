<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use DB;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{


    //__index method__//
  function index(){
    //__query builder
    $data=DB::table('subcategories')->leftjoin('categories','subcategories.category_id','categories.id')->select('categories.category_name','subcategories.*')->get();
   

    //__eleoquent__//
   // $subcategory=Subcategory::all();
    return view('admin.subcategory.index',compact('data'));
  }
 
    public function create() {
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }
    

    public function store(Request $request) {
        $validated = $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:subcategories|max:255',
        ]);

        $subcategory = new Subcategory;
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();

        return redirect()->back()->with('success', 'SubCategory added successfully!');
    }

    public function destroy($id){
        $subcategory = Subcategory::find($id);
        if ($subcategory) {
            $subcategory->delete();
            return redirect()->back()->with('success', 'SubCategory deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'SubCategory not found!');
        }
      }

     
    public function edit($id) {
        //$data=DB::table('categories')->where('id',$id)->first();
        $categories = Category::all();
        $data = Subcategory::find($id);
        return view('admin.subcategory.edit', compact('categories', 'data'));
    }

    function update(Request $request ,$id){
        $subcategory=Subcategory::find($id);
      /*   $category->update([
            'category_name'=>$request->category_name,
            'category_slug'=>Str::of($request->category_name)->slug('-'),
        ]); */

        $subcategory->category_id=$request->category_id;
        $subcategory->subcategory_name=$request->subcategory_name;
        $subcategory->subcategory_slug=Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();
        return redirect()->route('subcategory.index')->with('success', 'SubCategory updated successfully!');

        
    }

}
