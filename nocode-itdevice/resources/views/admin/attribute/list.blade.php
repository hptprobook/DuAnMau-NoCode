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
                            $previousAttributeName = '';
                        @endphp

                        @foreach ($relatedAttributes as $attribute)
                            @if ($attribute->name !== $previousAttributeName)
                                <p>{{ $attribute->name }}:
                                    @php
                                        $attributeValuesForAttribute = $attributeValues
                                            ->where('attribute_id', $attribute->id)
                                            ->pluck('value')
                                            ->implode(', ');
                                    @endphp
                                    {{ $attributeValuesForAttribute }}
                                </p>
                            @endif

                            @php
                                $previousAttributeName = $attribute->name;
                            @endphp
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
