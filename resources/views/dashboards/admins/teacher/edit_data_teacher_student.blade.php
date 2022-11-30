@extends('layouts.app')
@section('title', ' | แก้ไขข้อมูลผู้ใช้งาน')

@section('content')
<style>
    .form-control {
        text-align: center;
    }
    .card { border: none; }
</style>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session('message'))
                    <h4 class="alert alert-success">{{ session('message') }}</h4>
                @endif
                <div class="card">
                    <div class="card-header text-center text-white bg-dark h4">แก้ไขข้อมูลอาจารย์/นักศึกษา</div>
                    <div class="card-body">
                        <form action="{{ url('admin/add_data_teacher_student/'. $user->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                                <label for="userid" class="col-md-4 col-form-label text-md-end">{{ __('รหัสอาจารย์หรือนักศึกษา : ') }}</label>
    
                                <div class="col-md-6">
                                    <input id="userid" type="text" class="form-control @error('userid') is-invalid @enderror" name="userid" autocomplete="userid" value="{{ $user->userid }}">
    
                                    {{-- @error('userid')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อผู้ใช้งาน : ') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="name" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lname" class="col-md-4 col-form-label text-md-end">{{ __('นามสกุล : ') }}</label>
    
                                <div class="col-md-6">
                                    <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" autocomplete="lname" value="{{ $user->lname }}">
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('อีเมล : ') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="email" value="{{ $user->email }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('สถานะ : ') }}</label>
    
                                <div class="col-md-6">
                                    <select name="status" class="form-control">
                                        {{-- <option value="{{  $user->status }}">{{ $user->role }}</option> --}}
                                        @if($user->role == 'admin')
                                            <option value="admin">{{ $user->role }}</option>
                                            <option value="teacher">teacher</option>
                                            <option value="student">student</option>
                                        @elseif($user->role == 'teacher')
                                            <option value="teacher">{{ $user->role }}</option>
                                            <option value="admin">admin</option>
                                            <option value="student">student</option>
                                        @elseif($user->role == 'student')
                                            <option value="student">{{ $user->role }}</option>
                                            <option value="admin">admin</option>
                                            <option value="teacher">teacher</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-warning form-control">
                                        {{ __('อัพเดตข้อมูล') }}
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