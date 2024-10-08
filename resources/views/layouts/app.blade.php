<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Vote-system') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Vote-system') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link categories" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </a>
                            <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                                <a class="dropdown-item" href="#"><span class="d-flex justify-content-between position-relative align-items-center">ICT <span class="ml-4"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></span></a>
                                <a class="dropdown-item" href="#"><span class="d-flex justify-content-between position-relative align-items-center">Mechanical <span class="ml-4"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></span></a>
                                <a class="dropdown-item" href="#"><span class="d-flex justify-content-between position-relative align-items-center">Civil <span class="ml-4"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></span></a>
                                <a class="dropdown-item" style="width: 250px;" href="#"><span class="d-flex justify-content-between position-relative align-items-center"><span class="mr-5">Electrical and Biomedical</span> <span class="ml-4"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></span></a>
                                <a class="dropdown-item" href="#"><span class="d-flex justify-content-between position-relative align-items-center">Laboratory Technology <span class="ml-4"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></span></a>
                                <a class="dropdown-item" href="#"><span class="d-flex justify-content-between position-relative align-items-center">Automotive <span class="ml-4"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></span></a>
                            </div>
                        </li>

                        <li class="nav-item flex-grow-1 mx-lg-2 my-2 my-lg-0">
                            <div class="position-relative">
                                <span class="position-absolute top-50 start-0 translate-middle-y ms-3">
                                    <i class="fas fa-search text-muted"></i>
                                </span>
                                <input type="text" name="search" id="search" class="form-control ps-5" placeholder="Search for depertment" style="border-radius: 25px;">
                            </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
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
</body>
</html>
