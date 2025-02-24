<div class="project-card">
    <div class="content">
        <!-- Front Side -->
        <div class="front">
            <div class="img">
                @if($project->image_url)
                    <img src="{{ $project->image_url }}" alt="{{ $project->title }}">
                @else
                    <img src="/images/placeholder.png" alt="Placeholder">
                @endif
            </div>
            <div class="project-info">
                <h3>{{ $project->title }}</h3>
                <div class="badges">
                    @if($project->badges && json_decode($project->badges))
                        @foreach(json_decode($project->badges) as $badge)
                            <span class="badge">{{ $badge }}</span>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <!-- Back Side -->
        <div class="back">
            <div class="project-info">
                <h3>{{ $project->title }}</h3>
                <p>{{ Str::limit($project->description ?? '', 100) }}</p>
                @if($project->project_url)
                    <a href="{{ $project->project_url }}" class="btn btn-outline">Read More</a>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    .project-card {
        width: 250px;  /* Smaller */
        height: 320px;
        perspective: 1000px;
        transition: transform 0.4s ease-in-out;
    }

    .project-card:hover {
        transform: scale(1.05); /* Slight growth */
    }

    .content {
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        transition: transform 0.5s;
    }

    .project-card:hover .content {
        transform: rotateY(180deg);
    }

    .front, .back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        background: rgba(30, 30, 30, 0.9);
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.2);
    }

    .front {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .front .img img {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .badges {
        margin-top: 10px;
        display: flex;
        gap: 5px;
    }

    .badge {
        background: rgba(255, 255, 255, 0.2);
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 12px;
    }

    .back {
        transform: rotateY(180deg);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
</style>
