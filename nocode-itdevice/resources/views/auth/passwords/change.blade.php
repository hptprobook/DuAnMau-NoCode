@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b>Đổi mật khẩu</b></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('website.customer.changePassword') }}">
                            @csrf

                            <div class="row mb-3">

                                <div class="col-md-6 offset-md-3">
                                    <input id="old-password" type="password"
                                        class="form-control @error('old-password') is-invalid @enderror" name="old-password"
                                        required autocomplete="current-password" placeholder="Mật khẩu cũ...">

                                    @error('old-password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-6 offset-md-3">
                                    <input id="new-password" type="password"
                                        class="form-control @error('new-password') is-invalid @enderror" name="new-password"
                                        required autocomplete="current-password" placeholder="Mật khẩu mới...">

                                    @error('new-password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-6 offset-md-3">
                                    <input id="confirm-password" type="password"
                                        class="form-control @error('confirm-password') is-invalid @enderror"
                                        name="confirm-password" required autocomplete="current-password"
                                        placeholder="Xác nhận mật khẩu mới...">

                                    @error('confirm-password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-3">
                                    <button type="submit" class="btn btn-danger">
                                        Đổi mật khẩu
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
