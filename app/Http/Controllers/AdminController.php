<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use App\Models\Section;
use App\Models\User;
use App\Models\HistoryScore;
use App\Models\Exercise;
use DB;
use Hash;
use App\Imports\UsersImport;
use App\Imports\ExercisesImport;
use App\Exports\UserTemplateExport;
use App\Exports\ExerciseTemplateExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    function index(Request $request) {
        $users = DB::table('users')->get();
        $data = compact('users');
        return view('dashboards.admins.index')->with($data);
    }
    function exercise_all() {
        $exercises = DB::table('exercises')->get();
        $data = compact('exercises');
        return view('dashboards.admins.exercise_all')->with($data);
    }
    function section_all() {
        $sections = User::join('sections', 'sections.user_id' , '=', 'users.id')->get();
        $data = compact('sections');
        return view('dashboards.admins.section_all')->with($data);
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
        return redirect('admin/profile/'.$user->id.'/edit')->with('update', 'แก้ไขข้อมูลสำเร็จแล้ว');
    }
    function changePassword(User $user) {
        return view('dashboards.admins.change_password_admin', compact('user'));
    }
    // CRUD TEACHER AND STUDENT
        // function view_dataTeachSTD(User $user) {
        //     return view('dashboards.admins.view_data_teacher_student', compact('user'));
        // }
        function createTeachStd() {
            return view('dashboards.admins.teacher.add_data_teacher_student');
        }
        function storeTeachStd(Request $request) {
            $request->validate([
                'userid' => ['required', 'string', 'max:20'],
                'name' => ['required', 'string', 'max:20'],
                'lname' => ['required', 'string', 'max:20'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'status' => ['required'],
                'password' => ['required', 'string', 'min:8 | max:20'],
            ],[
                'userid.required' => 'กรุณาใส่รหัสนักศึกษาหรือรหัสผู้ใช้งาน',
                'name.required' => 'กรุณาใส่ชื่อผู้ใช้งาน',
                'lname.required' => 'กรุณาใส่นามสกุลผู้ใช้งาน',
                'email.required' => 'กรุณาใส่อีเมลผู้ใช้งาน',
                'status.required' => 'กรุณาใส่สถานะผู้ใช้งาน',
                'email.unique' => 'มีอีเมลนี้อยู่ในระบบแล้ว',
                'password.required' => 'กรุณาใส่รหัสผ่าน',
                'password.min' => 'กรุณาใส่รหัสผ่านมากกว่า 8 ตัว',
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
            ]);
            return redirect('admin/dashboard')->with('update', 'แก้ไขข้อมูลอาจารย์หรือนักศึกษาสำเร็จแล้ว');
        }
        function destroyTeachStd($id) {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json(['delete' => 'ลบข้อมูลสำเร็จแล้ว']);
        }
        // IMPORT FILE STUDENT AND TEACHER
        function addUserFile() {
            $users = DB::table('users')->orderBy('id', 'DESC')->get();
            return view('dashboards.admins.teacher.add_data_teacher_student_file', compact('users')); 
        }
        function importUser(Request $request) {
            $this->validate($request, [
                'import-user' => 'required|mimes:xls,xlsx,csv',
            ],[
                'import-user.required' => 'กรุณาเลือกไฟล์',
                'import-user.mimes' => 'กรุณาเลือกไฟล์นามสกุล .xls, .xlsx หรือ .csv เท่านั้น',
            ]);
            try {
                Excel::import(new UsersImport, $request->file('import-user'));
                return redirect()->back()->with('import-success', 'เพิ่มข้อมูลสำเร็จ');
            } 
            catch(\Maatwebsite\Excel\Validators\ValidationException $e) {
                $failures = $e->failures();
                // dd($failures);
                return redirect()->back()->with('import-fail', $failures);
            }
        }
        function templateUser() {
            return Excel::download(new UserTemplateExport(), 'Template-Add-User.xlsx');
        }
        function templateExercise() {
            return Excel::download(new ExerciseTemplateExport(), 'Template-Exercise.xlsx');
        }

    // CRUD EXERCISE
    function homeExercise() {
        $data_exercises = DB::table('exercises')->orderBy('created_at', 'DESC')->get();
        return view('dashboards.admins.student.home_exercise', compact('data_exercises'));
    }
    function storeExercise(Request $request) {
        $request->validate([
            'level' => ['required', 'string', 'max:20'],
            'level_name' => ['required', 'string', 'max:20'],
            'data_level' => ['required', 'string'],
        ],[
            'level.required' => 'กรุณาใส่ระดับแบบทดสอบ',
            'level_name.required' => 'กรุณาใส่ชื่อแบบทดสอบ',
            'data_level.required' => 'กรุณาใส่ข้อมูลแบบทดสอบ',
        ]);
        $exercise = Exercise::create([
            'level' => $request['level'],
            'level_name' => $request['level_name'],
            'data_level' => $request['data_level'],
        ]);
        return redirect('admin/exercise_all')->with('message', 'เพิ่มข้อมูลแบบทดสอบสำเร็จแล้ว');
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
        return redirect('admin/exercise_all')->with('update', 'แก้ไขแบบทดสอบสำเร็จแล้ว');
    }

    function destroyExercise($id) {
        $exercise = Exercise::findOrFail($id);
        $exercise->delete();
        return response()->json(['delete' => 'ลบข้อมูลสำเร็จแล้ว']);
    }
    // IMPORT FILE EXERCISE
    function addExerciseFile() {
        $exercises = DB::table('exercises')->orderBy('id', 'DESC')->get();
        return view('dashboards.admins.exercises.import_exercise', compact('exercises')); 
    }
    function importExercise(Request $req) {
        $this->validate($req, [
            'import-ex' => 'required|mimes:xls,xlsx,csv',
        ],[
            'import-ex.required' => 'กรุณาเลือกไฟล์',
            'import-ex.mimes' => 'กรุณาเลือกไฟล์นามสกุล .xls, .xlsx หรือ .csv เท่านั้น',
        ]);
        try {
            Excel::import(new ExercisesImport, $req->file('import-ex'));
            return redirect()->back()->with('import-success', 'เพิ่มข้อมูลสำเร็จ');
        } 
        catch(\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            // dd($failures);
            return redirect()->back()->with('import-fail', $failures);
        }
    }

    // CRUD Section
    function editSection($id) {
        $section = Section::findOrFail($id);
        return view('dashboards.admins.teacher.edit_section', compact('section'));
    }
    function updateSection(Section $section, Request $req){
        $section->update([
            'section_sub' => $req['section_sub'],
            'section_name' => $req['section_name'],
            'code_inclass' => $req['code_inclass'],
            'deadline_date' => $req['deadline_date'],
            'deadline_time' => $req['deadline_time'],
        ]);

        return redirect('admin/section_all')->with('update', 'แก้ไขห้องเรียนสำเร็จแล้ว');
    }
    function destroySection($id) {
        $section = Section::findOrFail($id);
        $section->delete();
        return response()->json(['delete' => 'ลบข้อมูลสำเร็จแล้ว']); 
    }
    
}

