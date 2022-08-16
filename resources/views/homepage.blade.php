<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Typing Train</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <style>
        * {
            margin: 0; padding: 0; box-sizing: border-box;
        }
        a {
            text-decoration: none;
        }
        body {
            background: rgb(135, 188, 231);
        }
        button {
            width: 120px;
        }
        .logo {
            width: 100%;
            height: 120px;
            line-height: 110px;
            /* background: #333; */
            border-radius: 15px;
        }
        .hp {
            margin-top: 170px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="hp col-md-6">
                <div class="logo display-2 my-5 mb-2 text-center text-warning bg-dark" style="font-weight: bold;">TYPING TRAIN</div>
                
                <div class="butLog row mb-3">
                    <div class="col-md-12 text-center">
                        @if(Route::has('login'))
                            @auth
                                @if(Auth::user()->role == 1)
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-dark text-white">หน้าแรก</a>
                                @elseif(Auth::user()->role == 2)
                                    <a href="{{ route('teacher.dashboard') }}" class="btn btn-dark text-white">หน้าแรก</a>
                                @else
                                    <a href="{{ route('user.dashboard') }}" class="btn btn-dark text-whitek">หน้าแรก</a>
                                @endif
                            @else
                                <button class="btn btn-dark">
                                    <a href="{{ route('login') }}" class="text-white">อาจารย์</a>
                                </button>

                                <button class="btn btn-dark">
                                    <a href="{{ route('login') }}" class="text-white">นักศึกษา</a>
                                </button>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>