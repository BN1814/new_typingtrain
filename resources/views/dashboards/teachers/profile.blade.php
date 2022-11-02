@extends('layouts.app')

@section('content')
<style>
  input { text-align: center; }
  .card { border:none; }
</style>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-8 mb-2">
            @if(session('update'))
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: '{{ session('update') }}',
                        showConfirmButton: false,
                        ConfirmButtonText: 'ตกลง',
                        timer: 1500
                    })
                </script>
            @endif
                <div class="card">
                    <div class="card-header text-center text-white bg-dark h4">ข้อมูลส่วนตัว</div>
                    <div class="card-body">
                        <form action="{{ url('teacher/profile/'. $user->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                                <label for="userid" class="col-md-4 col-form-label text-md-end">{{ __('รหัสผู้ใช้ :') }}</label>
    
                                <div class="col-md-6">
                                    <input id="userid" type="text" class="form-control @error('userid') is-invalid @enderror" name="userid" autocomplete="userid" value="{{ $user->userid }}">
    
                                    @error('userid')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('ชื่อ : ') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="name" value="{{ $user->name }}">
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lname" class="col-md-4 col-form-label text-md-end">{{ __('นามสกุล : ') }}</label>
    
                                <div class="col-md-6">
                                    <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" autocomplete="lname" value="{{ $user->lname }}">
    
                                    @error('lname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('อีเมล : ') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="email" value="{{ $user->email }}">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-warning form-control">
                                        {{ __('อัพเดตข้อมูล') }}
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