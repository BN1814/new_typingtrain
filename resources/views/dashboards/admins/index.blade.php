{{-- @extends('dashboards.admins.layouts.admin-dash-layout') --}}
@extends('layouts.app')
{{-- @section('title', 'Dashboard') --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Auth::user()->role == 1)
                <div class="card mb-3">
                    <div class="card-header text-center text-white bg-dark h4">Table Teacher Code</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>Code</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Options</th>
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
                <div class="card">
                    <div class="card-header text-center text-white bg-dark h4">Table Student</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>E-mail</th>
                                    <th>Name</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center">{{ $user->id }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->name }}</td>
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
            @endif
        </div>
    </div>
</div>
@endsection