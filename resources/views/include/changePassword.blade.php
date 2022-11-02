<style>    
    a, a:hover{ color:#333 }
    .card { border:none; }
</style>
    <div class="card-body">
        <div class="row mb-4">
            <label class="col-md-4 col-form-label text-end">รหัสผ่านเก่า : </label>
            <div class="col-md-6" id="oldpassword">
                <input class="form-control" type="password" placeholder="ใส่รหัสผ่านเก่า" name="oldpassword">
                {{-- <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a> --}}
            </div>
        </div>
        <div class="row mb-4">
            <label class="col-md-4 col-form-label text-end">รหัสผ่านใหม่ : </label>
            <div class="col-md-6" id="oldpassword">
                <input class="form-control" type="password" placeholder="ใส่รหัสผ่านใหม่" name="newpassword">
                {{-- <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a> --}}
            </div>
        </div>
        <div class="row mb-4">
            <label class="col-md-4 col-form-label text-end">ยืนยันรหัสผ่านใหม่ : </label>
            <div class="col-md-6" id="oldpassword">
                <input class="form-control" type="password" placeholder="ใส่รหัสผ่านใหม่อีกครั้ง" name="cnewpassword">
                {{-- <a href=""><i class="fa fa-eye-slash float-end mt-1" aria-hidden="true"></i></a> --}}
                <input type="checkbox" onclick="blindpasswordFunction()" class="mt-3" style="margin:0;"><p class="d-inline ms-1" style="font-size: 16px; color:black; height:10px;">แสดงรหัสผ่าน</p>
            </div>
        </div>
    
        <div class="row" style="margin:0; padding:0;">
            <div class="col-md-4 offset-md-4">
                <button type="submit" class="btn btn-primary">
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
        function blindpasswordFunction() {
            var oldpassword = document.getElementById('oldpassword');
            var newpassword = document.getElementById('newpassword');
            var cnewpassword = document.getElementById('cnewpassword');
            if(oldpassword.type === 'oldpassword' || newpassword.type === 'newpassword' || cnewpassword.type === 'cnewpassword'){
                oldpassword.type = 'text';
                oldpassword.type = 'text';
                oldpassword.type = 'text';
            }
            else {
                password.type = 'password';
            }
        }
    </script>
@endsection