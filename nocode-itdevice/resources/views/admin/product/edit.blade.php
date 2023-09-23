@extends('layouts.admin')

@section('title', 'Administrator')

@section('admin-content')

    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm sản phẩm
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ $product->name }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Giá</label>
                                <input class="form-control" type="text" name="price" id="price"
                                    value="{{ $product->price }}">
                                @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="discount">Giảm giá</label>
                                <input class="form-control" type="text" name="discount" id="discount"
                                    value="{{ $product->discount }}">
                                @error('discount')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="product_code">Mã sản phẩm</label>
                                <input class="form-control" type="text" name="product_code" id="product_code"
                                    value="{{ $product->product_code }}">
                                @error('product_code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <input multiple type="file" name="images[]" id="post__image" class="form-control-file">
                                @error('images')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div id="image-preview" class="image-preview mt-2"
                                style="width: 136px; height: 120px; overflow: hidden; border: 1px solid #888; border-radius: 4px;">
                                <img id="post__preview" src="#" alt="Preview"
                                    style="width: 100%; height: 100%; object-fit: cover; display: none;">
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="description">Mô tả sản phẩm</label>
                                <textarea name="description" class="form-control" id="description" cols="30" rows="5">{{ $product->description }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="detail">Chi tiết sản phẩm</label>
                        <textarea name="detail" class="form-control" id="detail" cols="30" rows="5">{{ $product->detail }}</textarea>
                        @error('detail')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="category">Danh mục</label>
                        <select class="form-control" id="category" name="cat_id">
                            <option value="">Chọn danh mục</option>
                            @foreach ($childCats as $childCat)
                                <option @if (old('cat_id') == $childCat->id) @selected(true) @endif
                                    value="{{ $childCat->id }}">
                                    {{ $mainCats[$categories[$childCat->cat_id - 1]->main_cat_id - 1]->name }} -
                                    {{ $categories[$childCat->cat_id - 1]->name }} -
                                    {{ $childCat->name }}
                                </option>
                            @endforeach
                        </select>
                        {{ old('cat_id') }}
                        @error('cat_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select class="form-control" id="status" name="status">
                            <option @if ($product->status == 0) @selected(true) @endif value="0">Còn hàng
                            </option>
                            <option @if ($product->status == 1) @selected(true) @endif value="1">Hết hàng
                            </option>
                        </select>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn mt-3 btn-primary">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>

@endsection
