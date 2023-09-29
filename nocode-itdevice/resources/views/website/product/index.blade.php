@extends('layouts.app')

@section('content')
    <div class="container productList">
        <h4>{{ $name }}</h4>

        <div class="row">

            @if ($products->count() > 0)
                @foreach ($products as $product)
                    <div class="col-md-3">
                        <div class="productList__item mt-4 p-4">
                            <a href="{{ route('website.product.detail', $product->id) }}">
                                <div class="productList__item--img">
                                    <img class="img-c" src="{{ asset($product->avatar) }}" alt="">
                                </div>

                                <div class="productList__item--status my-3">
                                    @if ($product->status == 0)
                                        <span class="in-stock px-4 py-1 fw-700 text-white">Còn hàng</span>
                                    @else
                                        <span class="out-of-stock px-4 py-1 fw-700 text-white">Hết hàng</span>
                                    @endif
                                </div>

                                <div class="productList__item--name d-flex align-items-center fw-600">
                                    {{ $product->name }}
                                </div>
                                @php
                                    $newPrice = $product->price - $product->price * ($product->discount / 100);
                                @endphp
                                <div class="productList__item--price">
                                    <span class="old-price">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="new-price
                            text-main fw-600">{{ number_format(round($newPrice, -4), 0, '.', '.') }}đ</span>
                                        <span class="discount text-main">-{{ $product->discount }}%</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif

            <p>Không có sản phẩm nào <a href="{{ url()->previous() }}">Back</a></p>

        </div>
    </div>
@endsection
