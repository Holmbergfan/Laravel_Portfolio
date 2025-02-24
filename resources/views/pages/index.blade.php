@extends('layouts.app')

@section('title', 'Holmberg Portfolio')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-text" data-aos="fade-up">
                <h1 class="title-lobster">Welcome, Hobbyists!</h1>
                <p>If you're here expecting professional-grade work, you better run – these are just my fun, hobby projects!</p>
            </div>
        </div>
    </section>

    <!-- Apps Section -->
    <section class="portfolio-section" id="apps">
        <div class="container">
            <div class="section-header" data-aos="fade-right">
                <h2>Apps</h2>
                <p>High-level info about each app. Four columns with detail-rich cards.</p>
            </div>
            <div class="project-grid apps-grid" data-aos="fade-up">
                @foreach ($projects->where('category', 'Apps')->take(4) as $project)
                    @include('partials.project_card', ['project' => $project, 'cardClass' => 'apps-card'])
                @endforeach
            </div>
            <div class="view-more" data-aos="fade-up">
                <a href="{{ route('category.show', 'Apps') }}" class="btn btn-outline">View All Apps</a>
            </div>
        </div>
    </section>

    <!-- Web Section -->
    <section class="portfolio-section" id="web">
        <div class="container">
            <div class="section-header" data-aos="fade-right">
                <h2>Web</h2>
                <p>Two columns, focusing on the visuals of each web project.</p>
            </div>
            <div class="project-grid web-grid" data-aos="fade-up">
                @foreach ($projects->where('category', 'Web')->take(2) as $project)
                    @include('partials.project_card', ['project' => $project, 'cardClass' => 'web-card'])
                @endforeach
            </div>
            <div class="view-more" data-aos="fade-up">
                <a href="{{ route('category.show', 'Web') }}" class="btn btn-outline">View All Web Projects</a>
            </div>
        </div>
    </section>

    <!-- 3D Section -->
    <section class="portfolio-section" id="3d">
        <div class="container">
            <div class="section-header" data-aos="fade-right">
                <h2>3D</h2>
                <p>Three columns with mid-sized images to showcase 3D models.</p>
            </div>
            <div class="project-grid three-d-grid" data-aos="fade-up">
                @foreach ($projects->where('category', '3D')->take(3) as $project)
                    @include('partials.project_card', ['project' => $project, 'cardClass' => 'three-d-card'])
                @endforeach
            </div>
            <div class="view-more" data-aos="fade-up">
                <a href="{{ route('category.show', '3D') }}" class="btn btn-outline">View All 3D Projects</a>
            </div>
        </div>
    </section>

    <!-- Experimental Section -->
    <section class="portfolio-section" id="experimental">
        <div class="container">
            <div class="section-header" data-aos="fade-right">
                <h2>Experimental</h2>
                <p>Miscellaneous or experimental projects.</p>
            </div>
            <div class="project-grid other-grid" data-aos="fade-up">
                @foreach ($projects->where('category', 'Experimental')->take(2) as $project)
                    @include('partials.project_card', ['project' => $project])
                @endforeach
            </div>
        </div>
    </section>
@endsection
