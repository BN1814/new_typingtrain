@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center text-white bg-dark h4">เพื่มข้อมูลอาจารย์/นักศึกษา</div>
                    <div class="card-body">
                        <form action="{{ url('admin/dashboard') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="userid" class="col-md-4 col-form-label text-md-end">{{ __('รหัสผู้ใช้') }}</label>
    
                                <div class="col-md-6">
                                    <input id="userid" type="text" class="form-control @error('userid') is-invalid @enderror" name="userid" value="{{ old('userid') }}"  autocomplete="userid" autofocus>
    
                                    @error('userid')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อ') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lname" class="col-md-4 col-form-label text-md-end">{{ __('นามสกุล') }}</label>
    
                                <div class="col-md-6">
                                    <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}"  autocomplete="lname" autofocus>
    
                                    @error('lname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('อีเมล') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('รหัสผ่าน') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">{{ __('สถานะ') }}</label>
    
                                <div class="col-md-6">
                                    <select name="status" class="form-control">
                                        <option value="2">Teacher</option>
                                        <option value="3">Student</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('บันทึก') }}
                                    </button>
                                    <button type="reset" class="btn btn-danger">
                                        {{ __('ยกเลิก') }}
                                    </button>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <input type="submit" class="btn btn-success" value="บันทึก">
                                <input type="reset" class="btn btn-danger" value="ยกเลิก">
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <nav aria-label="Page navigation example" class="mt-3">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
            <a class="page-link" href="{{ route('hExTH')}}" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="{{ route('hExTH')}}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{ route('hExTH02')}}">2</a></li>
            <li class="page-item">
            <a class="page-link" href="{{ route('hExTH02')}}">Next</a>
            </li>
        </ul>
    </nav> --}}
@endsection