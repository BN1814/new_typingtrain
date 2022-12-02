@extends('layouts.app')
@section('title', ' | ผู้ใช้งานทั้งหมด')

@section('content')
<style>
    .fixedHeader {background:var(--bs-gray-dark); color:#fff; border:1px solid #fff}
    .card { border:0; }
    div.container { max-width: 1200px; }
    .btn-export-excel { background: var(--bs-success) !important; color: #fff !important; border: none !important; margin-left: -160px !important; }
    @media screen and (max-width: 768px) {
        .btn-export-excel { background: var(--bs-success) !important; color: #fff !important; border: none !important; margin-left: 230px !important; display: inline !important;}
    }
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
                {{-- User Table --}}
                <div class="card mb-3">
                    <div class="card-header text-white bg-dark">
                        <h4>ผู้ใช้งานทั้งหมด
                            <a href="{{ url('admin/add_data_teacher_student') }}" class="btn btn-primary float-end">เพิ่มอาจารย์/นักศึกษา</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        @if(count($users) > 0)
                            <table class="table table-hover table-striped table-bordered text-center"id="dataUser">
                                <thead>
                                    <tr class="fixedHeader">
                                        <th>ลำดับที่</th>
                                        <th>รหัสผู้ใช้งาน</th>
                                        <th>อีเมล</th>
                                        <th>ชื่อผู้ใช้</th>
                                        <th>สถานะ</th>
                                        <th>ตัวเลือก</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach ($users as $user)
                                        <tr>
                                            <input type="hidden" class="delete_user_id" value="{{ $user->id }}">
                                            <td>{{ $i++}}</td>
                                            <td>{{ $user->userid }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                {{-- <a href="{{ url('admin/view_data_teacher_student/'. $user->id) }}" class="btn btn-primary btn-sm">ดูข้อมูล</a> --}}
                                                <a href="{{ url('admin/add_data_teacher_student/'.$user->id.'/edit') }}" class="btn btn-warning btn-sm">แก้ไข</a>
                                                <button class="btn btn-danger btn-sm delete" data-name="{{ $user->name }}" data-id="{{ $user->id }}">ลบ</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-center fw-bold mt-3 text-danger fs-5">{{ __('ไม่มีข้อมูลผู้ใช้งาน')}}</p>
                        @endif
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
        $('.delete').click( function(e) {
            e.preventDefault();
            var delete_user_id = $(this).closest('tr').find('.delete_user_id').val();
            var user_name = $(this).attr('data-name');
            Swal.fire({
                title: 'ต้องการลบ',
                text: "คุณต้องการลบ "+user_name+" ใช่หรือไม่",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่ ฉันต้องการลบ',
                cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                if (result.isConfirmed) {
                    var data_user = {
                        "_token": $('input[name="_token"]').val(),
                        "id": delete_user_id,
                    }
                    $.ajax({
                        type: "DELETE",
                        url: "/admin/dashboard/" + delete_user_id,
                        data: data_user,
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
            $('#dataUser').DataTable({
            lengthMenu: [
                [ -1, 5, 10, 25, 50, 100 ],
                [ 'ทั้งหมด', '5', '10', '25', '50', '100' ]
            ],
            dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                // 'pageLength',
                {
                    extend: 'excelHtml5',
                    text: 'ดาวน์โหลด Excel',
                    filename: 'ผู้ใช้งานทั้งหมด',
                    title: '',
                    className: 'btn-export-excel'
                    columns: [ 0, 1, 2, 5 ]
                },
            ],
            responsive: true,
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