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
                        <div class="card-header">Level 49</div>
                        <div class="card-body "> 
                            <p class="fs-4 text-center">_ & +</p>
                            <a href="{{ route('E-VM')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 50</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">[ & ]</p>
                            <a href="{{ route('E-C')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 51</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">{ & }</p>
                            <a href="{{ route('E-X')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 52</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">\ & |</p>
                            <a href="{{ route('E-Z')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 53</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">' & "</p>
                            <a href="{{ route('E-BN')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 54</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">mix</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- row2 --}}
            <div class="row">
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 55</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">mix</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 56</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">mix</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 57</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">mix</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 58</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">mix</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 59</div>
                        <div class="card-body"> 
                            <p class="fs-4 text-center">mix</p>
                            <a href="{{ route('E-DK')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-2">
                    <div class="card" style="width: 150px; height: 150px;">
                        <div class="card-header">Level 60</div>
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
                    <a class="page-link" href="{{ route('hExEN03')}}" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExEN01')}}">1</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExEN02')}}">2</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExEN03')}}">3</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExEN04')}}">4</a></li>
                    <li class="page-item"><a class="page-link" href="{{ route('hExEN05')}}">5</a></li>
                    <li class="page-item disabled">
                    <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
            </div>           
        </div>
    </body>

@endsection