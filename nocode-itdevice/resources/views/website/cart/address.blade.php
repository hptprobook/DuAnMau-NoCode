@extends('layouts.app')

@section('content')
    <div class="cart m-auto">

        <a href="" class="text-blue back-link"><i class="bi bi-box-arrow-in-left pe-1"></i>Mua thêm sản
            phẩm khác</a>
        <div class="cartContainer mt-2 px-2 pt-2 pb-5">
            <div class="cart__orderStatus px-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="cart__orderStatus--item active fw-500">
                            <i class="bi bi-bag-check-fill icon active borders"></i>
                            Giỏ hàng
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cart__orderStatus--item active fw-500">
                            <i class="bi bi-card-checklist icon active"></i>
                            Thông tin đặt hàng
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cart__orderStatus--item fw-500">
                            <i class="bi bi-shield-fill-check"></i>
                            Hoàn tất
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
