@extends('layouts.app')

@section('title', 'Create Project')

@section('content')
<div class="container">
    <section class="bg-secondary text-center py-5">
        <h1>Create New Project</h1>

        <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.projects._form', ['project' => null])
            {{-- We pass a null $project so the partial uses old() defaults --}}

            {{-- Form Actions --}}
            <div class="form-actions" style="margin-top: 1rem;">
                <button type="submit" class="btn btn-primary">
                    Create Project
                </button>
                <a href="{{ route('admin.projects.index') }}"
                    class="btn btn-secondary">
                    Cancel
                </a>
            </div>
        </form>
    </section>
</div>
@endsection

@section('scripts')
    @include('admin.projects._category_badge_scripts')
@endsection
