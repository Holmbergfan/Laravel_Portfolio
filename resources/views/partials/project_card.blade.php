<div class="card">
  <div class="content">
    <div class="back">
      <div class="back-content">
        <svg><!-- Project icon SVG --></svg>
        <strong>{{ $project->title }}</strong>
      </div>
    </div>
    <div class="front">
      <div class="img">
        <div class="circle"></div>
        <div class="circle" id="right"></div>
        <div class="circle" id="bottom"></div>
      </div>
      <div class="front-content">
        @if($project->badges)
          @foreach(json_decode($project->badges) as $badge)
            <small class="badge">{{ $badge }}</small>
          @endforeach
        @endif
        <div class="description">
          <div class="title">
            <p><strong>{{ $project->title }}</strong></p>
          </div>
          <p class="card-footer">
            {{ Str::limit($project->description, 50) }}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>