@extends('layouts.app')

@section('content')
<style>
    .card { border:none; }
    .form-control { text-align: center; }
</style>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white text-center bg-dark h4">{{ __('รีเซ็ตรหัสผ่าน') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('อีเมล : ') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email">

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
                                <input id="passwords" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" value="{{ old('password') }}" autofocus>

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
                                <input id="passwordconfirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">

                                <input type="checkbox" onclick="blindpasswordFunction()" class="mt-3" style="margin:0;"><p class="d-inline ms-1" style="font-size: 16px; color:black; height:10px;">แสดงรหัสผ่าน</p>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark text-white">
                                    {{ __('รีเซ็ตรหัสผ่าน') }}
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
