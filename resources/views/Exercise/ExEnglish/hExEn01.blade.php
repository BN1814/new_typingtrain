@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="css/hex.css">
    <style>
        .card-header {
            text-align: center;
            background: #333;
            color: #fff;
        }
    </style>
    <body>
        <div class="container-sm">
            <p class="score">SCORE : <span>0</span></p>
            <h1 class="display-6 text-center">EXERCISE ENGLISH</h1>
            <br></br>
            <div class="row g-5 ">
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 01</div>
                        <div class="card-body "> 
                            <p class="fs-4 text-center">f & j</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 02</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">d & k</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 03</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">s & l</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 04</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">a & ;</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 05</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">g & h</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 06</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">' & "</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 07</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">F & J</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 08</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">D & K</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 09</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">S & L</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 10</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">A & :</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 11</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">G & H</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center position-absolute bottom-0 start-50 translate-middle-x">
                    <li class="page-item disabled">
                    <a class="page-link" href="{{ route('hExEN01')}}" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExEN01')}}">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
            </div>           
        </div>
    </body>

@endsection