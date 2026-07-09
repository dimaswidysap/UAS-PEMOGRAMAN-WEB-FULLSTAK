<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\bookings;

class booking_slots extends Model
{
    use HasFactory;

    protected $table = 'booking_slots'; // eksplisit, aman

    protected $fillable = [
        'booking_id',
        'date',
        'start_time',
        'end_time',
    ];

    protected $casts = [
        'date'       => 'date',
        'start_time' => 'datetime:H:i',
        'end_time'   => 'datetime:H:i',
    ];

    // ── Relasi ───────────────────────────────────────────────

    /**
     * Slot ini milik satu booking.
     */
    public function booking(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(bookings::class);
    }

    // ── Scope ────────────────────────────────────────────────

    /**
     * Slot yang aktif (booking statusnya pending atau approved).
     * Dipakai untuk cek ketersediaan / double booking.
     */
    public function scopeActive($query)
    {
        return $query->whereHas('booking', fn($q) =>
            $q->whereIn('status', ['pending', 'approved'])
        );
    }

    /**
     * Slot yang overlap dengan rentang waktu tertentu.
     * Dipakai di BookingService sebelum insert booking baru.
     *
     * Contoh penggunaan:
     * BookingSlot::active()->overlapping($roomId, $date, $start, $end)->exists()
     */
    public function scopeOverlapping($query, int $roomId, string $date, string $startTime, string $endTime)
    {
        return $query
            ->whereHas('booking', fn($q) =>
                $q->where('room_id', $roomId)
            )
            ->where('date', $date)
            ->where('start_time', '<', $endTime)
            ->where('end_time', '>', $startTime);
    }

    /**
     * Slot mulai dari hari ini ke depan.
     */
    public function scopeUpcoming($query)
    {
        return $query->where('date', '>=', today());
    }
}
