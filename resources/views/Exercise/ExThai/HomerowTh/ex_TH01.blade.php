@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ExEn/exerciseThai.css') }}">
<link rel="stylesheet" href="{{ asset('css/ExEn/popupTH.css') }}">
    <div class="container mt-1">
        <span class="head h1 d-block text-center px-2 mb-2">ระดับ 01: ด และ  _่ </span>
    </div>
    <body>
    {{-- @include('include.includeExTh') --}}
        <form>
            @csrf
            <div class="form-group">
                <div class="container wrapper mb-3 mt-1">
                    <input type="text" class="input-field">
                    <div class="content-box">
                        <div class="typing-text">
                            <p></p>
                        </div>
                        <div class="content">
                            <ul class="result-details">
                                <li class="time" name="time">
                                    <p>เวลาที่เหลือ :</p>
                                    <span><b>60</b></span>
                                </li>
                                <li class="mistake" name="mistake">
                                    <p>คำที่ผิด :</p>
                                    <span>0</span>
                                </li>
                                <li class="wpm" name="wpm">
                                    <p>ความเร็วคำต่อนาที :</p>
                                    <span>0</span>
                                </li>
                                <li class="cpm" name="cpm">
                                    <p>คำที่ถูกต้อง :</p>
                                    <span>0</span>
                                </li>
                            </ul>
                            {{-- <button class="butt">Try Again</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @include('include.includeKBTh')
        <div class="pop-up-score shadow-lg" style="color: #fff;">
            <p id="close_popup">+</p>
            <div class="head-level">
                <p>ระดับ 01: ด และ  _่ </p>
            </div>
            <div class="history-score">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <ul class="detail-score shadow-lg">
                            <li class="timee">
                                <p>เวลาที่เหลือ : </p>
                                <span><b>0</b></span>
                            </li>
                            <li class="mistakee">
                                <p>คำที่ผิด : </p>
                                <span>0</span>
                            </li>
                            <li class="wpme">
                                <p>ความเร็วคำต่อนาที : </p>
                                <span>0</span>
                            </li>
                            <li class="cpme">
                                <p>คำที่ถูกต้อง : </p>
                                <span>0</span>
                            </li>
                            <li class="scoree">
                                <p>คะแนน : </p>
                                <span>0</span>
                            </li>
                        </ul>
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
    <script src="{{ asset('js/ExTH/HomerowTh/TH01.js')}}" defer></script>
@endsection