@extends('layouts.app')

@section('content')
<style>
    .card { border:none; }
    input { text-align:center;}
</style>
    <div class="container mt-3">
      <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header text-center text-white bg-dark h4">ประวัติการทำแบบทดสอบ</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover text-center" id="data_history">
                        <thead>
                            <tr class="text-dark" style="background: rgb(247, 191, 70);">
                                <th>ครั้งที่</th>
                                <th>ชื่อวิชา</th>
                                <th>ชื่อแบบฝึกหัด</th>
                                <th>เวลาที่ใช้ไป</th>
                                <th>ตัวอักษรที่พิมพ์ผิด</th>
                                <th>ความเร็วการพิมพ์</th>
                                <th>ความถูกต้อง</th>
                                <th>คะแนน</th>
                                <th>บันทึกเมื่อวันที่</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach ($historys as $history)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $history->section_name }}</td>
                                    <td>{{ $history->level_name }}</td>
                                    <td>{{ $history->time }} <p class="ms-1 d-inline">วินาที</p></td>
                                    <td>{{ $history->mistake }}  <p class="ms-1 d-inline">ตัว</p></td>
                                    <td>{{ $history->wpm }}  <p class="ms-1 d-inline">ตัวต่อนาที</p></td>
                                    <td>{{ $history->cpm }}  <p class="ms-1 d-inline">%</p></td>
                                    <td>{{ $history->score }}  <p class="ms-1 d-inline">คะแนน</p></td>
                                    <td>{{ \Carbon\Carbon::parse($history->created_at)->thaidate('l j F Y') }}</td>
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