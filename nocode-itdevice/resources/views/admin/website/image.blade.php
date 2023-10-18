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
            <form action="{{ route('admin.website.updateImg') }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('POST')
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 pe-4">
                            <div class="form-group">
                                <label for="logo"><b>Logo Website</b></label>
                                <input type="file" class="form-control-2" name="logo" id="logo" value="">
                                @error('logo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 ps-4">
                            <div class="col-6 pe-4">
                                <div class="form-group">
                                    <label for="bottom_banner"><b>Bottom banner Website</b></label>
                                    <input type="file" class="form-control-2" name="bottom_banner" id="bottom_banner"
                                        value="">
                                    @error('bottom_banner')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="mt-5 btn btn-lg btn-info w-100">Xác nhận</button>
                </div>

            </form>
        </div>
    </div>

@endsection
