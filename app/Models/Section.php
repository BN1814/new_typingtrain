<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Middleware\isTeacherMiddleware;
use App\Http\Middleware\isUserMiddleware;
use App\Models\User;
use App\Models\HistoryScore;

// use Kyslik\ColumnSortable\Sortable; 
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
        $student = User::where('role', ['student'])->first();
        if($student) {
            return $this->belongsToMany(User::class, 'section_users');
            // return $this->belongsToMany(User::class, 'section_users', 'user_id', 'section_id');
        }
    }
    public function teacher_users() {
        $teacher = User::where('role', ['teacher']);
        if($teacher) {
            return $this->belongsTo(User::class);
        }
    }
    public function histories() {
        return $this->hasMany(HistoryScore::class);
        // $history = HistoryScore::where();
        // if($teacher) {
        // }
    }
    public function section_max_scores() {
        return $this->belongsToMany(User::class, 'history_max_scores');
    }
    // use Sortable;
    // public $sortable = ['section_sub','section_name','deadline_date' ,'deadline_time'];
}
