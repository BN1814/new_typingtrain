<style>    
    a, a:hover{ color:#333 }
    .card { border:none; }
</style>
    <div class="card-body">
        <div class="row mb-4">
            <label class="col-md-4 col-form-label text-end">รหัสผ่านเก่า : </label>
            <div class="col-md-6">
                <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="ใส่รหัสผ่านเก่า" name="oldpassword" id="password" value="{{ old('password') }}">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                {{-- <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a> --}}
            </div>
        </div>
        <div class="row mb-4">
            <label class="col-md-4 col-form-label text-end">รหัสผ่านใหม่ : </label>
            <div class="col-md-6">
                <input class="form-control @error('newpassword') is-invalid @enderror" type="password" placeholder="ใส่รหัสผ่านใหม่" name="newpassword" id="newpassword">
                @error('newpassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                {{-- <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a> --}}
            </div>
        </div>
        <div class="row mb-4">
            <label class="col-md-4 col-form-label text-end">ยืนยันรหัสผ่านใหม่ : </label>
            <div class="col-md-6">
                <input class="form-control @error('cnewpassword') is-invalid @enderror" type="password" placeholder="ใส่รหัสผ่านใหม่อีกครั้ง" name="cnewpassword" id="cnewpassword">
                @error('cnewpassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                {{-- <a href=""><i class="fa fa-eye-slash float-end mt-1" aria-hidden="true"></i></a> --}}
                <input type="checkbox" onclick="blindpasswordFunction()" class="mt-1" style="margin:0;"><p class="d-inline ms-1" style="font-size: 16px; color:black; height:10px;">แสดงรหัสผ่าน</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary form-control">
                    {{ __('เปลี่ยนรหัสผ่าน') }}
                </button>
            </div>
        </div>
    </div>
@section('script')
    <script>
        // $(document).ready(function() {
        //     $("#oldpassword a").on('click', function(event) {
        //         event.preventDefault();
        //         if($('#oldpassword input').attr("type") == "text"){
        //             $('#oldpassword input').attr('type', 'password');
        //             $('#oldpassword i').addClass( "fa-eye-slash" );
        //             $('#oldpassword i').removeClass( "fa-eye" );
        //         }else if($('#oldpassword input').attr("type") == "password"){
        //             $('#oldpassword input').attr('type', 'text');
        //             $('#oldpassword i').removeClass( "fa-eye-slash" );
        //             $('#oldpassword i').addClass( "fa-eye" );
        //         }
        //     });
        // });
        function blindpasswordFunction() {
            var password = document.getElementById('password');
            var newpassword = document.getElementById('newpassword');
            var cnewpassword = document.getElementById('cnewpassword');
            if(password.type === 'password' || newpassword.type === 'password' || cnewpassword.type === 'password'){
                password.type = 'text';
                newpassword.type = 'text';
                cnewpassword.type = 'text';
            }
            else {
                password.type = 'password';
                newpassword.type = 'password';
                cnewpassword.type = 'password';
            }
        }
    </script>
@endsection