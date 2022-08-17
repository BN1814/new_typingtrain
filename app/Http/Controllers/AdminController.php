<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Section;
use App\Models\User;
use App\Models\HistoryScore;
use DB;

class AdminController extends Controller
{
    function index() {
        $sections = Section::all();
        $users = User::all();
        // $users = DB::table('users')
        //             ->join('sections', 'sections.id', '=', 'users.id')
        //             ->get(['users.*', 'sections.*']);
        
        return view('dashboards.admins.index', compact('sections', 'users'));
    }
    function profile() {
        return view('dashboards.admins.profile');
    }
    function settings() {
        return view('dashboards.admins.settings');
    }

    function addDataTeacher() {
        return view('dashboards.admins.add_data_teacher');
    }
    function addDataStudent() {
        return view('dashboards.admins.add_data_student');
    }
    function addDataExercise() {
        return view('dashboards.admins.add_data_exercise');
    }

    function updateProfile(Request $request) {
        $request -> validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255'
        ]);
        $user = Auth::user($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
        return back()->with('success', 'อัพเดตข้อมูลสำเร็จ');
    }
}
