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
                        <b>Chỉnh sửa danh mục</b>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product.updateChildCat', $childCat->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="name">Tên danh mục con</label>
                                <input class="form-control" value="{{ $childCat->name }}" type="text" name="name"
                                    id="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cat">Danh mục</label>
                                <select class="form-control" id="cat" name="cat_id">
                                    <option value="">Chọn danh mục</option>
                                    @foreach ($categories as $category)
                                        <option @if ($childCat->cat_id == $category->id) @selected(true) @endif
                                            value="{{ $category->id }}">
                                            {{ $mainCats[$category->main_cat_id - 1]->name }} -
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('cat_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Xác nhận</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
