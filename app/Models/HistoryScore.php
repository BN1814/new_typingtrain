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

    public function user() {
        if(auth::user()->role == 'student') {
            return $this->belongsToMany(User::class);
        }
    }

    public function exercise() {
        if(auth::user()->role == 'student') {
            return $this->hasOne('App\Models\Exercise');
        }
    }
}
