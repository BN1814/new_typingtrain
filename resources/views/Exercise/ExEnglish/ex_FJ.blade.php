@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/ExEn/exerciseEnglish.css') }}">
    <div class="container mt-1">
        <span class="head h1 d-block text-center px-2 mb-2">Level 01: F & J</span>
    </div>
    <body>
        @include('include.includeExEn')
    </body>
    @include('include.includeKB')
    <script src="{{ asset('js/ExEn/FJ.js')}}" defer></script>
@endsection