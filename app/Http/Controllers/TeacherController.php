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
        $data = Deadline::all();
        
        $data = new Deadline();
        $data->code_inclass = $request->code_inclass;
        $data->deadline_date = $request->deadline_date;
        $data->deadline_time = $request->deadline_time;
        $data->save();

        $response['message'] = "เพิ่มข้อมูลสำเร็จ";
        return json_encode($response);
    }

}
