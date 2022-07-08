<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    function index() {
        return view('dashboards.teachers.index');
    }
    function profile() {
        return view('dashboards.teachers.profile');
    }
    function settings() {
        return view('dashboards.teachers.settings');
    }
}
