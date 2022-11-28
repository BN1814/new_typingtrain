@extends('layouts.app')
@section('title', ' | เพิ่มข้อมูลแบบทดสอบ')

@section('content')
<style>
    .card { border:none; }
    .form-control { text-align:center; }
    div.container { max-width: 1200px; }
    table { border:none; }
</style>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('import-success'))
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: '{{ session('import-success') }}',
                            showConfirmButton: false,
                            ConfirmButtonText: 'ตกลง',
                            timer: 1500
                        })
                    </script>
                @endif
                <div class="card justify-content-center">
                    <div class="card-header text-white bg-dark text-center h3">เพิ่มข้อมูลแบบทดสอบ</div>
                    <div class="card-body">
                        <form action="{{ route('import-exercise') }}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            <div class="row mb-2 justify-content-center">
                                <div class="col-md-6">
                                    <input type="file" name="import-ex" id="import-ex"class="form-control @error('import-ex') is-invalid @enderror">

                                    @error('import-ex')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="col-md-1 btn btn-primary d-inline mb-2">เพิ่มข้อมูล</button>
                                <button class="col-md-1 ms-1 btn btn-danger mb-2" style="width: 200px;">
                                    <a href="{{ route('template-exercise') }}">ดาวน์โหลด template</a>
                                </button>
                                @if(Session::has('import-fail'))
                                    <div class="col-md-8 alert alert-danger text-center" style="margin: 0 auto;">
                                        @foreach (Session::get('import-fail') as $failure)
                                            {{ $failure->errors()[0] }} at row: {{ $failure->row() }} in excel file. <br>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </form>

                        <table class="table table-hover table-striped table-bordered text-center">
                            <thead>
                                <tr style="background: var(--bs-warning);">
                                    <th >ระดับ</th>
                                    <th >ชื่อแบบทดสอบ</th>
                                    <th >ข้อมูลแบบทดสอบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($exercises))
                                    @php($i=1)
                                    @foreach ($exercises as $exercise)
                                    <tr class="text-center">
                                        <td>{{ $exercise->level }}</td>
                                        <td>{{ $exercise->level_name }}</td>
                                        <td>{{ $exercise->data_level }}</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <p class="text-center fw-bold mt-3 text-danger fs-5">ไม่มีข้อมูล</p>
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection