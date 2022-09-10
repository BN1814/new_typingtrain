@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <input type="text" class="form-control">
                <button class="btn btn-primary" type="button" id="test">ทดสอบ</button>
            </div>
        </div>
    </div>

    <script>
        function TestAlert() {
            let data = document.querySelector('#test');
            data.addEventListener('click', function() {
                console.log('Test Alert');
            });
        }
    </script>
@endsection
