<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    // Exercise English
    public function HomeExEN01() {
        return view('Exercise/ExEnglish.hExEn01');
    }
    public function HomeExEN02() {
        return view('Exercise/ExEnglish.hExEn02');
    }
    public function HomeExEN03() {
        return view('Exercise/ExEnglish.hExEn03');
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

    // Exercise Thai
    public function HomeExTh01() {
        return view('Exercise/ExThai.hExTh01');
    }
    public function HomeExTh02() {
        return view('Exercise/ExThai.hExTh02');
    }
    public function HomeExTh03() {
        return view('Exercise/ExThai.hExTh03');
    }
    public function EX_TEST02() {
        return view('Exercise/ExThai.test02');
    }
}
