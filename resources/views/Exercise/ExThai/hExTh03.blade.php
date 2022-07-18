@extends('layouts.app')

@section('content')
    <!-- <link rel="stylesheet" href="css/hex.css"> -->
    <style>
        .card-header {
            text-align: center;
            background: #333;
            color: #fff;
        }
    </style>
    <body>
        <div class="container">
            <p class="score">คะแนน : <span>0</span></p>
            <h1 class="display-6 text-center">แบบฝึกภาษาไทย</h1>
            <br></br>
        </div>
        <div class="container ">
            <div class="row g-5">
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 01</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ด และ _๋</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >Test 01</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 02</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ด และ _๋</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >Test 01</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 03</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ด และ _๋</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >Test 01</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 04</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ด และ _๋</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >Test 01</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 05</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ด และ _๋</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >Test 01</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 06</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ด และ _๋</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >Test 01</a>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example ">
                <ul class="pagination justify-content-center position-absolute bottom-0 start-50 translate-middle-x">
                    <li class="page-item"><a class="page-link" href="{{ route('hExTH02')}}">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExTH01')}}">1</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExTH02')}}">2</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExTH03')}}">3</a></li>
                    <li class="page-item disabled">
                    <a class="page-link" href="{{ route('hExTH03')}}">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </body> 
@endsection