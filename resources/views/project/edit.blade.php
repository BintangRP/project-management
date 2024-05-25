@extends('layouts.index')
@section('title', 'project edit')

@section('content')
    <div class="container-lg">
        <h2 class="mt-5">All Projects</h2>
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

        <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Project Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}"
                    required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $project->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="stack">Tech Stack</label>
                <input type="text" class="form-control" id="stack" name="stack" value="{{ $project->stack }}"
                    required>
            </div>
            <div class="form-group">
                <label for="link_project">link_project</label>
                <input type="text" class="form-control" id="link_project" name="link_project"
                    value="{{ $project->link_project }}" required>
            </div>
            <div class="form-group">
                <img src="{{ asset($project->image) }}" alt="{{ $project->name }}" height="200" width="200"><br>
                <label for="image">Project Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Add Project</button>
        </form>
    </div>

@endsection
