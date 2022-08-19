<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Section;
use DB;


class TeacherController extends Controller
{
    function index() {
        $sections = Section::all();
        $users = User::all();
        return view('dashboards.teachers.index', compact('sections', 'users'));
    }
    function profile() {
        $sections = Section::get();
        $users = User::get();
        return view('dashboards.teachers.profile', compact('sections', 'users'));
    }
    function settings() {
        return view('dashboards.teachers.settings');
    }
    public function dataStudent() {
        $users = User::all()->sortBy('asc');
        return view('dashboards.teachers.dataSTD', compact('users'));
    }
    public function Classroom() {
        $sections = Section::all();
        $users = User::all();
        return view('dashboards.teachers.classroom', compact('sections', 'users'));
    }
    function editData() {
        // $user = User::find($id);
        return view('dashboards\teachers.editData');
    }

    public function createCode(Request $request) {
        $request->validate([
            'section_sub' => 'required | max:10',
            'section_name' => 'required | max:255',
            'code_inclass' => 'required | unique:sections',
            'deadline_date' => 'required',
            'deadline_time' => 'required',
        ]);

        $user_id = auth::user()->id;
        $section = new Section();
        $section_sub = $section->section_sub = $request->section_sub;
        $section_name = $section->section_name = $request->section_name;
        $code = $section->code_inclass = $request->code_inclass;
        $date = $section->deadline_date = $request->deadline_date;
        $time = $section->deadline_time = $request->deadline_time;
        $section->user_id = $user_id;
        $save = $section->save();

        if($save) {
            return redirect()->back()->with('success', 'สร้างห้องเรียนสำเร็จ');
        }
        else if($section_sub === null) {
            return redirect()->back()->with('error', 'กรุณาใส่รหัสวิชา');
        }
        else if($section_name === null) {
            return redirect()->back()->with('error', 'กรุณาใส่ชื่อวิชา');
        }
        else if($code === null) {
            return redirect()->back()->with('error', 'กรุณาใส่รหัสเข้าห้องเรียน');
        }
        else if($date === null) {
            return redirect()->back()->with('error', 'กรุณาใส่วันที่ส่ง');
        }
        else if($time === null) {
            return redirect()->back()->with('error', 'กรุณาใส่เวลาที่ส่ง');
        }
    }
    function update(Request $request, $id) {

    }
}
