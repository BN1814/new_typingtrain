@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/Teacher/classRoom.css') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                
                <select id="select" class="mb-2">
                    <option>---เลือก---</option>
                    @foreach ($deadlines as $deadline)
                        <option>{{ $deadline->section_name }}</option>
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
                                    <th>ชื่อห้องเรียน</th>
                                    <th>วันที่กำหนดส่ง</th>
                                    <th>เวลากำหนดส่ง</th>
                                    <th>รหัสนักศึกษา</th>
                                    <th>ชื่อ</th>
                                    <th>นามสกุล</th>
                                    <th>ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($deadlines as $deadline)
                                <tr>
                                    <td>{{ $deadline->id }}</td>
                                    <td>{{ $deadline->section_name }}</td>
                                    <td>{{ $deadline->deadline_date }}</td>
                                    <td>{{ $deadline->deadline_time }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">
                                        <a href="{{ route('teacher.dataSTD') }}" class="btn btn-warning btn-sm">View</a>
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