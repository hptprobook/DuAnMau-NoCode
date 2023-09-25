@extends('layouts.admin')

@section('title', 'Admintrator')

@section('admin-content')

    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <b class="">Chỉnh sửa thông tin hình ảnh</b>

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
                <p>Tên sản phẩm: <b>{{ $product->name }}</b></p>

                <form enctype="multipart/form-data" action="{{ route('admin.product.updateImage', $product->id) }}"
                    method="POST">
                    @csrf
                    @method('POST')
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="w-25">Hình ảnh</th>
                                <th class="">Thông tin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($images as $img)
                                <tr>
                                    <td>
                                        <div class="edit-img__thumbnail">
                                            <img src="{{ asset($img->img_url) }}" class="current-image" alt="">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label for="" class="form-label">Tiêu đề</label>
                                            <input type="text" name="img_title[]" class="form-control"
                                                value="{{ $img->img_title }}">
                                            @error('img_title')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Văn bản thay thế</label>
                                            <input type="text" value="{{ $img->img_alt }}" name="img_alt[]"
                                                class="form-control">
                                            @error('img_alt')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-3">
                                            <input type="file" name="img_url[]" id="post__image"
                                                class="form-control-file image-input">
                                            @error('img_url')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-info mt-1">Xác nhận</button>
                </form>
            </div>
        </div>

    </div>

@endsection
