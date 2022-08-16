@extends('layouts.app')

@section('content')
<style>
    a {
        text-decoration: none;
        color: #fff;
    } a:hover {color: #fff;}
    .random {
        margin: 10px 0 10px 45%;
    }
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center text-white bg-dark h3">
                    <p>สร้างห้องเรียน</p>
                </div>
                <div class="card-body">

                    @if($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    {{-- @elseif($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <strong>{{ $message }}</strong>
                        </div> --}}
                    @endif
                    {{--  action="{{ route('setDeadline') }}" method="post" --}}
                    <form action="{{ route('setSection') }}" method="post">
                        @csrf

                        <div class="form-group mb-2">
                            <label for="sectionsub" class="h5"><p>รหัสวิชา : </p></label>
                            <input type="text" class="form-control" name="section_sub" value="{{ old('section_sub') }}" required autocomplete="off" placeholder="รหัสวิชา">
                            @error('section_sub')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="sectionname" class="h5"><p>ชื่อวิชา : </p></label>
                            <input type="text" class="form-control" name="section_name" value="{{ old('section_name') }}" required autocomplete="off" placeholder="ชื่อวิชา">
                            @error('section_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="code" class="h5"><p>รหัสเข้าห้อง : </p></label>
                            <input type="text" class="form-control inpGencode" name="code_inclass" value="{{ old('code_inclass') }}" required autocomplete="off" placeholder="รหัสเข้าห้อง">
                            <button class="btn btn-primary random" type="button" onclick="create_Random_code()">สุ่มรหัส</button>
                            @error('code-inclass')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="date" class="h5 d-flex"><p>วันที่ส่ง : </p></label>
                            <input type="date" class="form-control" name="deadline_date"
                            value="{{ old('deadline_date') }}" required autocomplete="off">
                            @error('deadline_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="time" class="h5"><p>เวลาที่ส่ง : </p></label>
                            <input type="time" class="form-control" name="deadline_time" value="{{ old('deadline_time') }}" required autocomplete="off">
                            @error('deadline_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
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
