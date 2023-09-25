<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/solid.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>IT Device</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/img/icon-website/it-icon-3.jpg') }}" type="image/png">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm home__navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    LOGO
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <div class="home__navbar--category d-flex">
                            <i class="bi bi-list"></i>
                            Danh mục
                        </div>
                        <form action="" method="POST" class="ms-2 home__navbar--form">
                            @csrf
                            @method('POST')
                            <input type="text" class="form-input-invisible ps-3 w-90" name="search"
                                placeholder="Bạn cần tìm gì?">
                            <button class="form-input-invisible float-end me-2 ms-1">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto fs-13">

                        <div class="home__navbar--hotline h-44">
                            <a href="" class="d-flex">
                                <i class="bi bi-headset pe-2"></i>
                                <div class="">Hotline<br> 1900 1003</div>
                            </a>
                        </div>

                        <div class="home__navbar--showroom h-44">
                            <a href="" class="d-flex">
                                <i class="bi bi-geo-alt pe-2"></i>
                                <div class="">Hệ thống Showroom</div>
                            </a>
                        </div>

                        <div class="home__navbar--research-order h-44">
                            <a href="" class="d-flex">
                                <i class="bi bi-clipboard2-check pe-2"></i>
                                <div class="">Tra cứu <br> đơn hàng</div>
                            </a>
                        </div>

                        <div class="home__navbar--cart h-44">
                            <a href="" class="d-flex">
                                <i class="bi bi-cart pe-2"></i>
                                <div class="">Giỏ hàng</div>
                            </a>
                        </div>

                        <!-- Authentication Links -->
                        <div class="home__navbar--user h-44">

                            <a href="" class="d-flex">
                                <i class="bi bi-person pe-2"></i>
                                <div class="">
                                    @guest
                                        Đăng nhập / <br>Đăng ký
                                    @else
                                        Xin chào<br>{{ Str::limit(Auth::user()->name, $limit = 10, $end = '...') }}
                                    @endguest
                                </div>
                            </a>
                            {{-- @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest --}}
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4 mt-5">
            @yield('content')
        </main>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
</body>

</html>
