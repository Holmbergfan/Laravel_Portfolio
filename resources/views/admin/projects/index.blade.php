@extends('layouts.app')

@section('title', 'Holmberg Portfolio')

@section('content')
    <!-- Hero Section -->
    <section class="hero parallax" style="background-image: url('https://source.unsplash.com/1600x900/?technology,code');">
        <div class="hero-text">
            <h1>Welcome, Hobbyists!</h1>
            <p>If you're here expecting professional-grade work, you better run – these are just my fun, hobby projects!</p>
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

    <style>
        .portfolio-section {
            padding: 4rem 0;
        }

        .section-header {
            margin-bottom: 2.5rem;
            text-align: center;
        }
    </style>
@endsection
