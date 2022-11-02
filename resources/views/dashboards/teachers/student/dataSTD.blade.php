@extends('layouts.app')

@section('content')
<style>
    a:hover { color:#fff; }
    div.container { max-width: 1200px; }
    .card { border:none; }
</style>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('update'))
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
                    <div class="card-header text-center text-white bg-dark h4" style="padding-left: 160px;">ข้อมูลนักศึกษา
                        <button class="btn btn-primary float-end">
                            <a href="{{ url('teacher/dataSTD/' . $section->id . '/view_scores') }}">ดูคะแนนรวมของนักศึกษา</a>
                        </button>
                        <p class="text-center h4 text-info" style="margin:0; padding:0; font-weight:bold; text-transform:uppercase;">วิชา : {{ $section->section_name }}</p>
                    </div>
                    <div class="card-body">
                        @if(count($users) > 0)
                        <table class="table table-hover table-bordered" id="dataSTDtable">
                            <thead>
                                <tr style="background: var(--bs-warning)">
                                    <th>ลำดับ</th>
                                    <th>รหัสนักศึกษา</th>
                                    <th>ชื่อ</th>
                                    <th>นามสกุล</th>
                                    <th>อีเมล</th>
                                    <th>ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @php($i=1)
                                <tr>
                                @foreach ($users as $user)
                                    <input type="hidden" class="delete_user_id" value="{{ $user->id }}">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $user->userid }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->lname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">
                                        {{-- View --}}
                                        <a href="{{ url('teacher/dataSTD/'.$section->id .'/'.'view_data_student/'. $user->id ) }}" class="btn btn-primary btn-sm">ดูข้อมูล</a>
                                        {{-- Update --}}
                                        <a href="{{ url('teacher/dataSTD/'. $section->id .'/'. $user->id. '/edit') }}" class="btn btn-warning btn-sm">แก้ไข</a>
                                        {{-- Delete --}}
                                        <button class="btn btn-danger btn-sm delete" data-name="{{ $user->name }}" data-id="{{ $user->id }}">ลบ</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p class="text-center fs-5 text-danger" style="margin:0;">{{ __('วิชานี้ยังไม่มีนักศึกษาเข้าห้องเรียน') }}</p>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.delete').click( function(e) {
            e.preventDefault();
            var delete_id = $(this).closest('tr').find('.delete_user_id').val();
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
                    var data = {
                        "_token": $('input[name="_token"]').val(),
                        "id": delete_id,
                    }
                    $.ajax({
                        type: "DELETE",
                        url: "/teacher/dataSTD/" + delete_id,
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
        $('#dataSTDtable').DataTable( {
            // responsive: true,
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