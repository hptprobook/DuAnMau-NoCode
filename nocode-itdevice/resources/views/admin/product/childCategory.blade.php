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
                        <form action="{{ route('admin.product.createChildCategory') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="name">Tên danh mục con</label>
                                <input class="form-control" type="text" name="name" id="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cat">Danh mục</label>
                                <select class="form-control" id="cat" name="cat_id">
                                    <option value="">Chọn danh mục</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $mainCats[$category->main_cat_id - 1]->name }} -
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('cat_id')
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
                                $countChildCategory = ($childCats->currentPage() - 1) * $childCats->perPage();
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
                                @foreach ($childCats as $childCategory)
                                    @php
                                        $childCategory->countChildCategory = ++$countChildCategory;
                                    @endphp
                                    <tr>
                                        <td>{{ $childCategory->countChildCategory }}</td>
                                        <td>{{ $childCategory->name }}</td>
                                        <td>{{ $mainCats[$categories[$childCategory->cat_id - 1]->main_cat_id - 1]->name }}
                                            - {{ $categories[$childCategory->cat_id - 1]->name }}
                                        </td>
                                        <td><a href="{{ route('admin.product.editChildCat', $childCategory->id) }}"
                                                class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.product.deleteChildCat', $childCategory->id) }}"
                                                class="btn btn-danger btn-sm rounded-0 text-white"
                                                onclick="return confirm('Bạn có chắc muốn xóa danh mục này?')"
                                                type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                {{-- <td></td> --}}
                            </tbody>
                        </table>
                    </div>
                    <div class="ms-3 paginate">
                        {{ $childCats->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
