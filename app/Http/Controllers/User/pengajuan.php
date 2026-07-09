<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookings;

class Pengajuan extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $bookings = Bookings::where('user_id', $user->id)->get();


        // dd($bookings);

        return view('user.pengajuan.index', compact('bookings'));
    }
}
