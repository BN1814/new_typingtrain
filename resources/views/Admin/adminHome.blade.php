@extends('layouts.app')

@section('content')
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <style>
        * {
            margin: 0; padding: 0; box-sizing: border-box;
        }
        body {
            min-height: 100vh;
            font-family: 'Ubuntu', sans-serif;
        }
        :root {
            --grey: #f1f0f6;
            --dark-grey: #808d8d;
            --light: #fff;
            --dark: #000;
            --green: #81d43a;
            --light-green: #e3ffcb;
            --blue: #1775f1;
            --light-blue: #d0e4ff;
            --dark-blue: #0c5fcd;
            --red: #fc3b56;
            --dark-light: #333;
        }
        a {
            text-decoration: none;
        }
        li {
            list-style: none;
        }

        /* sidebar */
        #sidebar {
            position: fixed;
            width: 240px;
            background: transparent;
            border-right: 1px solid rgb(207, 207, 207);
            top: 9%;
            left: 0;
            height: 100%;
            overflow-y: auto;
            scrollbar-width: none;
            box-shadow: 4px 4px 4px rgba(0,0,0,0.1);
        }
        #sidebar::-webkit-scrollbar {
            display: none;
        }
        #sidebar .brand {
            font-size: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 64px;
            font-weight: 500;
            color: var(--dark-light);
        }
        #sidebar .icon {
            min-width: 48px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #sidebar .icon-right {
            margin-left: auto;
            transition: all .3s ease;
        }
        #sidebar .side-menu {
            margin: 36px 0;
            padding: 0 20px;
        }
        #sidebar .side-menu a {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: var(--dark);
            padding: 12px 16px 12px 0;
            transition: all .3s ease;
            border-radius: 10px;
            margin: 4px 0;
            grid-gap: 6px;
        }
        #sidebar .side-menu > li > a:hover {
            background: var(--light);
            color: var(--blue);
        }
        #sidebar .side-menu > li > a.active .icon-right {
            transform: rotate(90deg);
        }
        #sidebar .side-menu > li > a.active,
        #sidebar .side-menu > li > a.active:hover {
            background: var(--blue);
            color: var(--light);
        }
        #sidebar .divider {
            margin-top: 24px;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 700;
            color: var(--dark-grey);
        }
        #sidebar .side-dropdown {
            padding-left: 48px;
            max-height: 0;
            overflow-y: hidden;
            transition: all .1s ease;
        }
        #sidebar .side-dropdown.show {
            max-height: 1000px;
        }
        #sidebar .side-dropdown a:hover {
            color: var(--blue);
        }
    </style>
    <body>
        {{-- SIDEBAR--}}
        <section id="sidebar">
            <a href="#" class="brand">Admin</a>
            <ul class="side-menu">
                <li><a href="#"><i class='bx bxs-dashboard icon'></i>Dashboard</a></li>
                <li>
                    <a href="#"><i class='bx bxs-inbox icon'></i>อาจารย์ <i class='bx bx-chevron-right icon'></i></a>
                    <ul class="side-dropdown">
                        <a href="addDataTeacher">เพิ่มข้อมูลอาจารย์</a>
                        <a href="#">ดูข้อมูลอาจารย์</a>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class='bx bxs-notepad icon'></i>นักศึกษา <i class='bx bx-chevron-right'></i></a>
                    <ul class="side-dropdown">
                        <a href="addDataSTD">เพิ่มข้อมูลนักศึกษา</a>
                        <a href="#">แก้ไขข้อมูลนักศึกษา</a>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class='bx bxs-notepad icon'></i>แบบทดสอบ <i class='bx bx-chevron-right'></i></a>
                    <ul class="side-dropdown">
                        <a href="#">เพิ่มข้อมูลแบบทดสอบ</a>
                        <a href="#">แก้ไขแบบทดสอบ</a>
                    </ul>
                </li>
            </ul>
        </section>

        {{-- JAVASCRIPT --}}
        <script>
            const allDropdown = document.querySelectorAll
            ('#sidebar .side-dropdown');

            allDropdown.forEach(item => {
                const a = item.parentElement.querySelector('a:first-child');
                a.addEventListener('click', function (e) {
                    e.preventDefault();

                    if(!this.classList.contains('active')) {
                        allDropdown.forEach(i => {
                            const aLink = i.parentElement.querySelector('a:first-child');

                            aLink.classList.remove('active');
                            i.classList.remove('show');
                        });
                    }
                    this.classList.toggle('active');
                    item.classList.toggle('show');
                });
            });

            // profile dropdown
            const profile = document.querySelector('nav .profile');
            const imgProfile = document.querySelector('img');
            const dropdownProfile = document.querySelector('.profile-link');

            imgProfile.addEventListener('click',function() {
                dropdownProfile.classList.toggle('show');
            });

            window.addEventListener('click',function (e) {
                if(e.target !== imgProfile){
                    if(e.target !== dropdownProfile) {
                        if(dropdownProfile.classList.contains('show')) {
                            dropdownProfile.classList.remove('show');
                        }
                    }
                }
            });
        </script>
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    </body>
@endsection
