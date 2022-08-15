@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-8 mb-2">
          <div class="card card-1">
            <div class="card-header h4 bg-dark text-center text-white">ข้อมูลส่วนตัว</div>
            <div class="card-body">
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="form-group mb-2">
                    <label for="stdid">รหัสนักศึกษา</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->userid }}" disabled>
                  </div>
                  <div class="form-group mb-2">
                    <label for="stdid">ชื่อผู้ใช้งาน</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                  </div>
                  <div class="form-group mb-2">
                    <label for="name">อีเมลผู้ใช้งาน</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="col-md-12">
          <div class="card">
            <div class="card-header h4 bg-dark text-center text-white">
              ข้อมูลแบบฝึกหัด
            </div>
            <div class="card-body">
              
            </div>
          </div>
        </div> --}}

        <div class="col-md-4">
          <div class="card card-2">
            <div class="card-header h4 bg-dark text-center text-white">แก้ไขข้อมูล</div>
            <div class="card-body">
              <form>
                <div class="form-group mb-2">
                    <label for="stdid">รหัสนักศึกษา</label>
                    <input type="text" class="form-control" name="stdid">
                  </div>
                <div class="form-group mb-2">
                  <label for="name">ชื่อผู้ใช้งาน</label>
                  <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group mb-2">
                  <label for="email">อีเมล</label>
                  <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group mb-2">
                  <label for="password">รหัสผ่าน</label>
                  <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group mb-2">
                  <button class="btn btn-success save" type="submit">บันทึก</button>
                  <button class="btn btn-danger cancel" type="submit">ยกเลิก</button>
                </div>
              </form>
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