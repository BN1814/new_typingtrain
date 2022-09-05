@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/Teacher/classRoom.css') }}">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                
                {{-- <select id="select" class="mb-2">
                    <option>เลือก</option>
                    @foreach ($sections as $section)
                        <option>{{ $section->section_name }}</option>
                    @endforeach
                </select> --}}
                @if(session('message'))
                    <h4 class="alert alert-success text-center">{{ session('message') }}</h4>
                @elseif(session('delete'))
                    <h4 class="alert alert-danger text-center">{{ session('delete') }}</h4>
                @endif

                <div class="card">
                    <div class="card-header bg-dark text-white h4 text-center">ห้องเรียนทั้งหมด</div>
                    <div class="card-body">
                        @include('include.incSearch')
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
                                        <a href="{{ route('teacher.dataSTD') }}" class="btn btn-primary btn-sm">ดูข้อมูล</a>
                                        <a href="{{ url('teacher/classroom/'. $section->id . '/edit') }}" class="btn btn-warning btn-sm">แก้ไข</a>
                                        <form action="{{ url('teacher/classroom/'. $section->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">ลบ</button>
                                        </form>
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