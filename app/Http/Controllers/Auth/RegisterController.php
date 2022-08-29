<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'userid' => ['required', 'string', 'max:20'],
            'name' => ['required', 'string', 'max:20'],
            'lname' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6 | max:20', 'confirmed'],
        ],[
            'userid.required' => 'กรุณาใส่รหัสนักศึกษาหรือรหัสผู้ใช้งาน',
            'name.required' => 'กรุณาใส่ชื่อผู้ใช้งาน',
            'lname.required' => 'กรุณาใส่นามสกุลผู้ใช้งาน',
            'email.required' => 'กรุณาใส่อีเมลผู้ใช้งาน',
            'password.required' => 'กรุณาใส่รหัสผ่าน',
        ]);

        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->role = 2;
        // $user->password = \Hash::make($request->password);

        // if($user -> save()) {
        //     return $redirect()->back()->with('success', 'ลงทะเบียนสำเร็จ');
        // }
        // else {
        //     return $redirect()->back()->with('error', 'ลงทะเบียนไม่สำเร็จ');
        // }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'userid' => $data['userid'],
            'name' => $data['name'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'role' => $data['status'],
            'password' => Hash::make($data['password']),
        ]);
        
        if($data->User::create()){
            return redirect()->back()->with('success', 'ลงทะเบียนสำเร็จแล้ว');
        }
    }

    // function register(Request $request) {
    //     $request -> validate( [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);

    //     $data = new User();
    //     $data->name = $request->name;
    //     $data->email = $request->email;
    //     $data->role = 2;
    //     $data->password = \Hash::make($request->password);

    //     if($data -> save()) {
    //         return $redirect()->back()->with('success', 'ลงทะเบียนสำเร็จ');
    //     }
    //     else {
    //         return $redirect()->back()->with('error', 'ลงทะเบียนไม่สำเร็จ');
    //     }
    // }
}
