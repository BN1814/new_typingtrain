@extends('layouts.app')
{{-- @section('title', 'Dashboard') --}}

@section('content')
<style>
    tr.fixedHeader {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        background: var(--bs-gray-dark);
        color: #fff;
        border: none;
        outline: none;
    }
    .card-body {
        padding: 0; margin: 0;
        overflow-y: scroll; 
        height: 230px;
    }
    .card-body::-webkit-scrollbar {
        /* width: 0; */
        display: none;
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
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-center fixedHeader">
                                        <th>ลำดับที่</th>
                                        <th>รหัสผู้ใช้งาน</th>
                                        <th>อีเมล</th>
                                        <th>ชื่อผู้ใช้</th>
                                        <th>สถานะ</th>
                                        <th>ตัวเลือก</th>
                                    </tr>
                                </thead>
                                <tbody style="border: var(--bs-dark);">
                                    @php($i=1)
                                    @foreach ($users as $user)
                                        <tr class="text-center">
                                            <input type="hidden" class="delete_user_id" value="{{ $user->id }}">
                                            <td>{{ $i++}}</td>
                                            <td>{{ $user->userid }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('admin/view_data_teacher_student/'. $user->id) }}" class="btn btn-primary btn-sm">ดูข้อมูล</a>
                                                <a href="{{ url('admin/add_data_teacher_student/'.$user->id.'/edit') }}" class="btn btn-warning btn-sm">แก้ไข</a>
                                                <button class="btn btn-danger btn-sm delete" data-name="{{ $user->name }}" data-id="{{ $user->id }}">ลบ</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-center mt-2">{{ __('ไม่มีผลลัพธ์ที่ค้นหา')}}</p>
                        @endif
                    </div>
                </div>

                {{-- Exercise Table --}}
                <div class="card mb-3">
                    <div class="card-header text-white bg-dark">
                        <h4>แบบฝึกหัดทั้งหมด
                            <a href="{{ url('admin/add_data_exercises') }}" class="btn btn-primary float-end">เพิ่มแบบฝึกหัด</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        @if(count($exercises) > 0)
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr class="text-center fixedHeader">
                                        <th>ลำดับที่</th>
                                        <th>ระดับ</th>
                                        <th>ชื่อแบบฝึกหัด</th>
                                        <th>ข้อมูลแบบฝึกหัด</th>
                                        <th>ตัวเลือก</th>
                                    </tr>
                                </thead>
                                <tbody style="border: var(--bs-secondary); color: #000;">
                                    @php($i=1)
                                    @foreach ($exercises as $exercise)
                                        <tr>
                                            <input type="hidden" class="delete_exercise_id" value="{{ $exercise->id }}">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $exercise->level }}</td>
                                            <td>{{ $exercise->level_name }}</td>
                                            <td>{{ Str::limit($exercise->data_level, 80 )}}</td>
                                            <td>
                                                <a href="{{ url('admin/add_data_exercises/'.$exercise->id.'/edit') }}" class="btn btn-warning btn-sm">แก้ไข</a>
                                                <button class="btn btn-danger btn-sm delete_ex" data-name="{{ $exercise->level_name }}" data-id="{{ $exercise->id }}">ลบ</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-center mt-2">{{ __('ไม่มีผลลัพธ์ที่ค้นหา')}}</p>
                        @endif
                    </div>
                </div>
                {{-- Section Table --}}
                <div class="card mb-3">
                    <div class="card-header text-white bg-dark">
                        <h4>ห้องเรียนทั้งหมด</h4>
                    </div>
                    <div class="card-body">
                        @if(count($sections) > 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-center fixedHeader">
                                        <th>ลำดับ</th>
                                        <th>ชื่อห้องเรียน</th>
                                        <th>รหัสเข้าห้อง</th>
                                        <th>วันที่ส่ง</th>
                                        <th>เวลาที่ส่ง</th>
                                        <th>ตัวเลือก</th>
                                    </tr>
                                </thead>
                                <tbody style="border: var(--bs-dark);">
                                    @php($i=1)
                                    @foreach ($sections as $section)
                                    <tr class="text-center">
                                        <input type="hidden" class="delete_section_id" value="{{ $section->id }}">
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $section->section_name }}</td>
                                        <td>{{ $section->code_inclass }}</td>
                                        <td>{{ $section->deadline_date }}</td>
                                        <td>{{ $section->deadline_time }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('admin/data_section/'. $section->id . '/edit') }}" class="btn btn-warning btn-sm">แก้ไข</a>
                                            <button class="btn btn-danger btn-sm delete_sect" data-name="{{ $section->section_name }}" data-id="{{ $section->id }}">ลบ</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-center mt-2">{{ __('ไม่มีผลลัพธ์ที่ค้นหา')}}</p>
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
</script>
@endsection