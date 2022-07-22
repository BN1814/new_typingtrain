<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'time',
        'mistake',
        'wpm',
        'cpm',
        'score'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
