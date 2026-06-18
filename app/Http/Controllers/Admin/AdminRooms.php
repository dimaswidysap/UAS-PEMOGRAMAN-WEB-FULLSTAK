<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\rooms;
use Illuminate\Http\Request;

class AdminRooms extends Controller
{
    //
     public function index(){

     $rooms= rooms::all();

    // dd($rooms);

    return view('admin.rooms.index',compact('rooms'));
    }
}
