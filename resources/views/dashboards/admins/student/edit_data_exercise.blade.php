@extends('layouts.app')

@section('content')
<style>
    .card {
        border: none;
    }
    input {
        text-align: center;
    }
</style>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if(session('message'))
                    <h4 class="alert alert-success">{{ session('message') }}</h4>
                @endif
                <div class="card">
                    <div class="card-header text-center text-white bg-dark h4">แก้ไขข้อมูลแบบฝึกหัด</div>
                    <div class="card-body">
                        <form action="{{ url('admin/add_data_exercises/'. $exercise->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                                <label for="level" class="col-md-4 col-form-label text-md-end">{{ __('ระดับ') }}</label>
    
                                <div class="col-md-6">
                                    <input id="level" type="text" class="form-control @error('level') is-invalid @enderror" name="level" autocomplete="level" autofocus value="{{ $exercise->level }}">
    
                                    @error('level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="level_name" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อแบบฝึกหัด') }}</label>
    
                                <div class="col-md-6">
                                    <input id="level_name" type="text" class="form-control @error('level_name') is-invalid @enderror" name="level_name" autocomplete="level_name" autofocus value="{{ $exercise->level_name }}">
    
                                    @error('level_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="data_level" class="col-md-4 col-form-label text-md-end">{{ __('ข้อมูลแบบฝึกหัด') }}</label>
    
                                <div class="col-md-6">
                                    <input id="data_level" type="text" class="form-control @error('data_level') is-invalid @enderror" name="data_level" autocomplete="data_level" autofocus value="{{ $exercise->data_level }}">
    
                                    @error('data_level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-warning form-control">
                                        {{ __('อัพเดตแบบฝึกหัด') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection