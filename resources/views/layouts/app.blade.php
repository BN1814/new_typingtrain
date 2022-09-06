<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TypingTrain</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background: rgb(135, 188, 231);
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        a:hover { color: #fff;}
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                @guest
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <p style="margin: 0; padding: 0;">TypingTrain</p>
                    </a>
                @endguest
                @auth
                    @if(auth()->user()->role == 'admin')
                        <a class="navbar-brand" href="{{ url('admin/dashboard') }}">
                            <p style="margin: 0; padding: 0;">TypingTrain</p>
                        </a>
                    @elseif(auth()->user()->role == 'teacher')
                        <a class="navbar-brand" href="{{ url('teacher/dashboard') }}">
                            <p style="margin: 0; padding: 0;">TypingTrain</p>
                        </a>
                    @else
                        <a class="navbar-brand" href="{{ url('user/dashboard') }}">
                            <p style="margin: 0; padding: 0;">TypingTrain</p>
                        </a>
                    @endif
                @endguest
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('เข้าสู่ระบบ') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('ลงทะเบียน') }}</a>
                                </li>
                            @endif
                        @else
                            @if(auth()->user()->role == 'admin')
                                <li><a href="{{ url('admin/dashboard') }}" class="nav-link">หน้าแรก</a></li>
                                <li><a href="{{ url('admin/add_data_teacher_student') }}" class="nav-link">เพิ่มอาจารย์และนักศึกษา</a></li>
                                <li><a href="{{ url('admin/add_data_exercises') }}" class="nav-link">เพิ่มแบบทดสอบ</a></li>
                                <div class="nav-item">
                                    <form method="get" role="search" style="height: 20px;">
                                        <div class="input-group col-2 mb-2">
                                            <input type="search" class="form-control rounded text-start" placeholder="ค้นหา" aria-label="Search" aria-describedby="search-addon" name="search">
                                            <button type="submit" class="btn btn-danger text-white" value="{{ old('search') }}">ค้นหา</button>
                                            <button type="reset" class="btn btn-warning text-white">
                                                <a href="{{ url('admin/dashboard') }}">รีเซ็ต</a>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @elseif (auth()->user()->role == 'teacher')
                                <li><a href="{{ route('teacher.dashboard') }}" class="nav-link">สร้างห้องเรียน</a></li>
                                <li><a href="{{ url('teacher/classroom') }}" class="nav-link">ห้องเรียน</a></li>
                                <li><a href="{{ url('teacher/dataSTD') }}" class="nav-link">ดูข้อมูลนักศึกษา</a></li>
                            @else
                                <li><a href="{{ url('user/dashboard') }}" class="nav-link">หน้าแรก</a></li>
                                <li><a href="{{ url('user/enterclass') }}" class="nav-link">เข้าห้องเรียน</a></li>
                            @endif
                            <li class="nav-item dropdown">
                                {{-- <box-icon type="solid" name="user" style="background: gray"></box-icon> --}}
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if(auth()->user()->role == 'admin')
                                    <a href="{{ url('admin/profile/'.auth()->user()->id.'/edit') }}" class="dropdown-item">ข้อมูลส่วนตัว</a>
                                    <a href="{{ url('admin/changePassword/'.auth()->user()->id) }}" class="dropdown-item">เปลี่ยนรหัสผ่าน</a>
                                @elseif (auth()->user()->role == 'teacher')
                                    <a href="{{ url('teacher/profile/'.auth()->user()->id.'/edit') }}" class="dropdown-item">ข้อมูลส่วนตัว</a>
                                    <a href="{{ url('teacher/changePassword') }}" class="dropdown-item">เปลี่ยนรหัสผ่าน</a>
                                @else
                                    <a href="{{ url('user/profile/'. auth()->user()->id.'/edit') }}" class="dropdown-item">ข้อมูลส่วนตัว</a>
                                    <a href="{{ url('user/changePassword') }}" class="dropdown-item">เปลี่ยนรหัสผ่าน</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('ออกจากระบบ') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
</body>
</html>
