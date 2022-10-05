<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Section;
use App\Models\HistoryScore;
use Session;
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
        // Session::flash('data_user', 'success');
        return redirect('teacher/profile/'.$user->id.'/edit')->with('update', 'แก้ไขข้อมูลสำเร็จแล้ว');
    }
    function changePassword() {
        return view('dashboards.teachers.change_password_teacher');
    }
    function settings() {
        return view('dashboards.teachers.settings');
    }
    
    // CRUD DATA STUDENT
    function viewDataStudent($id, User $user) {
        $section = Section::findOrFail($id);
        $historys = HistoryScore::where('user_id', $user->id)
                                ->join('exercises', 'history_scores.id', '=', 'exercises.id')
                                ->get();
        return view('dashboards.teachers.student.view_dataSTD', compact('user', 'section', 'historys', 'id'));
    }
    public function dataStudent(Request $req, Section $section) {
        // $id = Auth::user()->id;
//         $search = $req['search'] ?? "";
//         if($search != "") {
//             $users = DB::table('sections')
//                 ->join('section_users', 'section_users.section_id', '=', 'sections.id')
//                 ->join('users', 'section_users.user_id', '=', 'users.id')
//                 ->orWhere('name', 'LIKE', '%'. $search .'%')
//                 ->where('sections.id', $section->id)
//                 ->orWhere('lname', 'LIKE', '%'. $search .'%')
//                 ->where('sections.id', $section->id)
//                 ->orWhere('email', 'LIKE', '%'. $search .'%')
//                 ->where('sections.id', $section->id)
//                 ->orWhere('userid', 'LIKE', '%'. $search .'%')
//                 ->where('sections.id', $section->id)
//                 ->orderBy('section_users.user_id', 'asc')
//                 ->get();
//                 // dd($users);
// }
//         else{
            $users = DB::table('sections')
                        ->join('section_users', 'section_users.section_id', '=', 'sections.id')
                        ->join('users', 'section_users.user_id', '=', 'users.id')
                        ->where('sections.id', $section->id)
                        ->orderBy('section_users.user_id', 'asc')
                        ->get();
        // }
        // dd($users);
        return view('dashboards.teachers.student.dataSTD', compact('users', 'section'));
    }
    function editDataStudent($id, User $user) {
        $section = Section::findOrFail($id);
        return view('dashboards.teachers.student.edit_data_student', compact('user', 'section'));
    }
    function updateDataStudent(Section $section, User $user, Request $req) {
        $user->update([
            'userid' => $req['userid'],
            'name' => $req['name'],
            'lname' => $req['lname'],
            'email' => $req['email'],
        ]);
        return redirect('teacher/dataSTD/'. $section->id)->with('update', 'แก้ไขข้อมูลนักศึกษาสำเร็จแล้ว');
    }
    function destroyDataStudent($id){
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['delete' => 'ลบข้อมูลสำเร็จแล้ว']);
    }

    // CLASSROOM
    public function Classroom(Request $req, Section $section , $order = null) {
        $id = Auth::user()->id;
        // $search = $req['search'] ?? "";
        // if($search != "") {
        //     $sections = Section::where('section_sub', 'LIKE', '%'. $search. '%')
        //                     ->where('user_id',$id)
        //                     ->orWhere('section_name', 'LIKE', '%'. $search . '%')
        //                     ->where('user_id',$id)
        //                     ->orWhere('deadline_date', '=' , '%' . $search . '%')
        //                     ->where('user_id',$id)
        //                     ->orWhereTime('deadline_time', '=', $search)
        //                     ->where('user_id',$id)
        //                     ->get();
        // }

        // else {
            $sections = Section::where('user_id',$id)->get();
        // }
        $users = User::all();
        $data = compact('users', 'sections', 'id', 'section');
        return view('dashboards.teachers.classroom')->with($data);
    } 
    // Section CRUD
    public function createCode(Request $request) {
        $request->validate([
            'section_sub' => 'required | max:10',
            'section_name' => 'required | max:255',
            'code_inclass' => 'required | string | min:6 | unique:sections',
            'deadline_date' => 'required',
            'deadline_time' => 'required',
        ],[
            'section_sub.required' => 'กรุณาใส่รหัสวิชา',
            'section_sub.max' => 'ใส่รหัสวิชาได้ไม่เกิน 10 ตัว',
            'section_name.required' => 'กรุณาใส่ชื่อวิชา',
            'code_inclass.required' => 'กรุณาใส่รหัสเข้าห้องเรียน',
            'code_inclass.min' => 'ใส่รหัสเข้าห้องเรียนอย่างน้อย 6 ตัว',
            'deadline_date.required' => 'กรุณาใส่วันที่ส่ง',
            'deadline_time.required' => 'กรุณาใส่เวลาที่ส่ง',
        ]);

        $user_id = auth::user()->id;
        $section = new Section();
        $section->section_sub = $request->section_sub;
        $section->section_name = $request->section_name;
        $section->code_inclass = $request->code_inclass;
        $section->deadline_date = $request->deadline_date;
        $section->deadline_time = $request->deadline_time;
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
        return redirect('teacher/classroom')->with('update', 'แก้ไขข้อมูลห้องเรียนสำเร็จแล้ว');
    }
    function destroySection($id) {
        $section = Section::findOrFail($id);
        $section->delete();
        return response()->json(['delete' => 'ลบข้อมูลสำเร็จแล้ว']);
    }
}
