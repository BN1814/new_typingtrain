<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_sub',
        'section_name',
        'code_inclass',
        'deadline_date',
        'deadline_time',
        'user_id',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
