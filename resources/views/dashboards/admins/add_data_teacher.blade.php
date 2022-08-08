@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center text-white bg-dark h4">เพื่มอาจารย์</div>
                    <div class="card-body">
                        {{-- @if($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                        @elseif($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif --}}
                        <form>
                            {{-- action="{{ route('createTeacher') }}" method="post"--}}
                            {{-- @csrf --}}
                            <div class="form-group mb-3">
                                <label for="name">ชื่อผู้ใช้งาน</label>
                                <input type="text" class="form-control" name="name" value=" {{ old('name') }}" required>
                                {{-- @error('name')
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
                                <input type="submit" class="btn btn-danger" value="ยกเลิก">
                            </div>
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