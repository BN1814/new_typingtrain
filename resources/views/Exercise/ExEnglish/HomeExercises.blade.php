@extends('layouts.app')

@section('content')
    <style>
        .card-header { text-align:center; background:#333; color:#fff; }
        .card { border:none; }
    </style>
    @if(session('success'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                confirmButtonColor: '#212529',
                ConfirmButtonText: 'ตกลง',
                timer: 1500
            })
        </script>
    @endif
    <div class="container-sm">
        <!-- <p class="score">SCORE : <span>0</span></p> -->
        <h1 class="display-4 text-center fw-bold"><<--- EXERCISE ENGLISH --->></h1>
            <div class="row mb-3 mt-2">
                @foreach ($exercises as $exercise)
                            <div class="col-sm-6 col-md-2 mt-4">
                                <div class="card" style="width: 150px; height: 157px;">
                                    <div class="card-header " style=" height: 40px;">
                                            <p class="fs-5 text-center">
                                                LEVEL : {{$exercise->level}}
                                            </p>
                                    </div>
                                    @if($exercise->score > 50)
                                        <div class="card-body bg-success text-white"> 
                                            <p class="fs-4 text-center fw-bold" id="name" style="margin:0;">
                                                <span>{{$exercise->level_name}}</span>
                                            </p>
                                            <p class="fs-6 text-center fw-bold" style="margin:0">คะแนน : {{$exercise->score}} </p>
                                            <a href="{{ url('user/enterclass/homeEx/'. $section->id. '/'. $user->id. '/'. 'AllExercises/'. $exercise->id)}}" class="btn btn-warning text-dark fw-bold position-absolute bottom-10 start-50 translate-middle-x mt-0" style="width: 90%;" >start again</a>
                                        </div>
                                    @elseif($exercise->score == null)
                                        <div class="card-body"> 
                                            <p class="fs-4 text-center fw-bold" id="name" style="margin:0">
                                                <span>{{$exercise->level_name}}
                                            </p>
                                            <p class="fs-6 text-center fw-bold" style="margin:0">คะแนน : 0 </p>
                                            <a href="{{ url('user/enterclass/homeEx/'. $section->id. '/'. $user->id. '/'. 'AllExercises/'. $exercise->id)}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x mt-0" style="width: 95%;" >start</a>
                                        </div>
                                    @else
                                        <div class="card-body bg-danger text-white"> 
                                            <p class="fs-4 text-center fw-bold" id="name" style="margin:0">
                                                <span>{{$exercise->level_name}}</span>
                                            </p>
                                            <p class="fs-6 text-center fw-bold" style="margin:0">คะแนน : {{$exercise->score}} </p>
                                            <a href="{{ url('user/enterclass/homeEx/'. $section->id. '/'. $user->id. '/'. 'AllExercises/'. $exercise->id)}}" class="btn btn-warning text-dark fw-bold position-absolute bottom-10 start-50 translate-middle-x mt-0" style="width: 95%;" >start again</a>
                                        </div>
                                    @endif
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
@endsection