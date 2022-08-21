<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Std_Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'section_id'
    ];

    public function std_section() {
        if(auth::user()->role == 'student') {
            return $this->belongsToMany('App\Models\User');
        }
        if(auth::user()->role == 'teacher') {
            return $this->belongsToMany('App\Models\User');
        }
    }
}
