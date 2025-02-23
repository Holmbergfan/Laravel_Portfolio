@extends('layouts.app')

@section('title', 'Admin Projects')

@section('content')
<div class="container">
  <h1>Admin Projects</h1>
  <div style="margin-bottom: 1rem;">
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Create New Project</a>
  </div>

  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Category</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($projects as $project)
          <tr>
            <td>{{ $project->id }}</td>
            <td>{{ $project->title }}</td>
            <td>{{ $project->category }}</td>
            <td>
              <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-primary">Edit</a>
              <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
