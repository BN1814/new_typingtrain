@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/Teacher/teacherH.css">
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
    <div class="section-container">
        <div class="section-class">
            <div class="section-head">
                <p>สร้างห้องเรียน</p>
            </div>
            <div class="section-body">
                <div class="genCode">
                    <label>รหัสเข้าเรียน :</label>
                    <input type="text" class="inpGencode" name="genCode" disabled>
                    <button type="button" class="gcode" onclick="create_Random_code()">สุ่มรหัส</button>
                </div>
                <br>
                <div class="DeadLine">
                    <label style="margin-left: -12px;">วันที่ส่ง : </label>
                    <input type="date" class="date" name="date">
                </div>
                <br>
                <div class="Time">
                    <label style="margin-left: 8px;">เวลา : </label>
                    <input type="time" class="time" name="time">
                </div>
                <br>
                <button type="submit" class="save">บันทึก</button>
                <button type="button" class="cancel">ยกเลิก</button>
    
            </div>
        </div>
    </div>
</body>
<script src="js/Teacher/teacherHome.js"></script>
@endsection
