<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Models\bookings;
use App\Models\booking_approvals;
use App\Models\booking_slots;
use App\Models\rooms;
use Illuminate\Support\Facades\DB;

class ProsesBookingController extends Controller
{
    //
   public function index(rooms $room)
    {
        abort_if(!$room->is_active, 403, 'Ruangan tidak tersedia.');

        $room->load(['category', 'facilities']);

        $bookedSlots = booking_slots::active()
            ->whereHas('booking', fn($q) => $q->where('room_id', $room->id))
            ->where('date', '>=', today())
            ->get(['date', 'start_time', 'end_time']);

        $unavailableDates = $room->unavailabilities()
            ->upcoming()
            ->get(['date', 'start_time', 'end_time', 'reason']);

        return view('user.proses-booking.index', compact(
            'room',
            'bookedSlots',
            'unavailableDates'
        ));
    }

    public function store(StoreBookingRequest $request, rooms $room)
    {
        abort_if(!$room->is_active, 403, 'Ruangan tidak tersedia.');

        try {
            $this->processBooking(auth()->user(), $room, $request->validated());
        } catch (\Exception $e) {
            return back()->withInput()->with('error', $e->getMessage());
        }

        return redirect()
            ->route('index-user')
            ->with('success', 'Booking berhasil diajukan, menunggu persetujuan admin.');
    }

    // ── Private ───────────────────────────────────────────────

    private function processBooking($user, rooms $room, array $data): bookings
    {
        return DB::transaction(function () use ($user, $room, $data) {

            // 1. Cek double booking — LOCK dulu sebelum cek
            $conflict = booking_slots::whereHas('booking', fn($q) =>
                    $q->where('room_id', $room->id)
                      ->whereIn('status', ['pending', 'approved'])
                )
                ->where('date', $data['date'])
                ->where('start_time', '<', $data['end_time'])
                ->where('end_time', '>', $data['start_time'])
                ->lockForUpdate()
                ->exists();

            if ($conflict) {
                throw new \Exception('Slot waktu sudah terpakai, silakan pilih waktu lain.');
            }

            // 2. Cek blokir admin
            $blocked = $room->unavailabilities()
                ->overlapping($data['date'], $data['start_time'], $data['end_time'])
                ->exists();

            if ($blocked) {
                throw new \Exception('Ruangan tidak tersedia pada waktu yang dipilih.');
            }

            // 3. Tentukan status awal
            $requiresApproval = $room->category->requires_approval;

            // 4. Simpan booking
            $booking = bookings::create([
                'booking_number'    => $this->generateBookingNumber(),
                'user_id'           => $user->id,
                'room_id'           => $room->id,
                'purpose'           => $data['purpose'],
                'notes'             => $data['notes'] ?? null,
                'participant_count' => $data['participant_count'],
                'status'            => $requiresApproval ? 'pending' : 'approved',
                'approved_at'       => $requiresApproval ? null : now(),
                'expired_at'        => now()->addHours(24),
            ]);

            // 5. Simpan slot waktu
            booking_slots::create([
                'booking_id' => $booking->id,
                'date'       => $data['date'],
                'start_time' => $data['start_time'],
                'end_time'   => $data['end_time'],
            ]);

            // 6. Audit trail
            booking_approvals::create([
                'booking_id' => $booking->id,
                'acted_by'   => $user->id,
                'action'     => booking_approvals::ACTION_SUBMITTED,
                'remarks'    => null,
                'acted_at'   => now(),
            ]);

            return $booking;
        });
    }

    private function generateBookingNumber(): string
    {
        $prefix = 'BK-' . now()->format('Y') . '-';
        $last   = bookings::where('booking_number', 'like', $prefix . '%')
                         ->orderByDesc('id')
                         ->value('booking_number');

        $lastNumber = $last ? (int) substr($last, -4) : 0;

        return $prefix . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
    }
}
