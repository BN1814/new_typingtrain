@extends('layouts.app')
@section('title', ' | ติดต่อเรา')

@section('content')
<style>
    .card { border:none; }
</style>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session('send-success'))
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: '{{ session('send-success') }}',
                            showConfirmButton: false,
                            ConfirmButtonText: 'ตกลง',
                            timer: 1500
                        })
                    </script>
                @endif
                <div class="card">
                    <div class="card-header text-center text-light bg-dark h3">{{ __('ติดต่อเรา') }}</div>
                    <div class="card-body">
                        <form action="{{ route('send-contact') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('อีเมล : ') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="ใส่อีเมล">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('เบอร์โทรศัพท์ : ') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone" placeholder="xxx-xxx-xxxx">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="topic" class="col-md-4 col-form-label text-md-end">{{ __('เรื่องที่ต้องการติดต่อ : ') }}</label>

                                <div class="col-md-6">
                                    <textarea id="topic" type="text" class="form-control @error('topic') is-invalid @enderror" name="topic" rows="4" value="{{ old('topic') }}" autocomplete="topic" placeholder="ใส่ข้อมูลที่ต้องการติดต่อ"></textarea>

                                    @error('topic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary form-control">
                                        {{ __('ส่งข้อมูล') }}
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