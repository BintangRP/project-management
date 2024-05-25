@extends('layouts.index')

@section('content')
    <div class="container">
        <h1>Login Admin</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('auth') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control @error('message') is-invalid @enderror" id="email"
                    name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control @error('message') is-invalid @enderror" type="password" name="password"
                    id="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection
