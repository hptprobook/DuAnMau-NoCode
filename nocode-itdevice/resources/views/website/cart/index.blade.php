@extends('layouts.app')

@section('content')
    <div class="cart m-auto">
        <form action="" method="post">
            @csrf

            <a href="" class="text-blue back-link"><i class="bi bi-box-arrow-in-left pe-1"></i>Mua thêm sản
                phẩm khác</a>
            <div class="cartContainer mt-2 px-2 pt-2 pb-5 active">
                <div class="cart__orderStatus px-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="cart__orderStatus--item active fw-500">
                                <i class="bi bi-bag-check-fill icon active"></i>
                                Giỏ hàng
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="cart__orderStatus--item fw-500">
                                <i class="bi bi-card-checklist icon"></i>
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

                <div class="px-4">
                    <div>

                        @php
                            $total = 0;
                        @endphp

                        @foreach ($userCarts as $item)
                            <div class="cart__list mt-4 mb-5" data-cart-id="{{ $item->id }}">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="cart__list--img">
                                            <img src="{{ asset($item->product->avatar) }}" class="img-c" alt="">
                                        </div>
                                        <a href="{{ route('website.cart.delete', $item->id) }}"
                                            class="cart__list--delete"><i class="bi bi-trash3"></i>Xóa</a>
                                    </div>

                                    <input type="hidden" class="cart__list--id" name="cart_id" value="{{ $item->id }}">
                                    <div class="col-md-7">
                                        <div class="cart__list--info">
                                            <a href="{{ route('website.product.detail', $item->product->id) }}">
                                                @php
                                                    $readableString = '';
                                                    $decodedArray = json_decode($item->attributes);
                                                    
                                                    if ($decodedArray != null) {
                                                        $readableString = implode(', ', $decodedArray);
                                                    } else {
                                                        $readableString = '';
                                                    }
                                                @endphp
                                                <h5 class="cart__info--name fw-600">
                                                    {{ $item->product->name }} ( {{ $readableString }})
                                                </h5>
                                            </a>
                                            <div class="cart__info--deal">
                                                <h6>Quà tặng khuyễn mãi</h6>
                                                <p class="ps-2"><i class="bi bi-arrow-right-short"></i>Áo khoác Nocode</p>
                                                <p class="ps-2"><i class="bi bi-arrow-right-short"></i>Áo khoác Nocode</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="cart__list--handle">
                                            <p class="new-price text-main fw-600">
                                                {{ number_format(round($item->provision * $item->quantity, -4), 0, '.', '.') }}đ
                                            </p>
                                            <p class="old-price">
                                                {{ number_format(round($item->quantity * $item->provision + $item->provision * ($item->product->discount / 100), -4), 0, ',', '.') }}đ
                                            </p>
                                            @php
                                                $total += $item->provision * $item->quantity;
                                            @endphp
                                            <div class="cart__list--quantity mt-2 d-flex">
                                                <span class="subtract">-</span>
                                                <input class="quantity" type="number" min="1" max="30"
                                                    value="{{ $item->quantity }}" data-quantity="{{ $item->quantity }}">
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
                            <span class="fw-700 text-main"
                                style="font-size: 20px">{{ number_format(round($total, -4), 0, '.', '.') }} đ</span>
                        </div>
                    </div>

                    <button class="w-100 mt-2 cart__orderBtn fw-600">ĐẶT HÀNG NGAY</button>
                </div>
            </div>

            <div class="addressContainer active mt-2 px-2 pt-2 pb-5">
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

                <div class="address__content mt-5 px-4">
                    <h5>Thông tin khách mua hàng</h5>
                    <div class="address__content--info mt-3 d-flex justify-content-between">
                        <input type="text" name="fullname" class="w-50 me-2 ps-3" placeholder="Nhập họ tên">
                        <input type="text" name="fullname" class="w-50 ms-2 ps-3" placeholder="Nhập số điện thoại">
                    </div>
                    <h5 class="mt-3">Địa chỉ nhận hàng</h5>
                    <div class="address__content--home">
                        <div class="mt-3 row">
                            <div class="col-md-6">
                                <select name="province" id="province"></select>
                            </div>
                            <div class="col-md-6">
                                <select name="district" id="district"></select>
                            </div>
                            <div class="col-md-6">
                                <select name="ward" id="ward"></select>
                            </div>
                            <div class="col-md-6">
                                <select name="home" id="home"></select>
                            </div>
                        </div>
                    </div>
                    <input type="text" name="note" class="address__content--note mt-3 w-100 ps-3 mb-3"
                        placeholder="Lưu ý / yêu cầu khác (không bắt buộc)">
                    <hr>
                    <div class="cart__pay my-3">
                        <div class="d-flex justify-content-between">
                            <span class="fw-500">Phí vận chuyển: </span>
                            <span class="fw-500">Miễn phí</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2 mb-3">
                            <span class="fw-500">Tổng tiền: </span>
                            <span class="fw-700 text-main"
                                style="font-size: 20px">{{ number_format(round($total, -4), 0, '.', '.') }} đ</span>
                        </div>
                    </div>

                    <button class="w-100 mt-2 cart__orderBtn fw-600">ĐẶT HÀNG NGAY</button>
                </div>
            </div>

        </form>
    </div>
@endsection
