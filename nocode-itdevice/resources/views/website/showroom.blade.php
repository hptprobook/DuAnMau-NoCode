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
    <div class="container_ladi--in4">
        <div class="container_in4--address">
            <h4 class= "container_address--name">Showroom NOCODE DEVICE</h4>
            <h1 class= "container_address--city">Buôn Ma Thuột</h1>
            <div class="container_address--ele"></div>
            <div class="container_address--items">
                <h6 class="contaner__items--item"><i class="bi bi-house"></i> 189 Trần Quý Cáp, P.Tự An, Tp.Buôn Ma Thuột</h6>
                <h6 class="contaner__items--item"><i class="bi bi-clock"></i> Thời gian làm việc: 8:00 - 21:00 Thứ 2 - Chủ Nhật</h6>
                <a href="#" class="container_address--media"><i class="bi bi-facebook"></i> Truy cập Fanpage NOCODE DEVICE</a>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3892.7219179055965!2d108.05758807334317!3d12.666229321503275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3171f63ab414161f%3A0xe0e1f4957bec6756!2zMTg5IFRy4bqnbiBRdcO9IEPDoXAsIFThu7EgQW4sIFRow6BuaCBwaOG7kSBCdcO0biBNYSBUaHXhu5l0LCDEkOG6r2sgTOG6r2ssIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1695713790164!5m2!1svi!2s" width="400" height="280" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-md-8">
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
            <a href="#" class="swipper_adress">
                <i class="bi bi-geo-alt"></i>
                <div class="swipper_adress--name">
                    <h2>189 Trần Quý Cáp</h2>
                    <h4>P.Tự An, Tp.Buôn Ma Thuột</h4>
                </div>
            </a>
        </div>

    </div>
    <div class="container_ladi--in4">
        <div class="container_in4--address">
            <h4 class= "container_address--name">Showroom NOCODE DEVICE</h4>
            <h1 class= "container_address--city">Buôn Ma Thuột</h1>
            <div class="container_address--ele"></div>
            <div class="container_address--items">
                <h6 class="contaner__items--item"><i class="bi bi-house"></i> 189 Trần Quý Cáp, P.Tự An, Tp.Buôn Ma Thuột</h6>
                <h6 class="contaner__items--item"><i class="bi bi-clock"></i> Thời gian làm việc: 8:00 - 21:00 Thứ 2 - Chủ Nhật</h6>
                <a href="#" class="container_address--media"><i class="bi bi-facebook"></i> Truy cập Fanpage NOCODE DEVICE</a>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3892.7219179055965!2d108.05758807334317!3d12.666229321503275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3171f63ab414161f%3A0xe0e1f4957bec6756!2zMTg5IFRy4bqnbiBRdcO9IEPDoXAsIFThu7EgQW4sIFRow6BuaCBwaOG7kSBCdcO0biBNYSBUaHXhu5l0LCDEkOG6r2sgTOG6r2ssIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1695713790164!5m2!1svi!2s" width="400" height="280" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-md-8">
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
            <a href="#" class="swipper_adress">
                <i class="bi bi-geo-alt"></i>
                <div class="swipper_adress--name">
                    <h2>189 Trần Quý Cáp</h2>
                    <h4>P.Tự An, Tp.Buôn Ma Thuột</h4>
                </div>
            </a>
        </div>

    </div>
    <div class="container_ladi--Ser">
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
<div class="container_ladi" id="KHUVUCMIENBAC">
    <h1 class="container_ladi--section">
        <i class="bi bi-geo-alt-fill"></i>
        KHU VỰC MIỀN BẮC
    </h1>
    <div class="container_ladi--in4">
        <div class="container_in4--address">
            <h4 class= "container_address--name">Showroom NOCODE DEVICE</h4>
            <h1 class= "container_address--city">Buôn Ma Thuột</h1>
            <div class="container_address--ele"></div>
            <div class="container_address--items">
                <h6 class="contaner__items--item"><i class="bi bi-house"></i> 189 Trần Quý Cáp, P.Tự An, Tp.Buôn Ma Thuột</h6>
                <h6 class="contaner__items--item"><i class="bi bi-clock"></i> Thời gian làm việc: 8:00 - 21:00 Thứ 2 - Chủ Nhật</h6>
                <a href="#" class="container_address--media"><i class="bi bi-facebook"></i> Truy cập Fanpage NOCODE DEVICE</a>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3892.7219179055965!2d108.05758807334317!3d12.666229321503275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3171f63ab414161f%3A0xe0e1f4957bec6756!2zMTg5IFRy4bqnbiBRdcO9IEPDoXAsIFThu7EgQW4sIFRow6BuaCBwaOG7kSBCdcO0biBNYSBUaHXhu5l0LCDEkOG6r2sgTOG6r2ssIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1695713790164!5m2!1svi!2s" width="400" height="280" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-md-8">
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
            <a href="#" class="swipper_adress">
                <i class="bi bi-geo-alt"></i>
                <div class="swipper_adress--name">
                    <h2>189 Trần Quý Cáp</h2>
                    <h4>P.Tự An, Tp.Buôn Ma Thuột</h4>
                </div>
            </a>
        </div>

    </div>
    <div class="container_ladi--in4">
        <div class="container_in4--address">
            <h4 class= "container_address--name">Showroom NOCODE DEVICE</h4>
            <h1 class= "container_address--city">Buôn Ma Thuột</h1>
            <div class="container_address--ele"></div>
            <div class="container_address--items">
                <h6 class="contaner__items--item"><i class="bi bi-house"></i> 189 Trần Quý Cáp, P.Tự An, Tp.Buôn Ma Thuột</h6>
                <h6 class="contaner__items--item"><i class="bi bi-clock"></i> Thời gian làm việc: 8:00 - 21:00 Thứ 2 - Chủ Nhật</h6>
                <a href="#" class="container_address--media"><i class="bi bi-facebook"></i> Truy cập Fanpage NOCODE DEVICE</a>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3892.7219179055965!2d108.05758807334317!3d12.666229321503275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3171f63ab414161f%3A0xe0e1f4957bec6756!2zMTg5IFRy4bqnbiBRdcO9IEPDoXAsIFThu7EgQW4sIFRow6BuaCBwaOG7kSBCdcO0biBNYSBUaHXhu5l0LCDEkOG6r2sgTOG6r2ssIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1695713790164!5m2!1svi!2s" width="400" height="280" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-md-8">
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
            <a href="#" class="swipper_adress">
                <i class="bi bi-geo-alt"></i>
                <div class="swipper_adress--name">
                    <h2>189 Trần Quý Cáp</h2>
                    <h4>P.Tự An, Tp.Buôn Ma Thuột</h4>
                </div>
            </a>
        </div>

    </div>
    <div class="container_ladi--Ser">
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
@endsection