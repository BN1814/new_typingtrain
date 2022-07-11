@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <p class="h3">Admin Dashboard</p>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <button class="btn btn-primary"><a href="{{route('user.dashboard')}}" style="color: #fff; text-decoration: none;">Go to User</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
