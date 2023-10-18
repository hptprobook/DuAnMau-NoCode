@extends('layouts.app')

@section('content')
<div class="container">
    <h1>CHỌN KHU VỰC CỦA BẠN</h1>
    <div class="container_regions">
        <a class="container_regions--place" href="#KHUVUCMIENBAC" id="BAC">
            <img src="{{ asset('assets/img/Showroom/Bac/Bac.png') }}" class="container_place--img" alt="Khu vực miền Bắc">
        </a>
        <a class="container_regions--place" href="#KHUVUCMIENNAM" id="NAM">
            <img src="{{ asset('assets/img/Showroom/Nam/Nam.png') }}" class="container_place--img" alt="Khu vực miền Nam">
        </a>
    </div>

</div>
<div class="container_ladi" id="KHUVUCMIENNAM">
    <h1 class="container_ladi--section">
        <i class="bi bi-geo-alt-fill"></i>
        KHU VỰC MIỀN NAM
    </h1>
    <div class="container__ladi--warpper d-flex flex-column align-items-center justify-content-center">
        <div class="container__wrapper--items d-flex mt-5">
            <div class="col m-1">
                <div class="row">
                    <h3 class="items__name--showroom">Showroom NOCODE DEVICE</h3>
                    <h1 class="items__name--city">BUÔN MA THUỘT</h1>
                </div>
                <div class="item__line mb-1"></div>
                <div class="container_address--items">
                    <h4 class="contaner__items--item"><i class="bi bi-house"></i> 189 Trần Quý Cáp, P.Tự An, Tp.Buôn Ma Thuột</h4>
                    <h4 class="contaner__items--item"><i class="bi bi-clock"></i> Thời gian làm việc: 8:00 - 21:00 Thứ 2 - Chủ Nhật</h4>
                    <a href="#" class="container_address--media">
                        <h4><i class="bi bi-facebook"></i> Truy cập Fanpage NOCODE DEVICE</h4>
                    </a>
                </div>
            </div>
            <div class="col m-1">
                <div class="swiper showroom__swiper">
                    <div class="swiper-wrapper showroom__warpper">
                        <div class="swiper-slide showroom--slide">
                            <img src="{{ asset('assets/img/region_slide/BuonMaThuot/1.png') }}" class="showroom_slide--img" alt="">
                        </div>
                        <div class="swiper-slide showroom--slide">
                            <img src="{{ asset('assets/img/region_slide/BuonMaThuot/2.png') }}" class="showroom_slide--img" alt="">
                        </div>
                        <div class="swiper-slide showroom--slide">
                            <img src="{{ asset('assets/img/region_slide/BuonMaThuot/3.png') }}" class="showroom_slide--img" alt="">
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div class="showroom__slide--address">
                    <a href="#">
                        <h4 class="showroom__address--text text-center"><i class="bi bi-geo-alt-fill"></i> 189 Trần Quý Cáp, P.Tự An, Tp.Buôn Ma Thuột</h4>
                    </a>
                </div>
            </div>
        </div>
        <div class="container__wrapper--items d-flex mt-5">
            <div class="col m-1">
                <div class="row">
                    <h3 class="items__name--showroom">Showroom NOCODE DEVICE</h3>
                    <h1 class="items__name--city">BUÔN MA THUỘT</h1>
                </div>
                <div class="item__line mb-1"></div>
                <div class="container_address--items">
                    <h4 class="contaner__items--item"><i class="bi bi-house"></i> 189 Trần Quý Cáp, P.Tự An, Tp.Buôn Ma Thuột</h4>
                    <h4 class="contaner__items--item"><i class="bi bi-clock"></i> Thời gian làm việc: 8:00 - 21:00 Thứ 2 - Chủ Nhật</h4>
                    <a href="#" class="container_address--media">
                        <h4><i class="bi bi-facebook"></i> Truy cập Fanpage NOCODE DEVICE</h4>
                    </a>
                </div>
            </div>
            <div class="col m-1">
                <div class="swiper showroom__swiper">
                    <div class="swiper-wrapper showroom__warpper">
                        <div class="swiper-slide showroom--slide">
                            <img src="{{ asset('assets/img/region_slide/BuonMaThuot/1.png') }}" class="showroom_slide--img" alt="">
                        </div>
                        <div class="swiper-slide showroom--slide">
                            <img src="{{ asset('assets/img/region_slide/BuonMaThuot/2.png') }}" class="showroom_slide--img" alt="">
                        </div>
                        <div class="swiper-slide showroom--slide">
                            <img src="{{ asset('assets/img/region_slide/BuonMaThuot/3.png') }}" class="showroom_slide--img" alt="">
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div class="showroom__slide--address">
                    <a href="#">
                        <h4 class="showroom__address--text text-center"><i class="bi bi-geo-alt-fill"></i> 189 Trần Quý Cáp, P.Tự An, Tp.Buôn Ma Thuột</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container__ladi--warpper d-flex flex-column align-items-center justify-content-center">
    <div class="container__wrapper--items d-flex mt-5">
            <div class="container_ladi--Ser text-center">
                <h1>CÁC TIỆN ÍCH TẠI SHOWROOM NOCODE DEVICE</h1>
                <div class="ladi__ser--items">
                    <div class="ladi__ser--item">
                        <i class="bi bi-p-square"></i>
                        <h4>Giữ xe miễn phí</h4>
                    </div>
                    <div class="ladi__ser--item">
                        <i class="bi bi-wifi"></i>
                        <h4>Wifi miễn phí</h4>
                    </div>
                    <div class="ladi__ser--item">
                        <i class="bi bi-laptop"></i>
                        <h4>Trải nghiệm sản phẩm miễn phí</h4>
                    </div>
                    <div class="ladi__ser--item">
                        <i class="bi bi-chat"></i>
                        <h4>Được chuyên viên tư vấn chuyên sâu</h4>
                    </div>
                    <div class="ladi__ser--item">
                        <i class="bi bi-check-square"></i>
                        <h4>Sản phẩm chính hãng 100%</h4>
                    </div>
                    <div class="ladi__ser--item">
                        <i class="bi bi-calendar2-check"></i>
                        <h4>Có chính sách ưu đãi trả góp</h4>
                    </div>
                    <div class="ladi__ser--item">
                        <i class="bi bi-cash-coin"></i>
                        <h4>Thanh toán dễ dàng</h4>
                    </div>
                    <div class="ladi__ser--item">
                        <i class="bi bi-truck"></i>
                        <h4>Giao hàng tận nhà</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container_ladi" id="KHUVUCMIENBAC">
    <h1 class="container_ladi--section">
        <i class="bi bi-geo-alt-fill"></i>
        KHU VỰC MIỀN BẮC
    </h1>
    <div class="container__ladi--warpper d-flex flex-column align-items-center justify-content-center">
        <div class="container__wrapper--items d-flex mt-5">
            <div class="col m-1">
                <div class="row">
                    <h3 class="items__name--showroom">Showroom NOCODE DEVICE</h3>
                    <h1 class="items__name--city">BUÔN MA THUỘT</h1>
                </div>
                <div class="item__line mb-1"></div>
                <div class="container_address--items">
                    <h4 class="contaner__items--item"><i class="bi bi-house"></i> 189 Trần Quý Cáp, P.Tự An, Tp.Buôn Ma Thuột</h4>
                    <h4 class="contaner__items--item"><i class="bi bi-clock"></i> Thời gian làm việc: 8:00 - 21:00 Thứ 2 - Chủ Nhật</h4>
                    <a href="#" class="container_address--media">
                        <h4><i class="bi bi-facebook"></i> Truy cập Fanpage NOCODE DEVICE</h4>
                    </a>
                </div>
            </div>
            <div class="col m-1">
                <div class="swiper showroom__swiper">
                    <div class="swiper-wrapper showroom__warpper">
                        <div class="swiper-slide showroom--slide">
                            <img src="{{ asset('assets/img/region_slide/BuonMaThuot/1.png') }}" class="showroom_slide--img" alt="">
                        </div>
                        <div class="swiper-slide showroom--slide">
                            <img src="{{ asset('assets/img/region_slide/BuonMaThuot/2.png') }}" class="showroom_slide--img" alt="">
                        </div>
                        <div class="swiper-slide showroom--slide">
                            <img src="{{ asset('assets/img/region_slide/BuonMaThuot/3.png') }}" class="showroom_slide--img" alt="">
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div class="showroom__slide--address">
                    <a href="#">
                        <h4 class="showroom__address--text text-center"><i class="bi bi-geo-alt-fill"></i> 189 Trần Quý Cáp, P.Tự An, Tp.Buôn Ma Thuột</h4>
                    </a>
                </div>
            </div>

        </div>
        <div class="container__wrapper--items d-flex mt-5">
            <div class="col m-1">
                <div class="row">
                    <h3 class="items__name--showroom">Showroom NOCODE DEVICE</h3>
                    <h1 class="items__name--city">BUÔN MA THUỘT</h1>
                </div>
                <div class="item__line mb-1"></div>
                <div class="container_address--items">
                    <h4 class="contaner__items--item"><i class="bi bi-house"></i> 189 Trần Quý Cáp, P.Tự An, Tp.Buôn Ma Thuột</h4>
                    <h4 class="contaner__items--item"><i class="bi bi-clock"></i> Thời gian làm việc: 8:00 - 21:00 Thứ 2 - Chủ Nhật</h4>
                    <a href="#" class="container_address--media">
                        <h4><i class="bi bi-facebook"></i> Truy cập Fanpage NOCODE DEVICE</h4>
                    </a>
                </div>
            </div>
            <div class="col m-1">
                <div class="swiper showroom__swiper">
                    <div class="swiper-wrapper showroom__warpper">
                        <div class="swiper-slide showroom--slide">
                            <img src="{{ asset('assets/img/region_slide/BuonMaThuot/1.png') }}" class="showroom_slide--img" alt="">
                        </div>
                        <div class="swiper-slide showroom--slide">
                            <img src="{{ asset('assets/img/region_slide/BuonMaThuot/2.png') }}" class="showroom_slide--img" alt="">
                        </div>
                        <div class="swiper-slide showroom--slide">
                            <img src="{{ asset('assets/img/region_slide/BuonMaThuot/3.png') }}" class="showroom_slide--img" alt="">
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div class="showroom__slide--address">
                    <a href="#">
                        <h4 class="showroom__address--text text-center"><i class="bi bi-geo-alt-fill"></i> 189 Trần Quý Cáp, P.Tự An, Tp.Buôn Ma Thuột</h4>
                    </a>
                </div>
            </div>
        </div>
        <div class="container__wrapper--items d-flex mt-5">
            <div class="container_ladi--Ser text-center">
                <h1>CÁC TIỆN ÍCH TẠI SHOWROOM NOCODE DEVICE</h1>
                <div class="ladi__ser--items">
                    <div class="ladi__ser--item">
                        <i class="bi bi-p-square"></i>
                        <h4>Giữ xe miễn phí</h4>
                    </div>
                    <div class="ladi__ser--item">
                        <i class="bi bi-wifi"></i>
                        <h4>Wifi miễn phí</h4>
                    </div>
                    <div class="ladi__ser--item">
                        <i class="bi bi-laptop"></i>
                        <h4>Trải nghiệm sản phẩm miễn phí</h4>
                    </div>
                    <div class="ladi__ser--item">
                        <i class="bi bi-chat"></i>
                        <h4>Được chuyên viên tư vấn chuyên sâu</h4>
                    </div>
                    <div class="ladi__ser--item">
                        <i class="bi bi-check-square"></i>
                        <h4>Sản phẩm chính hãng 100%</h4>
                    </div>
                    <div class="ladi__ser--item">
                        <i class="bi bi-calendar2-check"></i>
                        <h4>Có chính sách ưu đãi trả góp</h4>
                    </div>
                    <div class="ladi__ser--item">
                        <i class="bi bi-cash-coin"></i>
                        <h4>Thanh toán dễ dàng</h4>
                    </div>
                    <div class="ladi__ser--item">
                        <i class="bi bi-truck"></i>
                        <h4>Giao hàng tận nhà</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection