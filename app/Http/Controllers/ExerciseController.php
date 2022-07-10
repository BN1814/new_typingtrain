<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function HomeExEN() {
        return view('Exercise/ExEnglish.hExEn');
    }
    public function EX_FJ() {
        return view('Exercise/ExEnglish.ex_FJ');
    }
    public function EX_DK() {
        return view('Exercise/ExEnglish.ex_DK');
    }
    public function EX_SL() {
        return view('Exercise/ExEnglish.ex_SL');
    }
    public function HomeExTh() {
        return view('Exercise/ExThai.hExTh');
    }
    public function EX_TEST02() {
        return view('Exercise/ExThai.test02');
    }
}
