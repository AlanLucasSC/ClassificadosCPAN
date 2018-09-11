<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
            height: 50vh;
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

        .top-left {
            position: absolute;
            left: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #eceff1;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        a.link{
            color: #eceff1;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        body{
            background-color: #39332a
        }

        .py-4{
            width: 100%
        }

        .logo{
            width: 40%
        }

        #side-menu{
            
        }

        #content{
        }

        .card-header{
            background-color: #39332a;
            color: white;
        }

        .checked {
            color: orange;
        }

        .bg-app{
            background-color: #39332a;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="flex-center position-ref">
            <div class="top-left links">
                <a href="{{ url('/home') }}">
                    <img src="/img/logo.jpg" class="logo">
                </a>
            </div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ getenv('APP_URL') }}/logout">Sair</a>
                    @else
                        <a href="{{ url('/') }}">Início</a>
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
            @if( Route::has('login') )
                @auth
                    <main class="py-4 container-fluid row mt-5">
                        <div class="col-2 mt-5 border-right" id="side-menu">
                            <div class="card-header border-bottom ">
                                <a class="link" href="{{ url('/home') }}">Classificados</a>
                            </div>
                            <div class="card-header border-bottom ">
                                <a class="link" href="{{ url('/negocios') }}">Negócios</a>
                            </div>
                            <div class="card-header border-bottom ">
                                <a class="link" href="{{ url('/pedidos') }}">Fazer Pedido</a>
                            </div>
                            <div class="card-header border-bottom ">
                                <a class="link" href="{{ url('/listaPedidos') }}">Pedidos</a>
                            </div>
                        </div>
                        <div class="col-10 mt-5" id="content"> @yield('content') </div>
                    </main>
                @else
                    @yield('content')
                @endauth
            @endif
        </div>
    </div>
</body>
</html>
