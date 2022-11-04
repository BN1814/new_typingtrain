@extends('layouts.app')

@section('content')
<style>
    .card { border:none; }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('resent'))
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'ลิงก์การยืนยันตัวตนใหม่ถูกส่งไปยังที่อยู่อีเมลของคุณแล้ว',
                        showConfirmButton: true,
                        ConfirmButtonText: 'ตกลง',
                        // timer: 1500
                    })
                </script>
            @endif
            <div class="card mt-5">
                <div class="card-header text-white text-center bg-dark h4">{{ __('ยืนยันตัวตนของคุณ') }}</div>

                <div class="card-body">

                    {{ __('ก่อนดำเนินการต่อ โปรดตรวจสอบอีเมลของคุณสำหรับลิงก์ยืนยัน') }}
                    {{ __('หากคุณไม่ได้รับอีเมล ') }}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('กดอีกครั้งเพื่อส่งรหัสยืนยันตัวตน') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
