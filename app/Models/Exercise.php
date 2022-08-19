<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'level', 'level_name', 'data_level'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function history_score() {
        return $this->belongsTo(History::class, 'history_id', 'id');
    }
}
