@extends('layouts.admin')

@section('title', 'Administrator')

@section('admin-content')

    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách thành viên</h5>
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

            <div class="card-body">
                <div class="analytic">
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'active']) }}" class="text-primary">Active<span
                            class="text-muted">({{ $count[0] }})</span></a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'banned']) }}" class="text-primary">Banned<span
                            class="text-muted">({{ $count[1] }})</span></a>
                </div>
                <form onsubmit="return confirm('Bạn có chắc không?')" class=""
                    action="{{ route('admin.user.action') }}" method="POST">
                    <div class="form-action py-3 d-flex">
                        <select class="form-control mr-1 me-1" name="act" style="width: 120px;" id="">
                            <option value="">Chọn</option>
                            <option value="delete">Xóa</option>
                            <option value="ban">Cấm</option>
                            <option value="restore">Khôi phục</option>
                        </select>
                        <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">

                    </div>
                    <table class="table table-striped table-checkall">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="checkall">
                                </th>
                                <th scope="col">#</th>
                                <th scope="col">Họ tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Quyền</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp

                            @if ($users->total() <= 0)
                                <tr>
                                    <td colspan="8" class="text-center py-5">Không có bản ghi nào</td>
                                </tr>
                            @else
                                @foreach ($users as $user)
                                    @php
                                        $count++;
                                    @endphp
                                    <tr>
                                        <td>
                                            <input @if ($user->id == Auth::id()) @disabled(true) @endif type="checkbox"
                                                name="list_check[]" value="{{ $user->id }}">
                                        </td>
                                        <td>{{ $count }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>
                                            <a href="{{ route('admin.user.edit', $user->id) }}"
                                                class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            <form action="{{ route('admin.user.delete', $user->id) }}" method="POST"
                                                style="display: inline;"
                                                onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')">
                                                @csrf
                                                @method('POST')
                                                <button @if ($user->id == Auth::id()) @disabled(true) @endif
                                                    type="submit" class="btn btn-danger btn-sm rounded-0 text-white"
                                                    data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>

                    </table>
                </form>

                {{ $users->links() }}
            </div>
        </div>
    </div>

@endsection
