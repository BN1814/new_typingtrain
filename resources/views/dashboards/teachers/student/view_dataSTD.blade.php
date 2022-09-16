@extends('layouts.app')

@section('content')
<style>
    input {
        text-align: center;
    }
    .form-control:disabled {
        background: var(--bs-warning);
        color: #000;
        border: 0;
    }
</style>
<div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-8 mb-2">
          {{-- @if(session('message'))
              <h4 class="alert alert-success text-center">{{ session('message') }}</h4>
          @endif --}}
          <div class="card">
              <div class="card-header text-center text-white bg-dark h4">ข้อมูลนักศึกษา</div>
              <div class="card-body">
                <div class="row mb-3">
                    <label for="section_name" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อวิชา') }}</label>

                    <div class="col-md-6">
                        <input id="section_name" type="text" class="form-control" name="section_name" value="{{ $section->section_name }}" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="userid" class="col-md-4 col-form-label text-md-end">{{ __('รหัสผู้ใช้') }}</label>

                    <div class="col-md-6">
                        <input id="userid" type="text" class="form-control" name="userid" value="{{ $user->userid }}" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อ') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="lname" class="col-md-4 col-form-label text-md-end">{{ __('นามสกุล') }}</label>

                    <div class="col-md-6">
                        <input id="lname" type="text" class="form-control" name="lname" value="{{ $user->lname }}" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('อีเมล') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
                    </div>
                </div>
              </div>
          </div>
      </div>
      <div class="col-md-10">
        <div class="card mt-3">
            <div class="card-header text-center text-white bg-dark h4">ประวัติการทำแบบทดสอบ</div>
            <div class="card-body">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th>ครั้งที่</th>
                            <th>ชื่อแบบฝึกหัด</th>
                            <th>เวลา</th>
                            <th>คำที่พิมพ์ผิด</th>
                            <th>ความเร็วการพิมพ์</th>
                            <th>ความถูกต้อง</th>
                            <th>คะแนน</th>
                            <th>วันที่บันทึก</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach ($historys as $history)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $history->level }}</td>
                                <td>{{ $history->time }}</td>
                                <td>{{ $history->mistake }}</td>
                                <td>{{ $history->wpm }}</td>
                                <td>{{ $history->cpm }}</td>
                                <td>{{ $history->score }}</td>
                                <td>{{ $history->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection