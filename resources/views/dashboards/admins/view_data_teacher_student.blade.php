@extends('layouts.app')
@section('title', ' | ข้อมูลผู้ใช้งาน')

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
    .card { border: none; }
</style>
<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8 mb-2">
          <div class="card">
              <div class="card-header text-center text-white bg-dark h4">ข้อมูลของอาจารย์หรือนักศึกษา</div>
              <div class="card-body">
                <form action="{{ url('admin/view_data_teacher_student/'. $user->id) }}" method="GET">

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

                    <div class="row mb-3">
                        <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('สถานะ') }}</label>
    
                        <div class="col-md-6">
                            <input id="role" type="text" class="form-control" name="role" value="{{ $user->role }}" disabled>
                        </div>
                    </div>
                </form>
              </div>
          </div>
      </div>
    </div>
  </div>
@endsection