<!doctype html>
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
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .table th, .table td {
            padding: 0.50rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
        .list {
            display: table;
            width: 100%;
            padding-left: 0;
            margin-bottom: 0;
            border-radius: 0;
            list-style: none;
        }
        .list-item {
            float: left;
            width: 20%;
            padding: 0.2rem 0.7rem;
            border: 1px solid #CCC;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                @if (Route::currentRouteName() == 'matters.index'     OR
                     Route::currentRouteName() == 'segments.index'    OR
                     Route::currentRouteName() == 'users.index'       OR
                     Route::currentRouteName() == 'rooms.index'  OR
                     Route::currentRouteName() == 'profile.index')
                    <a class="navbar-brand" href="{{ url('/home') }}">Home</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                @endif

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <!--
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Entre') }}</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Crie sua Conta') }}</a>
                                </li>
                            @endif
                            -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    @if(auth()->user()->admin == '1')
                                    <a class="dropdown-item" href="{{ route('rooms.index') }}">
                                        {{ __('Anos') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('matters.index') }}">
                                        {{ __('Disciplinas') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('users.index') }}">
                                        {{ __('Usuários') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('segments.index') }}">
                                        {{ __('Segmentos') }}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('profile.index') }}">
                                        {{ __('Meus Dados') }}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                       @csrf
                                    </form>
                                    @else
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('profile.index') }}">
                                        {{ __('Meus Dados') }}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                       @csrf
                                    </form>
                                    @endif
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('sweetalert::alert')
    @yield('scripts')
</body>
</html>
