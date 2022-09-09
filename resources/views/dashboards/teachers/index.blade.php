@extends('layouts.app')

@section('content')
<style>
    a {
        text-decoration: none;
        color: #fff;
    } a:hover {color: #fff;}
    /* .random {
        margin: 10px 0 10px 45%;
    } */
    .save {
        margin: 0 10px 0 40%;
    }
    .card-header {
        height: 70px;
    } .card-header p {line-height: 50px; font-weight: bold;}
    label p {
        margin: 0; padding: 0;
        font-weight: bold;
    }
</style>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-7">
            @if(session('message'))
                <h4 class="alert alert-success text-center">{{ session('message') }}</h4>
            @endif
            <div class="card">
                <div class="card-header text-white bg-dark text-center h3">
                    <p>สร้างห้องเรียน</p>
                </div>
                <div class="card-body">
                    {{--  action="{{ route('setDeadline') }}" method="post" --}}
                    <form action="{{ url('teacher/createCode') }}" method="post">
                        @csrf

                        <div class="row mb-2">
                            <label for="stdid" class="col-md-4 col-form-label text-md-end">{{ __('รหัสวิชา') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="section_sub" value="{{ old('section_sub') }}" autocomplete="off" placeholder="รหัสวิชา">
                                    @error('section_sub')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="stdid" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อวิชา') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="section_name" value="{{ old('section_name') }}" autocomplete="off" placeholder="ชื่อวิชา">
                                    @error('section_name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="stdid" class="col-md-4 col-form-label text-md-end">{{ __('รหัสเข้าห้อง') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control inpGencode" name="code_inclass" value="{{ old('code_inclass') }}" autocomplete="off" placeholder="รหัสเข้าห้อง">
                                @error('code-inclass')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="col-md-4 mt-2">
                                    <button class="btn btn-dark random" type="button" onclick="create_Random_code()">สุ่มรหัส</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="stdid" class="col-md-4 col-form-label text-md-end">{{ __('วันที่ส่ง') }}</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="deadline_date"
                                value="{{ old('deadline_date') }}" autocomplete="off">
                                    @error('deadline_date')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="stdid" class="col-md-4 col-form-label text-md-end">{{ __('เวลาที่ส่ง') }}</label>
                            <div class="col-md-6">
                                <input type="time" class="form-control" name="deadline_time" value="{{ old('deadline_time') }}" autocomplete="off">
                                    @error('deadline_time')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-success mt-2 save" type="submit">
                                {{ __('บันทึก') }}
                            </button>
                            <button class="btn btn-danger mt-2 close" type="reset">
                                <a href="{{ route('teacher.dashboard') }}">ยกเลิก</a>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/Teacher/teacherIndex.js') }}"></script>
@endsection
