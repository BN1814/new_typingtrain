@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ExEn/exerciseEnglish.css') }}">
    <div class="container mt-1">
        <span class="head h1 d-block text-center px-2 mb-2">Level 26: c & ,</span>
    </div>
    <body>
        @include('include.includeExEn')
        <script src="{{ asset('js/ExEn/BottomrowEn/C.js')}}" defer></script>
    </body>
    @include('include.includeKB')
@endsection