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
    function profile(User $user) {
        return view('dashboards.teachers.profile', compact('user'));
    }
    function updateProfile(User $user, Request $request) {
        $user->update([
            'userid' => $request['userid'],
            'name' => $request['name'],
            'lname' => $request['lname'],
            'email' => $request['email'],
        ]);
        return redirect('teacher/profile/'.$user->id.'/edit')->with('message', 'แก้ไขข้อมูลสำเร็จแล้ว');
    }
    function changePassword() {
        return view('dashboards.teachers.change_password_teacher');
    }
    function settings() {
        return view('dashboards.teachers.settings');
    }
    public function dataStudent() {
        $users = User::where('role', ['student'])->get();
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

    // Section CRUD
    public function createCode(Request $request) {
        $request->validate([
            'section_sub' => 'required | max:10',
            'section_name' => 'required | max:255',
            'code_inclass' => 'required | unique:sections',
            'deadline_date' => 'required',
            'deadline_time' => 'required',
        ],[
            'section_sub.required' => 'กรุณาใส่รหัสวิชา',
            'section_name.required' => 'กรุณาใส่ชื่อวิชา',
            'code_inclass.required' => 'กรุณาใส่รหัสเข้าห้องเรียน',
            'deadline_date.required' => 'กรุณาใส่วันที่ส่ง',
            'deadline_time.required' => 'กรุณาใส่เวลาที่ส่ง',
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
            return redirect()->back()->with('message', 'สร้างห้องเรียนสำเร็จ');
        }   
    }
    function editSection(Section $section) {
        return view('dashboards.teachers.edit_section', compact('section'));
    }
    function updateSection(Section $section, Request $req) {
        $section->update([
            'section_sub' => $req['section_sub'],
            'section_name' => $req['section_name'],
            'code_inclass' => $req['code_inclass'],
            'deadline_date' => $req['deadline_date'],
            'deadline_time' => $req['deadline_time'],
        ]);
        return redirect()->route('teacher.classroom')->with('message', 'แก้ไขข้อมูลห้องเรียนสำเร็จแล้ว');
    }
    function destroySection(Section $section) {
        $section->delete();
        return redirect()->route('teacher.classroom')->with('delete', 'ลบข้อมูลห้องเรียนสำเร็จแล้ว');
    }
}
