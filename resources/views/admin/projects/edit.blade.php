@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
<div class="container">
  <h1>Edit Project</h1>

  <div class="card">
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <section class="form-section">
          <h2>Basic Information</h2>
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $project->title) }}" required>
          </div>

          <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $project->description) }}</textarea>
          </div>

          <div class="form-group">
            <label for="category">Category:</label>
            <div class="input-group">
              <select name="category" id="category" class="form-control" required>
                <option value="Apps" {{ old('category', $project->category) == 'Apps' ? 'selected' : '' }}>Apps</option>
                <option value="Web" {{ old('category', $project->category) == 'Web' ? 'selected' : '' }}>Web</option>
                <option value="3D" {{ old('category', $project->category) == '3D' ? 'selected' : '' }}>3D</option>
                <option value="Experimental" {{ old('category', $project->category) == 'Experimental' ? 'selected' : '' }}>Experimental</option>
              </select>
              <div class="input-group-append">
                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#addCategoryModal">Add Category</button>
              </div>
            </div>
          </div>
        </section>

        <section class="form-section">
          <h2>Images and URLs</h2>
          <div class="form-group">
            <label for="image_url">Image URL:</label>
            <input type="text" name="image_url" id="image_url" class="form-control" value="{{ $project->image_url }}">
          </div>

          <div class="form-group">
            <label for="main_image">Main Image:</label>
            <input type="file" name="main_image" id="main_image" class="form-control">
            @if ($project->image_url)
              <img src="{{ $project->image_url }}" alt="Main Image" class="img-thumbnail" width="200">
            @endif
          </div>

          <div class="form-group">
            <label for="gallery_images">Gallery Images:</label>
            <input type="file" name="gallery_images[]" id="gallery_images" class="form-control" multiple>
            @if ($project->gallery_images)
              <div class="row">
                @foreach ($project->gallery_images as $image)
                  <div class="col-md-3">
                    <img src="{{ $image }}" alt="Gallery Image" class="img-thumbnail">
                  </div>
                @endforeach
              </div>
            @endif
          </div>

          <div class="form-group">
            <label for="project_url">Project URL:</label>
            <input type="url" name="project_url" id="project_url" class="form-control" value="{{ $project->project_url }}">
          </div>

          <div class="form-group">
            <label for="github_url">GitHub URL:</label>
            <input type="url" name="github_url" id="github_url" class="form-control" value="{{ $project->github_url }}">
          </div>
        </section>

        <section class="form-section">
          <h2>Files and Badges</h2>
          <div class="form-group">
            <label for="files">Files:</label>
            <input type="file" name="files[]" id="files" class="form-control" multiple>
            @if ($project->files)
              <ul>
                @foreach ($project->files as $file)
                  <li><a href="{{ $file['path'] }}">{{ $file['name'] }}</a></li>
                @endforeach
              </ul>
            @endif
          </div>

          <div class="form-group">
            <label>Badges:</label>
            <div class="badge-groups">
              @php
                $badgeGroups = [
                  'Languages' => ['PHP', 'C#', 'C++', 'HTML', 'JavaScript', 'Python'],
                  'Frameworks' => ['Laravel', 'Flutter', 'React', 'Vue.js'],
                  'Platforms' => ['Windows', 'Linux', 'Android', 'iOS', 'Web']
                ];
                $projectBadges = is_string($project->badges) ? json_decode($project->badges, true) ?? [] : $project->badges ?? [];
              @endphp
              @foreach($badgeGroups as $groupName => $badges)
                <div class="badge-group">
                  <h3>{{ $groupName }}</h3>
                  @foreach($badges as $badge)
                    <div class="form-check">
                      <input type="checkbox" name="badges[]" id="badge-{{ strtolower(str_replace(' ', '-', $badge)) }}" class="form-check-input" value="{{ $badge }}" {{ in_array($badge, $projectBadges) ? 'checked' : '' }}>
                      <label class="form-check-label" for="badge-{{ strtolower(str_replace(' ', '-', $badge)) }}">{{ $badge }}</label>
                    </div>
                  @endforeach
                </div>
              @endforeach
            </div>
            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#addBadgeModal">Add Badge</button>
          </div>
        </section>

        <div class="form-group">
          <label for="download_url">Download URL</label>
          <input type="url" name="download_url" id="download_url" class="form-control" value="{{ old('download_url', $project->download_url) }}">
        </div>

        <div class="form-group">
          <label for="repo_url">Repository URL</label>
          <input type="url" name="repo_url" id="repo_url" class="form-control" value="{{ old('repo_url', $project->repo_url) }}">
        </div>

        <div class="form-group">
          <label for="status">Status</label>
          <input type="text" name="status" id="status" class="form-control" value="{{ old('status', $project->status) }}">
        </div>

        <div class="form-group">
          <label for="type">Type</label>
          <input type="text" name="type" id="type" class="form-control" value="{{ old('type', $project->type) }}">
        </div>

        <div class="form-group">
          <label for="version">Version</label>
          <input type="text" name="version" id="version" class="form-control" value="{{ old('version', $project->version) }}">
        </div>

        <div class="form-group">
          <label for="version_history">Version History</label>
          <textarea name="version_history" id="version_history" class="form-control">{{ old('version_history', $project->version_history) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
      </form>
    </div>
  </div>

  <!-- Add Category Modal -->
  <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addCategoryForm">
            <div class="form-group">
              <label for="newCategoryName">Category Name:</label>
              <input type="text" class="form-control" id="newCategoryName" name="newCategoryName">
            </div>
            <button type="submit" class="btn btn-primary">Add Category</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Badge Modal -->
  <div class="modal fade" id="addBadgeModal" tabindex="-1" role="dialog" aria-labelledby="addBadgeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addBadgeModalLabel">Add New Badge</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addBadgeForm">
            <div class="form-group">
              <label for="newBadgeName">Badge Name:</label>
              <input type="text" class="form-control" id="newBadgeName" name="newBadgeName">
            </div>
            <div class="form-group">
              <label for="newBadgeGroup">Badge Group:</label>
              <input type="text" class="form-control" id="newBadgeGroup" name="newBadgeGroup">
            </div>
            <button type="submit" class="btn btn-primary">Add Badge</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function() {
    $('#addCategoryForm').submit(function(e) {
      e.preventDefault();
      var categoryName = $('#newCategoryName').val();
      if (categoryName) {
        $.ajax({
          url: '{{ route('admin.categories.store') }}',
          type: 'POST',
          data: {
            name: categoryName,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $('#category').append($('<option>', {
              value: response.name,
              text: response.name
            }));
            $('#addCategoryModal').modal('hide');
            $('#newCategoryName').val('');
          }
        });
      }
    });

    $('#addBadgeForm').submit(function(e) {
      e.preventDefault();
      var badgeName = $('#newBadgeName').val();
      var badgeGroup = $('#newBadgeGroup').val();
      if (badgeName && badgeGroup) {
        $.ajax({
          url: '{{ route('admin.badges.store') }}',
          type: 'POST',
          data: {
            name: badgeName,
            group: badgeGroup,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $('#addBadgeModal').modal('hide');
            $('#newBadgeName').val('');
            $('#newBadgeGroup').val('');
          }
        });
      }
    });
  });
</script>
@endsection
