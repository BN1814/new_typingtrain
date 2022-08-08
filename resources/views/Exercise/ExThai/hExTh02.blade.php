@extends('layouts.app')

@section('content')
    <!-- <link rel="stylesheet" href="css/hex.css"> -->
    <style>
        .card-header {
            text-align: center;
            background: #333;
            color: #fff;
        }
        .body {
            display: block;

        }
    </style>
    <body class= "body">  
        <div class="container">
            <!-- <p class="score">คะแนน : <span>0</span></p> -->
            <h1 class="display-6 text-center">แบบฝึกภาษาไทย</h1>
            <br>
        </div>
        <div class="container">
            <div class="row mb-3 mt-3">
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 13</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">พ และ _ี</p>
                            <a href="{{ route('E-TH13')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 14</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ำ และ ร</p>
                            <a href="{{ route('E-TH14')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 15</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ไ และ น</p>
                            <a href="{{ route('E-TH15')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 16</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ๆ และ _ั</p>
                            <a href="{{ route('E-TH16')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 17</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ะ และ ย</p>
                            <a href="{{ route('E-TH17')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 18</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">บ และ ล</p>
                            <a href="{{ route('E-TH18')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 19</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ฑ และ _๊</p>
                            <a href="{{ route('E-TH19')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 20</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ฎ และ ณ</p>
                            <a href="{{ route('E-TH20')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 21</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">" และ ฯ</p>
                            <a href="{{ route('E-TH21')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 22</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">๐ และ _ํ</p>
                            <a href="{{ route('E-TH22')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 23</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ธ และ ญ</p>
                            <a href="{{ route('E-TH23')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 24</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ฐ และ ,</p>
                            <a href="{{ route('E-TH24')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center position-absolute bottom-0 start-50 translate-middle-x">
                    <li class="page-item">
                    <a class="page-link" href="{{ route('hExTH01')}}" >Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExTH01')}}">1</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExTH02')}}">2</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExTH03')}}">3</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExTH04')}}">4</a></li>
                    <li class="page-item">
                    <a class="page-link" href="{{ route('hExTH03')}}">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </body> 
@endsection