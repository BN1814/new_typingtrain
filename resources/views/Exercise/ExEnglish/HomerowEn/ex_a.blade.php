@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ExEn/exerciseEnglish.css') }}">
    <div class="container mt-1">
        <span class="head h1 d-block text-center px-2 mb-2">Level 04: a & ;</span>
    </div>
    <body>
        @include('include.includeExEn')
        <script src="{{ asset('js/ExEn/HomerowEn/a.js')}}" defer></script>
    </body>
    @include('include.includeKB')
@endsection