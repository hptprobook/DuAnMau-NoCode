@extends('layouts.app')

@section('content')
    <div class="cart m-auto">
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
                        <div class="cart__orderStatus--item active fw-500">
                            <i class="bi bi-card-checklist icon active"></i>
                            Thông tin đặt hàng
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cart__orderStatus--item active fw-500">
                            <i class="bi bi-shield-fill-check active"></i>
                            Hoàn tất
                        </div>
                    </div>
                </div>


            </div>

            @if (isset($success))
                <div class="alert alert-success">
                    {{ $success }}
                </div>
            @endif

            @if (isset($error))
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endif

            <div class="w-100">
                <h4 class="text-main fw-700 pt-5 pb-4 text-center">Bạn đã đặt hàng thành công</h4>
                <form action="{{ route('website.cart.coupon') }}" method="post"
                    style="width: 400px;border: 1px solid #888; border-radius:4px"
                    class="mb-5 m-auto d-flex justify-content-center">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $orderDetailId }}">
                    <input required name="code" type="text" placeholder="Nhập mã giảm giá" class="ps-3"
                        style="height: 40px; outline: none; border: none; width: 80%;">
                    <button class="coupon-btn" type="submit" style="width: 20%; border: none">Áp dụng</button>
                </form>
                <a href="{{ route('website.home') }}" class="text-center text-blue" style="font-size: 18px">
                    <div>Về trang chủ</div>
                </a>
                <a href="{{ route('website.customer.order') }}" class="text-center text-blue" style="font-size: 18px">
                    <div>Theo dõi đơn hàng</div>
                </a>

            </div>
        </div>
    </div>
@endsection
