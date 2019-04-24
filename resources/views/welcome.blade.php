<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Windows 98</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href=" {{ mix('/css/main.css') }} ">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="bg-cloud" ng-app="app">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">{{__('pagination.home')}}</a>
                        <a href="{{ url('/clients') }}">{{__('pagination.clients')}}</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                    
                </div>
            @endif

            <!-- START Select language -->
            <div class="language-top">
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item"><a href="{{ url('locale/en') }}" >EN</a></li>
                    <li class="list-group-item"><a href="{{ url('locale/pt') }}" >PT</a></li>
                </ul>
            </div>
            <!-- END Select language -->

            <div class="content testeteste"> 
                <div class="title m-b-md img-main">
                    <img src="{{ asset('images/logo-main.png') }}">
                </div>
            </div>
            
        </div>
        @include('footer')

        @include('resource-angular')
        @include('scripts')
    </body>
</html>
