<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bookings;
use App\Models\booking_approvals;
class BookingController extends Controller
{
    //
    public function index()
    {
        $bookings = bookings::with(['user', 'room.category', 'slots'])
            ->where('status', 'pending')
            ->orderBy('created_at', 'asc') // yang paling lama menunggu tampil duluan
            ->paginate(15);

        return view('admin.dashboard.index', compact('bookings'));

    }

     public function approve(bookings $booking)
    {
        abort_if($booking->status !== 'pending', 422, 'Booking ini sudah diproses.');

        $booking->update([
            'status'      => 'approved',
            'approved_at' => now(),
        ]);

        booking_approvals::create([
            'booking_id' => $booking->id,
            'acted_by'   => auth()->id(),
            'action'     => 'approved',
            'remarks'    => null,
            'acted_at'   => now(),
        ]);

        return back()->with('success', 'Booking berhasil disetujui.');
    }
    public function reject(Request $request, bookings $booking)
    {
        abort_if($booking->status !== 'pending', 422, 'Booking ini sudah diproses.');

        $request->validate([
            'remarks' => ['required', 'string', 'max:255'],
        ]);

        $booking->update(['status' => 'rejected']);

        booking_approvals::create([
            'booking_id' => $booking->id,
            'acted_by'   => auth()->id(),
            'action'     => 'rejected',
            'remarks'    => $request->remarks,
            'acted_at'   => now(),
        ]);

        return back()->with('success', 'Booking berhasil ditolak.');
    }
}
