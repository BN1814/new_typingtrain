<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Section;
use App\Models\HistoryScore;
use App\Models\Exercise;
use App\Models\EmailOtp;
use Carbon\Carbon;
use DB;
use Auth;
use Hash;
use Mail;
use App\Mail\SendOtp;

class UserController extends Controller
{
    function History_STD(User $user) {
        $historys = HistoryScore::where('history_scores.user_id', $user->id)
                            ->join('exercises', 'history_scores.exercise_id', '=', 'exercises.id')
                            ->join('sections', 'history_scores.section_id', '=', 'sections.id')
                            ->select('history_scores.*', 'exercises.level_name', 'sections.section_name')
                            ->orderBy('history_scores.created_at', 'desc')
                            ->get();
        $sectiondeadline = Section::select('id','deadline_date','deadline_time')
                                ->get();
        // $datenow = Carbon::now()->format('Y-m-d');
        // $timenow = Carbon::now()->format('H:i');
        // dd($sectiondeadline);
        return view('dashboards.users.history_score', compact('user', 'historys','sectiondeadline'));
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
    // เปลี่ยนรหัสผ่าน
    function changePassword() {
        return view('dashboards.users.change_password_user');
    }
    function confirmOtp() {
        if(auth()->user()->otp->count() <= 0) {
            return redirect()->route('user.dashboard');
        }
        return view('dashboards.users.confirm-otp-user');
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
                    return redirect()->route('otpStudent');
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
    }

    // เข้าห้องเรียน
    function enterclass() {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $sections = DB::table('section_users')
                    ->join('sections', 'section_users.section_id', '=', 'sections.id')
                    ->join('users', 'sections.user_id', '=', 'users.id')
                    ->where('section_users.user_id', '=', $id)
                    ->get();
        // dd($sections);
        // print_r($sections);
        return view('dashboards.users.enterclass', compact('sections', 'user'));
    }
    function HExercise(Section $section, User $user, HistoryScore $history) {
        $user_id = Auth::user()->id;
        $historys = HistoryScore::select('exercise_id', 'user_id', 'section_id', \DB::raw('MAX(history_scores.score) as score'))
                            // ->groupBy('user_id', 'section_id', 'exercise_id')
                            ->where('user_id', $user_id)
                            ->where('section_id', $section->id)
                            ->get()->sum('score');
        $count_exercises = HistoryScore::select('exercise_id', 'user_id', 'section_id', \DB::raw('MAX(history_scores.score) as score'))
                            // ->groupBy('user_id', 'section_id', 'exercise_id')
                            ->where('user_id', $user_id)
                            ->where('section_id', $section->id)
                            ->get()->count();
        $count_exercises_pass = HistoryScore::select('exercise_id', 'user_id', 'section_id', \DB::raw('MAX(history_scores.score) as score'))
                            // ->groupBy('user_id', 'section_id', 'exercise_id')
                            ->where('user_id', $user_id)
                            ->where('section_id', $section->id)
                            ->having('score', '>=', '50')
                            ->get()->count();
        $count_exercises_fail = HistoryScore::select('exercise_id', 'user_id', 'section_id', \DB::raw('MAX(history_scores.score) as score'))
                            // ->groupBy('user_id', 'section_id', 'exercise_id')
                            ->where('user_id', $user_id)
                            ->where('section_id', $section->id)
                            ->having('score', '<', '50')
                            ->get()->count();
        $total_scores = Exercise::get()->count()*100;
                        // dd($total_scores);
        $checkuser = DB::table('section_users')->where('user_id','=', $user_id)->count();
        $checkusersub = DB::table('section_users')
                            ->where('user_id','=', $user_id)
                            ->where('section_id','=', $section->id)
                            ->count();
        if($checkuser > 0 ){
            if($checkusersub == 0){
                return redirect('user/enterclass');
            }else {
                return view('dashboards.users.homeEx', compact('section', 'user', 'historys', 'count_exercises', 'count_exercises_pass', 'count_exercises_fail', 'total_scores','checkuser','checkusersub'));
            }      
        }
        else {
            return redirect('user/enterclass');
        }
    }
    function enterclass_std(Section $section, Request $req){
        $req -> validate( [
            'entclass' => ['required', 'min:6'],
        ],[
            'entclass.required' => 'กรุณาใส่รหัสเข้าห้องเรียน',
            'entclass.min' => 'กรุณาใส่รหัสเข้าห้องเรียนมากกว่า 6 ตัว',
        ]);
        $enterclass = $req->input('entclass');

        $user_id = Auth::user()->id;
        $users = User::find($user_id);
        $inputClassroom = Section::where('code_inclass','=', $enterclass)->first();
        
        if($inputClassroom){
            $section_user = DB::table('section_users')->where('section_id','=', $inputClassroom->id)->where('user_id','=', $user_id)->count();
            if($section_user == 0) {
                $users->student_sections()->save($inputClassroom);
                return redirect('user/enterclass')->with('success', 'เข้าห้องเรียนสำเร็จแล้ว');
            }
            else {
                return redirect('user/enterclass')->with('error-message', 'คุณอยู่ในห้องเรียนนี้แล้ว');
            }
        }
        else{
            return redirect('user/enterclass')->with('error', 'รหัสเขาห้องเรียนไม่ถูกต้องหรือไม่มีรหัสเข้าห้องเรียนนี้อยู่ในฐานข้อมูลของระบบ กรุณากรอกรหัสใหม่อีกครั้ง!!');
        }
    }
    // function destroy_enterclass($id) {
    //     $section = DB::table('section_users')->findOrFail('section_id', $id);
    //     $section->delete;
    //     return response()->json(['delete' => 'ออกจากห้องเรียนสำเร็จแล้ว']);
    // }
}
