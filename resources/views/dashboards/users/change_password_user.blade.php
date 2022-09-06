@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-white bg-dark text-center h3">
                        {{ __('เปลี่ยนรหัสผ่าน') }}
                    </div>

                    @include('include.changePassword')
                </div>
            </div>
        </div>
    </div>
@endsection