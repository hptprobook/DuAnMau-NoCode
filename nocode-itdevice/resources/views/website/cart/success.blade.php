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
            <div>
                <div class="alert alert-success">Đặt hàng thành công</div>
                <a href="">Về trang chủ</a>
                <a href="">Theo dõi đơn hàng</a>
                <input type="text" placeholder="Nhập mã giảm giá">
                <button>Áp dụng</button>
            </div>
        </div>
    </div>
@endsection
