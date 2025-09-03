<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function index() {
    if(Auth::id()){
        
        $usertype=Auth()->user()->usertype;
        
        if($usertype=='user'){
            $room= Room::all();
            return view('home.index',compact('room'));
        }
        else if($usertype=='admin'){
            return view('admin.index');
        }
        else{
            return redirect()->back();
        }

        

    }
   

    
   }
   function create_room() {
    return view('admin.create_room');
    
   }
   function add_room(Request $request) {
    $data = new Room();
    $data->room_title = $request->room_title;
    $data->description = $request->description;
    $data->price = $request->price;
    $data->room_type = $request->room_type;
    $data->wifi = $request->wifi;

    $image = $request->image; // Right side value comes in the form

    if ($image) {
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('room', $imagename);
        $data->image = $imagename;
    }

    $data->save();

    // Success Message
    session()->flash('success', 'Room added successfully!');

    return redirect()->back();
}
function view_room() {
    $data= Room::all();

    return view('admin.view_room',compact('data'));
    
}

function room_delete($id)  {
    $data=Room::find($id);
    $data->delete();
    session()->flash('success', 'Room Delete successfully!');
    return redirect()->back();
    
}
function room_edit($id)  {
    $data=Room::find($id);
    return view('admin.room_edit',compact('data'));
    
}
function update_room(Request $request,$id)  {
    $data=Room::find($id);

    $data->room_title = $request->room_title;
    $data->description = $request->description;
    $data->price = $request->price;
    $data->room_type = $request->room_type;
    $data->wifi = $request->wifi;
    $image = $request->image; // Right side value comes in the form

    if ($image) {
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('room', $imagename);
        $data->image = $imagename;
    }

    $data->save();

    session()->flash('success', 'Room Updated successfully!');
    return redirect()->back();
   
    
}

  
}
