<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Section;
use App\Models\HistoryScore;
use DB;
use Auth;
use Str;
// dd($historys);
// SELECT section_name, level_name, score, wpm, cpm
// FROM `history_scores` 
// inner join `exercises` on `history_scores`.`exercise_id` = `exercises`. `id`
// inner join `sections` on `history_scores`.`section_id` = `sections`. `id`
// where `history_scores`. `user_id` = 4;
class UserController extends Controller
{
    function History_STD(User $user) {
        $historys = HistoryScore::where('history_scores.user_id', $user->id)
                            ->join('exercises', 'history_scores.exercise_id', '=', 'exercises.id')
                            ->join('sections', 'history_scores.section_id', '=', 'sections.id')
                            ->select('history_scores.*', 'exercises.level_name', 'sections.section_name')
                            ->get();
        return view('dashboards.users.history_score', compact('user', 'historys'));
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
    function changePassword(Request $req) {
        // $request->validate([
        //     'changePass' => 'required',
        // ],
        // [
        //     'changePass.required' => 'กรุณาใส่อีเมล',
        // ]);
        return view('dashboards.users.change_password_user');
    }
    function testTyping() {
        return view('dashboards.users.test_typing');
    }
    function enterclass() {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $sections = DB::table('section_users')
                    ->join('sections', 'section_users.section_id', '=', 'sections.id')
                    ->where('section_users.user_id', '=', $id)
                    ->get();
        return view('dashboards.users.enterclass', compact('sections', 'user'));
    }
    function HExercise(Section $section, User $user, HistoryScore $history) {
        $user_id = Auth::user()->id;
        $history = DB::table('history_scores')
                        ->where('history_scores.user_id', $user_id)
                        ->join('users', 'history_scores.user_id', '=', 'users.id')
                        ->join('exercises', 'history_scores.exercise_id', '=', 'exercises.id')
                        ->join('sections', 'history_scores.section_id', '=', 'sections.id')
                        ->select(DB::raw('MAX(history_scores.score)'))
                        ->where('history_scores.section_id','=' , $section->id)
                        ->groupBy('history_scores.exercise_id', 'history_scores.section_id')
                        ->sum('score');
        // $history_scorecount = DB::table('history_scores')
        //                 ->where('history_scores.user_id', $user_id)
        //                 ->join('users', 'history_scores.user_id', '=', 'users.id')
        //                 ->join('exercises', 'history_scores.exercise_id', '=', 'exercises.id')
        //                 ->join('sections', 'history_scores.section_id', '=', 'sections.id')
        //                 ->where('history_scores.section_id','=' , $section->id)
        //                 ->count();
        //                 // ->max('history_scores.score');
        //                 // dd($history);
        $checkuser = DB::table('section_users')->where('user_id','=', $user_id)->count();
        if($checkuser > 0){
            return view('dashboards.users.homeEx', compact('section', 'user', 'history' ));
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
