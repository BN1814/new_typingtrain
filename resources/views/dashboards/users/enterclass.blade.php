@extends('layouts.app')
@section('title', ' | หน้าแรก - เข้าห้องเรียน')

@section('content')
<style>
    .card { border:none; }
</style>
    <div class="container mt-3">
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
                            showConfirmButton: true,
                            ConfirmButtonText: 'ตกลง',
                            confirmButtonColor: '#212529',
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
                                <label for="entclass" class="col-md-3 col-form-label text-md-end">{{ __('รหัสเข้าห้องเรียน : ') }}</label>
        
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

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center text-white bg-dark h4">ห้องเรียนของ <strong class="d-inline text-warning h3">{{ $user->name }}</strong> ทั้งหมด
                    </div>
                    <div class="card-body">
                        @if(count($sections) > 0)
                        <table class="table table-bordered table-hover text-center" id="enterclassroom">
                            <thead>
                                <tr class="text-white" style="background: var(--bs-gray-dark);">
                                    <th>ลำดับ</th>
                                    {{-- <th>ชื่ออาจารย์</th></th> --}}
                                    <th>รหัสวิชา</th>
                                    <th>ชื่อวิชา</th>
                                    <th>รหัสเข้าห้องเรียน</th>
                                    <th>กำหนดส่ง</th>
                                    <th>ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach ($sections as $section)
                                <tr>
                                    {{-- <input type="hidden" class="outclass" value="{{ $section->id }}"> --}}
                                    <td>{{ $i++ }}</td>
                                    {{-- <td>{{ $section->name }}</td> --}}
                                    <td>{{ $section->section_sub }}</td>
                                    <td>{{ $section->section_name }}</td>
                                    <td>{{ $section->code_inclass }}</td>
                                    <td>วัน{{ \Carbon\Carbon::parse($section->deadline_date)->thaidate('lที่ j F Y') }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm">
                                            <a href="{{ url('user/enterclass/homeEx/'. $section->section_id. '/'. $user->id) }}">ทำแบบทดสอบ</a>
                                        </button>
                                        {{-- <button class="btn btn-sm btn-danger outclassroom" data-name="{{ $section->section_name }}">ออกจากห้องเรียน</button> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <p class="text-center fw-bold mt-3 text-danger fs-5">คุณยังไม่มีห้องเรียน</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#enterclassroom').DataTable( {
            lengthMenu: [
                [ -1, 5, 10, 25, 50, 100 ],
                [ 'ทั้งหมด', '5', '10', '25', '50', '100' ]
            ],
            "language": {
                "decimal":        "",
                // "emptyTable":     "ไม่มีผลลัพธ์ที่ค้นหา",
                "info":           "แสดง _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ",
                "infoEmpty":      "แสดง 0 ถึง 0 จากทั้งหมด 0 รายการ",
                "infoFiltered":   "(ค้นหาทั้งหมดจาก _MAX_ รายการ)",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "แสดง _MENU_ รายการ",
                "loadingRecords": "กำลังค้นหา...",
                "processing":     "",
                "search":         "ค้นหา:",
                "zeroRecords":    "ไม่มีผลลัพธ์ที่ค้นหา",
                "paginate": {
                    "first":      "หน้าแรก",
                    "last":       "หน้าสุดท้าย",
                    "next":       "หน้าถัดไป",
                    "previous":   "หน้าก่อนหน้า"
                },
                "aria": {
                "sortAscending":  ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
                }
            }
        });
    });
</script>
@endsection