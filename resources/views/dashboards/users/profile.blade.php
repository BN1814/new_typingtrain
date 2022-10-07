@extends('layouts.app')

@section('content')
<style>
    .card {
        border: none;
    }
  input {
    text-align: center;
  }
</style>
    <div class="container mt-4">
      <div class="row justify-content-center">
        <div class="col-md-7 mb-2">
            @if(session('update'))
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: '{{ session('update') }}',
                        showConfirmButton: false,
                        ConfirmButtonText: 'ตกลง',
                        timer: 1500
                    })
                </script>
            @endif
            <div class="card">
                <div class="card-header text-center text-white bg-dark h4">ข้อมูลส่วนตัว</div>
                <div class="card-body">
                    <form action="{{ url('user/profile/'. $user->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label for="userid" class="col-md-4 col-form-label text-md-end">{{ __('รหัสผู้ใช้') }}</label>

                            <div class="col-md-6">
                                <input id="userid" type="text" class="form-control @error('userid') is-invalid @enderror" name="userid" autocomplete="userid" autofocus value="{{ $user->userid }}">

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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="name" autofocus value="{{ $user->name }}">

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
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" autocomplete="lname" autofocus value="{{ $user->lname }}">

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="email" value="{{ $user->email }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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

        <div class="col-md-11">
            <div class="card mt-3">
                <div class="card-header text-center text-white bg-dark h4">ประวัติการทำแบบทดสอบ</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover text-center" id="data_history">
                        <thead>
                            <tr class="text-white bg-dark">
                                <th>ครั้งที่</th>
                                <th>ชื่อวิชา</th>
                                <th>ชื่อแบบฝึกหัด</th>
                                <th>เวลาที่ใช้ไป</th>
                                <th>คำที่พิมพ์ผิด</th>
                                <th>ความเร็วการพิมพ์</th>
                                <th>ความถูกต้อง</th>
                                <th>คะแนน</th>
                                <th>ใช้งานเมื่อ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach ($historys as $history)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $history->section_name }}</td>
                                    <td>{{ $history->level_name }}</td>
                                    <td>{{ $history->time }}</td>
                                    <td>{{ $history->mistake }}</td>
                                    <td>{{ $history->wpm }}</td>
                                    <td>{{ $history->cpm }}</td>
                                    <td>{{ $history->score }}</td>
                                    <td>{{ \Carbon\Carbon::parse($history->created_at)->diffForHumans() }}</td>
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

@section('script')
<script>
    $(document).ready(function() {
        $('#data_history').DataTable( {
            "language": {
                "decimal":        "",
                "emptyTable":     "ไม่มีผลลัพธ์ที่ค้นหา",
                "info":           "แสดง _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ",
                "infoEmpty":      "แสดง 0 ถึง 0 จากทั้งหมด 0 รายการ",
                "infoFiltered":   "(ค้นหาทั้งหมดจาก _MAX_ รายการ)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "แสดง _MENU_ รายการ",
                "loadingRecords": "กำลังค้นหา...",
                "processing":     "",
                "search":         "ค้นหา:",
                "zeroRecords":    "ไม่มีผลลัพธ์ที่ค้นหา",
                "paginate": {
                    "first":      "หน้าแรก",
                    "last":       "หน้าสุดท้าย",
                    "next":       "หน้าถัดไป",
                    "previous":   "หน้าก่อนหน้า"
                },
                "aria": {
                "sortAscending":  ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
                }
            }
        });
    });
</script>
@endsection