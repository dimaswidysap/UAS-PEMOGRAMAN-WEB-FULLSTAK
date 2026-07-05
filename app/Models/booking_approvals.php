<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class booking_approvals extends Model
{
    use HasFactory;

    protected $table = 'booking_approvals';

    protected $fillable = [
        'booking_id',
        'acted_by',
        'action',
        'remarks',
        'acted_at',
    ];

    protected $casts = [
        'acted_at' => 'datetime',
    ];

    // ── Constants ─────────────────────────────────────────────

    const ACTION_SUBMITTED = 'submitted';
    const ACTION_APPROVED  = 'approved';
    const ACTION_REJECTED  = 'rejected';
    const ACTION_CANCELLED = 'cancelled';
    const ACTION_EXPIRED   = 'expired';
    const ACTION_COMPLETED = 'completed';

    // ── Relasi ────────────────────────────────────────────────

    public function booking(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(bookings::class);
    }

    /**
     * User yang melakukan aksi (admin atau peminjam).
     * Nama relasi "actor" lebih tepat daripada "user"
     * karena kolom FK-nya adalah "acted_by", bukan "user_id".
     */
    public function actor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'acted_by');
    }

    // ── Scope ─────────────────────────────────────────────────

    public function scopeByAction($query, string $action)
    {
        return $query->where('action', $action);
    }

    public function scopeLatest($query)
    {
        return $query->orderByDesc('acted_at');
    }

    // ── Accessor ──────────────────────────────────────────────

    public function getActionLabelAttribute(): string
    {
        return match($this->action) {
            self::ACTION_SUBMITTED => 'Pengajuan',
            self::ACTION_APPROVED  => 'Disetujui',
            self::ACTION_REJECTED  => 'Ditolak',
            self::ACTION_CANCELLED => 'Dibatalkan',
            self::ACTION_EXPIRED   => 'Kedaluwarsa',
            self::ACTION_COMPLETED => 'Selesai',
            default                => ucfirst($this->action),
        };
    }
}
