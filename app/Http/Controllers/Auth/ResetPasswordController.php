<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Models\user;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected function rediresctTo(){
        if(Auth()->user()->role == 'admin'){
            return rout('admin.deshboard');
        }
        elseif(Auth()->user()->role == 'teacher'){
            return rout('teacher.deshboard');
        }elseif(Auth()->user()->role == 'student'){
            return rout('student.deshboard');
        }
        

    }
    // protected function ResetPassword()
    // {
    //     return User::create([
    //         'userid' => $data['userid'],
    //         'name' => $data['name'],
    //         'lname' => $data['lname'],
    //         'email' => $data['email'],
    //         'role' => 'student',
    //         'password' => Hash::make($data['password']),
    //     ]);
        
    //     if($data->User::create()){
    //         return redirect()->back()->with('success', 'ลงทะเบียนสำเร็จแล้ว');
    //     }
    // }
}
