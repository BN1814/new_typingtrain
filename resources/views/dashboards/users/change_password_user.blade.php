@extends('layouts.app')

@section('content')
<style>
    a, a:hover{ color:#333 }
    .card { border:none; }
</style>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if(session('success'))
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: '{{ session('success') }}',
                            showConfirmButton: false,
                            ConfirmButtonText: 'ตกลง',
                            timer: 1500
                        })
                    </script>
                @elseif(session('updatepass'))
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: '{{ session('updatepass') }}',
                            showConfirmButton: false,
                            ConfirmButtonText: 'ตกลง',
                            timer: 1500
                        })
                    </script>
                @elseif(session('errorpass'))
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: '{{ session('errorpass') }}',
                            showConfirmButton: true,
                            ConfirmButtonText: 'ตกลง',
                        })
                    </script>
                @elseif(session('error'))
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: '{{ session('error') }}',
                            showConfirmButton: true,
                            ConfirmButtonText: 'ตกลง',
                        })
                    </script>
                @endif
                <div class="card">
                    <div class="card-header text-white bg-dark text-center h3">
                        {{ __('เปลี่ยนรหัสผ่าน') }}
                    </div>

                    <form action="{{ route('update-password') }}" method="post">
                        @csrf

                        <div class="card-body">
                            <div class="row mb-4">
                                <label class="col-md-4 col-form-label text-end">รหัสผ่านเก่า : </label>
                                <div class="col-md-6">
                                    <input class="form-control @error('oldpassword') is-invalid @enderror" type="password" placeholder="ใส่รหัสผ่านเก่า" name="oldpassword" id="oldpassword" value="{{ old('oldpassword') }}">
                                    @error('oldpassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    {{-- <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a> --}}
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-4 col-form-label text-end">รหัสผ่านใหม่ : </label>
                                <div class="col-md-6">
                                    <input class="form-control @error('newpassword') is-invalid @enderror" type="password" placeholder="ใส่รหัสผ่านใหม่" name="newpassword" id="newpassword">
                                    @error('newpassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    {{-- <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a> --}}
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-4 col-form-label text-end">ยืนยันรหัสผ่านใหม่ : </label>
                                <div class="col-md-6">
                                    <input class="form-control @error('cnewpassword') is-invalid @enderror" type="password" placeholder="ใส่รหัสผ่านใหม่อีกครั้ง" name="cnewpassword" id="cnewpassword">
                                    @error('cnewpassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    {{-- <a href=""><i class="fa fa-eye-slash float-end mt-1" aria-hidden="true"></i></a> --}}
                                    <input type="checkbox" onclick="blindpasswordFunction()" class="mt-1" style="margin:0;"><p class="d-inline ms-1" style="font-size: 16px; color:black; height:10px;">แสดงรหัสผ่าน</p>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary form-control">
                                        {{ __('ส่ง OTP') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function blindpasswordFunction() {
            var password = document.getElementById('oldpassword');
            var newpassword = document.getElementById('newpassword');
            var cnewpassword = document.getElementById('cnewpassword');
            if(oldpassword.type === 'password' || newpassword.type === 'password' || cnewpassword.type === 'password'){
                oldpassword.type = 'text';
                newpassword.type = 'text';
                cnewpassword.type = 'text';
            }
            else {
                oldpassword.type = 'password';
                newpassword.type = 'password';
                cnewpassword.type = 'password';
            }
        }
    </script>
@endsection