@extends('layouts.admin')

@section('title', 'Administrator')

@section('admin-content')
    <div id="content" class="container-fluid">
        <div class="row">
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

            <div class="col-4">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        <b>Danh sách thuộc tính sản phẩm</b>
                    </div>
                    <div class="card-body">
                        <p>Tên sản phẩm: <b>{{ $product->name }}</b></p>

                        <p>Giá: <b>{{ $product->price }}</b></p>

                        <h6 class="mt-2">Danh sách thuộc tính</h6>

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
                                        {{ $attributeValue['value'] }} |
                                    </label>
                                @endforeach
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
