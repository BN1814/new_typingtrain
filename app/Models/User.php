<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';
    protected $fillable = [
        'userid',
        'name',
        'lname',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function historys() {
        return $this->hasMany(HistoryScore::class);
    }

    public function student_sections() {
        $student = User::where('role', ['student'])->first();
        if($student){
            return $this->belongsToMany(Section::class, 'section_users');
            // return $this->belongsToMany(Section::class, 'section_users', 'section_id', 'user_id');
        }
    }
    public function teacher_sections() {
        $teacher = User::where('role', ['teacher']);
        if($teacher){
            return $this->hasMany(Section::class);
        }
    }
    public function student_max_scores() {
        return $this->belongsToMany(Section::class, 'score_maxes');
    }
}
