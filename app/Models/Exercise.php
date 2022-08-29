<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use isUser;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'level', 'level_name', 'data_level'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function history() {
        return $this->hasOne(HistoryScore::class);
    }
}
