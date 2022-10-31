@extends('layouts.app')

@section('content')
<style>
    .card { border:none; }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Auth::user()->role == 'admin')
                <div class="card mt-5">
                    <div class="card-header bg-dark text-center text-white h1">ยินดีต้อนรับ</div>
                    <div class="card-body">
                        <p class="ms-3 h2"> สวัสดีคุณ : {{ Auth::user()->name }}</p>

                        <button class="btn btn-primary btn-sm m-1 float-end">
                            <a href="{{ url('admin/dashboard') }}">ไปหน้าแรก</a>
                        </button>
                    </div>
                </div>
            @elseif(Auth::user()->role == 'teacher')
                <div class="card mt-5">
                    <div class="card-header bg-dark text-center text-white h1">ยินดีต้อนรับ</div>
                    <div class="card-body">
                        <p class="ms-3 h2"> สวัสดีคุณ : {{ Auth::user()->name }}</p>
                        <p class="ms-3 h4 d-inline">ยินดีต้อนรับเข้าสู่โปรแกรมฝึกพิมพ์ดีด</p>

                        <button class="btn btn-primary btn-sm m-1 float-end">
                            <a href="{{ url('teacher/dashboard') }}">สร้างห้องเรียน</a>
                        </button>
                    </div>
                </div>
            @else
                <div class="card mt-5">
                    <div class="card-header bg-dark text-center text-white h1">ยินดีต้อนรับ</div>
                    <div class="card-body">
                        <p class="ms-3 h2"> สวัสดีคุณ : {{ Auth::user()->name }}</p>
                        <p class="ms-3 h4 d-inline">ยินดีต้อนรับเข้าสู่โปรแกรมฝึกพิมพ์ดีด</p>

                        <button class="btn btn-primary btn-sm m-1 float-end">
                            <a href="{{ url('user/enterclass') }}">เข้าห้องเรียน</a>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
