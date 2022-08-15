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
        $users = User::all()->sortBy('asc');
        return view('dashboards.teachers.dataSTD', compact('users'));
    }
    public function Classroom() {
        $deadlines = Deadline::all();
        $users = User::all();
        return view('dashboards.teachers.classroom', compact('deadlines', 'users'));
    }
    function editData() {
        // $user = User::find($id);
        return view('dashboards\teachers.editData');
    }

    public function createCode(Request $request) {
        $request->validate([
            'section_id' => 'required | max:10',
            'section_name' => 'required | max:255',
            'code_inclass' => 'required | unique:deadlines',
            'deadline_date' => 'required',
            'deadline_time' => 'required'
        ]);
        $deadline = new Deadline();
        $deadline->section_id = $request->section_id;
        $deadline->section_name = $request->section_name;
        $deadline->code_inclass = $request->code_inclass;
        $deadline->deadline_date = $request->deadline_date;
        $deadline->deadline_time = $request->deadline_time;
        // $deadline->user_id = $request->user_id;
        $save = $deadline->save();

        if($save) {
            return redirect()->back()->with('success', 'สร้างห้องเรียนสำเร็จ');
        }
        return redirect()->back()->with('error', 'มีรหัสนี้อยู่แล้ว');
    }
    function update(Request $request, $id) {

    }
}
