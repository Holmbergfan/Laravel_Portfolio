@extends('layouts.app')

@section('title', 'Create New Project')

@section('content')
    <div class="container">
        <h1>Create New Project</h1>

        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="Apps" {{ old('category') == 'Apps' ? 'selected' : '' }}>Apps</option>
                            <option value="Web" {{ old('category') == 'Web' ? 'selected' : '' }}>Web</option>
                            <option value="3D" {{ old('category') == '3D' ? 'selected' : '' }}>3D</option>
                            <option value="Experimental" {{ old('category') == 'Experimental' ? 'selected' : '' }}>Experimental</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="main_image">Main Image</label>
                        <input type="file" name="main_image" id="main_image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="gallery_images">Gallery Images</label>
                        <input type="file" name="gallery_images[]" id="gallery_images" class="form-control" multiple>
                    </div>

                    <div class="form-group">
                        <label for="files">Files</label>
                        <input type="file" name="files[]" id="files" class="form-control" multiple>
                    </div>

                    <div class="form-group">
                        <label for="download_url">Download URL</label>
                        <input type="url" name="download_url" id="download_url" class="form-control" value="{{ old('download_url') }}">
                    </div>

                    <div class="form-group">
                        <label for="repo_url">Repository URL</label>
                        <input type="url" name="repo_url" id="repo_url" class="form-control" value="{{ old('repo_url') }}">
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" id="status" class="form-control" value="{{ old('status') }}">
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" name="type" id="type" class="form-control" value="{{ old('type') }}">
                    </div>

                    <div class="form-group">
                        <label for="version">Version</label>
                        <input type="text" name="version" id="version" class="form-control" value="{{ old('version') }}">
                    </div>

                    <div class="form-group">
                        <label for="version_history">Version History</label>
                        <textarea name="version_history" id="version_history" class="form-control">{{ old('version_history') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
