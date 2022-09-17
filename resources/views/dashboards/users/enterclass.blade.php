@extends('layouts.app')

@section('content')
<style>
</style>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session('success'))
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: '{{ session('success') }}',
                            showConfirmButton: false,
                            ConfirmButtonText: 'ตกลง',
                            timer: 1500
                        })
                    </script>
                @elseif(session('error'))
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: '{{ session('error') }}',
                            showConfirmButton: false,
                            ConfirmButtonText: 'ตกลง',
                            timer: 1500
                        })
                    </script>
                @elseif(session('error-message'))
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: '{{ session('error-message') }}',
                            showConfirmButton: false,
                            ConfirmButtonText: 'ตกลง',
                            timer: 1500
                        })
                    </script>
                @endif
                <div class="card">
                    <div class="card-header h4 bg-dark text-white text-center">
                        {{ __('เข้าห้องเรียน') }}
                    </div>
                    <div class="card-body">
                       <form action="{{ url('user/enterclass_std') }}" method="post">
                        @csrf
                            <div class="row mb-3">
                                <label for="entclass" class="col-md-3 col-form-label text-md-end">{{ __('รหัสเข้าห้องเรียน') }}</label>
        
                                <div class="col-md-6">
                                    <input type="text" class="form-control text-center enterclass" name="entclass">

                                    @error('entclass')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <div class="col">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('เข้าห้องเรียน') }}
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

@section('script')
    <script>
        let entclass = document.querySelector('.enterclass');
    </script>
@endsection