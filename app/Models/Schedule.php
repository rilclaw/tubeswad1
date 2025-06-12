<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';

    protected $fillable = [
        'user_id',
        'course_name',
        'day',
        'start_time',
        'end_time',
        'location',
    ];

    /**
     * Relasi ke model User (pemilik jadwal)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
