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
                <!-- <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 25</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">อ และ ท</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 26</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">แ และ ม</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 27</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ป และ ใ</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 28</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ผ และ ฝ</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 29</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">_ิ และ _ื</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 30</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ฉ และ  ฒ</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 31</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">) และ _ฬ</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 32</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">( และ ฦ</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 33</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center"> ฺ และ _์</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 34</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ฤ และ ซ</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 35</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ฌ และ _็</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">ระดับที่ 36</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">ฌ และ _็</p>
                            <a href="{{ route('TEST02')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >เริ่ม</a>
                        </div>
                    </div>
                </div>
            </div> -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center position-absolute bottom-0 start-50 translate-middle-x">
                    <li class="page-item">
                    <a class="page-link" href="{{ route('hExTH03')}}">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExTH01')}}">1</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExTH02')}}">2</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExTH03')}}">3</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExTH04')}}">4</a></li>
                    <li class="page-item disabled">
                    <a class="page-link">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </body> 
@endsection