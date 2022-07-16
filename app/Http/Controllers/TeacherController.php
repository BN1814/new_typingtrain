<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Deadline;
use App\Models\User;


class TeacherController extends Controller
{
    function index() {
        return view('dashboards.teachers.index');
    }
    function profile() {
        return view('dashboards.teachers.profile');
    }
    function settings() {
        return view('dashboards.teachers.settings');
    }
    public function dataStudent() {
        return view('dashboards.teachers.dataSTD');
    }
    public function AddDataStudent() {
        return view('Teacher.addDataSTD');
    }
    public function ClassRoom() {
        return view('Teacher.classRoom');
    }

    public function createCode(Request $request) {
        $request->validate([
            'code_inclass' => 'required', 'unique',
            'deadline_date' => 'required',
            'deadline_time' => 'required'
        ]);
        
        $request = new Deadline();
        $request->code_inclass = $request->code_inclass;
        $request->deadline_date = $request->deadline_date;
        $request->deadline_time = $request->deadline_time;
        $save = $request->save();

        if($save) {
            return redirect()->back()->with('success', 'สร้างห้องเรียนสำเร็จ');
        }
        else {
            return redirect()->back()->with('error', 'สร้างห้องเรียนไม่สำเร็จ');
        }
    }

}
