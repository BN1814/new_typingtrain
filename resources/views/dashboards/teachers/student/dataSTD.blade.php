@extends('layouts.app')

@section('content')
<style>
    a:hover {
        color: #fff;
    }
</style>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('message'))
                    <h4 class="alert alert-success text-center">{{ session('message') }}</h4>
                @elseif(session('delete'))
                    <h4 class="alert alert-danger text-center">{{ session('delete') }}</h4>
                @endif
                <div class="card">
                    <div class="card-header text-center text-white bg-dark h4">ข้อมูลนักศึกษา</div>
                    <div class="card-body">
                        <form method="get" role="search">
                            <div class="input-group col-2 mb-2">
                                <input type="search" class="form-control rounded" placeholder="ค้นหา" aria-label="Search" aria-describedby="search-addon" name="search" value="{{ old('search') }}">
                                <button type="submit" class="btn btn-dark text-white" >ค้นหา</button>
                                <button type="reset" class="btn btn-danger text-white">
                                    <a href="{{ url('teacher/dataSTD') }}">รีเซ็ต</a>
                                </button>
                            </div>
                        </form>
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
                                @php($i=1)
                                <tr>
                                @foreach ($user as $user)
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $user->section_name }}</td>
                                    <td>{{ $user->userid }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->lname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">
                                        {{-- View --}}
                                        <a href="{{ url('teacher/view_data_student/'. $user->id ) }}" class="btn btn-primary btn-sm">ดูข้อมูล</a>
                                        {{-- Update --}}
                                        <a href="{{ url('teacher/dataSTD/'. $user->id. '/edit') }}" class="btn btn-warning btn-sm">แก้ไข</a>
                                        {{-- Delete --}}
                                        <form action="{{ url('teacher/dataSTD/'. $user->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
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