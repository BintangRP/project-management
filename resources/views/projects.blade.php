@extends('layouts.index')

@section('title', 'Landing Page')

@section('content')
    <link rel="stylesheet" href="{{ asset('styles/gallery.css') }}">
    <div class="container-lg">
        <h2 class="mt-5">All Projects</h2>
        <div class="gallery">
            @foreach ($projects as $project)
                <div class="gallery-item">
                    <img src="{{ asset($project->image) }}" alt="{{ $project->name }}" class="gallery-image">
                    <div class="overlay">
                        <div class="text">
                            <h3>{{ $project->name }}</h3>
                            <p>{{ Str::limit($project->description, 30) }}</p>
                            <p>Stack: {{ $project->stack }}</p>
                            <p>Link: <a href="{{ $project->link_project }}" target="_blank">Halaman Project</a>
                            </p>
                            <a href="{{ route('project.show', $project->id) }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
