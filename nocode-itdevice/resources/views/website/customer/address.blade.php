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

                    <a href="{{ route('website.customer.index') }}" class="pe-3">
                        <div class="customer__sidebar--account ps-4 fw-600">
                            Thông tin tài khoản
                        </div>
                    </a>
                    <a href="" class="pe-3 active">
                        <div class="customer__sidebar--address ps-4 fw-600">
                            Sổ địa chỉ
                        </div>
                    </a>
                    <a href="{{ route('website.customer.order') }}" class="pe-3">
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
                    <h4 class="fw-700">Danh sách địa chỉ đã lưu</h4>

                    @foreach ($address as $street)
                        <div>
                            <input type="radio" id="address{{ $street->id }}" name="address" id="">
                            <label for="address{{ $street->id }}">{{ $street->street }}</label>
                        </div>
                    @endforeach
                    <button type="submit" class="save-info-btn px-3 mt-2 text-white fw-500">Đặt làm mặc định</button>

                </div>
            </div>
        </div>
    </div>
@endsection
