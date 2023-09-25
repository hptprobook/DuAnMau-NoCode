@extends('layouts.admin')

@section('title', 'Administrator')

@section('admin-content')

    <div id="content" class="container-fluid add-post">

        <div class="card">
            <div class="card-header font-weight-bold">
                <b>Thêm bài viết</b>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('admin.post.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="title">Tiêu đề bài viết</label>
                        <input class="form-control" type="text" name="title" id="title"
                            value="{{ old('title') }}">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="short_description">Mô tả ngắn của bài viết</label>
                        <input class="form-control" type="text" name="short_description"
                            value="{{ old('short_description') }}" id="short_description">
                        @error('short_description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung bài viết</label>
                        <textarea name="detail" class="form-control" id="ckeditor detail" cols="30" rows="5">{{ old('detail') }}</textarea>
                        @error('detail')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <input type="file" name="image" id="post__image" class="form-control-file">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div id="image-preview" class="image-preview" style="width: 80px; height: 80px; overflow: hidden;">
                        <img id="post__preview" src="#" alt="Preview"
                            style="width: 100%; height: 100%; object-fit: cover; display: none;">
                    </div>

                    <button type="submit" class="btn mt-3 btn-primary">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>

@endsection
