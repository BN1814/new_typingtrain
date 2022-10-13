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
        <h1 class="display-4 text-center fw-bold">EXERCISE ENGLISH</h1>
            <div class="row mb-3 mt-2">
                @foreach ($exercises as $exercise)
                    <div class="col-sm-6 col-md-2 mt-4">
                        <div class="card" style="width: 150px; height: 150px;">
                            <div class="card-header " style=" height: 40px;">
                                    <p class="fs-5 text-center">
                                        LEVEL : {{$exercise->level}}
                                    </p>
                            </div>
                            @if($exercise->score > 2)
                                <div class="card-body bg-success"> 
                                    <p class="fs-4 text-center fw-bold" id="name">
                                        <span>{{$exercise->level_name}}</span>
                                        {{-- <span style="margin:0; padding:0; font-size: 12px;">คะแนน : </span> --}}
                                    </p>
                                    {{-- <p class="fs-6 text-center fw-bold" id="name">
                                        <span>คะแนน : {{$exercise->score}} </span>
                                    </p> --}}
                                    <a href="{{ url('user/enterclass/homeEx/'. $section->id. '/'. $user->id. '/'. 'AllExercises/'. $exercise->id)}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 85%; height: 20%;" >start</a>
                                </div>
                            @elseif($exercise->score <= 2)
                                <div class="card-body bg-danger"> 
                                    <p class="fs-4 text-center fw-bold" id="name">
                                        <span>{{$exercise->level_name}}</span>
                                        {{-- <span style="margin:0; padding:0; font-size: 12px;">คะแนน : </span> --}}
                                    </p>
                                    {{-- <p class="fs-6 text-center fw-bold" id="name">
                                        <span>คะแนน : {{$exercise->score}} </span>
                                    </p> --}}
                                    <a href="{{ url('user/enterclass/homeEx/'. $section->id. '/'. $user->id. '/'. 'AllExercises/'. $exercise->id)}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 85%; height: 20%;" >start</a>
                                </div>
                            @else
                                <div class="card-body"> 
                                    <p class="fs-4 text-center fw-bold" id="name">
                                        <span>{{$exercise->level_name}}</span>
                                        {{-- <span style="margin:0; padding:0; font-size: 12px;">คะแนน : </span> --}}
                                    </p>
                                    {{-- <p class="fs-6 text-center fw-bold" id="name">
                                        <span>คะแนน : {{$exercise->score}} </span>
                                    </p> --}}
                                    <a href="{{ url('user/enterclass/homeEx/'. $section->id. '/'. $user->id. '/'. 'AllExercises/'. $exercise->id)}}" class="btn btn-primary position-absolute bottom-10 start-50 translate-middle-x" style="width: 85%; height: 20%;" >start</a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            
        {{-- <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center position-absolute start-50 translate-middle-x bottom-0">
                {!! $exercises->Links() !!}
            </ul>
        </nav> --}}
    </div>
@endsection

@section('script')
{{-- <script>
    let card_body = document.querySelector('.card-body');
    let name = document.querySelector('#name');
    card_body.style.backgroundColor = 'var(--bs-teal)';
    name.style.color = "var(--bs-light)";
    name.style.fontWeight = "bold";
</script>     --}}
@endsection