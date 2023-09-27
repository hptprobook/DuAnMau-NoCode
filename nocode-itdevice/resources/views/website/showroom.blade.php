@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>CHỌN KHU VỰC CỦA BẠN</h1>
        <div class="container_regions">
            <a class="container_regions--place" href="#">
                <img src="{{ asset('assets/img/Showroom/Bac/Bac.png') }}" class="container_place--img" id="bac" alt="Khu vực miền Bắc">
            </a>
            <a class="container_regions--place" href="#">
                <img src="{{ asset('assets/img/Showroom/Nam/Nam.png') }}" class="container_place--img" id="nam" alt="Khu vực miền Nam">
            </a>
        </div>
        
    </div>
    <div class="container_ladi">
        <h1 class="container_ladi--section">
            <i class="bi bi-geo-alt-fill"></i>
            KHU VỰC MIỀN NAM
        </h1>
        <div class="container_ladi--in4">
            <div class="container_in4--address">
                    <h4>Showroom NOCODE DEVICE</h4>
                    <h1>Buôn Ma Thuột</h1>
                    <div class="container_address--ele"></div>
                    <div class="container_address--items">
                        <h6 class="contaner__items--item" ><i class="bi bi-house"></i> 189 Trần Quý Cáp, P.Tự An, Tp.Buôn Ma Thuột</h6>
                        <h6 class="contaner__items--item" ><i class="bi bi-clock"></i> Thời gian làm việc: 8:00 - 21:00 Thứ 2 - Chủ Nhật</h6>
                        <a href="#" class="container_address--media"><i class="bi bi-facebook"></i> Truy cập Fanpage NOCODE DEVICE</a>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3892.7219179055965!2d108.05758807334317!3d12.666229321503275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3171f63ab414161f%3A0xe0e1f4957bec6756!2zMTg5IFRy4bqnbiBRdcO9IEPDoXAsIFThu7EgQW4sIFRow6BuaCBwaOG7kSBCdcO0biBNYSBUaHXhu5l0LCDEkOG6r2sgTOG6r2ssIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1695713790164!5m2!1svi!2s" width="400" height="280" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="container_in4--slide">
                    <img class="container__slide-img" src="{{ asset('assets/img/region_slide/BuonMaThuot/1.png') }}" alt="ShowRoom Buôn Ma Thuột">
            </div>
        </div>
    </div>

@endsection
