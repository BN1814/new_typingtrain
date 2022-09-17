<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Section;
use App\Models\HistoryScore;
use DB;
use Auth;

class UserController extends Controller
{
    function index() {
        return view('dashboards.users.index');
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
    function changePassword() {
        return view('dashboards.users.change_password_user');
    }
    function settings() {
        return view('dashboards.users.settings');
    }
    function enterclass() {
        return view('dashboards.users.enterclass');
    }
    function enterclass_std(Section $section, Request $req){
        $req -> validate( [
            'entclass' => ['required', 'min:6'],
        ],[
            'entclass.required' => 'กรุณาใส่รหัสเข้าห้องเรียน',
            'entclass.min' => 'กรุณาใส่รหัสเข้าห้องเรียนมากกว่า 6 ตัว',
        ]);
        $enterclass = $req->input('entclass');
        $inputClassroom = Section::where('code_inclass', '=', $enterclass)->first('id');

        $user_id = Auth::user()->id;
        $users = User::findOrFail($user_id);
        $section_user = DB::table('section_users')
                        ->where('user_id', $user_id)->get('section_id');

        // dd($section_user, $user_id, $users, $inputClassroom);
        
        if($inputClassroom) {
            if($section_user == $inputClassroom) {
                return redirect('user/enterclass')->with('error-message', 'คุณอยู่ในห้องเรียนนี้แล้ว');
            }
            else {
                $users->student_sections()->attach($inputClassroom);
                return redirect('user/enterclass')->with('success', 'เข้าห้องเรียนสำเร็จแล้ว');
            }
        }
        else {
            return redirect('user/enterclass')->with('error', 'รหัสเขาห้องเรียนไม่ถูกต้อง กรุณากรอกรหัสใหม่อีกครั้ง!!');
        }
    }

    function classroomAll() {
        $id = Auth::user()->id;
        $sections = Section::with('section_users')
                            ->where('section_id', '=', $id)
                            ->get();
        return view('classroom_all', compact('sections', 'id'));
    }
}
