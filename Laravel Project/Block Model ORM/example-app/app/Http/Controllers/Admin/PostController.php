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
use File;

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

    public function index() {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function destroy($id) {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->back()->with('error', 'Post not found!');
        }

        $filePath = public_path($post->image);

        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        $post->delete();

        return redirect()->back()->with('success', 'Post deleted successfully!');
    }

   public function edit($id)
{
    $post = Post::find($id);
    $category = Category::all();
    return view('admin.post.edit', compact('post', 'category'));
}

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'subcategory_id' => 'required',
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);
    
        $post = Post::findOrFail($id);
        $post->subcategory_id = $request->subcategory_id;
        $post->category_id = Subcategory::find($request->subcategory_id)->category_id;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->post_date = $request->post_date;
        $post->tags = $request->tags;
        $post->description = $request->description;
        $post->status = $request->status ?? 0;
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $oldImagePath = public_path($post->image);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
            $image = $request->file('image');
            $imageName = $post->slug . '.' . $image->getClientOriginalExtension();
            $image->storeAs('media/', $imageName);
            $post->image = 'media/' . $imageName;
        }
    
        $post->save();
    
        return redirect()->route('post.index')->with('success', 'Post updated successfully!');
    } 
    
    
}
