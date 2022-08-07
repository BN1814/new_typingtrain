<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'section_name',
        'code_inclass',
        'deadline_date',
        'deadline_time',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
}
