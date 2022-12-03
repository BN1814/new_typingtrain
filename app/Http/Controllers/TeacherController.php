<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\EmailOtp;
use App\Models\User;
use App\Models\Section;
use App\Models\HistoryScore;
use App\Models\Exercise;
use Session;
use DB;
use Carbon\Carbon;
use Hash;
use Mail;
use App\Mail\SendOtp;

class TeacherController extends Controller
{
    function __construct() {
        $this->middleware('auth');
    }
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
    function confirmOtp() {
        if(auth()->user()->otp->count() <= 0) {
            return redirect()->route('teacher.dashboard');
        }
        return view('dashboards.teachers.confirm-otp-teacher');
    }
    function validateOtp(Request $request) {
        $otp = EmailOtp::where(['user_id'=> auth()->user()->id, 'otp' => $request->otp])->first();
        if($otp != null) {
            auth()->user()->update([
                'password' => Hash::make(session('newpassword'))
            ]);
            $otp->delete();
            return redirect()->route('change-password')->with('success', 'เปลี่ยนรหัสผ่านสำเร็จ');
        }
        else {
            return back()->with('errorOtp', 'รหัส otp ไม่ถูกต้อง');
        }
    }
    function updatePass(Request $request) {
        $this->validate($request, [ 
            'oldpassword' => ['required', 'string'],
            'newpassword' => ['required', 'string', 'min:8'],
            'cnewpassword' => ['required', 'string', 'min:8'],
        ],[
            'oldpassword.required' => 'กรุณาใส่รหัสผ่าน',
            'newpassword.min' => 'กรุณาใส่รหัสผ่านอย่างน้อย 8 ตัว',
            'newpassword.required' => 'กรุณาใส่รหัสผ่านใหม่',
            'cnewpassword.required' => 'กรุณาใส่รหัสผ่านใหม่อีกครั้ง',
        ]);

        if(password_verify($request->oldpassword, auth()->user()->password)){
            if($request->newpassword == $request->cnewpassword){
                $otp = rand(10, 999999);
                EmailOtp::create([
                    'user_id'=> auth()->user()->id,
                    'otp' => $otp
                ]);
                session(['newpassword' => $request->newpassword]);
                if(!Mail::to(auth()->user()->email)->send(new SendOtp($otp))){
                    return redirect('teacher/confirm-otp-teacher');
                }
                else {
                    return redirect()->route('change-password');
                }
            }
            else {
                return back()->with('errorpass', 'รหัสผ่านไม่ตรงกัน');
            }
        }
        else {
            return back()->with('error', 'รหัสผ่านเก่าไม่ถูกต้อง');
        }
        
    //     $hashedPassword = auth()->user()->password;
    //     if (!Hash::check($request->password ,$hashedPassword)) {
    //         if (Hash::check($request->newpassword ,$hashedPassword)) {
                
    //             $users = User::find(Auth::user()->id);
    //             $users->password = bcrypt($request->newpassword);
    //             $users->save();
    //             $hashedPassword->update([
    //                     'password' => bcrypt($request->newpassword),
    //                 ]);
    //                 return redirect('teacher/changePassword/'. $user->id)->with('updatepass','เปลี่ยนรหัสผ่านสำเร็จ');
    //                 }
    //                 else{
    //                         return back()->with('errorpass','รหัสผ่านเก่าไม่ตรงกับรหัสผ่านใหม่');
    //                     } 
    //     }
    //     User::whereId(Auth::user()->id)->update([
    //         'password' => Hash::make($request->newpassword)
    //     ]);
    //     return back()->with('updatepass','เปลี่ยนรหัสผ่านสำเร็จ');
    }
    function settings() {
        return view('dashboards.teachers.settings');
    }
    
    // CRUD DATA STUDENT
    function viewDataStudent($id, User $user) {
        $section = Section::findOrFail($id);
        $historys = HistoryScore::where('history_scores.user_id', $user->id)
                                ->join('exercises', 'history_scores.exercise_id', '=', 'exercises.id')
                                ->join('sections', 'history_scores.section_id', 'sections.id')
                                ->select('exercises.level_name', 'history_scores.*')
                                ->where('section_id',$section->id)
                                ->orderBy('created_at','DESC')
                                ->get();
        $sectiondeadlines = Section::select('id','deadline_date','deadline_time')
                                ->get();
                                // dd($historys);
        return view('dashboards.teachers.student.view_dataSTD', compact('user', 'section', 'historys', 'id','sectiondeadlines'));
    }
    function viewScoreAll($id) {
        $section = Section::findOrFail($id);
//        select u.name,s.section_name, h.id, h2.section_id, h.user_id, h2.exercise_id, h2.score, h.created_at from history_scores as h,
//       (select max(score) as score, exercise_id, user_id, section_id
//       from history_scores
//       group by exercise_id, user_id) as h2
// join exercises e on e.id = h2.exercise_id
// join users u on u.id = h2.user_id
// join sections s on s.id = h2.section_id
// where h.score = h2.score 
// and h.exercise_id = h2.exercise_id 
// and h.user_id = h2.user_id
// and h.section_id = h2.section_id
// and h2.section_id = 1
    $historys = DB::select(DB::raw("select u.*, s.*, e.*, h.id, h.section_id, h.user_id, h2.exercise_id, h2.score, h.created_at from history_scores as h, (select max(score) as score, exercise_id, user_id, section_id from history_scores group by exercise_id, user_id) as h2 join exercises e on e.id = h2.exercise_id join users u on u.id = h2.user_id join sections s on s.id = h2.section_id where h.score = h2.score and h.exercise_id = h2.exercise_id and h.user_id = h2.user_id and h.section_id = h2.section_id where section_id = '$section->id' order by h.created_at desc"));
    $sectiondeadlines = Section::select('id','deadline_date','deadline_time')
                                ->where('id',$section->id)
                                ->get();
    // dd($historys);
    return view('dashboards.teachers.student.view_score', compact('section', 'historys','sectiondeadlines'));
    }
    public function dataStudent(Request $req, Section $section) {
        $users = DB::table('sections')
                    ->join('section_users', 'section_users.section_id', '=', 'sections.id')
                    ->join('users', 'section_users.user_id', '=', 'users.id')
                    ->where('sections.id', $section->id)
                    ->orderBy('section_users.user_id', 'asc')
                    ->get();
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
    public function Classroom(Request $req, Section $section) {
        $id = Auth::user()->id;
        $sections = Section::where('user_id',$id)->get();
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
    function editSection(Section $section, Request $req) {
        // $req->validate([
        //     'section_sub' => 'required | max:10'. $section->id,
        //     'section_name' => 'required | max:255'. $section->id,
        //     'code_inclass' => 'required | string | min:6 | unique:sections'. $section->id,
        //     'deadline_date' => 'required'. $section->id,
        //     'deadline_time' => 'required'. $section->id,
        // ],[
        //     'section_sub.required' => 'กรุณาใส่รหัสวิชา',
        //     'section_sub.max' => 'ใส่รหัสวิชาได้ไม่เกิน 10 ตัว',
        //     'section_name.required' => 'กรุณาใส่ชื่อวิชา',
        //     'code_inclass.required' => 'กรุณาใส่รหัสเข้าห้องเรียน',
        //     'code_inclass.min' => 'ใส่รหัสเข้าห้องเรียนอย่างน้อย 6 ตัว',
        //     'deadline_date.required' => 'กรุณาใส่วันที่ส่ง',
        //     'deadline_time.required' => 'กรุณาใส่เวลาที่ส่ง',
        // ]);
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
