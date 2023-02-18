<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Foodie</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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
                font-size: 84px;
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
        </style>
    </head>
    <body>
        <div class="background-image">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))       <!-- se sei loggato allora -->
                <div class="top-right links">
                    @auth                   <!-- mostro il tasto home -->
                        <a href="/home">Home</a>
                    @else                   <!-- altrimenti i tasti login e register -->
                        <a href="/login">Login</a>

                        <a href="/register">Register</a>
                    @endauth
                </div>
            @endif
            
        </div>
            
        </div>
    </body>
    <style>
         .background-image{
                background-image: url({{Storage::url('public/background.jpg')}});
                background-size: cover;
                background-repeat: no-repeat;
                width: 100%;
                height: 100%;
            }
        </style>

</html>

