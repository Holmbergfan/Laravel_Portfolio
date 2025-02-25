@extends('layouts.app')

@section('title', 'Holmberg.pro')

@section('content')
<div class="container mt-5">
  <section class="bg-secondary text-center py-5">
    <h1 class="gradient-text display-4">
      Welcome, Brave Explorer!
    </h1>
    <p class="lead">
      If you came expecting Fortune 500-quality masterpieces, you might want to head back to civilization.
      This is the realm of weekend experiments and creative madness!
    </p>
  </section>
</div>

<div class="container mt-5">
  @php
    // Get unique category names from the projects collection
    $uniqueCategories = $projects->pluck('category')->unique();
  @endphp

  @forelse($uniqueCategories as $cat)
    {{-- Each category in its own section --}}
    <section id="{{ strtolower($cat) }}" class="content-section bg-secondary mb-5">
      <h2>{{ $cat }}</h2>

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mt-4">
        @foreach ($projects->where('category', $cat)->take(4) as $project)
          {{-- 4 columns on lg screens, 3 columns on md, 2 on sm --}}
          <div class="col h-100"> {{-- Added h-100 to ensure equal height --}}
            <div class="d-flex"> {{-- Added flex container --}}
              @include('partials.project_card', ['project' => $project])
            </div>
          </div>
        @endforeach
      </div>

      @if ($projects->where('category', $cat)->count() > 4)
        <a href="{{ route('category.show', $cat) }}" class="btn btn-secondary">
          View all {{ $cat }} Projects
        </a>
      @endif
    </section>
  @empty
    <p>No Projects found.</p>
  @endforelse
</div>
@endsection
