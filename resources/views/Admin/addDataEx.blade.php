@extends('layouts.app')

@section('content')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .head-container {
            width: 40%;
            height: 30px;
            background: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
            margin-top: 10px;
            margin-bottom: 10px;
            border-bottom: 1px solid rgb(196, 191, 191);
            position: sticky;
        }
        .main-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2rem;
            text-align: center;
        }
        .main-content a {
            text-decoration: none;
            color: rgb(32, 30, 30);
            font-size: 15px;
            font-weight: 300;
            padding: 0 5px;
            letter-spacing: 2px;
        }
        .main-content a:hover {
            font-size: 17px;
            font-weight: bold;
            background: red;
            border-radius: 10px;
            color: #fff;
        }
        .add-admin-excercise {
            max-width: 38%;
            height: 50vh;
            margin: 0 auto;
            margin-top: 10px;
        }
        .head-add-excercise {
            background: #333;
            height: 50px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .head-add-excercise p {
            line-height: 50px;
            color: #fff;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }
        .body-add-excercise {
            max-width: 38%
            max-height: auto;
            background: antiquewhite;
            text-align: center;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            padding: 20px 0 20px 0;
        }
        .add-exercise {
            width: 40px;
            height: 30px;
            border: none;
            outline: none;
            border-radius: 10px;
            background: rgb(226, 226, 226);
        }
        .add-exercise:hover {
            background: rgb(163, 157, 157);
            color: #fff;
        }
        .save, .cancel {
            border: none;
            outline: none;
            border-radius: 6px;
            height: 2rem;
            padding: 3px;
            color: #fff;
            margin-right: 10px;
            width: 20%;
        }
        .save {
            background: rgb(32, 182, 12);
        }
        .save:hover {
            background: rgb(17, 146, 0);
        }
        .cancel {
            background: rgb(211, 31, 8);
        }
        .cancel:hover {
            background: rgb(173, 20, 0);
        }
    </style>
    <link type="text/css" rel="stylesheet" href="css/adminH.css">
    <body>
        <div class="head-container">
            <div class="main-content">
                <a href="home">อาจารย์</a>
                <a href="addDataSTD">นักเรียน</a>
                <a href="addDataEx"><u>แบบฝึกหัด</u></a>
            </div>
        </div>
        <div class="add-admin-excercise">
            <div class="head-add-excercise">
                <p>เพิ่มแบบฝึกหัด</p>
            </div>
            <div class="body-add-excercise">
                <p><input type="submit" class="add-exercise" value="+"></p>
                <button type="submit" class="save">บันทึก</button>
                <button type="button" class="cancel">ยกเลิก</button>
            </div>
        </div>
    </body>
@endsection
