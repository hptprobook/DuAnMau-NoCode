@extends('layouts.admin')

@section('title', 'Admintrator')

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
                        <b>Danh mục sản phẩm</b>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product.createCategory') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="name">Tên danh mục</label>
                                <input class="form-control" type="text" name="name" id="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cat">Danh mục cha</label>
                                <select class="form-control" id="cat" name="main_cat_id">
                                    <option value="">Chọn danh mục</option>
                                    @foreach ($mainCats as $mainCat)
                                        <option value="{{ $mainCat->id }}">{{ $mainCat->name }}</option>
                                    @endforeach
                                </select>
                                @error('main_cat_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Danh sách
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            @php
                                $countCategory = ($categories->currentPage() - 1) * $categories->perPage();
                            @endphp
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Danh mục cha</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    @php
                                        $category->countCategory = ++$countCategory;
                                    @endphp
                                    <tr>
                                        <td>{{ $category->countCategory }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $mainCats[$category->main_cat_id - 1]->name }}</td>
                                        <td><a href="{{ route('admin.product.editCategory', $category->id) }}"
                                                class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.product.deleteCategory', $category->id) }}"
                                                class="btn btn-danger btn-sm rounded-0 text-white"
                                                onclick="return confirm('Bạn có chắc muốn xóa danh mục này không? Các danh mục con liên quan cũng sẽ bị xóa đi!')"
                                                type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="ms-3 paginate">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
