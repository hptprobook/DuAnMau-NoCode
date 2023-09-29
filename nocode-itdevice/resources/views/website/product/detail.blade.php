@extends('layouts.app')

@section('content')
    <div class="product__main container">
        <div class="row">
            <div class="col-md-4">
                <div class="product__detail--slider p-4">
                    <div class="swiper detail__slider--main">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img class="img-c"
                                    src="https://product.hstatic.net/200000722513/product/minion_i1650_white_ea071cf8b87c4c269320c5ad87bc98be_master.png"
                                    alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                            </div>
                        </div>

                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>

                    </div>
                    <div thumbsSlider="" class="swiper detail__slider--thumb">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img class="img-c" src="https://swiperjs.com/demos/images/nature-1.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img class="img-c" src="https://swiperjs.com/demos/images/nature-2.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img class="img-c" src="https://swiperjs.com/demos/images/nature-3.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img class="img-c" src="https://swiperjs.com/demos/images/nature-4.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img class="img-c" src="https://swiperjs.com/demos/images/nature-2.jpg" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="product__detail--info pt-4">
                    <h4 class="detail__info--name fw-600">PC GVN MINION i1650 - WHITE</h4>
                    <div class="detail__info--rate d-flex">
                        <span class="fw-600">0 <i class="bi bi-star-fill"></i></span>
                        <a href="" class="text-blue fw-600">Xem đánh giá</a>
                    </div>
                    <div class="detail__info--price my-3">
                        <span class="new-price text-main fw-700 pe-3">10000000đ</span>
                        <span class="old-price pe-3">15000000đ</span>
                        <span class="discount text-main">-17%</span>
                    </div>
                    <div class="card detail__info--gift mt-3">
                        <h5 class="card-header">
                            <span class="text-main"><i class="bi bi-gift-fill"></i> Quà tặng khuyến mãi</span>
                        </h5>
                        <div class="card-body">
                            <p class="card-text"><i class="bi bi-1-circle-fill text-main pe-2"></i>Áo
                                khoác Nocode</p>
                            <p class="card-text"><i class="bi bi-2-circle-fill text-main pe-2"></i>Móc khóa Nocode</p>
                            <p class="card-text"><i class="bi bi-3-circle-fill text-main pe-2"></i>Dây đeo thẻ Nocode</p>
                        </div>
                    </div>
                </div>

                <button class="detail__info--btn fw-700 mb-3">MUA NGAY</button>

                <hr>
                <div class="detail__info--deal my-3">
                    <h4 class="fw-700 text-main">KHUYẾN MÃI</h4>
                    <p>
                        Mua thêm RAM giảm ngay 300,000đ.
                        <br>
                        Nâng cấp SSD giảm ngay 200.000đ.
                    </p>
                </div>
                <hr>
                <div class="detail__info--endow my-3">
                    <h4 class="fw-700 text-main">ƯU ĐÃI KHI MUA KÈM PC</h4>
                    <p>Ưu đãi lên đến 54% khi mua kèm PC</p>
                </div>
                <hr>
                <div class="detail__info--more my-3">
                    <h4 class="fw-700 text-main">Hỗ trợ trả góp MPOS (Thẻ tín dụng), HDSAISON.</h4>
                    <p>(Hình ảnh PC chỉ mang tính chất minh họa)</p>
                </div>
            </div>
        </div>
    </div>

    <div class="product__detail container">
        <h4>Mô tả Sản phẩm</h4>
    </div>
@endsection
