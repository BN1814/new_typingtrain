@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
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

                    @if(Session::get('success')){
                        <div class="alert alert-success alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    }
                    @elseif(Session::get('error')){
                        <div class="alert alert-danger alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    }
                    @endif

                    <form action="{{ route('setDeadline') }}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="code" class="h5"><p>รหัสเข้าห้อง : </p></label>
                            <input type="text" class="form-control" name="code_inclass" class="genCode" value="{{ old('code_inclass') }}" required>
                            <button class="btn btn-primary random" onclick="create_Random_code()" type="button">สุ่มรหัส</button>
                            @error('code-inclass')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="date" class="h5 d-flex"><p>วันที่ส่ง : </p></label>
                            <input type="date" class="form-control" name="deadline_date"
                            value="{{ old('deadline_date') }}" required>
                            @error('deadline_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="time" class="h5"><p>เวลาที่ส่ง : </p></label>
                            <input type="time" class="form-control" name="deadline_time" value="{{ old('deadline_time') }}" required>
                            @error('deadline_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success mt-2 save" type="submit">
                                บันทึก
                            </button>
                            <button class="btn btn-danger mt-2 cancel" type="submit">
                                ยกเลิก
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/Teacher/teacherIndex.js"></script>
@endsection
