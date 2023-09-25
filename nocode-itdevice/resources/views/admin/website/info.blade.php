@extends('layouts.admin')

@section('title', 'Administrator')

@section('admin-content')

    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thông tin trên Website
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('admin.website.updateInfo') }}" method="post">
                @csrf
                @method('POST')
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 pe-4">
                            <div class="form-group">
                                <label for="title"><b>Tiêu đề Website</b></label>
                                <input type="text" class="form-control-2" name="title" id="title"
                                    value="{{ $website->title }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label for="phone-support"><b>SDT hỗ trợ KH</b></label>
                                <input type="text" class="form-control-2" name="phone-support" id="phone-support"
                                    value="{{ $website->support_phone }}">
                                @error('phone-support')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label for="care-phone"><b>SDT chăm sóc KH</b></label>
                                <input type="text" class="form-control-2" name="care-phone" id="care-phone"
                                    value="{{ $website->care_phone }}">
                                @error('care-phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label for="hotline"><b>Hotline</b></label>
                                <input type="text" class="form-control-2" name="hotline" id="hotline"
                                    value="{{ $website->hotline }}">
                                @error('hotline')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 ps-4">
                            <div class="form-group">
                                <label for="desc"><b>Mô tả tìm kiếm</b></label>
                                <input id="desc" type="text" class="form-control-2" name="description"
                                    value="{{ $website->description }}">
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label for="email-support"><b>Email CSKH</b></label>
                                <input id="email-support" type="text" class="form-control-2" name="email-support"
                                    value="{{ $website->support_email }}">
                                @error('email-support')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label for="facebook"><b>Facebook URL</b></label>
                                <input id="facebook" type="text" class="form-control-2" name="facebook"
                                    value="{{ $website->facebook }}">
                                @error('facebook')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label for="zalo"><b>Zalo Phone</b></label>
                                <input id="zalo" type="text" class="form-control-2" name="zalo"
                                    value="{{ $website->zalo }}">
                                @error('zalo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="mt-5 btn btn-lg btn-info w-100">Xác nhận</button>
                </div>

            </form>
        </div>
    </div>

@endsection
