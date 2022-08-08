@extends('layouts.app')

@section('content')
    <style>
        .card-header {
            text-align: center;
            background: #333;
            color: #fff;
        }
    </style>
    <body>
        <div class="container-sm">
            <!-- <p class="score">SCORE : <span>0</span></p> -->
            <h1 class="display-6 text-center">EXERCISE ENGLISH</h1>
            <br>
            <div class="row mb-3 mt-3">
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 13</div>
                        <div class="card-body "> 
                            <p class="fs-4 text-center">r & u</p>
                            <a href="{{ route('E-RU')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 14</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">e & i</p>
                            <a href="{{ route('E-EI')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 15</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">w & o</p>
                            <a href="{{ route('E-WO')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 16</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">q & y</p>
                            <a href="{{ route('E-QY')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 17</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">t & p</p>
                            <a href="{{ route('E-TP')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 18</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">R & U</p>
                            <a href="{{ route('E-shift-RU')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- row2 --}}
            <div class="row">
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 19</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">E & I</p>
                            <a href="{{ route('E-shift-EI')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 20</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">W & O</p>
                            <a href="{{ route('E-shift-WO')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 21</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">Q & Y</p>
                            <a href="{{ route('E-shift-QY')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 22</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">T & P</p>
                            <a href="{{ route('E-shift-TP')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 23</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">mix</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 24</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">mix</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center position-absolute bottom-0 start-50 translate-middle-x">
                    <li class="page-item">
                    <a class="page-link" href="{{ route('hExEN01')}}">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExEN01')}}">1</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExEN02')}}">2</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExEN03')}}">3</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExEN04')}}">4</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExEN05')}}">5</a></li>
                    <li class="page-item">
                    <a class="page-link" href="{{ route('hExEN03')}}">Next</a>
                    </li>
                </ul>
            </nav>
            </div>           
        </div>
    </body>

@endsection