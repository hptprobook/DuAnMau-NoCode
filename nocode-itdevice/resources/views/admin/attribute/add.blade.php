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
                        <b>Thêm thuộc tính sản phẩm</b>
                    </div>
                    <div class="card-body">
                        Tên sản phẩm: <b>{{ $product->name }}</b>
                        <form action="{{ route('admin.attribute.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group mt-2">
                                <label for="attribute">Thuộc tính</label>
                                <select class="form-control" id="attribute" name="attribute_id">
                                    @foreach ($attributes as $attribute)
                                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                    @endforeach
                                </select>
                                @error('cat_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="form-group mt-2">
                                <label for="value">Giá trị của thuộc tính</label>
                                <input class="form-control" type="text" name="value" id="value">
                                @error('value')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
