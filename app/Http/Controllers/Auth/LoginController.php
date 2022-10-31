<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
        protected function redirectTo() {
            if(Auth()->user()->role == 'admin'){
                return route('admin.dashboard');
            }
            else if(Auth()->user()->role == 'teacher'){
                return route('teacher.dashboard');
            }
            else if(Auth()->user()->role == 'student'){
                return route('user.dashboard');
            }
        }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request) {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'email.required' => 'กรุณาใส่อีเมลผู้ใช้งาน',
            'password.required' => 'กรุณาใส่รหัสผ่าน',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if(auth()->user()->role == 'admin') {
                return redirect('admin/dashboard');
            }
            else if(auth()->user()->role == 'teacher') {
                return redirect('teacher/dashboard');
            }
            else if(auth()->user()->role == 'student') {
                return redirect('user/enterclass');
            }
        }
        else {
            return redirect()->route('login')->with('error', 'อีเมลหรือรหัสผ่านไม่ถูกต้อง กรุณาลองอีกครั้ง');
        }
    }
}
