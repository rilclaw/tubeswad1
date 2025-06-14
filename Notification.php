<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'user_id',
        'event_type',      // 'task', 'schedule', 'event'
        'event_id',
        'reminder_time',   // Waktu notifikasi dikirim
        'status',          // 'pending', 'sent', 'failed'
    ];

    /**
     * Relasi ke pengguna
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
