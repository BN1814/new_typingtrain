<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index() {
        return view('dashboards.admins.index');
    }
    function profile() {
        return view('dashboards.admins.profile');
    }
    function settings() {
        return view('dashboards.admins.settings');
    }

    function addDataTeacher() {
        return view('dashboards.admins.add_data_teacher');
    }
    function addDataStudent() {
        return view('dashboards.admins.add_data_student');
    }
    function addDataExercise() {
        return view('dashboards.admins.add_data_exercise');
    }
}
