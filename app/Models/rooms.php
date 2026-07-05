<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rooms extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rooms';

    protected $fillable = [
        'name',
        'code',
        'category_id',
        'building',
        'floor',
        'capacity',
        'description',
        'image',
        'is_active',
        'open_time',
        'close_time',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'capacity'   => 'integer',
        'open_time'  => 'datetime:H:i',
        'close_time' => 'datetime:H:i',
    ];

    // ── Relasi ────────────────────────────────────────────────

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(room_categories::class,'category_id');
    }

    public function facilities(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(roomfacilities::class,'room_id');
    }

    public function bookings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(bookings::class);
    }

    public function unavailabilities(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(room_unavailabilities::class,'room_id');
    }

    // ── Scope ─────────────────────────────────────────────────

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByCategory($query, int $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    // ── Accessor ──────────────────────────────────────────────

    public function getImageUrlAttribute(): string
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : asset('images/room-placeholder.jpg');
    }

    /**
     * Cek apakah ruangan tersedia pada tanggal & jam tertentu.
     * Dipakai di view detail untuk informasi ketersediaan awal.
     * Validasi sesungguhnya tetap di BookingService dengan lockForUpdate.
     */
    public function isAvailableAt(string $date, string $startTime, string $endTime): bool
    {
        $bookedConflict = booking_slots::active()
            ->overlapping($this->id, $date, $startTime, $endTime)
            ->exists();

        if ($bookedConflict) return false;

        $blockedConflict = $this->unavailabilities()
            ->where('date', $date)
            ->where(function ($q) use ($startTime, $endTime) {
                $q->whereNull('start_time')
                  ->orWhere(function ($q) use ($startTime, $endTime) {
                      $q->where('start_time', '<', $endTime)
                        ->where('end_time', '>', $startTime);
                  });
            })
            ->exists();

        return !$blockedConflict;
    }
}
