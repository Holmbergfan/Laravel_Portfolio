@extends('layouts.app')

@section('title', 'All Projects')

@section('content')
<div class="container">
    <h1>All Projects</h1>

    <!-- If you want a button to create a new project -->
    <div style="margin-bottom: 1rem;">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Create New Project</a>
    </div>

    <!-- Table of projects -->
    <table class="table admin-table">
        <thead>
            <tr>
                <th>Preview</th>
                <th>Title</th>
                <th>Category</th>
                <th style="width: 180px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
                <tr>
                    <td>
                        @if($project->image_url)
                            <!-- small thumbnail, e.g. 80px wide -->
                            <img src="{{ $project->image_url }}" alt="{{ $project->title }}" style="width: 80px; height: auto; border-radius:4px;">
                        @else
                            <img src="/images/placeholder.png" alt="Placeholder" style="width: 80px; height: auto; border-radius:4px;">
                        @endif
                    </td>
                    <td>
                        {{ $project->title }}
                    </td>
                    <td>{{ $project->category ?? 'N/A' }}</td>
                    <td>
                        <!-- Edit Link -->
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-warning">
                            Edit
                        </a>
                        <!-- Delete Form -->
                        <form action="{{ route('admin.projects.destroy', $project->id) }}"
                              method="POST"
                              style="display:inline-block;"
                              onsubmit="return confirm('Are you sure you want to delete this project?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No projects found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
