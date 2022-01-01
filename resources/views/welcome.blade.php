<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="{{ URL::asset('css/wizard.css') }}" rel="stylesheet" id="bootstrap-css">
        <link href="{{ URL::asset('css/bootstrap.min') }}" rel="stylesheet" >
        <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>

            html, body {
                background-color: #161853;
                color: #636b6f;
                font-family:noor;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                font-family: 'Almarai', sans-serif;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 34px;
            }
            .title h1{
                margin-left:100px;
                color:#cac9ce;
                font-weight:400;


            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .main_image{
                width:600px;
                margin-bottom:200px;
            }
            .btns{
                margin-left:120px;
                margin-top:80px;
                        }
            .btns a{
                color:#fff;
                text-decoration:none;
                padding:15px 35px;
                background-color:#7ca179;
                border-radius:50px;
                margin-left:20px;


            }
            .btns a:hover{
                background-color:#aa65d7;
                transition:all .3s;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">

                </div>
            @endif
            <img src="{{ URL::asset('assets/images/Saly-10.png') }}" class="main_image ">


                        <div class="content">
                            <div class="title m-b-md">
                                 <h1 class="animate__animated animate__bounce">مدرسة أونلاين</h1>
                            </div>
                            <div class="btns">
                            @auth
                        <a href="{{ url('/home') }}">الرئيسية</a>
                    @else
                        <a href="{{ route('login') }}">تسجيل الدخول</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">تسجيل جديد</a>
                        @endif
                    @endauth

                            </div>


            </div>





            </div>
        </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    </body>
</html>
