@extends('layouts.index')

@section('title', 'Project Detail')

@section('content')
    <div class="container-lg">
        <h1>{{ $project->name }}</h1>
        <a href="{{ $project->link_project }}">Link to Project</a>
        <img class="d-flex justify-content-center mx-auto" src="{{ asset($project->image) }}" alt="{{ $project->name }}"
            height="300">
        <h2>Deksripsi:</h2>
        <p>{{ $project->description }}</p>
    </div>
@endsection
