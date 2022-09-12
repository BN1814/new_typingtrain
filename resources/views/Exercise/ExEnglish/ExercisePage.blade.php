@extends('layouts.app')

@section('content')
<style>
    .typing-text p {
        font-size: 34px;
    }
</style>
@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif
    <link rel="stylesheet" href="{{ asset('css/ExEn/exerciseEnglish.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ExEn/popupEN.css') }}">
        <div class="container mt-1">
            <p class="head h1 d-block text-center px-2 mb-2">{{ $exercises->level }}: {{ $exercises->level_name }}</p>
        </div>
        <body id="body">
            {{-- @include('include.includeExEn') --}}
            <div class="form-group">
                <div class="container wrapper mb-3 mt-1">
                    <input type="text" class="input-field">
                    <div class="content-box">
                        <div class="typing-text">
                            <p id="Typingtext">{{ $exercises->data_level }}</p>
                        </div>
                        <div class="content">
                            <ul class="result-details">
                                <li class="time">
                                    <p>Time Left:</p>
                                    <span><b>60</b>s</span>
                                </li>
                                <li class="mistake">
                                    <p>Mistakes:</p>
                                    <span>0</span>
                                </li>
                                <li class="wpm">
                                    <p>WPM:</p>
                                    <span>0</span>
                                </li>
                                <li class="cpm">
                                    <p>CPM:</p>
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
                <form action="{{ route('saveEx') }}" method="post">
                    @csrf
                    <div class="head-level">
                        <input type="text" class="level" name="level" value="{{ $exercises->level }}: {{ $exercises->level_name }}">
                    </div>
                    <div class="history-score">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <ul class="detail-score shadow-lg">
                                    <li class="time" id="time">
                                        <p>Time : </p>
                                        <input type="text" id="poptime" name="time">
                                    </li>
                                    <li class="mistake" id="mistake" >
                                        <p>Mistake : </p>
                                        <input type="text" id="popmistake" name="mistake">
                                    </li>
                                    <li class="wpm" id="wpm">
                                        <p>WPM : </p>
                                        <input type="text" id="popwpm" name="wpm">
                                    </li>
                                    <li class="cpm" id="cpm">
                                        <p>CPM : </p>
                                        <input type="text" id="popcpm" name="cpm">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="foot-score d-flex justify-content-center align-items-center">
                        <button class="btn btn-dark text-white ms-1 pn-score try_again" type="button">
                            {{ __('เล่นอีกครั้ง') }}
                        </button>
                        <button type="submit" class="btn btn-dark text-white ms-1 pn-score submit">
                            {{ __('บันทึกสถิติ') }}
                        </button>
                    </div>
                </form>
            </div>
        </body>
    <script src="{{ asset('js/ExEn/HomerowEn/FJ.js')}}" defer></script>
@endsection