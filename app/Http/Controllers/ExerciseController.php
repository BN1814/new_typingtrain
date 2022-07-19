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
    // Exercise English homerow
    public function EX_FJ() {
        return view('Exercise/ExEnglish/HomerowEn.ex_FJ');
    }
    public function EX_DK() {
        return view('Exercise/ExEnglish/HomerowEn.ex_DK');
    }
    public function EX_SL() {
        return view('Exercise/ExEnglish/HomerowEN.ex_SL');
    }
    public function EX_a() {
        return view('Exercise/ExEnglish/HomerowEN.ex_a');
    }
    public function EX_GH() {
        return view('Exercise/ExEnglish/HomerowEN.ex_GH');
    }
    // Exercise English toprow
    public function EX_RU() {
        return view('Exercise/ExEnglish/ToprowEN.ex_RU');
    }
    public function EX_EI() {
        return view('Exercise/ExEnglish/ToprowEN.ex_EI');
    }
    public function EX_WO() {
        return view('Exercise/ExEnglish/ToprowEN.ex_WO');
    }
    public function EX_QY() {
        return view('Exercise/ExEnglish/ToprowEN.ex_QY');
    }
    public function EX_TP() {
        return view('Exercise/ExEnglish/ToprowEN.ex_TP');
    }
    // Exercise English bottomrow
    public function EX_VM() {
        return view('Exercise/ExEnglish/BottomrowEN.ex_VM');
    }
    public function EX_C() {
        return view('Exercise/ExEnglish/BottomrowEN.ex_C');
    }
    public function EX_X() {
        return view('Exercise/ExEnglish/BottomrowEN.ex_X');
    }
    public function EX_Z() {
        return view('Exercise/ExEnglish/BottomrowEN.ex_Z');
    }
    public function EX_BN() {
        return view('Exercise/ExEnglish/BottomrowEN.ex_BN');
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
    // Exercise Thai homerow
    public function EX_TH01() {
        return view('Exercise/ExThai/HomerowTH.ex_TH01');
    }
    public function EX_TH02() {
        return view('Exercise/ExThai/HomerowTH.ex_TH02');
    }
    public function EX_TH03() {
        return view('Exercise/ExThai/HomerowTH.ex_TH03');
    }
    public function EX_TH04() {
        return view('Exercise/ExThai/HomerowTH.ex_TH04');
    }
    public function EX_TH05() {
        return view('Exercise/ExThai/HomerowTH.ex_TH05');
    }
    public function EX_TH06() {
        return view('Exercise/ExThai/HomerowTH.ex_TH06');
    }
    // Exercise Thai toprow
    public function TEST02() {
        return view('Exercise/ExThai.TEST02');
    }
    // Exercise Thai bottomrow
    
}
