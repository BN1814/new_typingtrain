<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\HistoryScore;
use DB;

class UserController extends Controller
{
    function index() {
        $users = DB::table('users')
                    ->join('sections', 'users.id', '=', 'sections.id')
                    ->join('history_scores', 'users.id', '=', 'history_scores.id')
                    ->get();
        return view('dashboards.users.index', compact('users'));
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
