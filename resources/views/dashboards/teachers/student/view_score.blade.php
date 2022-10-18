@extends('layouts.app')

@section('content')
<style>
    .card { border:none; }
    a:hover { color:#fff; }
    .form-control { background: #fff; }
    .form-control:focus { background: #fff; }
    .btn-export-excel { background: var(--bs-success) !important; color: #fff !important; border: none !important; width: 100px !important; margin-left: 42px !important; }
    /* .btn-export-pdf { background: var(--bs-danger) !important; color: #fff !important; border: none !important; } */
    .btn-export-print { background: var(--bs-success) !important; color: var(--bs-light) !important; border: none !important; width: 100px !important; }
    div.container { max-width: 1200px; }
    @media screen and (max-width:1500px) {
        .datePicker { margin-left:225px; }
    }
    @media screen and (max-width: 768px) {
        .datePicker { margin-left:0; }
        .formcontrol { width:300px; }
    }
</style>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center text-white bg-dark h4">คะแนนการทำแบบทดสอบรวม
                        <p class="text-center h4 text-info" style="margin:0; padding:0; font-weight:bold; text-transform:uppercase;">วิชา : {{ $section->section_name }}</p>
                    </div>
                    <div class="card-body">
                        @if(count($historys) > 0)
                        <table cellspacing="5" cellpadding="5" class="datePicker">
                            <tbody>
                                <tr>
                                    <td class="fw-bold">เลือกวันที่ (ก่อน) :</td>
                                    <td><input type="text" id="min" name="min" class="form-control form-control-sm"></td>
                                    <td>-</td>
                                    <td class="fw-bold">เลือกวันที่ (ล่าสุด) :</td>
                                    <td><input type="text" id="max" name="max" class="form-control form-control-sm"></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm">
                                            <a href="{{ url('teacher/dataSTD/' . $section->id . '/view_scores') }}">รีเซ็ต</a>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-hover table-bordered display nowrap" id="dataHistorytable" style="width:100%;">
                            <thead>
                                <tr style="background: var(--bs-warning)">
                                    <th>รหัสนักศึกษา</th>
                                    <th>ชื่อ</th>
                                    <th>ชื่อแบบฝึกหัด</th>
                                    <th>คะแนนสูงสุด</th>
                                    <th>วันที่ส่งแบบทดสอบ</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @php($i=1)
                                <tr>
                                @foreach ($historys as $history)
                                    {{-- <td class="bg-danger text-white">{{ $history->userid }}</td> --}}
                                    <td>{{ $history->userid }}</td>
                                    <td>{{ $history->name }}</td>
                                    <td>{{ $history->level_name }}</td>
                                    {{-- <td>{{ $history->score }}</td> --}}
                                    <td>{{ $history->score_max }} <p class="d-inline ms-2">คะแนน</p></td>
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
        var date = new Date(data[4]);

        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date && max === null ) ||
            // ( date <= min && max === null ) ||
            // ( min === date && max === null ) ||
            ( min <= date && date <= max )
            // ( date <= min && date <= max )
        ) {
            return true;
        }
        return false;
    });
    $(document).ready(function() {
        minDate = new DateTime($('#min'), {
            format: 'D MMM YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'D MMM YYYY'
        });

        var table = $('#dataHistorytable').DataTable({
            lengthMenu: [
                [ -1, 5, 10, 30, 50, 100 ],
                [ 'ทั้งหมด', '5', '10', '30', '50', '100' ]
            ],
            // dom: "Bfrtip",
            dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                // 'pageLength',
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    filename: 'คะแนนการทำแบบทดสอบรวม',
                    title: '',
                    className: 'btn-export-excel'
                },
                // {
                //     extend: 'pdfHtml5',
                //     text: 'PDF',
                //     filename: 'คะแนนการทำแบบทดสอบรวม',
                //     title: '',
                //     className: 'btn-export-pdf'
                // },
                {
                    extend: 'print',
                    text: 'พิมพ์เอกสาร',
                    title: '',
                    className: 'btn-export-print'
                }
            ],
            responsive: true,
            "language": {
                "decimal":        "",
                // "emptyTable":     "ไม่มีผลลัพธ์ที่ค้นหา",
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
            },
            // columnDefs: [
            //     {
            //         targets: 4,
            //         visible: false
            //     }
            // ],
        });
        $('#min, #max').on('change', function () {
            table.draw();
        });
    });
</script>
@endsection