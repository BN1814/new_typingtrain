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
        /* Main-content */
        .main-addSTD {
            position: relative;
            top: 55px;
            left: 240px;
            width: calc(100% - 257px);
            height: calc(100vh - 50px);
        }
        .add-admin-student {
            position: absolute;
            top: 25%;
            left: 25%;
            width: 50%;
            height: auto;
            background: antiquewhite;
            border-radius: 15px;
        }
        .add-admin-student .head-add-student {
            background: #333;
            width: 100%;
            height: 50px;
            text-align: center;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .add-admin-student .head-add-student p {
            color: #fff;
            line-height: 50px;
            font-size: 18px;
            font-weight: bold;
        }
        .add-admin-student .body-add-student {
            width: 100%;
            height: auto;
            background: transparent;
        }
        .add-admin-student form {
            width: 100%;
            height: auto;
            text-align: center;
            display: block;
        }
        .add-admin-student form label {
            font-size: 16px;
            font-weight: 500;
            text-transform: uppercase;
        }
        .add-admin-student form input {
            width: 300px;
            height: 30px;
            border-radius: 5px;
            border: 0;
            outline: none;
            margin-top: 20px;
        }
        .add-admin-student form input:focus {
            border: 1px solid #555;
        }
        button {
            color: #fff;
            width: 80px;
            height: 30px;
            border-radius: 8px;
            border: 0;
            outline: none;
            margin-top: 20px;
            margin-bottom: 15px;
        }
        .save {
            margin-left: 180px;
            background: #81d43a;
        }
        .save:hover {
            background: #489b00;
        }
        .cancel {
            margin-left: 20px;
            background: #fc3b56;
        }
        .cancel:hover {
            background: #bb011a;
        }
        /* Media Screen */
        @media screen and (max-width: 768px) {
            #sidebar {
                top: 13.5%;
                width: 180px;
            }
            .add-admin-student {
                width: 350px;
                left: 20px;
            }
            .add-admin-student form label {
                font-size: 15px;
                margin-top: 10px;
            }
            .add-admin-student form input {
                width: 200px;
            }
            .save {
                margin-left: 85px;
            }
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
        <div class="main-addSTD">
            <div class="add-admin-student">
                <div class="head-add-student">
                    <p>เพิ่มข้อมูลนักเรียน</p>
                </div>
                <div class="body-add-student">
                    <form action="#" method="#">
                        <div class="studentID">
                            <label for="studentid">Student ID :</label>
                            <input type="text" name="studentid" placeholder="Student_ID">
                        </div>
                        <div class="email">
                            <label for="email" style="margin-left: 45px;">Email :</label>
                            <input type="email" name="email" placeholder="E-mail Address">
                        </div>
                        <div class="username">
                            <label for="username" style="margin-left: 12px;">Username :</label>
                            <input type="text" name="username" placeholder="Username">
                        </div>
                    </form>
                    <button type="submit" class="save">บันทึก</button>
                    <button type="button" class="cancel">ยกเลิก</button>
                </div>
            </div>
        </div>

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
