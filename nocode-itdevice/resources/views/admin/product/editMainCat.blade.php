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
                        <form action="{{ route('admin.product.updateMainCat', $mainCat->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="name">Tên danh mục</label>
                                <input class="form-control" value="{{ $mainCat->name }}" type="text" name="name"
                                    id="name">
                                @error('name')
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
