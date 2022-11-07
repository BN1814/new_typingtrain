<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TypingTrain @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">

    {{-- ALERT MESSAGE --}}
    {{-- <script src="{{ asset('js/sweetalert2.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.32/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.32/sweetalert2.min.css">
    {{-- JQUERY --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
    {{-- DATATABLE --}}
    <link rel="stylesheet" href="http://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    
    


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body { background:rgb(135, 188, 231); }
        a { color:#fff; text-decoration:none;}
        a:hover { color:#fff;}
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
                        <a class="navbar-brand" href="{{ url('user/enterclass') }}">
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
                                {{-- <li><a href="{{ url('admin/dashboard') }}" class="nav-link">ผู้ใช้งานทั้งหมด</a></li>
                                <li><a href="{{ url('admin/exercise_all') }}" class="nav-link">แบบฝึกหัดทั้งหมด</a></li>
                                <li><a href="{{ url('admin/section_all') }}" class="nav-link">ห้องเรียนทั้งหมด</a></li> --}}
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('ข้อมูลทั้งหมด') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        @if(auth()->user()->role == 'admin')
                                            <a href="{{ url('admin/dashboard') }}" class="dropdown-item">ผู้ใช้งานทั้งหมด</a>
                                            <a href="{{ url('admin/exercise_all') }}" class="dropdown-item">แบบทดสอบทั้งหมด</a>
                                            <a href="{{ url('admin/section_all') }}" class="dropdown-item">ห้องเรียนทั้งหมด</a>
                                        @endif
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('เพิ่มข้อมูล') }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        @if(auth()->user()->role == 'admin')
                                            <a href="{{ url('admin/add_data_teacher_student') }}" class="dropdown-item">เพิ่มอาจารย์และนักศึกษา</a>
                                            <a href="{{ url('admin/add_data_exercises') }}" class="dropdown-item">เพิ่มแบบทดสอบ</a>
                                        @endif  
                                    </div>
                                </li>
                            @elseif (auth()->user()->role == 'teacher')
                                <li><a href="{{ route('teacher.dashboard') }}" class="nav-link">สร้างห้องเรียน</a></li>
                                <li><a href="{{ url('teacher/classroom') }}" class="nav-link">ห้องเรียน</a></li>
                            @else
                                {{-- <li><a href="{{ url('user/dashboard') }}" class="nav-link">หน้าแรก</a></li> --}}
                                <li><a href="{{ url('user/enterclass') }}" class="nav-link">เข้าห้องเรียน</a></li>
                                <li><a href="{{ url('user/histories_score/' . Auth::user()->id) }}" class="nav-link">ประวัติการทำแบบทดสอบ</a></li>
                            @endif
                            <li class="nav-item dropdown">
                                {{-- <box-icon type="solid" name="user" style="background: gray"></box-icon> --}}
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if(auth()->user()->role == 'admin')
                                        <a href="{{ url('admin/profile/'.auth()->user()->id.'/edit') }}" class="dropdown-item">ข้อมูลส่วนตัว</a>
                                        {{-- <a href="{{ url('admin/changePassword/'.auth()->user()->id) }}" class="dropdown-item">เปลี่ยนรหัสผ่าน</a> --}}
                                    @elseif (auth()->user()->role == 'teacher')
                                        <a href="{{ url('teacher/profile/'.auth()->user()->id.'/edit') }}" class="dropdown-item">ข้อมูลส่วนตัว</a>
                                        <a href="{{ url('teacher/changePassword') }}" class="dropdown-item">เปลี่ยนรหัสผ่าน</a>
                                        <a href="{{ route('contact') }}" class="dropdown-item">ติดต่อเรา</a>
                                    @else
                                        <a href="{{ url('user/profile/'. auth()->user()->id.'/edit') }}" class="dropdown-item">ข้อมูลส่วนตัว</a>
                                        <a href="{{ route('change-password') }}" class="dropdown-item">เปลี่ยนรหัสผ่าน</a>
                                        <a href="{{ route('contact') }}" class="dropdown-item">ติดต่อเรา</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
    <script src="http://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    @yield('script')
</body>
</html>
