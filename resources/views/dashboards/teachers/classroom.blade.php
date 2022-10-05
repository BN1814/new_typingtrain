@extends('layouts.app')

@section('content')
<style>
    .headtable {
        color: blue;
        
    }
</style>
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
                            <table class="table table-hover table-bordered" >
                                <thead >
                                    <tr class="text-center ">
                                        <th >ลำดับ</th>
                                        <th class="text-primary">@sortablelink('section_sub' ,'รหัสวิชา')</th>
                                        <th >@sortablelink('section_name' ,'ชื่อวิชา')</th>
                                        <th >@sortablelink('deadline_date' ,'วันที่กำหนดส่ง')</th>
                                        <th >@sortablelink('deadline_time' ,'เวลาที่กำหนดส่ง')</th>
                                        <th >ตัวเลือก</th>
                                        {{-- <th scope="col">ลำดับ</th>
                                        <th scope="col">
                                            รหัสวิชา
                                            <span  class="float-right text-sm" >
                                                <i class="fa fa-arrow-up "></i>
                                                <i class="fa fa-arrow-down "></i>
                                            </span>
                                        </th>
                                        <th scope="col">ชื่อวิชา</th>
                                        <th scope="col">วันที่กำหนดส่ง</th>
                                        <th scope="col">เวลาที่กำหนดส่ง</th>
                                        <th scope="col">ตัวเลือก</th> --}}
                                        {{-- <th>ลำดับ</th>
                                        <th><a href="sorting.php?sort=section_sub">รหัสวิชา</a></th>
                                        <th><a href={{url('section/secction_name')}}>ชื่อวิชา</a></th>
                                        <th><a href={{url('section/deadline_date')}}>วันที่กำหนดส่ง</a></th>
                                        <th><a href={{url('section/deadline_time')}}>เวลาที่กำหนดส่ง</a></th>
                                        <th>ตัวเลือก</th> --}}
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
                                        <td>{{ $section->deadline_date}}</td>
                                        <td>{{ $section->deadline_time }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('teacher/dataSTD/'. $section->id) }}" class="btn btn-primary btn-sm">ดูข้อมูล</a>
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
    
    // $(document).ready(function() {
    // $("#example").DataTable();
    // });
</script>
@endsection