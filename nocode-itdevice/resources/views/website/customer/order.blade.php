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
                    <a href="{{ route('website.customer.address') }}" class="pe-3">
                        <div class="customer__sidebar--address ps-4 fw-600">
                            Sổ địa chỉ
                        </div>
                    </a>
                    <a href="" class="pe-3 active">
                        <div class="customer__sidebar--order ps-4 fw-600">
                            Quản lý đơn hàng
                        </div>
                    </a>
                    <a onclick="event.preventDefault();
                    document.getElementById('customer__logout-form').submit();"
                        href="" class="pe-3">
                        <div class="customer__sidebar--logout ps-4 fw-600">
                            Đăng xuất
                        </div>
                    </a>
                    <form id="customer__logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                <div class="customer__container p-4">
                    <h4 class="fw-700">Theo dõi đơn hàng</h4>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Mã</th>
                                <th>Ngày đặt hàng</th>
                                <th style="width: 25%;">Giao đến</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                                <tr>
                                    <td style="vertical-align: middle;">#{{ $item->id }}</td>
                                    <td style="vertical-align: middle;">{{ $item->created_at }}</td>
                                    <td style="vertical-align: middle;">{{ $item->address->street }}</td>
                                    <td style="vertical-align: middle;">
                                        {{ number_format(round($item->total_amount, -4), 0, '.', '.') }}đ</td>
                                    <td style="vertical-align: middle;">
                                        <span class="px-3 py-1 fw-500 text-center text-white"
                                            style="border-radius: 12px; background-color: #0dcaf0">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                    <td style="vertical-align: middle;"><a class="btn btn-warning text-white"
                                            href="{{ route('website.customer.orderDetail', $item->id) }}">Chi
                                            tiết</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination">
                        {{ $orders->links() }}
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
