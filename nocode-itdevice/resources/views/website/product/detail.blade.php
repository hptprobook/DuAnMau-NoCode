@extends('layouts.app')

@section('content')
    <div class="product__main container">
        <div class="row">
            <div class="col-md-4">
                <div class="product__detail--slider p-4">
                    <div class="swiper detail__slider--main">
                        <div class="swiper-wrapper">

                            @foreach ($images as $image)
                                <div class="swiper-slide">
                                    <img class="img-c" src="{{ asset($image->img_url) }}" alt="">
                                </div>
                            @endforeach

                        </div>

                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>

                    </div>
                    <div thumbsSlider="" class="swiper detail__slider--thumb">
                        <div class="swiper-wrapper">
                            @foreach ($images as $image)
                                <div class="swiper-slide">
                                    <img class="img-c" src="{{ asset($image->img_url) }}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <form action="" id="add-to-cart-form" method="post">
                    @csrf
                    <div class="product__detail--info pt-4">
                        <h4 class="detail__info--name fw-600">{{ $product->name }}</h4>
                        <input type="hidden" name="product_id" class="product__detail--id" value="{{ $product->id }}">
                        <div class="detail__info--rate d-flex">
                            <span class="fw-600">0 <i class="bi bi-star-fill"></i></span>
                            <a href="" class="text-blue fw-600">Xem đánh giá</a>
                        </div>
                        @php
                            $newPrice = $product->price - $product->price * ($product->discount / 100);
                        @endphp

                        @php
                            $formattedAttributes = [];
                            
                            foreach ($attributes as $attribute) {
                                $attributeName = $attribute->attribute->name;
                                $attributeValue = $attribute->value;
                                $attributeId = $attribute->id;
                            
                                if (!isset($formattedAttributes[$attributeName])) {
                                    $formattedAttributes[$attributeName] = [];
                                }
                            
                                $formattedAttributes[$attributeName][] = [
                                    'id' => $attributeId,
                                    'value' => $attributeValue,
                                ];
                            }
                        @endphp

                        @foreach ($formattedAttributes as $attributeName => $attributeValues)
                            <div class="d-flex align-items-center detail__attribute mt-3" style="font-size: 16px;">
                                <span class="fw-600">{{ $attributeName }}:</span>
                                @foreach ($attributeValues as $attributeValue)
                                    <label class="d-flex align-items-center ps-3" style="cursor: pointer;">
                                        <input class="me-2 detail__attribute--value" type="radio"
                                            data-attribute-name="{{ $attributeName }}"
                                            data-attribute-value="{{ $attributeValue['value'] }}"
                                            data-attribute-id="{{ $attributeValue['id'] }}" name="{{ $attributeName }}"
                                            value="{{ $attributeValue['id'] }}">
                                        {{ $attributeValue['value'] }}
                                    </label>
                                @endforeach
                            </div>
                        @endforeach
                        <div class="detail__info--price my-3">
                            <span
                                class="new-price text-main fw-700 pe-3">{{ number_format(round($newPrice, -4), 0, '.', '.') }}đ</span>
                            <span class="old-price pe-3">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                            <span class="discount text-main">-{{ $product->discount }}%</span>
                        </div>
                        <div class="card detail__info--gift mt-3">
                            <h5 class="card-header">
                                <span class="text-main"><i class="bi bi-gift-fill"></i> Quà tặng khuyến mãi</span>
                            </h5>
                            <div class="card-body">
                                <p class="card-text"><i class="bi bi-1-circle-fill text-main pe-2"></i>Áo
                                    khoác Nocode</p>
                                <p class="card-text"><i class="bi bi-2-circle-fill text-main pe-2"></i>Móc khóa Nocode</p>
                                <p class="card-text"><i class="bi bi-3-circle-fill text-main pe-2"></i>Dây đeo thẻ Nocode
                                </p>
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="detail__info--btn fw-700 mb-3">MUA NGAY</button>
                </form>

                <hr>
                <div class="detail__info--deal my-3">
                    <h4 class="fw-700 text-main">KHUYẾN MÃI</h4>
                    {!! $product->description !!}
                </div>
                <hr>
                <div class="detail__info--endow my-3">
                    <h4 class="fw-700 text-main">ƯU ĐÃI KHI MUA KÈM PC</h4>
                    <p>Ưu đãi lên đến 54% khi mua kèm PC</p>
                </div>
                <hr>
                <div class="detail__info--more my-3">
                    <h4 class="fw-700 text-main">Hỗ trợ trả góp MPOS (Thẻ tín dụng), HDSAISON.</h4>
                    <p>(Hình ảnh PC chỉ mang tính chất minh họa)</p>
                </div>
            </div>
        </div>
    </div>

    <div class="product__detail container">
        <h4>Mô tả Sản phẩm</h4>
        {!! $product->detail !!}
    </div>
@endsection
