@extends('layouts.app')

@section('content')
<style>
</style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header h4 bg-dark text-white text-center">
                        {{ __('เข้าห้องเรียน') }}
                    </div>
                    <div class="card-body">
                       <form action="#">
                        {{-- @csrf --}}
                            <div class="row mb-3">
                                <label for="entclass" class="col-md-3 col-form-label text-md-end">{{ __('รหัสเข้าห้องเรียน') }}</label>
        
                                <div class="col-md-6">
                                    <input id="entclass" type="text" class="form-control text-center">
                                </div>
        
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('บันทึก') }}
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