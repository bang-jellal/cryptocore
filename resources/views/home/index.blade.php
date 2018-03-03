@extends('layouts.app')

@section('content')
    @include('home.slide')
    @include('home.category')
    @include('layouts.product.featured')
    @include('home.banner3')
    @include('home.shipping')
@endsection