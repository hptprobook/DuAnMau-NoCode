<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $website_info->description }}">
    <title>{{ $website_info->title }}</title>
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/solid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/img/logo/icon.jpg') }}" type="image/png">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand logo" href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/logo/logo3.jpg') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <div class="navbar--category d-flex">
                            <i class="bi bi-list"></i>
                            Danh mục
                        </div>
                        <form action="" method="POST" class="ms-2 navbar--form">
                            @csrf
                            @method('POST')
                            <input type="text" class="form-input-invisible ps-3 w-95" name="search"
                                placeholder="Bạn cần tìm gì?">
                            <button type="submit" class="form-input-invisible float-end me-2 ms-1">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto fs-13">

                        <div class="navbar--hotline h-44 navbar__item">
                            <a href="" class="d-flex">
                                <i class="bi bi-headset pe-2"></i>
                                <div class="">Hotline<br> {{ $website_info->hotline }}</div>
                            </a>
                        </div>

                        <div class="navbar--showroom h-44 navbar__item">
                            <a href="{{ route('website.showroom') }}" class="d-flex">
                                <i class="bi bi-geo-alt pe-2"></i>
                                <div class="">Hệ thống Showroom</div>
                            </a>
                        </div>

                        <div class="navbar--research-order h-44 navbar__item">
                            <a href="" class="d-flex">
                                <i class="bi bi-clipboard2-check pe-2 icon"></i>
                                <div class="">Tra cứu <br /> đơn hàng</div>
                            </a>
                        </div>

                        <div class="navbar--cart h-44 navbar__item">
                            <a href="{{ route('website.cart.index') }}" class="d-flex">
                                <i class="bi bi-cart pe-2 icon">
                                    <span class="count">1</span>
                                </i>
                                <div class="">Giỏ hàng</div>
                            </a>
                        </div>

                        <!-- Authentication Links -->
                        <div class="navbar--user h-44 navbar__item">
                            <i class="bi bi-person pe-2" style="font-size: 20px;"></i>
                            <div class="">
                                @guest
                                    <div class="navbar--log">
                                        Đăng nhập <br>Đăng ký

                                        <div class="log--child">
                                            <div class="header">
                                                <i class="bi bi-emoji-laughing pe-3"></i>
                                                Xin chào, vui lòng đăng ký / đăng nhập
                                            </div>

                                            <div class="body">

                                                @if (Route::has('login'))
                                                    <form action="{{ route('login') }}" class="w-50 pe-1" method="GET">
                                                        <button class="w-100 login-btn">Đăng nhập</button>
                                                    </form>
                                                @endif
                                                @if (Route::has('register'))
                                                    <form action="{{ route('register') }}" class="w-50 ps-1"
                                                        method="get">
                                                        <button class="w-100 register-btn">Đăng ký</button>
                                                    </form>
                                                @endif
                                            </div>

                                            <a href="">
                                                <div class="footer" style="color: #333;">
                                                    <i class="bi bi-question-circle pe-3"></i>
                                                    Trợ giúp
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="navbar--logged">
                                        Xin chào<br>{{ Str::limit(Auth::user()->name, $limit = 8, $end = '...') }}

                                        <div class="logged--child">
                                            <a href="" class="link">
                                                <div class="header">
                                                    <i class="bi bi-emoji-laughing pe-3"></i>
                                                    Xin chào, {{ Auth::user()->name }}
                                                </div>
                                            </a>

                                            <a href="" class="link">
                                                <div class="body">
                                                    <i class="bi bi-clipboard2-check pe-3"></i>
                                                    Đơn hàng của tôi
                                                </div>
                                            </a>

                                            <a href="" class="link">
                                                <div class="body" style="border-bottom: 1px solid #f0f0f0">
                                                    <i class="bi bi-eye pe-3"></i>
                                                    Đã xem gần đây
                                                </div>
                                            </a>

                                            <a href=""
                                                onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"
                                                class="link">
                                                <div class="footer">
                                                    <i class="bi bi-box-arrow-left pe-3"></i>
                                                    Đăng xuất
                                                </div>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </a>
                                        </div>
                                    </div>
                                @endguest
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>

        <header class="header head">
            <div class="container d-flex">
                <a href="">
                    <div class="header--item">
                        Tổng hợp khuyến mại
                    </div>
                </a>
                <a href="{{ route('website.post.index') }}">
                    <div class="header--item">
                        Tin công nghệ
                    </div>
                </a>
                <a href="">
                    <div class="header--item">
                        Video
                    </div>
                </a>
                <a href="">
                    <div class="header--item">
                        Hướng dẫn trả góp
                    </div>
                </a>
                <a href="">
                    <div class="header--item">
                        Hướng dẫn thanh toán
                    </div>
                </a>
                <a href="">
                    <div class="header--item">
                        Chính sách bảo hành
                    </div>
                </a>
            </div>
        </header>


        <main class="mt-4">
            @yield('content')
        </main>

        <footer class="footer pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <b class="footer__title">VỀ NOCODE</b>
                        <ul class="mt-2 list-unstyled">
                            <li>
                                <a href="">Giới thiệu</a>
                            </li>
                            <li>
                                <a href="">Tuyển dụng</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <b class="footer__title">CHÍNH SÁCH</b>
                        <ul class="mt-2 list-unstyled">
                            <li><a href="">Chính sách bảo mật</a></li>
                            <li><a href="">Chính sách bảo hành</a></li>
                            <li><a href="">Chính sách thanh toán</a></li>
                            <li><a href="">Chính sách giao hàng</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <b class="footer__title">THÔNG TIN</b>
                        <ul class="mt-2 list-unstyled">
                            <li><a href="">Hệ thống cửa hàng</a></li>
                            <li><a href="">Trung tâm bảo hành</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <b class="footer__title">TỔNG ĐÀI HỖ TRỢ(Miễn phí)</b>
                        <ul class="mt-2 list-unstyled">
                            <li>Gọi mua: <a class="footer__contact" href="">1800.1800</a></li>
                            <li>CSKH: <a class="footer__contact" href="">18001008</a></li>
                            <li>Email: <a class="footer__contact" href="">hptprobook@gmail.com</a></li>
                        </ul>
                    </div>
                </div>

                <hr>

                <div class="footer__end d-flex justify-content-between align-items-center">
                    <div class="footer__end--contact d-flex align-items-center">
                        <b>KẾT NỐI VỚI CHÚNG TÔI</b>
                        <a class="ms-3" style="color: blue;" href=""><i class="bi bi-facebook"></i></a>
                        <a href="" style="color: orange;"><i class="bi bi-tiktok"></i></a>
                        <a href="" style="color: red;"><i class="bi bi-youtube"></i></a>
                    </div>

                    <div class="footer__end--logo">
                        <img src="{{ asset('assets/img/footer/logo-bct.png') }}" alt="">
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
</body>

</html>
