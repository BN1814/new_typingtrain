@extends('layouts.app')

@section('content')
<style>
    a, a:hover{ color:#333 }
    .card { border:none; }
</style>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-white bg-dark text-center h3">
                        {{ __('เปลี่ยนรหัสผ่าน') }}
                    </div>
                    @if(Auth::user()->role == 'teacher')
                        <form action="{{ url('teacher/changePassword')}}" method="post">
                            @csrf
                            @include('include.changePassword')
                            {{-- <div class="card-body">
                                <div class="row mb-4">
                                    <label class="col-md-4 col-form-label text-end">รหัสผ่านเก่า : </label>
                                    <div class="col-md-6" id="oldpassword">
                                        <input class="form-control" type="password" placeholder="ใส่รหัสผ่านเก่า" name="oldpassword" >
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-4 col-form-label text-end">รหัสผ่านใหม่ : </label>
                                    <div class="col-md-6" id="oldpassword">
                                        <input class="form-control" type="password" placeholder="ใส่รหัสผ่านใหม่" name="newpassword">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-4 col-form-label text-end">ยืนยันรหัสผ่านใหม่ : </label>
                                    <div class="col-md-6" id="oldpassword">
                                        <input class="form-control" type="password" placeholder="ใส่รหัสผ่านใหม่อีกครั้ง" name="cnewpassword">
                                        <a href=""><i class="fa fa-eye-slash float-end mt-1" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('เปลี่ยนรหัสผ่าน') }}
                                        </button>
                                    </div>
                                </div>
                            </div> --}}
                        </form>
                    @elseif(Auth::user()->role == 'user')
                        <form action="{{ url('user/changePassword') }}" method="post">
                            @csrf
                            @include('include.changePassword')
                            {{-- <div class="card-body">
                                <div class="row mb-4">
                                    <label class="col-md-4 col-form-label text-end">รหัสผ่านเก่า : </label>
                                    <div class="col-md-6" id="oldpassword">
                                        <input class="form-control" type="password" placeholder="ใส่รหัสผ่านเก่า" name="oldpassword" >
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-4 col-form-label text-end">รหัสผ่านใหม่ : </label>
                                    <div class="col-md-6" id="oldpassword">
                                        <input class="form-control" type="password" placeholder="ใส่รหัสผ่านใหม่" name="newpassword">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-4 col-form-label text-end">ยืนยันรหัสผ่านใหม่ : </label>
                                    <div class="col-md-6" id="oldpassword">
                                        <input class="form-control" type="password" placeholder="ใส่รหัสผ่านใหม่อีกครั้ง" name="cnewpassword">
                                        <a href=""><i class="fa fa-eye-slash float-end mt-1" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('เปลี่ยนรหัสผ่าน') }}
                                        </button>
                                    </div>
                                </div>
                            </div> --}}
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('script')
    <script>
        $(document).ready(function() {
        $("#oldpassword a").on('click', function(event) {
            event.preventDefault();
            if($('#oldpassword input').attr("type") == "text"){
                $('#oldpassword input').attr('type', 'password');
                $('#oldpassword i').addClass( "fa-eye-slash" );
                $('#oldpassword i').removeClass( "fa-eye" );
            }else if($('#oldpassword input').attr("type") == "password"){
                $('#oldpassword input').attr('type', 'text');
                $('#oldpassword i').removeClass( "fa-eye-slash" );
                $('#oldpassword i').addClass( "fa-eye" );
            }
        });
    });
    </script>
@endsection --}}