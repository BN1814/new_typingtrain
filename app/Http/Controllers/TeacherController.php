<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Deadline;
use App\Models\User;
use DB;


class TeacherController extends Controller
{
    function index() {
        $deadlines = Deadline::all();
        $users = User::all();
        return view('dashboards.teachers.index', compact('deadlines', 'users'));
    }
    function profile() {
        return view('dashboards.teachers.profile');
    }
    function settings() {
        return view('dashboards.teachers.settings');
    }
    public function dataStudent() {
        return view('dashboards.teachers.dataSTD');
    }
    public function Classroom() {
        return view('dashboards.teachers.classroom');
    }

    public function createCode(Request $request) {
        $request->validate([
            'code_inclass' => 'required | unique:deadlines',
            'deadline_date' => 'required',
            'deadline_time' => 'required'
        ]);
        $deadline = new Deadline();
        $deadline->code_inclass = $request->code_inclass;
        $deadline->deadline_date = $request->deadline_date;
        $deadline->deadline_time = $request->deadline_time;
        $deadline->user_id = $request->user_id;
        $save = $deadline->save();

        if($save) {
            return redirect()->back()->with('success', 'สร้างห้องเรียนสำเร็จ');
        }
        return redirect()->back()->with('error', 'มีรหัสนี้อยู่แล้ว');
    }
}
