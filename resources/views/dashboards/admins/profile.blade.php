@extends('layouts.app')

@section('content')
<style>
  .container {
    position: relative;
  }
  .card-2 {
    position: absolute;
    right: 0;
    top: 0;
  }
  .form-control {
    width: 330px;
  }
</style>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="card card-1">
            <div class="card-header h4 bg-dark text-center text-white">ข้อมูลส่วนตัว</div>
            <div class="card-body">
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <label class="control-label">ชื่อผู้ใช้งาน : <span class="fw-bold">{{ Auth::user()->name }}</span>
                </div>
                <div class="col-md-8">
                  <label class="control-label">อีเมล : <span class="fw-bold">{{ Auth::user()->email }}</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card card-2">
            <div class="card-header h4 bg-dark text-center text-white">แก้ไขข้อมูล</div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                      <strong>{{$message}}</strong>
                    </div>
                @endif
              {{-- action="{{ route('admin.dashboard') }}" method="post --}}
              <form action="{{ route('udProfile') }}" method="post">
                @csrf
                <div class="form-group mb-2">
                  <label for="name">ชื่อผู้ใช้งาน</label>
                  <input type="text" class="form-control" name="name" placeholder="{{ Auth::user()->name }}">
                </div>
                <div class="form-group mb-2">
                  <label for="email">อีเมล</label>
                  <input type="email" class="form-control" name="email" placeholder="{{ Auth::user()->email }}">
                </div>
                {{-- <div class="form-group mb-2">
                  <label for="password">รหัสผ่าน</label>
                  <input type="password" class="form-control" name="password">
                </div> --}}
                <div class="form-group mb-2" style="margin-left: 105px;">
                  <button class="btn btn-success save" type="submit">บันทึก</button>
                  <button class="btn btn-danger cancel" type="submit">ยกเลิก</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection