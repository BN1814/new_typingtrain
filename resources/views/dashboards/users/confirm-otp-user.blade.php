@extends('layouts.app')
@section('title', ' | เปลี่ยนรหัสผ่าน')

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
                @elseif(session('errorOtp'))
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: '{{ session('errorOtp') }}',
                            showConfirmButton: true,
                            ConfirmButtonText: 'ตกลง',
                        })
                    </script>
                @endif
                <div class="card">
                    <div class="card-header text-white bg-dark text-center h3">
                        {{ __('รหัส OTP') }}
                    </div>

                    <form action="{{ route('validateOTP')}}" method="post">
                        @csrf

                        <div class="card-body">
                            <div class="row mb-4">
                                <label class="col-md-4 col-form-label text-end">รหัส otp : </label>
                                <div class="col-md-6">
                                    <input class="form-control @error('otp') is-invalid @enderror" type="string" placeholder="ใส่รหัส otp" name="otp" id="otp">
                                    @error('otp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    {{-- <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a> --}}
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary form-control">
                                        {{ __('เปลี่ยนรหัสผ่าน') }}
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