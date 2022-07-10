@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="css/hstd.css">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4 me-2">
                <div class="card">
                    <div class="card-header bg-dark text-white text-center h3">แบบฝึกหัดภาษาไทย</div>
                    <div class="card-body border border-secondary text-end border border-rounded-bottom">
                        <div class="mb-2 text-center">
                            <img src="https://wl-brightside.cf.tsp.li/resize/728x/jpg/432/292/54f13b5f41bb66ade6117fe231.jpg" alt="kb" class="img-fluid border border-secondary">
                        </div>
                        <a href="{{ route('E-FJ')}}" class="btn btn-dark">เริ่ม</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-dark text-white text-center h3">Study English</div>
                    <div class="card-body border border-secondary text-end border border-rounded-bottom">
                        <div class="mb-2 text-center">
                            <img src="https://wl-brightside.cf.tsp.li/resize/728x/jpg/432/292/54f13b5f41bb66ade6117fe231.jpg" alt="kb" class="img-fluid border border-secondary">
                        </div>
                        <a href="{{ route('homeExEN')}}" class="btn btn-dark">Start</a>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection