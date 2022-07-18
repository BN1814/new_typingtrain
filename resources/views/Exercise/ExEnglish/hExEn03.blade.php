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
            <p class="score">SCORE : <span>0</span></p>
            <h1 class="display-6 text-center">EXERCISE ENGLISH</h1>
            <br>
            <div class="row mb-3 mt-3">
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 25</div>
                        <div class="card-body "> 
                            <p class="fs-4 text-center">f & j</p>
                            <a href="{{ route('E-FJ')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 26</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">d & k</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 27</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">s & l</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 28</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">a & ;</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 29</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">g & h</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 30</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">' & "</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
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
                            <p class="fs-4 text-center">F & J</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 32</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">D & K</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 33</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">S & L</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 34</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">A & :</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 35</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">G & H</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 36</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">G & H</p>
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
                    <li class="page-item disabled">
                    <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
            </div>           
        </div>
    </body>

@endsection