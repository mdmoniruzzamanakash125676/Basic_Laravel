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
}
