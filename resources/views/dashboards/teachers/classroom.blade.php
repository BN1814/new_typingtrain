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
                @elseif(session('delete'))
                    <script>
                        Swal.fire({
                            title: 'คุณต้องการลบใช่หรือไม่',
                            text: "ไม่สามารถกู้คืนได้",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#198754',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'ใช่ ฉันต้องการลบ',
                            cancelButtonText: 'ยกเลิก'
                            }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire(
                                '',
                                '{{  session('delete')}}',
                                'success'
                                )
                            }
                            else if(result.isCanceled){
                                Swal.fire(
                                '',
                                'ยังไม่ได้ลบข้อมูล',
                                'danger'
                                )
                            }
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
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $section->section_sub }}</td>
                                        <td>{{ $section->section_name }}</td>
                                        <td>{{ $section->deadline_date }}</td>
                                        <td>{{ $section->deadline_time }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('teacher/dataSTD') }}" class="btn btn-primary btn-sm">ดูข้อมูล</a>
                                            <a href="{{ url('teacher/classroom/'. $section->id . '/edit') }}" class="btn btn-warning btn-sm">แก้ไข</a>
                                            <form action="{{ url('teacher/classroom/'. $section->id) }}" method="post" class="d-inline" id="delete">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">ลบ</button>
                                            </form>
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