<style>    
    a, a:hover{ color:#333 }
    .card { border:none; }
</style>
    <div class="card-body">
        <div class="row mb-4">
            <label class="col-md-4 col-form-label text-end">รหัสผ่านเก่า</label>
            <div class="col-md-6" id="oldpassword">
                <input class="form-control" type="password" placeholder="Enter old password" name="oldpassword" >
                {{-- <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a> --}}
            </div>
        </div>
        <div class="row mb-4">
            <label class="col-md-4 col-form-label text-end">รหัสผ่านใหม่</label>
            <div class="col-md-6" id="oldpassword">
                <input class="form-control" type="password" placeholder="Enter old password" name="newpassword">
                {{-- <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a> --}}
            </div>
        </div>
        <div class="row mb-4">
            <label class="col-md-4 col-form-label text-end">ยืนยันรหัสผ่านใหม่</label>
            <div class="col-md-6" id="oldpassword">
                <input class="form-control" type="password" placeholder="Enter old password" name="cnewpassword">
                <a href=""><i class="fa fa-eye-slash float-end mt-1" aria-hidden="true"></i></a>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <button type="submit" class="btn btn-dark">
                    {{ __('เปลี่ยนรหัสผ่าน') }}
                </button>
            </div>
        </div>
    </div>
    @section('script')
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
    @endsection