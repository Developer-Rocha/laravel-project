<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Windows 98</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href=" {{ mix('/css/app.css') }} ">
    </head>
    <body class="bg-cloud">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="{{ url('/clients') }}">Clientes</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                    
                </div>
            @endif

            <div class="content testeteste"> 
                <div class="title m-b-md img-main">
                    <img src="{{ asset('images/logo-main.png') }}">
                </div>
            </div>
            
        </div>
        @include('footer')
        @include('scripts')
    </body>
</html>
