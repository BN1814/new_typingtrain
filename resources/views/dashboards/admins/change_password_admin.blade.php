@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-white bg-dark text-center h3">
                        {{ __('เปลี่ยนรหัสผ่าน') }}
                    </div>

                    <form action="{{ url('admin/changePassword/'. $user->id) }}" method="get">
                        {{-- @csrf --}}

                        <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-end">อีเมล</label>
                                
                                <div class="col-md-6">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-4 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('แก้ไข') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection