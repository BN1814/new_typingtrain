{{-- @extends('dashboards.admins.layouts.admin-dash-layout') --}}
@extends('layouts.app')
{{-- @section('title', 'Dashboard') --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Auth::user()->role == 1)
                <div class="card mb-3">
                    <div class="card-header text-center text-white bg-dark h4">รหัสเข้าห้องเรียน</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>รหัสเข้าห้อง</th>
                                    <th>วันที่ส่ง</th>
                                    <th>เวลาที่ส่ง</th>
                                    <th>ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deadlines as $deadline)
                                <tr>
                                    <td>{{ $deadline->code_inclass }}</td>
                                    <td>{{ $deadline->deadline_date }}</td>
                                    <td>{{ $deadline->deadline_time }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header text-center text-white bg-dark h4">ห้องเรียนทั้งหมด</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>Section</th>
                                    <th>รหัสห้องเรียน</th>
                                    <th>ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>01</td>
                                    <td>cdslmsd</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm">View</a>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header text-center text-white bg-dark h4">ผู้ใช้งานทั้งหมด</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ลำดับที่</th>
                                    <th>อีเมล</th>
                                    <th>ชื่อผู้ใช้</th>
                                    <th>ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center">{{ $user->id }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary btn-sm">View</a>
                                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
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