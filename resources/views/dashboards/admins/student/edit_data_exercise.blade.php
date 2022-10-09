@extends('layouts.app')

@section('content')
<style>
    .card { border:none; }
    input { text-align:center; }
    textarea { margin:0; padding: 0; }
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
                                <label for="level" class="col-md-4 col-form-label text-md-end">{{ __('ระดับแบบทดสอบ : ') }}</label>
    
                                <div class="col-md-6">
                                    <input id="level" type="text" class="form-control" name="level" autocomplete="off" value="{{ $exercise->level }}">
    
                                    {{-- @error('level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="level_name" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อแบบทดสอบ : ') }}</label>
    
                                <div class="col-md-6">
                                    <input id="level_name" type="text" class="form-control" name="level_name" autocomplete="off" value="{{ $exercise->level_name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="data_level" class="col-md-4 col-form-label text-md-end">{{ __('ข้อมูลแบบทดสอบ : ') }}</label>
    
                                <div class="col-md-6">
                                    <textarea id="data_level" class="form-control text-center" name="data_level" rows="4">{{ $exercise->data_level }}</textarea>
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