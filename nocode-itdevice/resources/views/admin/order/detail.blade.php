@extends('layouts.admin')

@section('title', 'Administrator')

@section('admin-content')

    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0">Chi tiết đơn hàng</h5>
            </div>
            <div class="card-body">

                @php
                    $count = 0;
                @endphp

                <table class="table table-striped table-checkall">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Thuộc tính</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            @php $count++; @endphp
                            <tr>
                                <td>{{ $count }}</td>
                                <td>{{ $order->product->name }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->provision }}</td>
                                @php
                                    $readableString = '';
                                    $decodedArray = json_decode($order->attributes);
                                    
                                    if ($decodedArray != null) {
                                        $readableString = implode(', ', $decodedArray);
                                    } else {
                                        $readableString = '';
                                    }
                                @endphp
                                <td>{{ $readableString }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
