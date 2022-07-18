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
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 d-flex justify-content-center align-items-center">
            <div class="card">
                <div class="card-header text-white bg-dark">แบบทดสอบภาษาไทย</div>
                <div class="card-body">
                    <img src="https://www.nicepng.com/png/detail/67-675294_keyboard-typing.png" class="img-fluid">
                    <p class="h5 mt-1">คะแนน : <span>0</span></p>
                </div>
                <a href="{{ route('hExTH01') }}" class="btn btn-dark btn-block">เริ่ม</a>
            </div>
            <div class="card">
                <div class="card-header text-white bg-dark">EXERCISE ENGLISH</div>
                <div class="card-body">
                    <img src="https://www.nicepng.com/png/detail/67-675294_keyboard-typing.png" class="img-fluid">
                    <p class="h5 mt-1">SCORE : <span>0</span></p>
                </div>
                <a href="{{ route('hExEN01') }}" class="btn btn-dark btn-block">START</a>
            </div>
        </div>
    </div>
</div>
@endsection
