@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 mb-2">
          <div class="card card-1">
            <div class="card-header h4 bg-dark text-center text-white">ข้อมูลส่วนตัว</div>
            <div class="card-body">
              <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row mb-3">
                      <label for="stdid" class="col-md-4 col-form-label text-md-end">{{ __('รหัสนักศึกษา') }}</label>

                      <div class="col-md-6">
                        <input type="text" class="form-control text-center" value="{{ Auth::user()->userid }}" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อผู้ใช้งาน') }}</label>

                      <div class="col-md-6">
                        <input type="text" class="form-control text-center" value="{{ Auth::user()->name }}" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('อีเมลผู้ใช้งาน') }}</label>

                      <div class="col-md-6">
                        <input type="text" class="form-control text-center" value="{{ Auth::user()->email }}" disabled>
                      </div>
                    </div>
                </div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary">
                      {{ __('แก้ไข') }}
                  </button>
              </div>
              </div>
            </div>
          </div>
        </div>

    <div class="container mt-2">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header  h4 bg-dark text-center text-white">ข้อมูลการพิมพ์</div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>ชื่อแบบทดสอบ</th>
                        <th>เวลาในการพิมพ์</th>
                        <th>คำที่ผิดพลาด</th>
                        <th>ความเร็วในการพิมพ์</th>
                        <th>ความถูกต้อง</th>
                        <th>ตัวเลือก</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($historys as $history)
                    <tr class="text-center">
                        <td>{{ $history->level }}</td>
                        <td>{{ $history->time }}</td>
                        <td>{{ $history->mistake }}</td>
                        <td>{{ $history->wpm }}</td>
                        <td>{{ $history->cpm }}</td>
                        <td class="text-center">
                            {{-- <a href="#" class="btn btn-primary btn-sm">Edit</a> --}}
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        </td>
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