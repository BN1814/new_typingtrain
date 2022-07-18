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
            <br>
        </div>
        <div class="container">
            <div class="row mb-3 mt-3">
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 01</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ด และ _่</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 02</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ก และ า</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 03</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ห และ ส</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 04</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ฟ และ ว</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 05</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">เ และ _้</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 06</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ง และ  "</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 07</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">โ และ _๋</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 08</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ฏ และ ษ</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 09</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ฆ และ ศ</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 10</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ฤ และ ซ</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 11</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ฌ และ _็</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 12</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ฌ และ _็</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center position-absolute bottom-0 start-50 translate-middle-x">
                    <li class="page-item disabled">
                    <a class="page-link" href="{{ route('hExTH01')}}" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExTH01')}}">1</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExTH02')}}">2</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExTH03')}}">3</a></li>
                    <li class="page-item">
                    <a class="page-link" href="{{ route('hExTH02')}}">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </body> 
@endsection