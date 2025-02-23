@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <div class="container">
        <h1>{{ $category->name }} Projects</h1>

        <div class="projects-grid">
            @foreach ($projects as $project)
                @include('partials.project_card', ['project' => $project])
            @endforeach
        </div>
    </div>
@endsection