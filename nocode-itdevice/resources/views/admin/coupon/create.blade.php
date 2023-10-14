@extends('layouts.admin')

@section('title', 'Administrator')

@section('admin-content')

    <div id="content" class="container-fluid add-post">

        <div class="card">
            <div class="card-header font-weight-bold">
                <b>Thêm mã giảm giá</b>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('admin.coupon.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="code">Mã giảm giá</label>
                        <input class="form-control" type="text" name="code" id="code"
                            value="{{ old('code') }}">
                        @error('code')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="type">Loại giảm giá</label>
                        <select name="type" id="type" class="form-control">
                            <option value="fixed">Cố định giá tiền</option>
                            <option value="percentage">Phần trăm</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="amount">Giảm giá</label>
                        <input class="form-control" type="number" name="amount" id="amount"
                            value="{{ old('amount') }}">
                        @error('amount')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="quantity">Số lượng</label>
                        <input class="form-control" type="number" name="quantity" id="quantity"
                            value="{{ old('quantity') }}">
                        @error('quantity')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="datepicker">Ngày bắt đầu</label>
                        <input type="date" name="start_date" id="datepicker" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="datepicker">Ngày kết thúc</label>
                        <input type="date" name="end_date" id="datepicker" class="form-control">
                    </div>

                    <button type="submit" class="btn mt-3 btn-primary">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>

@endsection
