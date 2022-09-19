<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Section;
use App\Models\HistoryScore;
use isEmtry;
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
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $sections = Section::get();
        return view('dashboards.users.enterclass', compact('sections', 'user', 'id'));
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
        $users = User::findOrFail($user_id);
        $inputClassroom = Section::where('code_inclass', '=', $enterclass)->first('id');
        // dd($inputClassroom, $user_id);
        // $section_id = Auth::user()->student_sections()->find($inputClassroom);
        // dd($inputClassroom);
        $section_user = DB::table('section_users')->where('section_id', '=' , $inputClassroom)->first();
        // dd($section_user);
        // $section_id = DB::table('section_users')->where('section_id', $classroom_id)->first();
        if($inputClassroom){
            $users->student_sections()->attach($inputClassroom);
            return redirect('user/enterclass')->with('success', 'เข้าห้องเรียนสำเร็จแล้ว');
            // $section_user_id = DB::table('section_users')->where('user_id', $user_id)->first();
            // if($section_user_id == null){
            //     $users->student_sections()->attach($inputClassroom);
            // }
            // else{
            //     $a = $section_user_id->section_id;
            //     $b = $section_user_id->user_id;
            //     $classroom_id = $inputClassroom->id;
            //     if($classroom_id == $a){
            //         if($user_id == $b){
            //             return redirect('user/enterclass')->with('error-message', 'คุณอยู่ในห้องเรียนนี้แล้ว');
            //         }
            //         else {
            //             return redirect('user/enterclass')->with('success', 'vrfvjisjvr');
            //         }
            //     }
            // }
        }
        else{
            return redirect('user/enterclass')->with('error', 'รหัสเขาห้องเรียนไม่ถูกต้องหรือไม่มีรหัสเข้าห้องเรียนนี้อยู่ในฐานข้อมูลของระบบ กรุณากรอกรหัสใหม่อีกครั้ง!!');
        }
        
        
        // $check_user_section_before = $users->student_sections()->find($inputClassroom)->code_inclass;
        // dd($check_user_section_before);
        // $check_user_section = $users->student_sections()->wherePivot('section_id', '=', $enterclass);
        // if($inputClassroom) {

        //     return redirect('user/enterclass')->with('success', 'เข้าห้องเรียนสำเร็จแล้ว');
        // }
        // else{
        //     return redirect('user/enterclass')->with('error', 'รหัสเขาห้องเรียนไม่ถูกต้องหรือไม่มีรหัสเข้าห้องเรียนนี้อยู่ในฐานข้อมูลของระบบ กรุณากรอกรหัสใหม่อีกครั้ง!!');
        // }
        // if($inputClassroom) {
        //     // if(count((is_countable($users)?$users:[])))
        //     if(!$section_user) {
        //         // dd($section_user, $section_user_id);
        //         return redirect('user/enterclass')->with('error-message', 'คุณอยู่ในห้องเรียนนี้แล้ว');
        //     }
        //     // // $check_user_section = $users->student_sections()->find($inputClassroom)->code_inclass;
        //     else{
        //         if($section_user){
            //             
            //         // $users->student_sections()->attach($inputClassroom);
        //         }
        //         else{

        //         }
        //         return redirect('user/enterclass')->with('success', 'เข้าห้องเรียนสำเร็จแล้ว');
        //     }
        // }
        // else {
        //     return redirect('user/enterclass')->with('error', 'รหัสเขาห้องเรียนไม่ถูกต้องหรือไม่มีรหัสเข้าห้องเรียนนี้อยู่ในฐานข้อมูลของระบบ กรุณากรอกรหัสใหม่อีกครั้ง!!');
        // }
    }
}
