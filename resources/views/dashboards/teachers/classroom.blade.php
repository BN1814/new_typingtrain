@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/Teacher/classRoom.css') }}">
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
                @include('include.incSearch')
                <div class="card">
                    <div class="card-header bg-dark text-white h4 text-center">ห้องเรียนทั้งหมด</div>
                    <div class="card-body">
                        @if(count($sections) > 0)
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>ลำดับ</th>
                                        <th>รหัสวิชา</th>
                                        <th>ชื่อวิชา</th>
                                        <th>วันที่กำหนดส่ง</th>
                                        <th>เวลาที่กำหนดส่ง</th>
                                        <th>ตัวเลือก</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @php($i=1)
                                    @foreach ($sections as $section)
                                    <tr>
                                        <input type="hidden" class="delete_section_id" value="{{ $section->id }}">
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $section->section_sub }}</td>
                                        <td>{{ $section->section_name }}</td>
                                        <td>{{ $section->deadline_date }}</td>
                                        <td>{{ $section->deadline_time }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('teacher/dataSTD') }}" class="btn btn-primary btn-sm">ดูข้อมูล</a>
                                            <a href="{{ url('teacher/classroom/'. $section->id . '/edit') }}" class="btn btn-warning btn-sm">แก้ไข</a>
                                            <button class="btn btn-danger btn-sm delete" data-name="{{ $section->section_name }}" data-id="{{ $section->id }}">ลบ</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-center">{{ __('ไม่มีผลลัพธ์ที่ค้นหา') }}</p>
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
</script>
@endsection