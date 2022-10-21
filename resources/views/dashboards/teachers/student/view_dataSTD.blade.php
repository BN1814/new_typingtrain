@extends('layouts.app')

@section('content')
<style>
    input { text-align:center; }
    .col-md-6 .form-control:disabled { background:var(--bs-warning); color:var(--bs-dark); border:0; }
    .card { border:none; }
    div.container { max-width: 1200px; }
    table  { border:1px solid red; }
</style>
<div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-6 mb-2">
          <div class="card">
              <div class="card-header text-center text-white bg-dark h4">ข้อมูลนักศึกษา</div>
              <div class="card-body">
                <div class="row mb-3">
                    <label for="section_name" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อวิชา : ') }}</label>

                    <div class="col-md-6">
                        <input id="section_name" type="text" class="form-control" name="section_name" value="{{ $section->section_name }}" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="userid" class="col-md-4 col-form-label text-md-end">{{ __('รหัสนักศึกษา : ') }}</label>

                    <div class="col-md-6">
                        <input id="userid" type="text" class="form-control" name="userid" value="{{ $user->userid }}" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อ : ') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="lname" class="col-md-4 col-form-label text-md-end">{{ __('นามสกุล : ') }}</label>

                    <div class="col-md-6">
                        <input id="lname" type="text" class="form-control" name="lname" value="{{ $user->lname }}" disabled>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('อีเมล : ') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
                    </div>
                </div>
              </div>
          </div>
      </div>
      <div class="col-md-10">
        <div class="card mt-3">
            <div class="card-header text-center text-white bg-dark h4">ประวัติการทำแบบทดสอบวิชา <p class="d-inline fs-3 text-info fw-bold" style="text-transform: uppercase;">{{ $section->section_name }}</p></div>
            <div class="card-body">
                @if(count($historys) > 0)
                <table class="table table-bordered table-striped table-hover text-center" id="dataHistoryScore">
                    <thead>
                        <tr style="background: var(--bs-warning)">
                            <th>ครั้งที่</th>
                            <th>ชื่อแบบฝึกหัด</th>
                            <th>เวลา</th>
                            <th>คำที่พิมพ์ผิด</th>
                            <th>ความเร็วการพิมพ์</th>
                            <th>ความถูกต้อง</th>
                            <th>คะแนน</th>
                            <th>วันที่บันทึก</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach ($historys as $history)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $history->level_name }}</td>
                                <td>{{ $history->time }}</td>
                                <td>{{ $history->mistake }}</td>
                                <td>{{ $history->wpm }}</td>
                                <td>{{ $history->cpm }}</td>
                                <td>{{ $history->score }}</td>
                                <td>วัน{{ \Carbon\Carbon::parse($history->created_at)->thaidate('lที่ j F Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p class="text-center fw-bold mt-3 text-danger fs-6">ไม่มีประวัติการทำแบบทดสอบ</p>
                @endif
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection

@section('script')

    <script>
        $(document).ready(function() {
            $('#dataHistoryScore').DataTable( {
                lengthMenu: [
                    [ -1, 5, 10, 25, 50, 100 ],
                    [ 'ทั้งหมด', '5', '10', '25', '50', '100' ]
                ],
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
            } );
        });
    </script>
@endsection