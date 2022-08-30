<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Section;
use App\Models\User;
use App\Models\HistoryScore;
use App\Models\Exercise;
use DB;
use Hash;

class AdminController extends Controller
{
    function index(Request $request) {
        $search = $request['search'] ?? "";
        if($search != "") {
            $users = User::where('userid', 'LIKE', "%$search%")
            ->orWhere('name', 'LIKE', "%$search%")
            ->orWhere('email', 'LIKE', "%$search%")->get();
            $sections = Section::where('section_name', 'LIKE', "%$search%")
            ->orWhere('section_sub', 'LIKE', "%$search%")->get();
            $exercises = Exercise::where('level_name', 'LIKE', "%$search%")
            ->orWhere('data_level', 'LIKE', "%$search%")->get();
        }
        else {
            $exercises = Exercise::paginate(5);
            $sections = Section::all();
            $users = User::paginate(5);
        }
        $data = compact('sections', 'users', 'exercises', 'search');
        return view('dashboards.admins.index')->with($data);
    }
    function profile(User $user) {
        return view('dashboards.admins.profile', compact('user'));
    }
    function updateProfile(User $user, Request $request) {
        $user->update([
            'userid' => $request['userid'],
            'name' => $request['name'],
            'lname' => $request['lname'],
            'email' => $request['email'],
        ]);
        return redirect('admin/profile/'.$user->id.'/edit')->with('message', 'แก้ไขข้อมูลสำเร็จแล้ว');
    }
    function settings() {
        return view('dashboards.admins.settings');
    }
    function search() {
    }
    // CRUD Teacher
        function createTeachStd() {
            return view('dashboards.admins.teacher.add_data_teacher_student');
        }
        function storeTeachStd(Request $request) {
            $request->validate([
                'userid' => ['required', 'string', 'max:20'],
                'name' => ['required', 'string', 'max:20'],
                'lname' => ['required', 'string', 'max:20'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6 | max:20'],
            ],[
                'userid.required' => 'กรุณาใส่รหัสนักศึกษาหรือรหัสผู้ใช้งาน',
                'name.required' => 'กรุณาใส่ชื่อผู้ใช้งาน',
                'lname.required' => 'กรุณาใส่นามสกุลผู้ใช้งาน',
                'email.required' => 'กรุณาใส่อีเมลผู้ใช้งาน',
                'password.required' => 'กรุณาใส่รหัสผ่าน',
            ]);
            $user = User::create([
                'userid' => $request['userid'],
                'name' => $request['name'],
                'lname' => $request['lname'],
                'email' => $request['email'],
                'role' => $request['status'],
                'password' => Hash::make($request['password']),
            ]);
            return redirect('admin/dashboard')->with('message', 'เพิ่มข้อมูลอาจารย์หรือนักศึกษาสำเร็จแล้ว');
        }
        function editTeachStd(User $user) {
            // $users = User::findOrFail($id);
            return view('dashboards.admins.teacher.edit_data_teacher_student', compact('user'));
        }
        function updateTeachStd(User $user, Request $request) {
            $user->update([
                'userid' => $request['userid'],
                'name' => $request['name'],
                'lname' => $request['lname'],
                'email' => $request['email'],
                'role' => $request['status'],
                'password' => $request['password'],
            ]);
            return redirect('admin/dashboard')->with('message', 'แก้ไขข้อมูลอาจารย์หรือนักศึกษาสำเร็จแล้ว');
        }
        public function destroyTeachStd(User $user) {
            $user->delete();
            return redirect('admin/dashboard')->with('message', 'ลบข้อมูลสำเร็จแล้ว');
        }

    // CRUD Exercise
    function homeExercise() {
        return view('dashboards.admins.student.home_exercise');
    }
    function storeExercise(Request $request) {
        $request->validate([
            'level' => ['required', 'string', 'max:20'],
            'level_name' => ['required', 'string', 'max:20'],
            'data_level' => ['required', 'string'],
        ],[
            'level.required' => 'กรุณาใส่ระดับ',
            'level_name.required' => 'กรุณาใส่ชื่อแบบฝึกหัด',
            'data_level.required' => 'กรุณาใส่ข้อมูลแบบฝึกหัด',
        ]);
        $exercise = Exercise::create([
            'level' => $request['level'],
            'level_name' => $request['level_name'],
            'data_level' => $request['data_level'],
        ]);
        return redirect('admin/dashboard')->with('message', 'เพิ่มข้อมูลแบบฝึกหัดสำเร็จแล้ว');
    }
    
    function editExercise(Exercise $exercise) {
        return view('dashboards.admins.student.edit_data_exercise', compact('exercise'));
    }

    function updateExercise(Exercise $exercise, Request $request) {
        $exercise->update([
            'level' => $request['level'],
            'level_name' => $request['level_name'],
            'data_level' => $request['data_level'],
        ]);
        return redirect('admin/dashboard')->with('message', 'แก้ไขแบบฝึกหัดสำเร็จแล้ว');
    }

    function destroyExercise(Exercise $exercise) {
        $exercise->delete();
            return redirect('admin/dashboard')->with('message', 'ลบแบบฝึกหัดสำเร็จแล้ว');
    }
}
