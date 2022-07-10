@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/ExEn/exerciseEnglish.css">
<div class="container">
    <span class="head h1 d-block text-center px-2 mb-1">D and K</span>
</div>
<body>
    @include('include.includeExEn')
    <script src="js/ExEn/DK.js" defer></script>
</body>
    @include('include.includeKB')
@endsection

