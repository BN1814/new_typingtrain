@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/ExEn/exerciseEnglish.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ExEn/popupEN.css') }}">
    <div class="container mt-1">
        <span class="head h1 d-block text-center px-2 mb-2">Level 01 : f & j</span>
    </div>
    <body>
        {{-- @include('include.includeExEn') --}}
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
                                <p>Time Left:</p>
                                <span><b>60</b>s</span>
                            </li>
                            <li class="mistake" name="mistake">
                                <p>Mistakes:</p>
                                <span>0</span>
                            </li>
                            <li class="wpm" name="wpm">
                                <p>WPM:</p>
                                <span>0</span>
                            </li>
                            <li class="cpm" name="cpm">
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
            <div class="head-level">
                <p>LEVEL 01 : f & j</p>
            </div>
            <form>
                <div class="history-score">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <ul class="detail-score shadow-lg">
                                <li class="time">
                                    <p>Time : </p>
                                    <span id= "poptime">0</span>
                                </li>
                                <li class="mistake" id="mistake" >
                                    <p>Mistake : </p>
                                    <span id= "popmistake" >0</span>
                                </li>
                                <li class="wpm" id="wpm">
                                    <p>WPM : </p>
                                    <span id= "popwpm">0</span>
                                </li>
                                <li class="cpm" id="cpm">
                                    <p>CPM : </p>
                                    <span id= "popcpm">0</span>
                                </li>
                                <li class="score" id="score">
                                    <p>Score : </p>
                                    <span id= "popscore">0</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="foot-score d-flex justify-content-center align-items-center">
                    <button class="btn btn-dark text-white ms-1 pn-score try_again">
                        {{ __('Try Again') }}
                    </button>
                    <button type="submit" class="btn btn-dark text-white ms-1 pn-score">
                        {{ __('Submit') }}
                    </button>
                    <button class="btn btn-dark text-white pn-score ms-1 next">
                        <a href="#">Next</a>
                    </button>
                </div>
            </form>
        </div>
    </body>
    <script src="{{ asset('js/ExEn/HomerowEn/FJ.js')}}" defer></script>
@endsection