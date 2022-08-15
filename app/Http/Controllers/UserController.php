<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\HistoryScore;

class UserController extends Controller
{
    function index() {
        return view('dashboards.users.index');
    }
    function profile() {
        $historys = HistoryScore::all();
        return view('dashboards.users.profile', compact('historys'));
    }
    function settings() {
        return view('dashboards.users.settings');
    }
    function enterclass() {
        return view('dashboards.users.enterclass');
    }
}
