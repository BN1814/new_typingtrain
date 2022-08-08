@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/Teacher/classRoom.css') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
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

                        {{-- <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ลำดับ</th>
                                    <th>Section_id</th>
                                    <th>ชื่อห้องเรียน</th>
                                    <th>รหัสเข้าห้องเรียน</th>
                                    <th>ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                @foreach ($deadlines as $deadline)
                                    <td>{{ $deadline->id }}</td>
                                    <td>{{ $deadline->section_id }}</td>
                                    <td>{{ $deadline->section_name }}</td>
                                    <td>{{ $deadline->code_inclass }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-warning btn-sm">View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection