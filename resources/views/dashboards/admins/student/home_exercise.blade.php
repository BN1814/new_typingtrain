@extends('layouts.app')
@section('title', ' | เพิ่มข้อมูลแบบทดสอบ')

@section('content')
<style>
    .card { border:none; }
    .form-control { text-align:center; }
</style>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('import_success'))
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: '{{ session('import_success') }}',
                        showConfirmButton: true,
                        ConfirmButtonText: 'ตกลง',
                    })
                </script>
            @elseif(session('import_fail'))
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: '{{ session('import_fail') }}',
                        showConfirmButton: true,
                        ConfirmButtonText: 'ตกลง',
                    })
                </script>
            @endif
            <div class="card">
                <div class="card-header text-white bg-dark">
                    <h4>เพื่มข้อมูลแบบฝึกหัด
                        <a href="{{ url('admin/add-exercise-file') }}" class="btn btn-primary btn-sm float-end">เพิ่มด้วย file excel</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/add_data_exercises') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="level" class="col-md-4 col-form-label text-md-end">{{ __('ระดับแบบทดสอบ : ') }}</label>

                            <div class="col-md-6">
                                <input id="level" type="text" class="form-control @error('level') is-invalid @enderror" name="level" value="{{ old('level') }}" autocomplete="level" placeholder="ใส่ระดับแบบทดสอบ">

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
                                <input id="level_name" type="text" class="form-control @error('level_name') is-invalid @enderror" name="level_name" value="{{ old('level_name') }}"  autocomplete="level_name" placeholder="ใส่ชื่อแบบทดสอบ">

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
                                <textarea id="data_level" type="text" class="form-control @error('data_level') is-invalid @enderror" name="data_level" rows="4" value="{{ old('data_level') }}" autocomplete="data_level" placeholder="ใส่ข้อมูลแบบทดสอบ"></textarea>

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

        {{-- <div class="col-md-10">
            <form action="{{ url('admin/import_exercise') }}" method="POST" enctype="multipart/form-data">
            <form action="" method="GET" enctype="multipart/form-data">
                @csrf
                <div class="card mt-2">
                    <div class="row mb-3 mt-2">
                        <label for="file" class="col-md-3 col-form-label text-md-end font-weight-bold">{{ __('เลือกไฟล์ข้อมูล : ') }}</label>

                        <div class="col-md-6">
                            <input id="file" type="file" class="form-control @error('import_ex') is-invalid @enderror d-inline" name="import_ex">

                            @error('import_ex')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" name="upload" class="btn btn-primary col-md-2">
                            {{ __('บันทึก') }}
                        </button>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>ระดับ</th>
                                    <th>ชื่อแบบฝึกหัด</th>
                                    <th>ข้อมูลแบบฝึกหัด</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_exercises as $exercise)
                                <tr>
                                    <td>{{ $exercise->level }}</td>
                                    <td>{{ $exercise->level_name }}</td>
                                    <td>{{ $exercise->data_level }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div> --}}
    </div>
</div>
@endsection