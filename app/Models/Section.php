<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Middleware\isTeacherMiddleware;
use App\Http\Middleware\isUserMiddleware;
use App\Models\User;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_sub',
        'section_name',
        'code_inclass',
        'deadline_date',
        'deadline_time',
        'teacher_id',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function student_users() {
        $student = User::where('role', ['student']);
        if($student) {
            return $this->belongsToMany(User::class, 'section_users', 'section_id', 'user_id');
        }
    }
    // public function teacher_users() {
    //     $teacher = User::where('role', ['teacher']);
    //     if($teacher) {
    //         return $this->belongsTo(User::class);
    //     }
    // }
}