// Search By LIKE
// $searchuser = $request['searchuser'] ?? "";
        // $searchexercise = $request['searchexercise'] ?? "";
        // $searchclassroom = $request['searchclassroom'] ?? "";
        // if($searchuser != "") {
        //     $users = User::where('userid', 'LIKE', '%'. $searchuser. '%')
        //                 ->orWhere('name', 'LIKE', '%'. $searchuser. '%')
        //                 ->orWhere('email', 'LIKE', '%'. $searchuser. '%')
        //                 ->orWhere('role', 'LIKE', '%'. $searchuser. '%')
        //                 ->get();
            // $exercises = Exercise::where('level_name', 'LIKE', '%'. $search. '%')
            //             ->orWhere('data_level', 'LIKE', '%'. $search. '%')
            //             ->get();
            // $sections = Section::where('section_sub', 'LIKE', '%'. $search. '%')
            //             ->orWhere('section_name', 'LIKE', '%'. $search. '%')
            //             ->get();
        // }
        // else {
            // $users = User::all();
        // }
        // if($searchexercise != "") {
        //     $exercises = Exercise::where('level_name', 'LIKE', '%'. $searchexercise. '%')
        //                 ->orWhere('data_level', 'LIKE', '%'. $searchexercise. '%')
        //                 ->orWhere('level', 'LIKE', '%'. $searchexercise. '%')
        //                 ->get();
        // }
        // else {
        //     $exercises = Exercise::all();
        // }
        // if($searchclassroom != "") {
        //     $sections = Section::where('section_sub', 'LIKE', '%'. $searchclassroom. '%')
        //                 ->orWhere('section_name', 'LIKE', '%'. $searchclassroom. '%')
        //                 ->get();
        // }
        // else {            
        //     $sections = Section::all();
        // }