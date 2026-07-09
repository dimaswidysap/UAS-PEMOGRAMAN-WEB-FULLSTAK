<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class room_unavailabilities extends Model
{
    use HasFactory;

    protected $table = 'room_unavailabilities';

    protected $fillable = [
        'room_id',
        'created_by',
        'date',
        'start_time',
        'end_time',
        'reason',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    // ── Relasi ────────────────────────────────────────────────

    public function room(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(rooms::class);
    }

    public function creator(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by')
                    ->withDefault(['name' => 'Admin Dihapus']);
    }

    // ── Scope ─────────────────────────────────────────────────

    public function scopeUpcoming($query)
    {
        return $query->where('date', '>=', today());
    }

    public function scopeOnDate($query, string $date)
    {
        return $query->where('date', $date);
    }

    /**
     * Blokir seharian penuh — start_time & end_time NULL.
     */
    public function scopeFullDay($query)
    {
        return $query->whereNull('start_time')->whereNull('end_time');
    }

    /**
     * Cek overlap dengan rentang waktu tertentu.
     * Sama persis dengan logika di BookingSlot::scopeOverlapping
     * agar konsisten saat dipakai di BookingService.
     */
    public function scopeOverlapping($query, string $date, string $startTime, string $endTime)
    {
        return $query
            ->where('date', $date)
            ->where(function ($q) use ($startTime, $endTime) {
                $q->whereNull('start_time') // blokir seharian
                  ->orWhere(function ($q) use ($startTime, $endTime) {
                      $q->where('start_time', '<', $endTime)
                        ->where('end_time', '>', $startTime);
                  });
            });
    }

    // ── Accessor ──────────────────────────────────────────────

    /**
     * Apakah blokir ini berlaku seharian penuh.
     */
    public function getIsFullDayAttribute(): bool
    {
        return is_null($this->start_time) && is_null($this->end_time);
    }

    public function getTimeRangeAttribute(): string
    {
        if ($this->is_full_day) {
            return 'Seharian Penuh';
        }

        return $this->start_time . ' - ' . $this->end_time;
    }
}
