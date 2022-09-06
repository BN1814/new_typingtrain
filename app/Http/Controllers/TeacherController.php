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
    // CRUD DATA STUDENT
    function viewDataStudent(User $user) {
        return view('dashboards.teachers.student.view_dataSTD', compact('user'));
    }
    public function dataStudent(Request $req) {
        $search = $req['search'] ?? "";
        if($search != "") {
            $user = User::where('userid', 'LIKE', '%'. $search .'%')
                    ->orWhere('name', 'LIKE', '%'. $search .'%')
                    ->orWhere('lname', 'LIKE', '%'. $search .'%')
                    ->orWhere('email', 'LIKE', '%'. $search .'%')
                    ->get();
        }
        else{
            $user = User::where('role', ['student'])->get();
        }
        return view('dashboards.teachers.student.dataSTD', compact('user'));
    }
    function editDataStudent(User $user) {
        return view('dashboards.teachers.student.edit_data_student', compact('user'));
    }
    function updateDataStudent(User $user, Request $req) {
        $user->update([
            'userid' => $req['userid'],
            'name' => $req['name'],
            'lname' => $req['lname'],
            'email' => $req['email'],
        ]);

        return redirect('teacher/dataSTD')->with('message', 'แก้ไขข้อมูลนักศึกษาสำเร็จแล้ว');
    }
    function destroyDataStudent(User $user){
        $user->delete();
        return redirect('teacher/dataSTD')->with('delete', 'ลบข้อมูลนักศึกษาสำเร็จแล้ว');
    }

    // CLASSROOM
    public function Classroom(Request $req) {
        $search = $req['search'] ?? "";
        if($search != "") {
            $sections = Section::where('section_sub', 'LIKE', '%'. $search. '%')
                            ->orWhere('section_name', 'LIKE', '%'. $search . '%')
                            ->orWhere('deadline_date', '='. '%' .$search . '%')
                            ->orWhere('deadline_time', '='. '%' .$search . '%')
                            ->get();
        }
        else {
            $sections = Section::all();
        }
        $users = User::all();
        $data = compact('users', 'sections');
        return view('dashboards.teachers.classroom')->with($data);
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
            'deadline_date' => $req['deadline_date']->format('Y-m-d'),
            'deadline_time' => $req['deadline_time'],
        ]);
        return redirect('teacher/classroom')->with('message', 'แก้ไขข้อมูลห้องเรียนสำเร็จแล้ว');
    }
    function destroySection(Section $section) {
        $section->delete();
        return redirect()->route('teacher.classroom')->with('delete', 'ลบข้อมูลห้องเรียนสำเร็จแล้ว');
    }
}
