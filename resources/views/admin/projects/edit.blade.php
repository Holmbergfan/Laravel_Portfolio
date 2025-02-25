@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
<div class="container">
    <section class="bg-secondary text-center py-5">
        <h1>Edit Project: {{ $project->name }}</h1>

        <form method="POST" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.projects._form', ['project' => $project])
            {{-- The partial references $project->... so we pass the real $project --}}

            <div class="form-actions" style="margin-top: 1rem;">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </section>
</div>
@endsection

@section('scripts')
    @include('admin.projects._category_badge_scripts')
@endsection
