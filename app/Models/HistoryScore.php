<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Middleware\isUserMiddleware;

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
        return $this->belongsTo(User::class);
    }
    public function exercise() {
        return $this->belongsTo(Exercise::class);
    }
}
