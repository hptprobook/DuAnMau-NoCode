@extends('layouts.app')

@section('content')
    <div class="cart m-auto">

        <a href="" class="text-blue back-link"><i class="bi bi-box-arrow-in-left pe-1"></i>Mua thêm sản
            phẩm khác</a>
        <div class="cartContainer mt-2 px-2 pt-2 pb-5">
            <div class="cart__orderStatus px-5">
                <div class="row">
                    <div class="col-md-3">
                        <div class="cart__orderStatus--item fw-500">
                            <i class="bi bi-bag-check-fill icon "></i>
                            Giỏ hàng
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="cart__orderStatus--item fw-500">
                            <i class="bi bi-card-checklist icon active"></i>
                            Thông tin đặt hàng
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="cart__orderStatus--item fw-500">
                            <i class="bi bi-credit-card icon"></i>
                            Thanh toán
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="cart__orderStatus--item fw-500">
                            <i class="bi bi-shield-fill-check"></i>
                            Hoàn tất
                        </div>
                    </div>
                </div>
            </div>

            <div class="cart__content">

            </div>

            <div class="px-4">

                <div class="cart__pay my-3">
                    <div class="d-flex justify-content-between">
                        <span class="fw-500">Phí vận chuyển: </span>
                        <span class="fw-500">Miễn phí</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2 mb-3">
                        <span class="fw-500">Tổng tiền: </span>
                        <span class="fw-700 text-main" style="font-size: 20px">30.000.000đ</span>
                    </div>
                </div>

                <button class="w-100 mt-2 cart__orderBtn fw-600">ĐẶT HÀNG NGAY</button>
            </div>
        </div>
    </div>
@endsection
