<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Middleware\isTeacherMiddleware;
use App\Http\Middleware\isUserMiddleware;

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

    public function users() {
        // For Student
        return $this->belongsToMany(User::class);
        // For Teacher
        // return $this->hasMany(User::class);
    }

}
