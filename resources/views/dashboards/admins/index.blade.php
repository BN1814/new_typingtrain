{{-- @extends('dashboards.admins.layouts.admin-dash-layout') --}}
@extends('layouts.app')
{{-- @section('title', 'Dashboard') --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Auth::user()->role == 1)
                <div class="card">
                    <div class="card-header bg-dark text-center text-white h3">ยินดีต้อนรับ</div>
                    <div class="card-body">
                        <p> Admin : {{ Auth::user()->name }}</p>
                    </div>
                </div>
            @elseif(Auth::user()->role == 2)
                <div class="card">
                    <div class="card-header bg-dark text-center text-white h3">ยินดีต้อนรับ</div>
                    <div class="card-body">
                        <p> Teacher : {{ Auth::user()->name }}</p>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-header bg-dark text-center text-white h3">ยินดีต้อนรับ</div>
                    <div class="card-body">
                        <p> Student : {{ Auth::user()->name }}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection