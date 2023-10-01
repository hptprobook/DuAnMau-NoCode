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
                            <i class="bi bi-bag-check-fill icon active"></i>
                            Giỏ hàng
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="cart__orderStatus--item fw-500">
                            <i class="bi bi-card-checklist icon"></i>
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

            <div class="px-4">
                <div>

                    @foreach ($userCarts as $item)
                        <div class="cart__list mt-4 mb-5">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="cart__list--img">
                                        <img src="{{ asset($item->product->avatar) }}" class="img-c" alt="">
                                    </div>
                                    <a href="" class="cart__list--delete"><i class="bi bi-trash3"></i>Xóa</a>
                                </div>
                                <div class="col-md-7">
                                    <div class="cart__list--info">
                                        <a href="">
                                            <h5 class="cart__info--name fw-600">
                                                {{ $item->product->name }}
                                            </h5>
                                        </a>
                                        <div class="cart__info--deal">
                                            <h6>Quà tặng khuyễn mãi</h6>
                                            <p class="ps-2"><i class="bi bi-arrow-right-short"></i>Áo khoác Nocode</p>
                                            <p class="ps-2"><i class="bi bi-arrow-right-short"></i>Áo khoác Nocode</p>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $newPrice = ($item->product->price - $item->product->price * ($item->product->discount / 100)) * $item->quantity;
                                @endphp
                                <div class="col-md-3">
                                    <div class="cart__list--handle">
                                        <p class="new-price text-main fw-600">
                                            {{ number_format(round($newPrice, -4), 0, '.', '.') }}đ</p>
                                        <p class="old-price">
                                            {{ number_format($item->quantity * $item->product->price, 0, ',', '.') }}đ</p>
                                        <div class="cart__list--quantity mt-2 d-flex">
                                            <span class="subtract">-</span>
                                            <input class="quantity" type="number" min="1" max="3"
                                                value="{{ $item->quantity }}">
                                            <span class="plus">+</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach



                </div>
                <div class="cart__discount my-4">
                    <input type="text" placeholder="Nhập mã giảm giá">
                    <button>Áp dụng</button>
                </div>

                <hr>

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
