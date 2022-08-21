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

    public function user() {
        if(auth::user()->role == "student") {
            return $this->belongsToMany('App\Models\User')
                        ->and($this->hasMany('App\Models\Std_Section'));
        }
        if(auth::user()->role == "teacher") {
            return $this->belongsTo('App\Models\User')
                        ->and($this->hasMany('App\Models\Std_Section'));
        }
    }
}
