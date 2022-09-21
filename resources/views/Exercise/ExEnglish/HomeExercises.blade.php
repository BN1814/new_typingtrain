@extends('layouts.app')

@section('content')
    <style>
        .card-header {
            text-align: center;
            background: #333;
            color: #fff;
        }
        .card {
            border-color: #adb5bd;
        }
    </style>
    <body>
        <div class="container-sm">
            <!-- <p class="score">SCORE : <span>0</span></p> -->
            <h1 class="display-4 text-center fw-bold">EXERCISE ENGLISH</h1>
                <div class="row mb-3 mt-2">
                    @foreach ($exercises as $exercise)
                        <div class="col-sm-2 col-md-2 mt-4">
                            <div class="card" style="width: 150px; height: 150px;">
                                <div class="card-header " style=" height: 40px;">
                                     <p class="fs-5 text-center">{{$exercise->level}}</p>
                                </div>
                                <div class="card-body "> 
                                    <p class="fs-5 text-center">
                                     {{$exercise->level_name}}
                                    </p>
                                    <a href="{{ url('user/enterclass/homeEx/'. $section->id. '/'. $user->id. '/'. 'AllExercises/'. $exercise->id)}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center position-absolute start-50 translate-middle-x bottom-0">
                    {!! $exercises->Links() !!}
                </ul>
            </nav>
        </div>
    </body>

@endsection