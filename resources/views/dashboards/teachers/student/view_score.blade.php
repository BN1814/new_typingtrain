@extends('layouts.app')
@section('title', ' | ข้อมูลการทำแบบทดสอบทั้งหมด')

@section('content')
<style>
    .card { border:none; }
    a:hover { color:#fff; }
    .form-control { background: #fff; }
    .form-control:focus { background: #fff; }
    .btn-export-excel { background: var(--bs-success) !important; color: #fff !important; border: none !important; margin-left: 42px !important; }
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
                                    <th>ชื่อแบบทดสอบ</th>
                                    <th>คะแนนสูงสุด</th>
                                    <th>วันที่ส่งแบบทดสอบ (เดือน/วัน/ปี)</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @php($i=1)                               
                                @foreach ($historys as $history)
                                <tr>
                                    @foreach ($sectiondeadlines as $sectiondeadline)
                                        @if($sectiondeadline->deadline_date == \Carbon\Carbon::parse($history->created_at)->format('Y-m-d'))
                                            @if($sectiondeadline->deadline_time < \Carbon\Carbon::parse($history->created_at)->format('H:i'))
                                                {{-- <td class="bg-danger text-white">{{ $history->userid }}</td> --}}
                                                <td class="bg-danger text-white">{{ $history->userid }}</td>
                                                <td class="bg-danger text-white">{{ $history->name }}</td>
                                                <td class="bg-danger text-white">{{ $history->level_name }}</td>
                                                {{-- <td>{{ $history->score }}</td> --}}
                                                <td class="bg-danger text-white">{{ $history->score }} <p class="d-inline ms-2">คะแนน</p></td>
                                                <td class="bg-danger text-white">{{ \Carbon\Carbon::parse($history->created_at)->format('m/d/Y') }}</td>
                                                {{-- <td>{{ \Carbon\Carbon::parse($history->created_at)->thaidate('m/d/Y') }}</td> --}}
                                            @else
                                                {{-- <td class="bg-danger text-white">{{ $history->userid }}</td> --}}
                                                <td>{{ $history->userid }}</td>
                                                <td>{{ $history->name }}</td>
                                                <td>{{ $history->level_name }}</td>
                                                {{-- <td>{{ $history->score }}</td> --}}
                                                <td>{{ $history->score }} <p class="d-inline ms-2">คะแนน</p></td>
                                                <td>{{ \Carbon\Carbon::parse($history->created_at)->format('m/d/Y') }}</td>
                                                {{-- <td>{{ \Carbon\Carbon::parse($history->created_at)->thaidate('m/d/Y') }}</td> --}}
                                            @endif
                                        @elseif($sectiondeadline->deadline_date < \Carbon\Carbon::parse($history->created_at)->format('Y-m-d'))
                                            {{-- <td class="bg-danger text-white">{{ $history->userid }}</td> --}}
                                            <td class="bg-danger text-white">{{ $history->userid }}</td>
                                            <td class="bg-danger text-white">{{ $history->name }}</td>
                                            <td class="bg-danger text-white">{{ $history->level_name }}</td>
                                            {{-- <td>{{ $history->score }}</td> --}}
                                            <td class="bg-danger text-white">{{ $history->score }} <p class="d-inline ms-2">คะแนน</p></td>
                                            <td class="bg-danger text-white">{{ \Carbon\Carbon::parse($history->created_at)->format('m/d/Y') }}</td>
                                            {{-- <td>{{ \Carbon\Carbon::parse($history->created_at)->thaidate('m/d/Y') }}</td> --}}
                                        @else
                                            {{-- <td class="bg-danger text-white">{{ $history->userid }}</td> --}}
                                            <td>{{ $history->userid }}</td>
                                            <td>{{ $history->name }}</td>
                                            <td>{{ $history->level_name }}</td>
                                            {{-- <td>{{ $history->score }}</td> --}}
                                            <td>{{ $history->score }} <p class="d-inline ms-2">คะแนน</p></td>
                                            <td>{{ \Carbon\Carbon::parse($history->created_at)->format('m/d/Y') }}</td>
                                            {{-- <td>{{ \Carbon\Carbon::parse($history->created_at)->thaidate('m/d/Y') }}</td> --}}
                                        @endif
                                    @endforeach
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
    // var minDate, maxDate;
    $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        let min = ($('#min').val() == '') ? null :
        new Date( $('#min').val() ).setUTCHours(0,0,0,0);
        
        let max = ($('#max').val() == '') ? null :
        new Date( $('#max').val() ).setUTCHours(23,59,59,59);
        // var min = minDate.val();
        // var max = maxDate.val();
        var date = new Date( data[4] );
 
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
            format: 'MM/DD/YYYY',
        });
        maxDate = new DateTime($('#max'), {
            format: 'MM/DD/YYYY',
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
                    text: 'ดาวน์โหลด Excel',
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
            order: [[4, 'desc']],
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
                "datetime": {
                    "amPm": [
                        "เที่ยงวัน",
                        "เที่ยงคืน"
                    ],
                    "hours": "ชั่วโมง",
                    "minutes": "นาที",
                    "months": {
                        "0": "มกราคม",
                        "1": "กุมภาพันธ์",
                        "10": "พฤศจิกายน",
                        "11": "ธันวาคม",
                        "2": "มีนาคม",
                        "3": "เมษายน",
                        "4": "พฤษภาคม",
                        "5": "มิถุนายน",
                        "6": "กรกฎาคม",
                        "7": "สิงหาคม",
                        "8": "กันยายน",
                        "9": "ตุลาคม"
                    },
                    "next": "ถัดไป",
                    "previous": "ก่อนกน้า",
                    "seconds": "วินาที",
                    "unknown": "ไม่ทราบ",
                    "weekdays": [
                        "อาทิตย์",
                        "จันทร์",
                        "อังคาร",
                        "พุธ",
                        "พฤหัส",
                        "ศุกร์",
                        "เสาร์"
                    ]
                },
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