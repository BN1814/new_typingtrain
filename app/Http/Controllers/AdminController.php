<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Deadline;
use App\Models\User;
use DB;

class AdminController extends Controller
{
    function index() {
        $deadlines = Deadline::all();
        $users = User::all();
        return view('dashboards.admins.index', compact('deadlines', 'users'));
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
