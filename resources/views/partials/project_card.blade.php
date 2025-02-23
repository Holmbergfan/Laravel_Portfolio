<div class="project-card">
    <img src="{{ $project->image_url }}" alt="{{ $project->title }}">
    <h3>{{ $project->title }}</h3>
    <p>{{ $project->description }}</p>
    <a href="{{ route('projects.show', $project->id) }}">Learn More</a>
</div>