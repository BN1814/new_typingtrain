@extends('layouts.app')
@section('title', ' | ห้องเรียนทั้งหมด')

@section('content')
<style>
    .fixedHeader { background:var(--bs-gray-dark); color:#fff; border:1px solid #fff }
    .card { border:0; }
    div.container { max-width: 1200px; }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(Auth::user()->role == 'admin')
                @if(session('message'))
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: '{{ session('message') }}',
                            showConfirmButton: false,
                            ConfirmButtonText: 'ตกลง',
                            timer: 1500
                        })
                    </script>
                @elseif(session('update'))
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
                {{-- Section Table --}}
                <div class="card mb-3">
                    <div class="card-header text-white bg-dark">
                        <h4>ห้องเรียนทั้งหมด</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered text-center" id="dataClassroom">
                            <thead>
                                <tr class="fixedHeader">
                                    <th>ลำดับ</th>
                                    <th>ชื่ออาจารย์</th>
                                    <th>ชื่อห้องเรียน</th>
                                    <th>รหัสเข้าห้อง</th>
                                    <th>วันที่ส่ง</th>
                                    <th>เวลาที่ส่ง</th>
                                    <th>ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach ($sections as $section)
                                <tr>
                                    <input type="hidden" class="delete_section_id" value="{{ $section->id }}">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $section->name }}</td>
                                    <td>{{ $section->section_name }}</td>
                                    <td>{{ $section->code_inclass }}</td>
                                    <td>วัน{{ \Carbon\Carbon::parse($section->deadline_date)->thaidate('lที่ j F Y') }}</td>
                                    <td>{{ $section->deadline_time }} น.</td>
                                    <td>
                                        <a href="{{ url('admin/data_section/'. $section->id . '/edit') }}" class="btn btn-warning btn-sm">แก้ไข</a>
                                        <button class="btn btn-danger btn-sm delete_sect" data-name="{{ $section->section_name }}" data-id="{{ $section->id }}">ลบ</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.delete_sect').click( function(e) {
            e.preventDefault();
            var delete_section_id = $(this).closest('tr').find('.delete_section_id').val();
            var section_name = $(this).attr('data-name');
            Swal.fire({
                title: 'ต้องการลบ',
                text: "คุณต้องการลบ "+section_name+" ใช่หรือไม่",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่ ฉันต้องการลบ',
                cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                if (result.isConfirmed) {
                    var data_sect = {
                        "_token": $('input[name="_token"]').val(),
                        "id": delete_section_id,
                    }
                    $.ajax({
                        type: "DELETE",
                        url: "/admin/data_section/" + delete_section_id,
                        data: data_sect,
                        success: function(response) {
                            Swal.fire(response.delete, {
                                icon: 'success',
                            })
                            .then((result) => {
                                location.reload();
                            });
                        }
                    });
                }
            })
        });
    });

    $(document).ready(function() {
            $('#dataClassroom').DataTable( {
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