@extends('layouts.app')

@section('content')
<style>
    * { box-sizing: border-box;margin: 0;padding: 0; }
    .card { border: none; }
</style>
{{-- <link rel="stylesheet" href="{{ asset('css/Teacher/classRoom.css') }}"> --}}
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
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
                            confirmButtonColor: '#212529',
                            ConfirmButtonText: 'ตกลง',
                            timer: 1500
                        })
                    </script>
                @endif
                <div class="card">
                    <div class="card-header bg-dark text-white h4 text-center">ห้องเรียนทั้งหมด</div>
                    <div class="card-body">
                        <table class="table table-hover table-striped table-bordered" id="classroom_teacher">
                            <thead>
                                <tr style="background: var(--bs-warning);">
                                    <th >ลำดับ</th>
                                    <th >รหัสวิชา</th>
                                    <th >ชื่อวิชา</th>
                                    <th >วันที่กำหนดส่ง</th>
                                    <th >เวลาที่กำหนดส่ง</th>
                                    <th >รหัสเข้าห้องเรียน</th>
                                    <th >ตัวเลือก</th>
                                    {{-- @sortablelink('section_sub', '.') --}}
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach ($sections as $section)
                                <tr class="text-center">
                                    <input type="hidden" class="delete_section_id" value="{{ $section->id }}">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $section->section_sub }}</td>
                                    <td>{{ $section->section_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($section->deadline_date)->thaidate('D j M y')}}</td>
                                    <td>{{ $section->deadline_time }} น.</td>
                                    <td>{{ $section->code_inclass }}</td>
                                    <td>
                                        <a href="{{ url('teacher/dataSTD/'. $section->id) }}" class="btn btn-primary btn-sm">ดูข้อมูล</a>
                                        <a href="{{ url('teacher/classroom/'. $section->id . '/edit') }}" class="btn btn-warning btn-sm">แก้ไข</a>
                                        <button class="btn btn-danger btn-sm delete" data-name="{{ $section->section_name }}">ลบ</button>
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

@section('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.delete').click( function(e) {
            e.preventDefault();
            var delete_id = $(this).closest('tr').find('.delete_section_id').val();
            var section_name = $(this).attr('data-name');
            Swal.fire({
                title: 'ต้องการลบ',
                text: "คุณต้องการลบห้องเรียน "+section_name+" ใช่หรือไม่",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่ ฉันต้องการลบ',
                cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                if (result.isConfirmed) {
                    var data = {
                        "_token": $('input[name="_token"]').val(),
                        "id": delete_id,
                    }
                    $.ajax({
                        type: "DELETE",
                        url: "/teacher/classroom/" + delete_id,
                        data: data,
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
        var table = $('#classroom_teacher').DataTable( {
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
    });
</script>
@endsection