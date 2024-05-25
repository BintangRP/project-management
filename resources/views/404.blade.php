@extends('layouts.index')

@section('title', 'No Found Content')

@section('content')
    <div class="container-lg d-flex justify-content-center mx-auto flex-column text-center">
        <h1>Yah Page yang kamu cari tidak ada</h1>
        <img src="{{ asset('img/404.png') }}" alt="404 not found" width="500" class="mx-auto">
    </div>
@endsection
