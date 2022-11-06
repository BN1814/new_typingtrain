@extends('layouts.app')
@section('title', ' | รีเซ็ตรหัสผ่าน')

@section('content')
<style>
    .card { border:none; }
</style>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('status'))
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'ลิงก์รีเซ็ตรหัสผ่านถูกส่งสำเร็จแล้ว',
                        showConfirmButton: false,
                        ConfirmButtonText: 'ตกลง',
                        timer: 2000
                    })
                </script>
            @endif
            <div class="card">
                <div class="card-header text-white text-center bg-dark h4">{{ __('รีเซ็ตรหัสผ่าน') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('อีเมล : ') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('ส่งอีเมล') }}
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
