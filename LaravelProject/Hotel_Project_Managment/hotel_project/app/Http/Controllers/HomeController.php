<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()  {
        $room= Room::all();
        return view ('home.index',compact('room'));
        
    }
    public function room_details($id)  {
        $room= Room::find($id);
        return view ('home.room_details',compact('room'));
        
    }
}
