<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reminder_time',
        'email_notification',
        'web_notification',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

