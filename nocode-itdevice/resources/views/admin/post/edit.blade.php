@extends('layouts.admin')

@section('title', 'Administrator')

@section('admin-content')

    <div id="content" class="container-fluid">

        <div class="card">
            <div class="card-header font-weight-bold">
                <b>Chỉnh sửa bài viết bài viết</b>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.post.update', $post->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="title">Tiêu đề bài viết</label>
                        <input class="form-control" type="text" name="title" id="title"
                            value="{{ $post->title }}">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="short_description">Mô tả ngắn của bài viết</label>
                        <input class="form-control" type="text" name="short_description"
                            value="{{ $post->short_description }}" id="short_description">
                        @error('short_description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung bài viết</label>
                        <textarea name="detail" class="form-control" id="ckeditor detail" cols="30" rows="5">{{ $post->detail }}</textarea>
                        @error('detail')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <div class="" id="image-preview" style="width: 80px; height: 80px; overflow: hidden">
                            <img id="post__preview" src="{{ url($post->thumbnail) }}" alt=""
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <input type="file" name="image" id="post__image" class="form-control-file">
                    </div>

                    <button type="submit" class="btn mt-3 btn-primary">Sửa</button>
                </form>
            </div>
        </div>
    </div>

@endsection
