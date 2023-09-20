@extends('layouts.admin')

@section('title', 'Administrator')

@section('admin-content')

    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 "><b>Danh sách bài viết</b></h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="text" class="form-control form-search" value="{{ $keyword }}" name="keyword"
                            placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
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

            <div class="card-body table-responsive">
                <form onsubmit="return confirm('Bạn có chắc không?')" class=""
                    action="{{ route('admin.post.action') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="form-action form-inline py-3 d-flex">
                        <select class="form-control me-1" name="act" style="width: 120px;" id="">
                            <option value="">Chọn</option>
                            <option value="delete">Xóa</option>
                        </select>
                        <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                    </div>
                    <table class="table table-striped table-checkall">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <input name="checkall" type="checkbox">
                                </th>
                                <th scope="col">#</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp

                            @if ($posts->total() <= 0)
                                <tr>
                                    <td colspan="8" class="text-center py-5">Không có bản ghi nào</td>
                                </tr>
                            @else
                                @foreach ($posts as $post)
                                    @php
                                        $count++;
                                    @endphp
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="list_check[]" value="{{ $post->id }}">
                                        </td>
                                        <td scope="row">{{ $count }}</td>
                                        <td><img src="{{ asset($post->thumbnail) }}" width="80" height="80"
                                                alt="">
                                        </td>
                                        <td><a href="{{ route('admin.post.edit', $post->id) }}">{{ $post->title }}</a>
                                        </td>
                                        <td>{{ $post->created_at }}</td>
                                        <td><a href="{{ route('admin.post.edit', $post->id) }}"
                                                class="btn btn-success btn-sm rounded-0" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.post.delete', $post->id) }}"
                                                onclick="return confirm('Bạn có chắc muốn xóa bài viết này?')"
                                                class="btn btn-danger btn-sm rounded-0" data-toggle="tooltip"
                                                data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </form>
                {{ $posts->links() }}
            </div>
        </div>
    </div>


@endsection
