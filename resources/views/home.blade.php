@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Auth::user()->role == 'admin')
                <div class="card">
                    <div class="card-header bg-dark text-center text-white h1">ยินดีต้อนรับ</div>
                    <div class="card-body">
                        <p style="text-align: center;" class="h2"> Admin : {{ Auth::user()->name }}</p>
                    </div>
                </div>
            @elseif(Auth::user()->role == 'teacher')
                <div class="card">
                    <div class="card-header bg-dark text-center text-white h1">ยินดีต้อนรับ</div>
                    <div class="card-body">
                        <p style="text-align: center;" class="h2"> Teacher : {{ Auth::user()->name }}</p>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-header bg-dark text-center text-white h1">ยินดีต้อนรับ</div>
                    <div class="card-body">
                        <p style="text-align: center;" class="h2"> Student : {{ Auth::user()->name }}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
