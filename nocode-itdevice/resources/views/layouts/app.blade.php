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

        <div class="addCard-overlay">
            <div id="addCart-successfully">
                <p>Thêm thành công</p>
                <a href="{{ route('website.cart.index') }}">Xác nhận</a>
            </div>
        </div>

        <div class="category-fixed">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="home__sidebar">
                            <ul class="home__sidebar--list list-unstyled">
                                @foreach ($mainCats as $mainCat)
                                    <li class="home__sidebar--item">
                                        <a href="{{ route('website.product.index', ['mainCat' => $mainCat->id]) }}"
                                            title="{{ $mainCat->name }}" class="home__sidebar--maincat">
                                            {{ Str::limit($mainCat->name, $limit = 18, $end = '...') }}
                                            <i class="fa-solid fa-angle-right"></i>
                                        </a>

                                        <div class="home__sidebar--child">
                                            <div class="row">
                                                @foreach ($mainCat->categories as $category)
                                                    <div class="col-custom mt-3">
                                                        <div class="sidebar__child--list">
                                                            <h5><a href="{{ route('website.product.index', ['category' => $category->id]) }}"
                                                                    class="text-dark sidebar__list--title">{{ $category->name }}</a>
                                                            </h5>
                                                            <ul class="list-unstyled">
                                                                @foreach ($category->childCategories as $childCategory)
                                                                    <li class="sidebar__child--item">
                                                                        <a href="{{ route('website.product.index', ['childCat' => $childCategory->id]) }}"
                                                                            title="{{ $childCategory->name }}"
                                                                            class="sidebar__item--link">{{ $childCategory->name }}</a>
                                                                    </li>
                                                                @endforeach

                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
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
                                                    <form action="{{ route('login') }}" class="w-50 pe-1"
                                                        method="GET">
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
                                            <a href="{{ route('website.customer.index') }}" class="link">
                                                <div class="header">
                                                    <i class="bi bi-emoji-laughing pe-3"></i>
                                                    Xin chào, {{ Auth::user()->name }}
                                                </div>
                                            </a>

                                            <a href="{{ route('website.customer.order') }}" class="link">
                                                <div class="body">
                                                    <i class="bi bi-clipboard2-check pe-3"></i>
                                                    Đơn hàng của tôi
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

        <div class="footer-banner">
            <div class="container my-4">
                <img src="{{ asset('assets/img/footer/footer-banner.png') }}" class="img-c" alt="">
            </div>
        </div>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {

            $('#province').on('change', function() {
                var province_id = $(this).val();

                if (province_id) {
                    $.ajax({
                        url: '{{ route('website.cart.getDistrict') }}',
                        method: 'POST',
                        cache: false,
                        dataType: "json",
                        data: {
                            _token: "{{ csrf_token() }}",
                            province_id: province_id
                        },
                        success: function(response) {

                            $('#district').empty();
                            $('#district').append(
                                '<option value="">Chọn Quận / huyện</option>');

                            $.each(response.districts, function(index, district) {

                                $('#district').append($('<option>', {
                                    value: district.id,
                                    text: district.name_with_type
                                }));
                            });
                            $('#ward').empty();
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.log('Error: ' + errorThrown);
                        }
                    });
                    $('#ward').empty();
                } else {
                    $('#district').empty();
                }

            });

            $('#district').on('change', function() {
                var district_id = $(this).val();
                console.log(district_id);

                if (district_id) {
                    $.ajax({
                        url: '{{ route('website.cart.getWard') }}',
                        method: 'POST',
                        dataType: "json",
                        cache: false,
                        data: {
                            _token: "{{ csrf_token() }}",
                            district_id: district_id
                        },
                        success: function(response) {

                            $('#ward').empty();
                            $('#ward').append(
                                '<option value="">Chọn Xã / phường / trị trấn</option>');
                            $.each(response.wards, function(index, ward) {
                                $('#ward').append($('<option>', {
                                    value: ward.id,
                                    text: ward.name_with_type
                                }));
                            });
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.log('Error: ' + errorThrown);
                        }
                    });
                } else {
                    // If no district is selected, clear the options in the "award" select box
                    $('#wards').empty();
                }
            });

            $(".detail__attribute--value").change(function() {

                var selectedAttributes = {};
                var attributeName = $(this).data('attribute-name');
                var attributeValueId = $(this).data('attribute-id');
                var product_id = $('.product__detail--id').val();

                selectedAttributes[attributeName] = attributeValueId;

                $.ajax({
                    url: "{{ route('website.cart.add') }}",
                    type: "POST",
                    cache: false,
                    dataType: "json",
                    data: {
                        _token: "{{ csrf_token() }}",
                        product_id: product_id,
                        attributes: selectedAttributes,
                    },
                    success: function(response) {
                        // console.log(response);
                        var bonusPrice = response.bonusPrice;
                        var productPrice = response.productPrice;
                        var productNewPrice = response.productNewPrice;

                        var formattedPrice = productPrice.toLocaleString('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        });

                        var formattedNewPrice = productNewPrice
                            .toLocaleString('vi-VN', {
                                style: 'currency',
                                currency: 'VND'
                            });

                        $(".detail__info--price .old-price").text(formattedPrice);
                        $(".detail__info--price .new-price").text(formattedNewPrice);
                    },
                    error: function(error) {
                        console.log(error);
                    },
                });
            });

            $('.detail__info--btn').click(function(e) {
                e.preventDefault();
                var selectedAttributeValues = [];
                $('input[type="radio"]:checked').each(function() {
                    var attributeValue = $(this).data('attribute-value');

                    if (selectedAttributeValues.indexOf(attributeValue) === -1) {
                        selectedAttributeValues.push(attributeValue);
                    }
                });

                var product_id = $('.product__detail--id').val();
                var cleanedPriceText = parseInt($('.detail__info--price .new-price').text().replace(
                    /[.,đ₫]/g, ''));

                var price = parseInt(cleanedPriceText);

                $.ajax({
                    url: "{{ route('website.cart.store') }}",
                    type: "POST",
                    cache: false,
                    dataType: "json",
                    data: {
                        _token: "{{ csrf_token() }}",
                        attributeValues: selectedAttributeValues,
                        product_id: product_id,
                        price: price
                    },
                    success: function(response) {
                        console.log(response);
                        $('.addCard-overlay').addClass('active');
                    },
                    error: function(error) {
                        console.log(error);
                    },
                });
            });

            $('.cart__list--quantity .plus').each(function() {
                $(this).on('click', function() {

                    const cart_id = $(this).closest('.cart__list').data('cart-id');
                    const quantityElement = $(this).siblings('.quantity');
                    const quantity = quantityElement.val();

                    $.ajax({
                        url: "{{ route('website.cart.update') }}",
                        type: "POST",
                        cache: false,
                        dataType: "json",
                        data: {
                            _token: "{{ csrf_token() }}",
                            cart_id: cart_id,
                            quantity: quantity,
                            plus: true
                        },
                        success: function(response) {
                            console.log(response);
                            location.reload();
                        },
                        error: function(error) {
                            console.log(error);
                        },
                    });
                });
            });

            $('.cart__list--quantity .subtract').each(function() {
                $(this).on('click', function() {

                    const cart_id = $(this).closest('.cart__list').data('cart-id');
                    const quantityElement = $(this).siblings('.quantity');
                    const quantity = quantityElement.val();

                    $.ajax({
                        url: "{{ route('website.cart.update') }}",
                        type: "POST",
                        cache: false,
                        dataType: "json",
                        data: {
                            _token: "{{ csrf_token() }}",
                            cart_id: cart_id,
                            quantity: quantity,
                            plus: false
                        },
                        success: function(response) {
                            console.log(response);
                            location.reload();
                        },
                        error: function(error) {
                            console.log(error);
                        },
                    });
                });
            });


        })
    </script>
</body>

</html>
