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
                <div class="row mb-3 mt-2">
                    @foreach ($exercises as $exercise)
                        <div class="col-sm-4 col-md-2 mt-4">
                            <div class="card" style="width: 150px; height: 150px;">
                                <div class="card-header " style=" height: 40px;">
                                     <p class="fs-5 text-center">{{$exercise->level}}</p>
                                </div>
                                <div class="card-body "> 
                                    <p class="fs-5 text-center">
                                     {{$exercise->level_name}}
                                    </p>
                                    <a href="{{ url('user/HomeExercises/'. $exercise->id . '/ExercisePage')}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 94%; height: 25%;" >start</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center position-absolute  start-50 translate-middle-x">
                    {!! $exercises->Links() !!}
                </ul>
            </nav>
        </div>
    </body>

@endsection