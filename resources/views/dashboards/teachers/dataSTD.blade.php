@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center text-white bg-dark h4">ข้อมูลนักศึกษา</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ลำดับ</th>
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
                                    <td>{{ $user->userid }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->lname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">
                                        {{-- Update --}}
                                        <a href="{{ route('teacher.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        {{-- Delete --}}
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                    {{-- <td>07600641</td>
                                    <td>ภากร</td>
                                    <td>สุปินะ</td>
                                    <td>phakorn@gmail.com</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm">View</a>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </td> --}}
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