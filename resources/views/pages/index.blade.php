@extends('layouts.app')

@section('title', 'Holmberg Portfolio')

@section('content')
    @include('partials.hero')

    <div class="container">
        <section class="mb-20">
            <h2>Web Projects</h2>
            <div class="projects-grid">
                @foreach ($projects->where('category', 'Web')->take(3) as $project)
                    @include('partials.project_card', ['project' => $project])
                @endforeach
            </div>
            <a href="{{ route('category.show', 'Web') }}">View All Web Projects</a>
        </section>

        <section class="mb-20">
            <h2>3D Projects</h2>
            <div class="projects-grid">
                @foreach ($projects->where('category', '3D')->take(3) as $project)
                    @include('partials.project_card', ['project' => $project])
                @endforeach
            </div>
            <a href="{{ route('category.show', '3D') }}">View All 3D Projects</a>
        </section>

        <section class="mb-20">
            <h2>Apps Projects</h2>
            <div class="projects-grid">
                @foreach ($projects->where('category', 'Apps')->take(3) as $project)
                    @include('partials.project_card', ['project' => $project])
                @endforeach
            </div>
            <a href="{{ route('category.show', 'Apps') }}">View All Apps Projects</a>
        </section>
    </div>
@endsection
