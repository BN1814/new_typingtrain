@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/Teacher/teacherH.css">
<link rel="stylesheet" href="css/Teacher/classRoom.css">
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<body>
    <section id="sidebar">
        <a href="#" class="brand">Teacher</a>
        <ul class="side-menu">
            <li>
                <a href="teacherHome"><i class='bx bxs-home icon'></i> หน้าแรก </a>
                {{-- <ul class="side-dropdown">
                    <a href="#">เพิ่มข้อมูลอาจารย์</a>
                    <a href="#">ดูข้อมูลอาจารย์</a>
                </ul> --}}
            </li>
            <li>
                <a href="classRoom"><i class='bx bxs-notepad icon'></i> ห้องเรียน </a>
                {{-- <ul class="side-dropdown">
                    <a href="#">เพิ่มข้อมูลนักศึกษา</a>
                    <a href="#">แก้ไขข้อมูลนักศึกษา</a>
                </ul> --}}
            </li>
            <li>
                <a href="addDataSTD"><i class='bx bx-user-plus icon'></i> เพิ่มข้อมูลนักศึกษา </a>
                {{-- <ul class="side-dropdown">
                    <a href="#">เพิ่มข้อมูลแบบทดสอบ</a>
                    <a href="#">แก้ไขแบบทดสอบ</a>
                </ul> --}}
            </li>
        </ul>
    </section>
    <div class="main-classroom">
            <div class="main-content-classroom">
                <div class="head-classroom">
                    <p>ห้องเรียน</p>
                </div>
                <div class="body-classroom">
                    <div class="codeClassroom">
                        <p>code : <span>NSsaA</span></p>
                    </div>
                    <div class="section-dropdown">
                        <div class="dropdown-select">
                            <span class="select">กรุณาเลือก</span>
                            <i class='bx bx-chevron-down icon'></i>
                        </div>
                        <div class="dropdown-list">
                            <div class="dropdowm-list-items">
                                <a href="#">Section 01</a>
                            </div>
                            <div class="dropdowm-list-items">
                                <a href="#">Section 02</a>
                            </div>
                            <div class="dropdowm-list-items">
                                <a href="#">Section 03</a>
                            </div>
                        </div>
                    </div>
                    <div class="content-data">
                        
                    </div>
                </div>
            </div>
    </div>
    
</body>
<script src="js/Teacher/classRoom.js"></script>
@endsection