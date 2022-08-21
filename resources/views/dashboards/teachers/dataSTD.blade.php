@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center text-white bg-dark h4">ข้อมูลนักศึกษา</div>
                    <div class="card-body">
                        <div class="input-group mb-2">
                            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <button type="button" class="btn btn-outline-primary">search</button>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ลำดับ</th>
                                    <th>ชื่อวิชา</th>
                                    <th>รหัสนักศึกษา</th>
                                    <th>ชื่อ</th>
                                    <th>นามสกุล</th>
                                    <th>อีเมล</th>
                                    <th>ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                @foreach ($users as $user)
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->section_name }}</td>
                                    <td>{{ $user->userid }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->lname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">
                                        {{-- View --}}
                                        <a href="{{ route('user.profile', $user->id) }}" class="btn btn-primary btn-sm">ดูข้อมูล</a>
                                        {{-- Update --}}
                                        <a href="{{ route('teacher.edit', $user->id) }}" class="btn btn-warning btn-sm">แก้ไข</a>
                                        {{-- Delete --}}
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