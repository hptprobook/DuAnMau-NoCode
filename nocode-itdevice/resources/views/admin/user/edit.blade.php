@extends('layouts.admin')

@section('title', 'Administrator')

@section('admin-content')

    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                <b>Chỉnh sửa người dùng</b>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card-body">
                <form onsubmit="return confirm('Xác nhận chỉnh sửa thông tin?')"
                    action="{{ route('admin.user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="name">Họ và tên</label>
                        <input class="form-control" type="text" name="name" id="name"
                            value="{{ $user->name }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input disabled class="form-control" type="text" name="email" id="email"
                            value="{{ $user->email }}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input class="form-control" type="password" name="password" id="password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Xác nhận mật khẩu</label>
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="role">Nhóm quyền</label>
                        <select class="form-control" id="role" name="role">
                            <option value="">Chọn quyền</option>
                            <option @if ($user->role == 'ADMIN') @selected(true) @endif value="ADMIN">ADMIN</option>
                            <option @if ($user->role == 'USER') @selected(true) @endif value="USER">USER</option>
                        </select>
                    </div>

                    <button type="submit" class="btn mt-3 btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>

@endsection
