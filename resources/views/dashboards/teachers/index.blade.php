@extends('layouts.app')
@section('title', ' | สร้างห้องเรียน')

@section('content')
<style>
    a { text-decoration:none; color:#fff ;} 
    a:hover { color:#fff; }
    .save { margin: 0 10px 0 40%; }
    .card { border:none; }
    label p { margin:0; padding:0; font-weight:bold; }
</style>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-7">
            @if(session('message'))
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: '{{ session('message') }}',
                    showConfirmButton: false,
                    ConfirmButtonText: 'ตกลง',
                    timer: 1500
                })
            </script>
            @endif
            <div class="card">
                <div class="card-header text-white bg-dark text-center h1">{{ __('สร้างห้องเรียน')}}</div>
                <div class="card-body">
                    {{--  action="{{ route('setDeadline') }}" method="post" --}}
                    <form action="{{ url('teacher/createCode') }}" method="post">
                        @csrf

                        <div class="row mb-2">
                            <label for="stdid" class="col-md-4 col-form-label text-md-end">{{ __('รหัสวิชา : ') }}</label>
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
                            <label for="stdid" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อวิชา : ') }}</label>
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
                            <label for="stdid" class="col-md-4 col-form-label text-md-end">{{ __('รหัสเข้าห้อง : ') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control inpGencode" name="code_inclass" value="{{ old('code_inclass') }}" autocomplete="off" placeholder="รหัสเข้าห้อง">
                                <button class="btn btn-dark random mt-2" type="button" onclick="create_Random_code()">สุ่มรหัส</button>
                                @error('code-inclass')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="stdid" class="col-md-4 col-form-label text-md-end">{{ __('วันที่ส่ง : ') }}</label>
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
                            <label for="stdid" class="col-md-4 col-form-label text-md-end">{{ __('เวลาที่ส่ง : ') }}</label>
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
