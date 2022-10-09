@extends('layouts.app')

@section('content')
<style>
    .card { border:none; }
    input { text-align:center; }
</style>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8    ">
            <div class="card">
                <div class="card-header text-center text-white bg-dark h4">เพื่มข้อมูลแบบฝึกหัด</div>
                <div class="card-body">
                    <form action="{{ url('admin/add_data_exercises') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="level" class="col-md-4 col-form-label text-md-end">{{ __('ระดับแบบทดสอบ : ') }}</label>

                            <div class="col-md-6">
                                <input id="level" type="text" class="form-control @error('level') is-invalid @enderror" name="level" value="{{ old('level') }}" autocomplete="off">

                                @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="level_name" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อแบบทดสอบ : ') }}</label>

                            <div class="col-md-6">
                                <input id="level_name" type="text" class="form-control @error('level_name') is-invalid @enderror" name="level_name" value="{{ old('level_name') }}"  autocomplete="off">

                                @error('level_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="data_level" class="col-md-4 col-form-label text-md-end">{{ __('ข้อมูลแบบทดสอบ : ') }}</label>

                            <div class="col-md-6">
                                <textarea id="data_level" type="text" class="form-control @error('data_level') is-invalid @enderror" name="data_level" rows="4" value="{{ old('data_level') }}"></textarea>

                                @error('data_level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('บันทึก') }}
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    {{ __('ยกเลิก') }}
                                </button>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <input type="submit" class="btn btn-success" value="บันทึก">
                            <input type="reset" class="btn btn-danger" value="ยกเลิก">
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection