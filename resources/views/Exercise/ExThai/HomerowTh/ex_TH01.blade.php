@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ExEn/exerciseThai.css') }}">
    <div class="container mt-1">
        <span class="head h1 d-block text-center px-2 mb-2">ระดับ 01: ด และ  ่ </span>
    </div>
    <body>
        @include('include.includeExTH')
        <script src="{{ asset('js/ExTH/HomerowTh/TH01.js')}}" defer></script>
    </body>
    @include('include.includeKB')
@endsection