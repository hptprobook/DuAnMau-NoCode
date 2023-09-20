@extends('layouts.admin')

@section('title', 'Admintrator')

@section('admin-content')

    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách sản phẩm</h5>
                <div class="form-search form-inline">
                    <form action="{{ route('admin.product.index') }}" method="GET">
                        <input type="text" name="keyword" value="{{ $keyword }}" class="form-control form-search"
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

            <div class="card-body">
                <div class="analytic">
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'inStock']) }}" class="text-primary">Còn hàng<span
                            class="text-muted">({{ $count[0] }})</span></a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'outOfStock']) }}" class="text-primary">Hết
                        hàng<span class="text-muted">({{ $count[1] }})</span></a>
                </div>
                <form onsubmit="return confirm('Bạn có chắc không?')" class=""
                    action="{{ route('admin.product.action') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-action form-inline d-flex py-3">
                        <select name="act" class="form-control mr-1 me-1" id="" style="width: 120px;">
                            <option value="">Chọn</option>
                            <option value="delete">Xóa</option>
                            <option value="inStock">Còn hàng</option>
                            <option value="outOfStock">Hết hàng</option>
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
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $countProduct = ($products->currentPage() - 1) * $products->perPage();
                            @endphp

                            @foreach ($products as $product)
                                @php
                                    $product->countProduct = ++$countProduct;
                                @endphp
                                <tr class="">
                                    <td>
                                        <input type="checkbox" name="list_check[]" value="{{ $product->id }}">
                                    </td>
                                    <td>{{ $product->countProduct }}</td>
                                    <td>
                                        <img src="{{ asset($product->avatar) }}" width="100px" height="80px"
                                            alt="">
                                    </td>
                                    <td><a href="#">{{ $product->name }}</a></td>
                                    <td>{{ $product->price }}₫</td>
                                    <td>Điện thoại</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        @if ($product->status == 0)
                                            <span class="badge badge-success">Còn hàng</span>
                                        @else
                                            <span class="badge badge-danger">Hết hàng</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                            data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.product.delete', $product->id) }}"
                                            class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                            data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </form>

                <div class="paginate">
                    {{ $products->appends(['keyword' => $keyword])->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
