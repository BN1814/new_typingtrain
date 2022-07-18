@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/ExEn/exerciseThai.css') }}">
<div class="container">
    <span class="head h1 d-block text-center px-2 mb-1"> ด และ   ่ </span>
</div>
<body>
    <p></p>
    @include('include.includeExTh')
    <script src="js/ExEn/DK.js" defer></script>
</body>
    @include('include.includeKBTh')
@endsection

