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
      <div class="row justify-content-center">
        <div class="col-md-6 mb-2">
          <div class="card card-1">
            <div class="card-header h4 bg-dark text-center text-white">ข้อมูลส่วนตัว</div>
            <div class="card-body">
              <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row mb-3">
                      <label for="stdid" class="col-md-3 col-form-label text-md-end">{{ __('รหัสนักศึกษา') }}</label>

                      <div class="col-md-6">
                        <input type="text" class="form-control text-center" value="{{ Auth::user()->userid }}" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="name" class="col-md-3 col-form-label text-md-end">{{ __('ชื่อผู้ใช้งาน') }}</label>

                      <div class="col-md-6">
                        <input type="text" class="form-control text-center" value="{{ Auth::user()->name }}" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="name" class="col-md-3 col-form-label text-md-end">{{ __('นามสกุลผู้ใช้งาน') }}</label>

                      <div class="col-md-6">
                        <input type="text" class="form-control text-center" value="{{ Auth::user()->lname }}" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="email" class="col-md-3 col-form-label text-md-end">{{ __('อีเมลผู้ใช้งาน') }}</label>

                      <div class="col-md-6">
                        <input type="text" class="form-control text-center" value="{{ Auth::user()->email }}" disabled>
                      </div>
                    </div>
                </div>
                <div class="col-6">
                  <button type="submit" class="btn btn-warning" style="width: 330px;">
                      {{ __('แก้ไข') }}
                  </button>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
@endsection