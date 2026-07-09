<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bookings extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bookings';

    protected $fillable = [
        'booking_number',
        'user_id',
        'room_id',
        'purpose',
        'notes',
        'participant_count',
        'status',
        'approved_at',
        'cancelled_at',
        'expired_at',
    ];

    protected $casts = [
        'approved_at'  => 'datetime',
        'cancelled_at' => 'datetime',
        'expired_at'   => 'datetime',
    ];

    // ── Constants ─────────────────────────────────────────────

    const STATUS_PENDING   = 'pending';
    const STATUS_APPROVED  = 'approved';
    const STATUS_REJECTED  = 'rejected';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_EXPIRED   = 'expired';
    const STATUS_COMPLETED = 'completed';

    // ── Relasi ────────────────────────────────────────────────

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function room(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(rooms::class);
    }

    public function slots(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(booking_slots::class,'booking_id');
    }

    public function approvals(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(booking_approvals::class);
    }

    // ── Scope ─────────────────────────────────────────────────

    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', self::STATUS_APPROVED);
    }

    public function scopeActive($query)
    {
        return $query->whereIn('status', [self::STATUS_PENDING, self::STATUS_APPROVED]);
    }

    public function scopeByUser($query, int $userId)
    {
        return $query->where('user_id', $userId);
    }

    // ── Accessor / Helper ─────────────────────────────────────

    /**
     * Label status untuk ditampilkan di UI.
     */
    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            self::STATUS_PENDING   => 'Menunggu Persetujuan',
            self::STATUS_APPROVED  => 'Disetujui',
            self::STATUS_REJECTED  => 'Ditolak',
            self::STATUS_CANCELLED => 'Dibatalkan',
            self::STATUS_EXPIRED   => 'Kedaluwarsa',
            self::STATUS_COMPLETED => 'Selesai',
            default                => ucfirst($this->status),
        };
    }

    /**
     * Warna badge status untuk UI (Tailwind/Bootstrap class).
     */
    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            self::STATUS_PENDING   => 'warning',
            self::STATUS_APPROVED  => 'success',
            self::STATUS_REJECTED  => 'danger',
            self::STATUS_CANCELLED => 'secondary',
            self::STATUS_EXPIRED   => 'dark',
            self::STATUS_COMPLETED => 'info',
            default                => 'secondary',
        };
    }

    /**
     * Apakah booking masih bisa dibatalkan oleh user.
     * Hanya bisa cancel jika masih pending.
     */
    public function isCancellable(): bool
    {
        return $this->status === self::STATUS_PENDING;
    }
}
