@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/Teacher/classRoom.css') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                
                <select id="select" class="mb-2">
                    <option>เลือก</option>
                    @foreach ($sections as $section)
                        <option>{{ $section->section_name }}</option>
                    @endforeach
                </select>

                <div class="card">
                    <div class="card-header bg-dark text-white h4 text-center">Section</div>
                    <div class="card-body">
                        <div class="input-group col-2 mb-2">
                            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <button type="button" class="btn btn-primary text-white">search</button>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ลำดับ</th>
                                    <th>รหัสวิชา</th>
                                    <th>ชื่อวิชา</th>
                                    <th>วันที่กำหนดส่ง</th>
                                    <th>เวลากำหนดส่ง</th>
                                    <th>ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($sections as $section)
                                <tr>
                                    <td>{{ $section->id }}</td>
                                    <td>{{ $section->section_sub }}</td>
                                    <td>{{ $section->section_name }}</td>
                                    <td>{{ $section->deadline_date }}</td>
                                    <td>{{ $section->deadline_time }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('teacher.dataSTD') }}" class="btn btn-primary btn-sm">ดูข้อมูล</a>
                                        <a href="#" class="btn btn-warning btn-sm">แก้ไข</a>
                                        <a href="#" class="btn btn-danger btn-sm">ลบ</a>
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