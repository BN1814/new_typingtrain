@extends('layouts.app')
@section('title', ' | แบบทดสอบ')

@section('content')
<style>
    * {margin: 0; padding: 0; box-sizing: border-box;}
    a { text-decoration: none; color: #fff;
    } a:hover {color: #fff;}
    .row { height: 80vh; }
    .card { margin-right: 20px; border: none; }
    .card .card-header { font-weight: bold; text-align: center; }
    .card .card-body img { border: 1px solid rgb(235, 235, 235); border-radius: 10px; }
    .btn { margin: 5px 10px 10px 10px; float: right; }
    strong { font-size: 15px;}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 text-center">
            {{-- {{ \Carbon\Carbon::parse($section->deadline_date)->format('d-m-Y') }} --}}
            <strong class="mb-1" style="color:red; font-size: 30px;">กำหนดส่งภายในวัน{{ \Carbon\Carbon::parse($section->deadline_date)->thaidate('lที่ j F Y') }} เวลา {{ $section->deadline_time }} น. </strong>
            {{-- thaidate('D j M y') --}}
            {{-- thaidate('lที่ j F Y') --}}
            {{-- {{ \Carbon\Carbon::parse($section->deadline_date)->format('d-m-Y') }} เวลา {{ $section->deadline_time }} น. --}}
            <div class="card">
                <div class="card-header text-white bg-dark h4">EXERCISE ENGLISH</div>
                <div class="card-body">
                    <img src="https://www.nicepng.com/png/detail/67-675294_keyboard-typing.png" class="img-fluid">
                    {{-- <p class="h5 fw-bold mt-3 text-center">{{ $history->score }}</p> --}}
                </div>
                <strong class="text-start ms-4 text-center" style="text-transform: uppercase;">วิชา : {{ $section->section_name }}</strong>
                <strong class="text-start ms-4 text-center">คะแนนรวมทั้งหมด : {{ $historys }}/{{ $total_scores }} คะแนน</strong>
                <strong class="text-start ms-4 text-center">ทำไปแล้ว : {{ $count_exercises }}/{{ $total_exercises }} แบบทดสอบ <<-->> ผ่านแล้ว : {{ $count_exercises_pass }} แบบทดสอบ <<-->> ยังไม่ผ่าน : {{ $count_exercises_fail }} แบบทดสอบ</strong>

                <a href="{{ url('user/enterclass/homeEx/'. $section->id. '/'. $user->id. '/'. 'AllExercises') }}" class="btn btn-dark btn-block">START</a>
            </div>
        </div>
    </div>
</div>
@endsection
