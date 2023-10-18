@extends('layouts.app')

@section('content')
    <div class="cart m-auto">
        @if ($userCarts->count() > 0)
            <form action="{{ route('website.cart.order') }}" method="post" class="cart-form">
                @csrf

                <a href="" class="text-blue back-link"><i class="bi bi-box-arrow-in-left pe-1"></i>Trở về</a>
                <div class="cartContainer @if (session('validationError')) disable @endif mt-2 px-2 pt-2 pb-5 active">

                    <div class="cart__orderStatus px-5 ">
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
                                                <img src="{{ asset($item->product->avatar) }}" class="img-c"
                                                    alt="">
                                            </div>
                                            <a href="{{ route('website.cart.delete', $item->id) }}"
                                                class="cart__list--delete"><i class="bi bi-trash3"></i>Xóa</a>
                                        </div>

                                        <input type="hidden" class="cart__list--id" name="cart_id[]"
                                            value="{{ $item->id }}">
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
                                                    <p class="ps-2"><i class="bi bi-arrow-right-short"></i>Áo khoác Nocode
                                                    </p>
                                                    <p class="ps-2"><i class="bi bi-arrow-right-short"></i>Áo khoác Nocode
                                                    </p>
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
                                                        value="{{ $item->quantity }}"
                                                        data-quantity="{{ $item->quantity }}">
                                                    <span class="plus">+</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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

                <div class="addressContainer mt-2 px-2 pt-2 pb-5 @if (session('validationError')) active @endif">
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
                            <div class="form-group w-50 me-2">
                                <input type="text" name="fullname" class="w-100 ps-3" placeholder="Nhập họ tên">
                                @error('fullname')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group w-50 ms-2">
                                <input type="text" name="phone" class="w-100 ps-3" placeholder="Nhập số điện thoại">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <h5 class="mt-3">Địa chỉ nhận hàng</h5>
                        <div class="address__content--home px-5">
                            <div class="mt-3 row">
                                <div class="col-md-6 mt-3 pe-2">
                                    <select class="w-100 ps-2" name="province" id="province">
                                        <option value="">Tỉnh / Thành phố</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('province')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3 ps-2">
                                    <select class="w-100 ps-2" name="district" id="district">
                                        <option value="">Quận / huyện</option>
                                    </select>
                                    @error('district')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3 pe-2">
                                    <select class="w-100 ps-2" name="ward" id="ward">
                                        <option value="">Xã / phường / Thị trấn</option>
                                    </select>
                                    @error('ward')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3 ps-2">
                                    <input class="w-100 ps-2" name="street" id="street"
                                        placeholder="Số nhà, đường" />
                                    @error('street')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <input type="text" name="note" class="address__content--note mt-3 w-100 ps-3 mb-3"
                            placeholder="Lưu ý / yêu cầu khác (không bắt buộc)">
                        @error('note')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
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

                        <button onclick="document.querySelector('.cart-form').submit();" type="submit"
                            class="w-100 mt-2 cart__orderBtn fw-600">ĐẶT HÀNG NGAY</button>

                    </div>
                </div>

            </form>
        @else
            <h4 class="py-5 text-center fw-700">Giỏ hàng trống</h4>
            <h5 class="text-center">
                <a class="text-blue" href="{{ route('website.product.index') }}">Danh sách sản phẩm bán chạy</a>
            </h5>
        @endif
    </div>
@endsection
