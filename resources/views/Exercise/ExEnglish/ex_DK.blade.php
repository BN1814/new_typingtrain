@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ExEn/exerciseEnglish.css') }}">
<body>
    <div class="container">
        <span class="head h1 d-block text-center px-2 mb-1">Level 02: D & K</span>
    </div>

    @include('include.includeExEn')
    @include('include.includeKB')
</body>
<script src="{{asset('js/ExEn/DK.js')}}" defer></script>
@endsection

