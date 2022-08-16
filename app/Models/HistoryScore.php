<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'level',
        'time',
        'mistake',
        'wpm',
        'cpm',
        'exercise_id',
        'user_id',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
