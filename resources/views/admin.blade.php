@extends('layouts.index')

@section('content')
    <div class="container">
        <h1>Project Management</h1>

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

        <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Project Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="stack">Tech Stack</label>
                <input type="text" class="form-control" id="stack" name="stack" required>
            </div>
            <div class="form-group">
                <label for="link_project">link_project</label>
                <input type="text" class="form-control" id="link_project" name="link_project" required>
            </div>
            <div class="form-group">
                <label for="image">Project Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Project</button>
        </form>

        <h2 class="mt-5">All Projects</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Stack</th>
                    <th>Link Project</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->name }}</td>
                        <td class="split">{{ Str::limit($project->description, 100) }}</td>
                        <td>{{ $project->stack }}</td>
                        <td>{{ $project->link_project }}</td>
                        <td><img src="{{ asset($project->image) }}" alt="{{ $project->name }}" height="200"></td>
                        <td>
                            <form action="{{ route('project.edit', $project->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-warning">Edit</button>
                            </form>
                            <br>
                            <form action="{{ route('project.destroy', $project->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
