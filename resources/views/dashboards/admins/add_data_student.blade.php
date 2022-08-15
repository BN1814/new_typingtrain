@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center text-white bg-dark h4">เพิ่มนักศึกษา</div>
                    <div class="card-body">
                        <form>
                            {{-- action="{{ route('createTeacher') }}" method="post"--}}
                            {{-- @csrf --}}
                            <div class="form-group mb-3">
                                <label for="text">รหัสนักศึกษา</label>
                                <input type="text" class="form-control" name="userid" value="{{ old('userid') }}">
                                {{-- @error('userid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">ชื่อ</label>
                                <input type="text" class="form-control" name="name" value=" {{ old('name') }}" required>
                                {{-- @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                            <div class="form-group mb-3">
                                <label for="lname">นามสกุล</label>
                                <input type="text" class="form-control" name="lname" value=" {{ old('lname') }}" required>
                                {{-- @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">อีเมล</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">รหัสผ่าน</label>
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="บันทึก">
                                <input type="reset" class="btn btn-danger" value="ยกเลิก">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection