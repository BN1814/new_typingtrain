@extends('layouts.app')

@section('content')
{{-- @if(session('success'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            confirmButtonColor: '#212529',
            ConfirmButtonText: 'ตกลง',
            timer: 1500
        })
    </script>
    @endif --}}
    <link rel="stylesheet" href="{{ asset('css/ExEn/exerciseEnglish.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ExEn/popupEN.css') }}">
    <style>
        #poptime, #popmistake, #popwpm, #popcpm, #popscore {
            color: red;
            background: #fff;
            font-size: 14px;
            height: 27px;
            pointer-events: none;
        }
        #sound.active {
            background: var(--bs-danger);
            color: #fff;
            border: none;
            outline: none;
            box-shadow: none;
        }
    </style>
        <div class="container mt-1">
            <p class="head h1 d-block text-center px-2 mb-2 d-inline">LEVEL {{ $exercises->level }} : {{ $exercises->level_name }}
                <button class="btn btn-success float-end" id="sound" onclick="closeSound()">เปิด-ปิดเสียง</button>
            </p>
        </div>
            {{-- @include('include.includeExEn') --}}
            <div class="form-group">
                <div class="container wrapper mb-3 mt-1">
                    <input type="text" class="input-field">
                    <div class="content-box">
                        <div class="typing-text">
                            <p class="typingtext" id="Typingtext" cols="59.5" rows="4">{{ $exercises->data_level }}</p>
                        </div>
                        <div class="content ">
                            <ul class="result-details">
                                <li class="time">
                                    <p>เวลาทั้งหมด :</p>
                                    <span><b>60 </b>วิ</span>
                                </li>
                                <li class="mistake">
                                    <p>ตัวที่พิมพ์ผิด :</p>
                                    <span>0</span>
                                </li>
                                <li class="wpm">
                                    <p>ความเร็วการพิมพ์ :</p>
                                    <span>0</span>
                                </li>
                                <li class="cpm">
                                    <p>ความถูกต้อง :</p>
                                    <span>0</span>
                                </li>
                                <li class="score">
                                    <p>คะแนน :</p>
                                    <span>0</span>
                                </li>
                            </ul>
                            {{-- <button class="butt">Try Again</button> --}}
                        </div>
                    </div>
                </div>
            </div>
            @include('include.includeKB')
            <div class="pop-up-score shadow-lg" style="color: #fff;">
                <p id="close_popup">+</p>
                <form action="{{ url('user/enterclass/homeEx/'. $section->id. '/'. $user->id. '/'. 'AllExercises/'. $exercises->id) }}" method="post">
                    @csrf
                    <div class="head-level">
                        <input type="text" class="level" name="level" value="LEVEL {{ $exercises->level }} : {{ $exercises->level_name }}">
                    </div>
                    <div class="history-score">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-sm-9">
                                <ul class="detail-score shadow-lg">
                                    <li class="time" id="time">
                                        <p>เวลาที่ใช้ไป: </p>
                                        <input type="text" id="poptime" name="time" style="width: 120px;">
                                        <p>วินาที</p>
                                    </li>
                                    <li class="mistake" id="mistake" >
                                        <p>ตัวอักษรที่พิมพ์ผิด : </p>
                                        <input type="text" id="popmistake" name="mistake" style="width: 80px;">
                                        <p>ตัว</p>
                                    </li>
                                    <li class="wpm" id="wpm">
                                        <p>ความเร็วการพิมพ์ : </p>
                                        <input type="text" id="popwpm" name="wpm" style="width: 70px;">
                                        <p>คำ/นาที</p>
                                    </li>
                                    <li class="cpm" id="cpm">
                                        <p>ความถูกต้อง : </p>
                                        <input type="text" id="popcpm" name="cpm" style="width: 120px;">
                                        <p>เปอร์เซ็นต์</p>
                                    </li>
                                    <li class="score" id="score">
                                        <p>คะแนน : </p>
                                        <input type="text" id="popscore" name="score" style="width: 160px;">
                                        <p>คะแนน</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="foot-score d-inline justify-content-center align-items-center">
                        <button class="btn btn-dark text-white  pn-score try_again" type="button">
                            {{ __('เล่นอีกครั้ง') }}
                        </button>
                        <button type="submit" class="btn btn-dark text-white  pn-score submit">
                            {{ __('บันทึกสถิติ') }}
                        </button>
                    </div>
                </form>
            </div>
@endsection

@section('script')
<script src="{{ asset('js/ExEn/HomerowEn/do_exercise.js')}}" defer></script>
<script src="{{ asset('js/ExEn/HomerowEn/keyboard.js')}}" defer></script>
<script src="{{ asset('js/ExEn/HomerowEn/popup.js')}}" defer></script>
<script src="{{ asset('js/ExEn/HomerowEn/changeColor.js')}}" defer></script>
<script src="{{ asset('js/ExEn/HomerowEn/setDeadline.js')}}" defer></script>\
@endsection