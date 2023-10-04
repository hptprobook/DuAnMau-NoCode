@extends('layouts.app')

@section('content')
    @foreach ($cart_id as $id)
        {{ $id }}
    @endforeach
@endsection
