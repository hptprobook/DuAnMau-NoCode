@extends('layouts.app')

@section('content')
    <div class="container productList">
        <h4>{{ $name }}</h4>

        <div class="row">

            @if ($products->count() > 0)
                <div class="d-flex justify-content-between filter__product">

                    <form action="" style="width: 360px" method="get" class="filter__product--form">
                        <label for="" class="form-label">Lọc theo khoảng giá</label>
                        <input type="hidden" name="mainCat" value="{{ $mainCatId }}">
                        <input type="hidden" name="category" value="{{ $catId }}">
                        <input type="hidden" name="childCat" value="{{ $childCatId }}">
                        <div class="d-flex style__form-controller">
                            <input type="number" name="from" class="form-control" placeholder="Từ ..."
                                value="{{ $fromPrice ?? 0 }}">
                            <input type="number" name="to" class="form-control ms-2" placeholder="đến ..."
                                value="{{ $toPrice ?? 20000000 }}">
                        </div>
                        <button type="submit" class="btn btn-danger mt-2">Lọc</button>
                    </form>

                    <form action="" style="width: 150px" method="get">
                        <label for="sort" class="form-label">Sắp xếp theo</label>
                        <input type="hidden" name="mainCat" value="{{ $mainCatId }}">
                        <input type="hidden" name="category" value="{{ $catId }}">
                        <input type="hidden" name="childCat" value="{{ $childCatId }}">
                        <select class="form-select" id="sort">
                            <option value="">Nổi bật</option>
                            <option value="asc">Giá tăng dần</option>
                            <option value="desc">Giá giảm dần</option>
                        </select>
                        <button type="submit" class="btn btn-danger mt-2 float-end btn__pos">Sắp xếp</button>
                    </form>
                </div>

                @foreach ($products as $product)
                    <div class="col m-2 p-0 d-flex justify-content-between">
                        <div class="productList__item p-1">
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
            @else
                <p>Không có sản phẩm nào <a href="{{ url()->previous() }}">Back</a></p>
            @endif


        </div>
    </div>
@endsection
