{{-- @extends('dashboards.admins.layouts.admin-dash-layout') --}}
@extends('layouts.app')
{{-- @section('title', 'Dashboard') --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(Auth::user()->role == 'admin')
                @if(session('message'))
                    <h4 class="alert alert-success">{{ session('message') }}</h4>
                @endif
                <form action="{{ url('admin/dashboard') }}" method="get">
                    <div class="input-group col-2 mb-2">
                        <input type="search" class="form-control rounded" placeholder="ค้นหา" aria-label="Search" aria-describedby="search-addon" name="search">
                        <button type="submit" class="btn btn-primary text-white">ค้นหา</button>
                    </div>
                </form>
                {{-- <div class="card mb-3">
                    <div class="card-header text-center text-white bg-dark h4">รหัสเข้าห้องเรียน</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ลำดับ</th>
                                    <th>ชื่อห้องเรียน</th>
                                    <th>รหัสเข้าห้อง</th>
                                    <th>วันที่ส่ง</th>
                                    <th>เวลาที่ส่ง</th>
                                    <th>ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sections as $section)
                                <tr class="text-center">
                                    <td>{{ $section->id }}</td>
                                    <td>{{ $section->section_name }}</td>
                                    <td>{{ $section->code_inclass }}</td>
                                    <td>{{ $section->deadline_date }}</td>
                                    <td>{{ $section->deadline_time }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}
                <div class="card mb-3">
                    <div class="card-header text-white bg-dark">
                        <h4>ผู้ใช้งานทั้งหมด
                            <a href="{{ url('admin/add_data_teacher_student') }}" class="btn btn-primary float-end">เพิ่มอาจารย์/นักศึกษา</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ลำดับที่</th>
                                    <th>รหัสผู้ใช้งาน</th>
                                    <th>อีเมล</th>
                                    <th>ชื่อผู้ใช้</th>
                                    <th>สถานะ</th>
                                    <th>ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach ($users as $user)
                                    <tr class="text-center">
                                        <td>{{ $i++}}</td>
                                        <td>{{ $user->userid }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary btn-sm">ดูข้อมูล</a>
                                            <a href="{{ url('admin/add_data_teacher_student/'.$user->id.'/edit') }}" class="btn btn-warning btn-sm">แก้ไข</a>
                                            <form action="{{ url('admin/dashboard/'.$user->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">ลบ</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                        {{-- {{ $users->onEachSide(1)->links() }} --}}
                    </div>
                </div>

                {{-- Card Exercise --}}
                <div class="card">
                    <div class="card-header text-white bg-dark">
                        <h4>แบบฝึกหัดทั้งหมด
                            <a href="{{ url('admin/add_data_exercises') }}" class="btn btn-primary float-end">เพิ่มแบบฝึกหัด</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>ลำดับที่</th>
                                    <th>ระดับ</th>
                                    <th>ชื่อแบบฝึกหัด</th>
                                    <th>ข้อมูลแบบฝึกหัด</th>
                                    <th>ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach ($exercises as $exercise)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $exercise->level }}</td>
                                        <td>{{ $exercise->level_name }}</td>
                                        <td>{{ $exercise->data_level }}</td>
                                        <td>
                                            <a href="{{ url('admin/add_data_exercises/'.$exercise->id.'/edit') }}" class="btn btn-warning btn-sm">แก้ไข</a>
                                            <form action="{{ url('admin/add_data_exercises/'.$exercise->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">ลบ</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $exercises->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection