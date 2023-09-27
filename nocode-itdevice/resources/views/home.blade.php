@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="home__sidebar">
                    <ul class="home__sidebar--list list-unstyled">
                        @foreach ($mainCats as $mainCat)
                            <li class="home__sidebar--item">
                                <a href="" title="{{ $mainCat->name }}" class="home__sidebar--maincat">
                                    {{ Str::limit($mainCat->name, $limit = 18, $end = '...') }}
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>

                                <div class="home__sidebar--child">
                                    <div class="row">
                                        @foreach ($mainCat->categories as $category)
                                            <div class="col-custom mt-3">
                                                <div class="sidebar__child--list">
                                                    <h5><a href=""
                                                            class="text-dark sidebar__list--title">{{ $category->name }}</a>
                                                    </h5>
                                                    <ul class="list-unstyled">
                                                        @foreach ($category->childCategories as $childCategory)
                                                            <li class="sidebar__child--item">
                                                                <a href="" title="{{ $childCategory->name }}"
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
    </div>
@endsection
