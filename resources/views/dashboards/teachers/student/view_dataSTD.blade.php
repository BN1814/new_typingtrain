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
<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8 mb-2">
          {{-- @if(session('message'))
              <h4 class="alert alert-success text-center">{{ session('message') }}</h4>
          @endif --}}
          <div class="card">
              <div class="card-header text-center text-white bg-dark h4">ข้อมูลนักศึกษา</div>
              <div class="card-body">
                <form action="{{ url('teacher/view_data_student'. $user->id) }}" method="GET">
                    <div class="row mb-3">
                        <label for="section_name" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อวิชา') }}</label>
    
                        <div class="col-md-6">
                            <input id="section_name" type="text" class="form-control" name="section_name" value="{{ $user->section_name }}" disabled>
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
                </form>
              </div>
          </div>
      </div>
    </div>
  </div>
@endsection