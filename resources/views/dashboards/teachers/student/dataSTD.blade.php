@extends('layouts.app')

@section('content')
<style>
    a:hover {
        color: #fff;
    }
</style>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('update'))
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: '{{ session('update') }}',
                            showConfirmButton: false,
                            confirmButtonColor: '#212529',
                            ConfirmButtonText: 'ตกลง',
                            timer: 1500
                        })
                    </script>
                @endif
                <div class="card">
                    <div class="card-header text-center text-white bg-dark h4">ข้อมูลนักศึกษา</div>
                    <p class="text-center mt-2 h4" style="margin:0; padding:0; font-weight:bold; text-transform:uppercase;">{{ $section->section_name }}</p>
                    <div class="card-body">
                        <form method="get" role="search">
                            <div class="input-group col-2 mb-2">
                                <input type="search" class="form-control rounded" placeholder="ค้นหา" aria-label="Search" aria-describedby="search-addon" name="search" value="{{ old('search') }}">
                                <button type="submit" class="btn btn-dark text-white" >ค้นหา</button>
                                <button type="reset" class="btn btn-danger text-white">
                                    <a href="{{ url('teacher/dataSTD/'. $section->id) }}">รีเซ็ต</a>
                                </button>
                            </div>
                        </form>
                        @if(count($users) > 0)
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ลำดับ</th>
                                    <th>ไอดี</th>
                                    <th>รหัสนักศึกษา</th>
                                    <th>ชื่อ</th>
                                    <th>นามสกุล</th>
                                    <th>อีเมล</th>
                                    <th>ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @php($i=1)
                                <tr>
                                @foreach ($users as $user)
                                    <input type="hidden" class="delete_user_id" value="{{ $user->id }}">

                                    {{-- <?php dd($user->id); ?> --}}
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->userid }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->lname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">
                                        {{-- View --}}
                                        <a href="{{ url('teacher/dataSTD/'.$section->id .'/'.'view_data_student/'. $user->id ) }}" class="btn btn-primary btn-sm">ดูข้อมูล</a>
                                        {{-- Update --}}
                                        <a href="{{ url('teacher/dataSTD/'. $section->id .'/'. $user->id. '/edit') }}" class="btn btn-warning btn-sm">แก้ไข</a>
                                        {{-- Delete --}}
                                        <button class="btn btn-danger btn-sm delete" data-name="{{ $user->name }}" data-id="{{ $user->id }}">ลบ</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p class="text-center mt-4">{{ __('ไม่มีผลลัพธ์ที่ค้นหา') }}</p>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.delete').click( function(e) {
            e.preventDefault();
            var delete_id = $(this).closest('tr').find('.delete_user_id').val();
            var user_name = $(this).attr('data-name');
            Swal.fire({
                title: 'ต้องการลบ',
                text: "คุณต้องการลบ "+user_name+" ใช่หรือไม่",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่ ฉันต้องการลบ',
                cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                if (result.isConfirmed) {
                    var data = {
                        "_token": $('input[name="_token"]').val(),
                        "id": delete_id,
                    }
                    $.ajax({
                        type: "DELETE",
                        url: "/teacher/dataSTD/" + delete_id,
                        data: data,
                        success: function(response) {
                            Swal.fire(response.delete, {
                                icon: 'success',
                            })
                            .then((result) => {
                                location.reload();
                            });
                        }
                    });
                }
            })
        });
    });
</script>
@endsection