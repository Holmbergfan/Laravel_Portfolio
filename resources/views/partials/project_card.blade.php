@php
use Illuminate\Support\Str;

// We can store the category in a variable for convenience
$cat = $project->category ?? 'Other';
$desc = Str::limit($project->description ?? '', 100, '...'); // text truncated
@endphp

@if ($cat === 'Web')
    <!--  WEB: bigger card, half width, bigger screenshot, button right -->
    <div class="project-card web-card">
        <div class="card-inner">
            <div class="card-image-wrapper">
                @if($project->image_url)
                    <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="card-image">
                @else
                    <img src="/images/placeholder.png" alt="Placeholder" class="card-image">
                @endif
            </div>
            <div class="card-content">
                <span class="category-label">{{ $cat }}</span>
                <h3 class="card-title">{{ $project->title }}</h3>
                <!-- Show badges if exist -->
                @if($project->badges && json_decode($project->badges))
                    <div class="badges">
                        @foreach(json_decode($project->badges) as $badge)
                            <span class="badge">{{ $badge }}</span>
                        @endforeach
                    </div>
                @endif
                <p class="card-description">{{ $desc }}</p>
                <div class="button-row right-align">
                    @if($project->project_url)
                        <a href="{{ $project->project_url }}" class="btn small-btn">Read More</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

@elseif($cat === 'Apps' || $cat === '3D')
    <!--  APPS / 3D: smaller “blueish” style card -->
    <div class="blue-card apps-card">
        <div class="card-inner">
            <div class="card-image-wrapper">
                @if($project->image_url)
                    <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="card-image">
                @else
                    <img src="/images/placeholder.png" alt="Placeholder" class="card-image">
                @endif
            </div>
            <div class="card-content">
                <span class="category-label">{{ $cat }}</span>
                <h3 class="card-title">{{ $project->title }}</h3>
                <!-- Show badges if exist -->
                @if($project->badges && json_decode($project->badges))
                    <div class="badges">
                        @foreach(json_decode($project->badges) as $badge)
                            <span class="badge">{{ $badge }}</span>
                        @endforeach
                    </div>
                @endif
                <p class="card-description">{{ $desc }}</p>
                <div class="button-row right-align">
                    @if($project->project_url)
                        <a href="{{ $project->project_url }}" class="btn small-btn">Read More</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

@elseif($cat === 'Experimental')
    <!--  EXPERIMENTAL: flipping card or keep as is?  -->
    <!-- Example flipping card layout -->
    <div class="project-card flip-card exp-card">
        <div class="card-inner">
            <div class="card-image-wrapper">
                @if($project->image_url)
                    <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="card-image">
                @else
                    <img src="/images/placeholder.png" alt="Placeholder" class="card-image">
                @endif
            </div>
            <div class="card-content">
                <span class="category-label">{{ $cat }}</span>
                <h3 class="card-title">{{ $project->title }}</h3>
                <!-- Show badges if exist -->
                @if($project->badges && json_decode($project->badges))
                    <div class="badges">
                        @foreach(json_decode($project->badges) as $badge)
                            <span class="badge">{{ $badge }}</span>
                        @endforeach
                    </div>
                @endif
                <p class="card-description">{{ $desc }}</p>
                <div class="button-row right-align">
                    @if($project->project_url)
                        <a href="{{ $project->project_url }}" class="btn small-btn">Read More</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

@else
    <!-- fallback or "Other" category can share a style or keep it simple -->
    <div class="project-card default-card">
        <div class="card-inner">
            <div class="card-image-wrapper">
                @if($project->image_url)
                    <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="card-image">
                @else
                    <img src="/images/placeholder.png" alt="Placeholder" class="card-image">
                @endif
            </div>
            <div class="card-content">
                <span class="category-label">{{ $cat }}</span>
                <h3 class="card-title">{{ $project->title }}</h3>
                <!-- Show badges if exist -->
                @if($project->badges && json_decode($project->badges))
                    <div class="badges">
                        @foreach(json_decode($project->badges) as $badge)
                            <span class="badge">{{ $badge }}</span>
                        @endforeach
                    </div>
                @endif
                <p class="card-description">{{ $desc }}</p>
                <div class="button-row right-align">
                    @if($project->project_url)
                        <a href="{{ $project->project_url }}" class="btn small-btn">Read More</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
