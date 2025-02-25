@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>

    <div class="dashboard-stats">
        <div class="stat-box">
            <h3>Total Projects</h3>
            <p>{{ $totalProjects }}</p>
        </div>

        <div class="stat-box">
            <h3>Total Categories</h3>
            <p>{{ $totalCategories }}</p>
        </div>
    </div>

    <div class="dashboard-actions" style="margin: 1rem 0;">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline">Manage All Projects</a>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-outline">Create New Project</a>
    </div>

    <div class="latest-projects" style="margin-top: 2rem;">
        <h2>Recently Added Projects</h2>
        <ul>
            @forelse($latestProjects as $proj)
                <li>
                    <strong>{{ $proj->title }}</strong>
                    ({{ $proj->category }})
                    <a href="{{ route('admin.projects.edit', $proj->id) }}" class="btn-sm btn-outline">Edit</a>
                </li>
            @empty
                <li>No recent projects.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
