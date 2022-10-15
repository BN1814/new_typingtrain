@extends('layouts.app')

@section('content')
<style>
    a:hover { color:#fff; }
    .form-control { background: #fff; }
    .form-control:focus { background: #fff; }
</style>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center text-white bg-dark h4">คะแนนการทำแบบทดสอบ
                        <p class="text-center h4 text-info" style="margin:0; padding:0; font-weight:bold; text-transform:uppercase;">วิชา : {{ $section->section_name }}</p>
                    </div>
                    <div class="card-body">
                        @if(count($historys) > 0)
                        <table cellspacing="5" cellpadding="5" style="margin-left: 180px;">
                            <tbody>
                                <tr>
                                    <td class="fw-bold">เลือกวันที่ (ก่อน) :</td>
                                    <td><input type="text" id="min" name="min" class="form-control"></td>
                                    <td>-</td>
                                    <td class="fw-bold">เลือกวันที่ (ล่าสุด) :</td>
                                    <td><input type="text" id="max" name="max" class="form-control"></td>
                                    <td>
                                        <button class="btn btn-danger">
                                            <a href="{{ url('teacher/dataSTD/' . $section->id . '/view_scores') }}">รีเซ็ต</a>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-hover table-bordered" id="dataHistorytable">
                            <thead>
                                <tr style="background: var(--bs-warning)">
                                    <th>รหัสนักศึกษา</th>
                                    <th>ชื่อ</th>
                                    <th>ชื่อแบบฝึกหัด</th>
                                    <th>คะแนน</th>
                                    <th>วันที่ส่งแบบทดสอบ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @php($i=1)
                                <tr>
                                @foreach ($historys as $history)
                                    <td>{{ $history->userid }}</td>
                                    <td>{{ $history->name }}</td>
                                    <td>{{ $history->level_name }}</td>
                                    <td>{{ $history->score }}</td>
                                    <td>{{ \Carbon\Carbon::parse($history->created_at)->format('d M Y') }}</td>
                                    {{-- <td>{{ \Carbon\Carbon::parse($history->created_at)->thaidate('D j M Y') }}</td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <p class="text-center fs-5 text-danger" style="margin:0;">{{ __('วิชานี้ยังไม่มีนักศึกษาทำแบบทดสอบ') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    var minDate, maxDate;
    $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date(data[5]);

        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    });
    $(document).ready(function() {
        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });

        var table = $('#dataHistorytable').DataTable({
            lengthMenu: [
                [ 5, 10, 25, 50, -1 ],
                [ '5', '10', '25', '50', 'All' ]
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
        });
        $('#min, #max').on('change', function () {
            table.draw();
        });
    });
</script>
@endsection