@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="home__header">
            <div class="row">
                <div class="col-md-2">
                    <div class="home__sidebar">
                        <ul class="home__sidebar--list list-unstyled">
                            @foreach ($mainCats as $mainCat)
                                <li class="home__sidebar--item">
                                    <a href="{{ route('website.product.index', ['mainCat' => $mainCat->id]) }}"
                                        title="{{ $mainCat->name }}" class="home__sidebar--maincat">
                                        {{ Str::limit($mainCat->name, $limit = 18, $end = '...') }}
                                        <i class="fa-solid fa-angle-right hidden__icon" ></i>
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

                <div class="col-md-10">
                    <div class="home__slider">
                        <div class="swiper home__swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide home__swiper--slide">
                                    <img src="{{ asset('assets/img/SlideBanner/banner1.png') }}" alt="">
                                </div>
                                <div class="swiper-slide home__swiper--slide">
                                    <img src="{{ asset('assets/img/SlideBanner/banner2.png') }}" alt="">
                                </div>
                                <div class="swiper-slide home__swiper--slide">
                                    <img src="{{ asset('assets/img/SlideBanner/banner3.png') }}" alt="">
                                </div>
                                <div class="swiper-slide home__swiper--slide">
                                    <img src="{{ asset('assets/img/SlideBanner/banner4.png') }}" alt="">
                                </div>
                                <div class="swiper-slide home__swiper--slide">
                                    <img src="{{ asset('assets/img/SlideBanner/banner5.png') }}" alt="">
                                </div>
                                <div class="swiper-slide home__swiper--slide">
                                    <img src="{{ asset('assets/img/SlideBanner/banner6.png') }}" alt="">
                                </div>
                                <div class="swiper-slide home__swiper--slide">
                                    <img src="{{ asset('assets/img/SlideBanner/banner7.png') }}" alt="">
                                </div>
                                <div class="swiper-slide home__swiper--slide">
                                    <img src="{{ asset('assets/img/SlideBanner/banner8.png') }}" alt="">
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <a href="">
                        <div class="home__childSlider">
                            <img src="{{ asset('assets/img/childban/1.png') }}" alt="">
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="">
                        <div class="home__childSlider">
                            <img src="{{ asset('assets/img/childban/1.png') }}" alt="">
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="">
                        <div class="home__childSlider">
                            <img src="{{ asset('assets/img/childban/1.png') }}" alt="">
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="">
                        <div class="home__childSlider">
                            <img src="{{ asset('assets/img/childban/1.png') }}" alt="">
                        </div>
                    </a>
                </div>

            </div>
        </div>

        <section class="home__container my-3">
            <div class="home__container--pc w-100">
                <div class="home__pc--header d-flex justify-content-between mx-3 py-3">
                    <h3 class="pc__header--mainCat"><a class="main-link fw-700" href="">{{ $mainCats[3]->name }}</a>
                    </h3>
                    <div class="pc__header__categories">
                        <a href="" class="px-3 fw-600 main-link">Core i9</a>
                        <a href="" class="px-3 fw-600 main-link">Core i7</a>
                        <a href="" class="px-3 fw-600 main-link">Core i5</a>
                        <a href="" class="px-3 fw-600 main-link">Core i3</a>
                        <a href="" class="fw-700 main-link text-blue ps-3">Xem tất cả</a>
                    </div>
                </div>
                <div class="home__pc--product pb-2 px-2">
                    <div class="swiper home__pc--productSwiper">
                        <div class="swiper-wrapper">

                            @foreach ($pcProducts as $product)
                                <div class="swiper-slide">
                                    <a href="{{ route('website.product.detail', $product->id) }}">
                                        <div class="home__pc--item w-100 px-2 py-3">
                                            <i class="bi bi-gift-fill float-end mt-2 me-2 fs-icon text-main"></i>
                                            <div class="home__pc--itemImg img-thumb">
                                                <img class="img-c" src="{{ asset($product->avatar) }}" alt="">
                                            </div>
                                            <h4 class="home__pc--itemName fw-600 my-2">
                                                {{ $product->name }}
                                            </h4>
                                            <div class="home__pc--itemParams">
                                                <p class="d-block">✔ Lập tr&igrave;nh</p>
                                                <p>✔ Streaming</p>
                                                <p>✔ 2D,3D Design</p>
                                                <p>✔&nbsp;Game</p>
                                                <p>&nbsp;</p>
                                            </div>

                                            <div class="home__pc--itemOldPrice">
                                                <span
                                                    class="old-price">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                            </div>

                                            @php
                                                $newPrice = $product->price - $product->price * ($product->discount / 100);
                                            @endphp
                                            <div class="home__pc--itemNewPrice d-flex text-main">
                                                <span
                                                    class="old-price fw-700">{{ number_format(round($newPrice, -4), 0, '.', '.') }}đ</span>
                                                <div class="discount">{{ $product->discount }}%</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="home__container my-3">
            <div class="home__container--pc w-100">
                <div class="home__pc--header d-flex justify-content-between mx-3 py-3">
                    <h3 class="pc__header--mainCat"><a class="main-link fw-700"
                            href="">{{ $mainCats[0]->name }}</a>
                    </h3>
                    <div class="pc__header__categories">
                        <a href="" class="px-3 fw-600 main-link">ACER</a>
                        <a href="" class="px-3 fw-600 main-link">MSI</a>
                        <a href="" class="px-3 fw-600 main-link">HP</a>
                        <a href="" class="px-3 fw-600 main-link">DELL</a>
                        <a href="" class="fw-700 main-link text-blue ps-3">Xem tất cả</a>
                    </div>
                </div>
                <div class="home__pc--product pb-2 px-2">
                    <div class="swiper home__pc--productSwiper">
                        <div class="swiper-wrapper">

                            @foreach ($laptopProducts as $product)
                                <div class="swiper-slide">
                                    <a href="{{ route('website.product.detail', $product->id) }}">
                                        <div class="home__pc--item w-100 px-2 py-3">
                                            <i class="bi bi-gift-fill float-end mt-2 me-2 fs-icon text-main"></i>
                                            <div class="home__pc--itemImg img-thumb">
                                                <img class="img-c" src="{{ asset($product->avatar) }}" alt="">
                                            </div>
                                            <h4 class="home__pc--itemName fw-600 my-2">
                                                {{ $product->name }}
                                            </h4>
                                            <div class="home__pc--itemParams">
                                                <p class="d-block">✔ Lập tr&igrave;nh</p>
                                                <p>✔ Streaming</p>
                                                <p>✔ 2D,3D Design</p>
                                                <p>✔&nbsp;Game</p>
                                                <p>&nbsp;</p>
                                            </div>

                                            <div class="home__pc--itemOldPrice">
                                                <span
                                                    class="old-price">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                            </div>

                                            @php
                                                $newPrice = $product->price - $product->price * ($product->discount / 100);
                                            @endphp
                                            <div class="home__pc--itemNewPrice d-flex text-main">
                                                <span
                                                    class="old-price fw-700">{{ number_format(round($newPrice, -4), 0, '.', '.') }}đ</span>
                                                <div class="discount">{{ $product->discount }}%</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
