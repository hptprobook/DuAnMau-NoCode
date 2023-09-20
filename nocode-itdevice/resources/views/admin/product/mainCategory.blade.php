@extends('layouts.admin')

@section('title', 'Admintrator')

@section('admin-content')

    <div id="content" class="container-fluid">


        <div class="row">
            <div class="col-4">
                <form action="{{ route('admin.product.createMainCategory') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card">
                        <div class="card-header font-weight-bold">
                            <b>Danh mục lớn</b>
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
                            <form>
                                <div class="form-group">
                                    <label for="name">Tên danh mục</label>
                                    <input class="form-control" type="text" name="cat_name" id="name">
                                    @error('cat_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Thêm mới</button>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        <b>Danh sách</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            @php
                                $count = 0;
                            @endphp
                            <tbody>

                                @foreach ($mainCats as $mainCat)
                                    @php
                                        $count++;
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $count }}</th>
                                        <td>{{ $mainCat->name }}</td>
                                        <td>Sửa</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
