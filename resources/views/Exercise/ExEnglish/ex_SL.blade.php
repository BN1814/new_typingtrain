@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="css/ExEn/exerciseEnglish.css">
    <div class="container mt-1">
        <span class="head h1 d-block text-center px-2 mb-2">S and L</span>
    </div>
    <body>
        @include('include.includeExEn')
        <script src="js/ExEn/SL.js" defer></script>
    </body>
    @include('include.includeKB')
@endsection