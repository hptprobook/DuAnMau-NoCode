@extends('layouts.app')

@section('content')
    <div id="page-body" class="d-flex">
        <div id="sidebar" class="bg-white">
            <ul id="sidebar-menu">
                <li class="nav-link">
                    <a href="{{ route('admin.dashboard') }}">
                        <div class="nav-link-icon d-inline-flex">
                            <i class="far fa-folder"></i>
                        </div>
                        Dashboard
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ route('admin.page.index') }}">
                        <div class="nav-link-icon d-inline-flex">
                            <i class="far fa-folder"></i>
                        </div>
                        Trang
                    </a>
                    <i class="arrow fas fa-angle-right"></i>

                    <ul class="sub-menu">
                        <li><a href="{{ route('admin.page.create') }}">Thêm mới</a></li>
                        <li><a href="{{ route('admin.page.index') }}">Danh sách</a></li>
                    </ul>
                </li>
                <li class="nav-link">
                    <a href="{{ route('admin.post.index') }}">
                        <div class="nav-link-icon d-inline-flex">
                            <i class="far fa-folder"></i>
                        </div>
                        Bài viết
                    </a>
                    <i class="arrow fas fa-angle-right"></i>
                    <ul class="sub-menu">
                        <li><a href="{{ route('admin.post.create') }}">Thêm mới</a></li>
                        <li><a href="{{ route('admin.post.index') }}">Danh sách</a></li>
                        <li><a href="{{ route('admin.post.category') }}">Danh mục</a></li>
                    </ul>
                </li>
                <li class="nav-link">
                    <a href="{{ route('admin.product.index') }}">
                        <div class="nav-link-icon d-inline-flex">
                            <i class="far fa-folder"></i>
                        </div>
                        Sản phẩm
                    </a>
                    <i class="arrow fas fa-angle-right"></i>
                    <ul class="sub-menu">
                        <li><a href="{{ route('admin.product.create') }}">Thêm mới</a></li>
                        <li><a href="{{ route('admin.product.index') }}">Danh sách</a></li>
                        <li><a href="{{ route('admin.product.category') }}">Danh mục</a></li>
                    </ul>
                </li>
                <li class="nav-link">
                    <a href="{{ route('admin.order') }}">
                        <div class="nav-link-icon d-inline-flex">
                            <i class="far fa-folder"></i>
                        </div>
                        Bán hàng
                    </a>
                    <i class="arrow fas fa-angle-right"></i>
                    <ul class="sub-menu">
                        <li><a href="{{ route('admin.order') }}">Đơn hàng</a></li>
                    </ul>
                </li>
                <li class="nav-link">
                    <a href="{{ route('admin.user.index') }}">
                        <div class="nav-link-icon d-inline-flex">
                            <i class="far fa-folder"></i>
                        </div>
                        Users
                    </a>
                    <i class="arrow fas fa-angle-right"></i>

                    <ul class="sub-menu">
                        <li><a href="{{ route('admin.user.create') }}">Thêm mới</a></li>
                        <li><a href="{{ route('admin.user.index') }}">Danh sách</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>

    <div id="wp-content">
        @yield('admin-content')
    </div>

    </div>
@endsection
