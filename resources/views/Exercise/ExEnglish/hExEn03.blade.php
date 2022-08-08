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
                        <div class="card-header">Level 25</div>
                        <div class="card-body "> 
                            <p class="fs-4 text-center">v & m</p>
                            <a href="{{ route('E-VM')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 26</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">c & ,</p>
                            <a href="{{ route('E-C')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 27</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">x & .</p>
                            <a href="{{ route('E-X')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 28</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">z & /</p>
                            <a href="{{ route('E-Z')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 29</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">b & n</p>
                            <a href="{{ route('E-BN')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 30</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">V & M</p>
                            <a href="{{ route('E-shift-VM')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- row2 --}}
            <div class="row">
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 31</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">C & < </p>
                            <a href="{{ route('E-shift-C')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 32</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">X & > </p>
                            <a href="{{ route('E-shift-X')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 33</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">Z & ?</p>
                            <a href="{{ route('E-shift-Z')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 34</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">B & N</p>
                            <a href="{{ route('E-shift-BN')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 35</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">mix</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 36</div>
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
                    <a class="page-link" href="{{ route('hExEN02')}}" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExEN01')}}">1</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExEN02')}}">2</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExEN03')}}">3</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExEN04')}}">4</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExEN05')}}">5</a></li>
                    <li class="page-item">
                    <a class="page-link" href="{{ route('hExEN04')}}">Next</a>
                    </li>
                </ul>
            </nav>
            </div>           
        </div>
    </body>

@endsection