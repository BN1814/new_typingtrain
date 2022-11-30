@extends('layouts.app')
@section('title', ' | ลงทะเบียน')

@section('content')
<style>
    .card { border:none; }
    .form-control { text-align:center; }
</style>
{{-- <link rel="stylesheet" href=" {{ asset('bootstrap.min.css') }} "> --}}
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white bg-dark h3">{{ __('ลงทะเบียน') }}</div>

                {{-- @if($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @elseif($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <strong>{{ $message }}</strong>
                    </div>  
                @endif --}}
                
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('สถานะ : ') }}</label>

                            <div class="col-md-6">
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="">--- กรุณาเลือกสถานะ ---</option>
                                    <option value="student">student</option>
                                    <option value="teacher">teacher</option>
                                </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="userid" class="col-md-4 col-form-label text-md-end">{{ __('รหัสผู้ใช้งาน : ') }}</label>

                            <div class="col-md-6">
                                <input id="userid" type="text" class="form-control @error('userid') is-invalid @enderror" name="userid" value="{{ old('userid') }}"  autocomplete="userid" placeholder="ใส่รหัสนักศึกษาหรือรหัสผู้ใช้งาน">

                                @error('userid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อผู้ใช้งาน : ') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" placeholder="ใส่ชื่อผู้ใช้งาน">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="lname" class="col-md-4 col-form-label text-md-end">{{ __('นามสกุล : ') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}"  autocomplete="lname" placeholder="ใส่นามสกุล">

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('อีเมล : ') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="ใส่อีเมล">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('รหัสผ่าน : ') }}</label>

                            <div class="col-md-6">
                                <input id="passwords" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="ใส่รหัสผ่าน">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('ยืนยันรหัสผ่าน : ') }}</label>
                            
                            <div class="col-md-6">
                                <input id="passwordconfirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"  autocomplete="new-password" placeholder="ใส่รหัสผ่านอีกครั้ง">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="checkbox" onclick="blindpasswordFunction()" class="mt-2" style="margin:0;"><p class="d-inline ms-1" style="font-size: 16px; color:black; height:10px;">แสดงรหัสผ่าน</p>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning form-control">
                                    {{ __('ลงทะเบียน') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        function blindpasswordFunction() {
            var passwords = document.getElementById('passwords');
            var passwordconfirm = document.getElementById('passwordconfirm');
            if(passwords.type === 'password' || passwordconfirm.type === 'password'){
                passwords.type = 'text';
                passwordconfirm.type = 'text';
       
            }
            else {
                passwords.type = 'password';
                passwordconfirm.type = 'password';
               
            }
        }
    </script>
@endsection
