@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <a class="ms-3 mt-3" href="{{ route('admin.dashboard') }}">Administrator</a>

                </div>
            </div>
        </div>
    </div>
@endsection
