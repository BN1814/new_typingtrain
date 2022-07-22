@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ExEn/exerciseThai.css') }}">
<link rel="stylesheet" href="{{ asset('css/ExEn/popupTH.css') }}">
    <div class="container mt-1">
        <span class="head h1 d-block text-center px-2 mb-2">ระดับ 23: ธ และ ญ </span>
    </div>
    <body>
        @include('include.includeExTH')
        @include('include.includeKBTh')
        <div class="pop-up-score shadow-lg" style="color: #fff;">
            <p id="close_popup">+</p>
            <div class="head-level">
                <p>ระดับ 23 : ธ & ญ</p>
            </div>
            <div class="history-score">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <p class="h4">เวลาที่เหลือ : <span>0</span></p>
                    </div>
                    <div class="col-md-8">
                        <p class="h4">คำที่ผิด : <span>0</span></p>
                    </div>
                    <div class="col-md-8">
                        <p class="h4">ความเร็วคำต่อนาที : <span>0</span></p>
                    </div>
                    <div class="col-md-8">
                        <p class="h4">คำที่ถูกต้อง : <span>0</span></p>
                    </div>
                </div>
            </div>
            <div class="foot-score d-flex justify-content-center">
                <button class="btn btn-dark text-white ms-1 pn-score try_again">
                    {{ __('ลองอีกครั้ง') }}
                </button>
                <button class="btn btn-dark text-white pn-score ms-1 next">
                    <a href="#">ระดับถัดไป</a>
                </button>
            </div>
        </div>
    </body>
    <script src="{{ asset('js/ExTH/ToprowTh/TH23.js')}}" defer></script>
@endsection