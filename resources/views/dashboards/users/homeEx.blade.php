@extends('layouts.app')

@section('content')
<style>
    * {margin: 0; padding: 0; box-sizing: border-box;}
    a {
        text-decoration: none;
        color: #fff;
    } a:hover {color: #fff;}
    .row { height: 80vh; }
    .card {
        margin-right: 20px;
        border: 1px solid #b3b0b0;
    }
    .card .card-header {
        font-size: 20px;
        font-weight: bold;
        text-align: center;
    }
    .card .card-body img {
        border: 1px solid rgb(235, 235, 235);
        border-radius: 10px;
    }
    .btn {
        margin: 0 10px 10px 10px;
        float: right;
    }
    .code {
        width: 30%;
        height: 30px;
        border-radius: 10px;
        border: none;
        display: flex;
    }
</style>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-9 text-center">
            {{-- {{ \Carbon\Carbon::parse($section->deadline_date)->format('d-m-Y') }} --}}
            <strong class="fs-5 mb-1" style="color:red;">กำหนดส่งวันที่ {{ \Carbon\Carbon::parse($section->deadline_date)->format('d-m-Y') }} เวลา {{ $section->deadline_time }}</strong>
            <div class="card">
                <div class="card-header text-white bg-dark ">EXERCISE ENGLISH</div>
                <div class="card-body">
                    <img src="https://www.nicepng.com/png/detail/67-675294_keyboard-typing.png" class="img-fluid">
                    {{-- <p class="h5 fw-bold mt-3 text-center">{{ $history->score }}</p> --}}
                </div>
                {{-- /enterclass/homeEx/{section_id}/{user_id}/AllExercises --}}
                <a href="{{ url('user/enterclass/homeEx/'. $section->id. '/'. $user->id. '/'. 'AllExercises') }}" class="btn btn-dark btn-block">START</a>
            </div>
        </div>
    </div>
</div>
@endsection
