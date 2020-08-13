<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .banner{
            font-family: sans-serif;
            font-weight: bold;
            font-size: 6rem;
            cursor: default;
        }
        span.second  {
            background: #FF9900;
            color: #000000;
            border-radius: 0.5rem;
            padding: 0.5rem;
            font-weight: 900;
        }
        .banner span:nth-child(1) {
                
            color: #000000;
            border-radius: 0.5rem;
            padding: 0.5rem;
            font-weight: 900;
            padding-right: 0px;
        }
        
        .hub {
            font-family: sans-serif;
            font-weight: bold;
            font-size: 20px;
            cursor: default;
        }

        .hub span:nth-child(2) {
            background: #FF9900;
            color: #000000;
            border-radius: 0.5rem;
            padding: 0.5rem;
            font-weight: 900;
        }

        .mt-6{
            margin-top: 5rem;
            margin-bottom: 1rem;
        }

        .footer {
            background-color: #f5f5f5;
        }
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

            .m-b-md {
                margin-bottom: 30px;
            }
            .msg{
                size: 20px;
            }
    </style>
    
</head>
<body class="d-flex flex-column h-100">
    <div id="app">
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background:black">
            <a class="navbar-brand" href="{{ url('/') }}">
                <div class="hub">
                    <span ccontenteditable="true" style="color:white">{{ config('app.name1', 'Laravel') }}</span>
                    <span ccontenteditable="true">{{ config('app.name2', 'Laravel') }}</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                @if(Request::is('home'))
                    <li class="nav-item active">
                @else
                    <li class="nav-item">
                @endif
                <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                @auth
                    @if(Request::is('index'))
                        <li class="nav-item active">
                    @else
                        <li class="nav-item">
                    @endif
                    <a class="nav-link" href="{{ route('index') }}">Orders</a>
                    </li>
                @endauth
                @if(Request::url()==='home/')
                    <li class="nav-item active">
                @else
                    <li class="nav-item">
                @endif
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            </div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @guest
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login <span class="sr-only">(current)</span></a>
                            </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                        </ul>
                    @else
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>

                    @endguest
                </div>
            @endif
        </nav>
    </header>

        <main role="main" class="flex-shrink-0">
            <div class="main-content mt-6">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        @if (session('msg'))
                            <div class="alert alert-success">
                                {{ session('msg') }}ddfdfd
                            </div>
                        @endif
                            @yield('content')
                    
                    </div>
                </div>
            </div>
        </main>
    </div>
    <footer class="footer mt-auto py-3">
    <div class="container">
        <span class="text-muted mt-5 mb-3">&#169;  All rights reserve</span>
    </div>
    </footer>
</body>
</html>
