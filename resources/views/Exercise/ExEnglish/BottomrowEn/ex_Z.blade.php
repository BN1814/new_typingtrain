@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ExEn/exerciseEnglish.css') }}">
<link rel="stylesheet" href="{{ asset('css/ExEn/popupEN.css') }}">
    <div class="container mt-1">
        <span class="head h1 d-block text-center px-2 mb-2">Level 28: z & /</span>
    </div>
    <body>
        @include('include.includeExEn')
        @include('include.includeKB')
        <div class="pop-up-score shadow-lg" style="color: #fff;">
            <p id="close_popup">+</p>
            <div class="head-level">
                <p>LEVEL 28 : z & /</p>
            </div>
            <div class="history-score">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <p class="h4">Time Left : <span>0</span></p>
                    </div>
                    <div class="col-md-8">
                        <p class="h4">Mistakes : <span>0</span></p>
                    </div>
                    <div class="col-md-8">
                        <p class="h4">WPM : <span>0</span></p>
                    </div>
                    <div class="col-md-8">
                        <p class="h4">CPM : <span>0</span></p>
                    </div>
                </div>
            </div>
            <div class="foot-score d-flex justify-content-center">
                <button class="btn btn-dark text-white ms-1 pn-score try_again">
                    {{ __('Try Again') }}
                </button>
                <button class="btn btn-dark text-white pn-score ms-1 next">
                    <a href="#">Next</a>
                </button>
            </div>
        </div>
    </body>
    <script src="{{ asset('js/ExEn/BottomrowEn/Z.js')}}" defer></script>
@endsection