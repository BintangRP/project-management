@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Login Admin</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('auth') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control @error('message') is-invalid @enderror" id="email" name="email"
                    required>
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
