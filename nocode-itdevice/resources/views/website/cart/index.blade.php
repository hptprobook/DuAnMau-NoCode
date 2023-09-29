@extends('layouts.app')

@section('content')
    <div class="cart m-auto">

        <a href="" class="text-blue back-link"><i class="bi bi-box-arrow-in-left pe-1"></i>Mua thêm sản phẩm khác</a>
        <div class="cartContainer mt-2 p-2">
            <div class="cart__orderStatus px-5">
                <div class="row">
                    <div class="col-md-3">
                        <div class="cart__orderStatus--item">
                            Giỏ hàng
                        </div>
                    </div>
                    <div class="col-md-3">
                        Thông tin đặt hàng
                    </div>
                    <div class="col-md-3">
                        Thanh toán
                    </div>
                    <div class="col-md-3">
                        Hoàn tất
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
