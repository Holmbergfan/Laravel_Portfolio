@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Version History</h1>

        <form action="{{ route('admin.projects.version_history.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="project_id">Project ID</label>
                <input type="text" name="project_id" id="project_id" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="version">Version</label>
                <input type="text" name="version" id="version" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="release_date">Release Date</label>
                <input type="date" name="release_date" id="release_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
