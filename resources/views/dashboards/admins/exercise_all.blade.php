@extends('layouts.app')

@section('content')
<style>
    .fixedHeader {background:var(--bs-gray-dark); color:#fff; border:1px solid #fff}
    .card { border:0; }
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
                {{-- Exercise Table --}}
                <div class="card mb-3">
                    <div class="card-header text-white bg-dark">
                        <h4>แบบฝึกหัดทั้งหมด
                            <a href="{{ url('admin/add_data_exercises') }}" class="btn btn-primary float-end">เพิ่มแบบฝึกหัด</a>
                        </h4>
                    </div>
                    <div class="card-body">
                            <table class="table table-hover table-bordered text-center" id="dataExercise">
                                <thead>
                                    <tr class="fixedHeader">
                                        {{-- <th>ลำดับที่</th> --}}
                                        <th>ระดับ</th>
                                        <th>ชื่อแบบฝึกหัด</th>
                                        <th>ข้อมูลแบบฝึกหัด</th>
                                        <th>ตัวเลือก</th>
                                    </tr>
                                </thead>
                                <tbody style="background: var(--bs-warning); border: 1px solid #fff">
                                    @php($i=1)
                                    @foreach ($exercises as $exercise)
                                        <tr>
                                            <input type="hidden" class="delete_exercise_id" value="{{ $exercise->id }}">
                                            {{-- <td>{{ $i++ }}</td> --}}
                                            <td>{{ $exercise->level }}</td>
                                            <td>{{ $exercise->level_name }}</td>
                                            <td>{{ Str::limit($exercise->data_level, 80 )}}</td>
                                            <td>
                                                <a href="{{ url('admin/add_data_exercises/'.$exercise->id.'/edit') }}" class="btn btn-primary btn-sm">แก้ไข</a>
                                                <button class="btn btn-danger btn-sm delete_ex" data-name="{{ $exercise->level_name }}" data-id="{{ $exercise->id }}">ลบ</button>
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
        });
        $('.delete_ex').click( function(e) {
            e.preventDefault();
            var delete_exercise_id = $(this).closest('tr').find('.delete_exercise_id').val();
            var exercise_name = $(this).attr('data-name');
            Swal.fire({
                title: 'ต้องการลบ',
                text: "คุณต้องการลบ "+exercise_name+" ใช่หรือไม่",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่ ฉันต้องการลบ',
                cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                if (result.isConfirmed) {
                    var data_ex = {
                        "_token": $('input[name="_token"]').val(),
                        "id": delete_exercise_id,
                    }
                    $.ajax({
                        type: "DELETE",
                        url: "/admin/add_data_exercises/" + delete_exercise_id,
                        data: data_ex,
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

    $(document).ready(function() {
        $('#dataExercise').DataTable( {
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