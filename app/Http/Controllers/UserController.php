<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\HistoryScore;
use DB;

class UserController extends Controller
{
    function index() {
        return view('dashboards.users.index');
    }
    function profile(User $user) {
        return view('dashboards.users.profile', compact('user'));
    }
    function updateProfile(User $user, Request $request) {
        $user->update([
            'userid' => $request['userid'],
            'name' => $request['name'],
            'lname' => $request['lname'],
            'email' => $request['email'],
        ]);
        return redirect('user/profile/'.$user->id.'/edit')->with('message', 'แก้ไขข้อมูลสำเร็จแล้ว');
    }
    function settings() {
        return view('dashboards.users.settings');
    }
    function enterclass() {
        return view('dashboards.users.enterclass');
    }
}
