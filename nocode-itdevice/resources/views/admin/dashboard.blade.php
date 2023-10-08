@extends('layouts.admin')

@section('title', 'Admintrator')

@section('admin-content')

    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-xs-12 col-xl-3 col-md-6">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">ĐƠN HÀNG THÀNH CÔNG</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $successOrderCount }}</h5>
                        <p class="card-text">Đơn hàng giao dịch thành công</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-xl-3 col-md-6">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">ĐANG XỬ LÝ</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $handlingOrderCount }}</h5>
                        <p class="card-text">Số lượng đơn hàng đang xử lý</p>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-xl-3 col-md-6">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">DOANH SỐ</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ number_format($totalRevenue / 1000000, 2) }}
                            {{ strlen(floor($totalRevenue / 1000000)) < 6 ? 'triệu đồng' : 'tỷ đồng' }}
                        </h5>
                        <p class="card-text">Doanh số hệ thống</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-xl-3 col-md-6">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header">ĐƠN HÀNG HỦY</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $destroyedOrderCount }}</h5>
                        <p class="card-text">Số đơn bị hủy trong hệ thống</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end analytic  -->
        <div class="card">
            <div class="card-header font-weight-bold">
                ĐƠN HÀNG MỚI
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ngày đặt hàng</th>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Ghi chú</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($orders as $order)
                            @php
                                $count++;
                            @endphp
                            <tr>
                                <td>
                                    {{ $count }}
                                </td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->address->full_name }} <br> {{ $order->address->phone }}</td>
                                <td>{{ $order->address->street }}</td>
                                <td>{{ $order->total_amount }}</td>
                                <td>
                                    @if ($order->status == 'Đang xác nhận')
                                        <div class="badge badge-warning">{{ $order->status }}</div>
                                    @elseif ($order->status == 'Đã xác nhận')
                                        <div class="badge badge-success">{{ $order->status }}</div>
                                    @elseif ($order->status == 'Đang giao hàng')
                                        <div class="badge badge-info">{{ $order->status }}</div>
                                    @elseif ($order->status == 'Đã nhận hàng')
                                        <div class="badge badge-primary">{{ $order->status }}</div>
                                    @else
                                        <div class="badge badge-danger">{{ $order->status }}</div>
                                    @endif

                                </td>
                                <td>{{ $order->note }}</td>
                                <td>
                                    @if ($order->status == 'Đang xác nhận')
                                        <a style="width: 30px" href="{{ route('admin.order.confirmOrder', $order->id) }}"
                                            title="Xác nhận đơn hàng" class="btn btn-success btn-sm rounded-0 text-white"><i
                                                class="fa-solid fa-check"></i></a>
                                    @elseif ($order->status == 'Đang giao hàng')
                                        <a style="width: 30px" href="{{ route('admin.order.confirmReceive', $order->id) }}"
                                            title="Xác nhận KH đã nhận hàng"
                                            class="btn btn-primary btn-sm rounded-0 text-white"><i
                                                class="fa-solid fa-right-left"></i></a>
                                    @elseif ($order->status == 'Đã xác nhận')
                                        <a style="width: 30px"
                                            href="{{ route('admin.order.confirmShipping', $order->id) }}"
                                            title="Xác nhận đang giao hàng"
                                            class="btn btn-warning btn-sm rounded-0 text-white"><i
                                                class="fa-solid fa-truck-arrow-right"></i></a>
                                    @endif
                                    <a style="width: 30px" href="{{ route('admin.order.orderDetail', $order->cart_id) }}"
                                        title="Chi tiết đơn hàng" class="btn btn-info btn-sm rounded-0 text-white"><i
                                            class="fa-solid fa-list"></i></a>
                                    @if ($order->status != 'Đã huỷ')
                                        <a style="width: 30px" href="{{ route('admin.order.destroyOrder', $order->id) }}"
                                            title="Huỷ đơn hàng" class="btn btn-danger btn-sm rounded-0 text-white"><i
                                                class="fa-solid fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


@endsection
