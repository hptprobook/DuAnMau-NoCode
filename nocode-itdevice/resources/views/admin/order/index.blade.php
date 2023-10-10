@extends('layouts.admin')

@section('title', 'Administrator')

@section('admin-content')

    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách đơn hàng</h5>
                <div class="form-search form-inline">
                    <form action="{{ route('admin.order.index') }}" method="GET">
                        <input type="text" name="keyword" value="{{ $keyword }}" class="form-control form-search"
                            placeholder="Tìm kiếm theo tên KH">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="card-body">
                <div class="analytic">
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'Đang xác nhận']) }}" class="text-primary">Đang xác
                        nhận<span class="text-muted">({{ $count[0] }})</span></a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'Đã xác nhận']) }}" class="text-primary">Đã xác
                        nhận<span class="text-muted">({{ $count[1] }})</span></a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'Đang giao hàng']) }}" class="text-primary">Đang
                        giao
                        hàng<span class="text-muted">({{ $count[2] }})</span></a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'Đã nhận hàng']) }}" class="text-primary">Đã nhận
                        hàng<span class="text-muted">({{ $count[3] }})</span></a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'Đã huỷ']) }}" class="text-primary">Đã huỷ<span
                            class="text-muted">({{ $count[4] }})</span></a>
                </div>
                <form action="{{ route('admin.order.action') }}" method="posst">
                    @csrf

                    <div class="form-action form-inline d-flex py-3">
                        <select name="act" class="form-control mr-1 me-1" id="" style="width: 120px;">
                            <option value="">Chọn</option>
                            <option value="submit">Xác nhận</option>
                            <option value="shipping">Đang giao</option>
                            <option value="destroy">Huỷ</option>
                            <option value="delete">Xoá</option>
                        </select>
                        <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                    </div>
                    <table class="table table-striped table-checkall">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="checkall">
                                </th>
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
                                $countOrder = ($orders->currentPage() - 1) * $orders->perPage();
                            @endphp

                            @foreach ($orders as $order)
                                @php
                                    $order->countOrder = ++$countOrder;
                                @endphp
                                <tr>
                                    <td>
                                        <input type="checkbox" name="list_check[]" value="{{ $order->id }}">
                                    </td>
                                    <td>
                                        {{ $order->countOrder }}
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
                                            <a style="width: 30px"
                                                href="{{ route('admin.order.confirmOrder', $order->id) }}"
                                                title="Xác nhận đơn hàng"
                                                class="btn btn-success btn-sm rounded-0 text-white"><i
                                                    class="fa-solid fa-check"></i></a>
                                        @elseif ($order->status == 'Đang giao hàng')
                                            <a style="width: 30px"
                                                href="{{ route('admin.order.confirmReceive', $order->id) }}"
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
                                        <a style="width: 30px"
                                            href="{{ route('admin.order.orderDetail', $order->cart_id) }}"
                                            title="Chi tiết đơn hàng" class="btn btn-info btn-sm rounded-0 text-white"><i
                                                class="fa-solid fa-list"></i></a>
                                        @if ($order->status != 'Đã huỷ')
                                            <a style="width: 30px"
                                                href="{{ route('admin.order.destroyOrder', $order->id) }}"
                                                title="Huỷ đơn hàng" class="btn btn-danger btn-sm rounded-0 text-white"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="paginate">
                        {{ $orders->appends(['keyword' => $keyword])->links() }}
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
