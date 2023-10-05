@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="customer__sidebar w-100">

                    <div class="customer__sidebar--info pt-3 ps-4 fw-700 d-flex align-items-center">
                        <i class="bi bi-person-circle pe-3" style="font-size: 40px; color: #666"></i>
                        {{ $customer->name }}
                    </div>

                    <hr>

                    <a href="" class="pe-3 active">
                        <div class="customer__sidebar--account ps-4 fw-600">
                            Thông tin tài khoản
                        </div>
                    </a>
                    <a href="{{ route('website.customer.address') }}" class="pe-3">
                        <div class="customer__sidebar--address ps-4 fw-600">
                            Sổ địa chỉ
                        </div>
                    </a>
                    <a href="" class="pe-3">
                        <div class="customer__sidebar--order ps-4 fw-600">
                            Quản lý đơn hàng
                        </div>
                    </a>
                    <a href="" class="pe-3">
                        <div class="customer__sidebar--logout ps-4 fw-600">
                            Đăng xuất
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="customer__container p-4">
                    <h4 class="fw-700">Thông tin tài khoản</h4>
                    <div class="row align-items-center" style="height: 52px">
                        <div class="col-md-2 justify-content-end d-flex">
                            <label for="">Họ tên</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" value="{{ $customer->name }}">
                        </div>
                    </div>
                    <div class="row align-items-center" style="height: 52px">
                        <div class="col-md-2 justify-content-end d-flex">
                            <label for="">Số điện thoại</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" value="{{ $customer->phone }}">
                        </div>
                    </div>

                    <div class="row align-items-center" style="height: 52px">
                        <div class="col-md-2 justify-content-end d-flex">
                            <label for="">Email</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" value="{{ $customer->email }}">
                        </div>
                    </div>

                    <div class="offset-2 p-1">
                        <button>Lưu thay đổi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
