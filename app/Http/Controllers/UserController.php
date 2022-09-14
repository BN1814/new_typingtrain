<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Section;
use App\Models\HistoryScore;
use DB;
use Auth;

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
        return redirect('user/profile/'.$user->id.'/edit')->with('update', 'แก้ไขข้อมูลสำเร็จแล้ว');
    }
    function changePassword() {
        return view('dashboards.users.change_password_user');
    }
    function settings() {
        return view('dashboards.users.settings');
    }
    function enterclass() {
        return view('dashboards.users.enterclass');
    }
    function enterclass_std(Request $req){
        $req -> validate( [
            'entclass' => ['required', 'min:6'],
        ],[
            'entclass.required' => 'กรุณาใส่รหัสเข้าห้องเรียน',
            'entclass.min' => 'กรุณาใส่รหัสเข้าห้องเรียนมากกว่า 6 ตัว',
        ]);
        $section = Section::where('code_inclass', 'JfsiLe');

        $user_id = Auth::user()->id;
        $input = $entclass->entclass = $req->entclass;
        $input->insert([
        ]);

        if($input === $section) {
        }
    }

    function classroomAll() {
        $id = Auth::user()->id;
        $sections = Section::all();
        return view('classroom_all', compact('sections', 'id'));
    }
}
