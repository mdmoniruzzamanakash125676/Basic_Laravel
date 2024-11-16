<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Post;
use DB;
use Illuminate\Support\Str;
use Auth;
use Image;

class PostController extends Controller
{
   public function __construct()  {
    $this->middleware('auth');
   }

   public function create() {
    $category = Category::all();
    return view('admin.post.create', compact('category'));
   }

   public function store(Request $request) {
        $validated = $request->validate([
            'subcategory_id' => 'required',
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        $categoryid = DB::table('subcategories')->where('id', $request->subcategory_id)->first()->category_id;
        $data = array();
        $slug = Str::of($request->title)->slug('-');
        $data['category_id'] = $categoryid;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['title'] = $request->title;
        $data['slug'] = $slug;
        $data['post_date'] = $request->post_date;
        $data['tags'] = $request->tags;
        $data['description'] = $request->description;
        $data['status'] = $request->status;
        $data['user_id'] = Auth::id();

        // Handle Image Upload
        $photo = $request->image;
        if ($photo) {
            $photoname = $slug . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/media', $photoname);
            $data['image'] = 'media/' . $photoname;
        }

        DB::table('posts')->insert($data);

        return redirect()->back()->with('success', 'Post added successfully!');
    }

      //__index method__//
  function index(){
    $posts=Post::all();
    return view('admin.post.index',compact('posts'));
  }
}
