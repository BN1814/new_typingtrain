@extends('layouts.app')
@section('title', ' | เพิ่มข้อมูลอาจารย์และนักศึกษา')

@section('content')
<style>
    .card { border:none; }
    .form-control { text-align:center; }
    div.container { max-width: 1200px; }
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
                    <div class="card-header text-white bg-dark text-center h3">เพิ่มข้อมูลนักศึกษา</div>
                    <div class="card-body">
                        <form action="{{ route('import-user') }}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                            <div class="row mb-2 justify-content-center">
                                <div class="col-md-6">
                                    <input type="file" name="import-user" id="import-user"class="form-control @error('import-user') is-invalid @enderror">

                                    @error('import-user')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="col-md-1 btn btn-primary mb-2">เพิ่มข้อมูล</button>
                                <button type="button" class="col-md-1 ms-1 btn btn-danger mb-2" style="width: 200px;">
                                    <a href="{{ url('/export-template-user') }}">ดาวน์โหลด Template</a>
                                </button>
                                
                                {{-- <a href="{{ route('export-template-user') }}" class="col-md-1 ms-1 btn btn-danger" style="width: 200px;">ดาวน์โหลด Template</a> --}}
                                @if(Session::has('import-fail'))
                                    <div class="col-md-8 alert alert-danger text-center" style="margin: 0 auto;">
                                        @foreach (Session::get('import-fail') as $failure)
                                            {{ $failure->errors()[0] }} at row: {{ $failure->row() }} in excel file. <br>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </form>

                        <table class="table table-hover table-striped text-center">
                            <thead>
                                <tr style="background: var(--bs-warning);">
                                    <th >รหัสนักศึกษา</th>
                                    <th >ชื่อผู้ใช้งาน</th>
                                    <th >นามสกุล</th>
                                    <th >อีเมล</th>
                                    <th >สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($users))
                                    @php($i=1)
                                    @foreach ($users as $user)
                                    <tr class="text-center">
                                        <td>{{ $user->userid }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->lname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
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

@section('script')
    
@endsection