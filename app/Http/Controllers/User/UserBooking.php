<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\rooms;
use Illuminate\Http\Request;

class UserBooking extends Controller
{
    //
    public function index(){

    $rooms=rooms::with('category')->get();

        return view('user.booking.index' ,compact('rooms'));
    }

    public function bookingDetail($id){
        $room=rooms::findOrFail($id);

        return view('user.booking.view',compact('room'));
    }
}
