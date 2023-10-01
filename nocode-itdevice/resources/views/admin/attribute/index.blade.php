@extends('layouts.admin')

@section('title', 'Administrator')

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
                        <b>Thêm thuộc tính sản phẩm</b>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.attribute.create') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="name">Tên thuộc tính</label>
                                <input class="form-control" type="text" name="name" id="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
