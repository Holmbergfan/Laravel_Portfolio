{{-- resources/views/admin/projects/_form.blade.php --}}
@csrf

{{-- Basic Info Section --}}
<div class="form-section">
  <h2>Basic Information</h2>

  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text"
           name="title"
           id="title"
           class="form-control"
           value="{{ old('title', $project->title ?? '') }}"
           required>
  </div>

  <div class="form-group">
    <label for="description">Description:</label>
    <textarea name="description"
              id="description"
              class="form-control"
              rows="5"
              required>{{ old('description', $project->description ?? '') }}</textarea>
  </div>

  {{-- Category + "Add Category" modal button --}}
  <div class="form-group">
    <label for="category">Category:</label>
    <div class="input-group">
      <select name="category" id="category" class="form-control" required>
        @php
          $categories = ['Apps','Web','3D','Experimental'];
        @endphp
        @foreach ($categories as $cat)
          <option value="{{ $cat }}"
            {{ old('category', $project->category ?? '') === $cat ? 'selected' : '' }}>
            {{ $cat }}
          </option>
        @endforeach
      </select>
      <div class="input-group-append">
        <button type="button"
                class="btn btn-outline-secondary"
                data-toggle="modal"
                data-target="#addCategoryModal">
          Add Category
        </button>
      </div>
    </div>
  </div>
</div>

{{-- Images & URLs Section --}}
<div class="form-section">
  <h2>Images and URLs</h2>

  <div class="form-group">
    <label for="image_url">Image URL:</label>
    <input type="text"
           name="image_url"
           id="image_url"
           class="form-control"
           value="{{ old('image_url', $project->image_url ?? '') }}">
  </div>

  <div class="form-group">
    <label for="main_image">Main Image:</label>
    <input type="file"
           name="main_image"
           id="main_image"
           class="form-control">
    @if(!empty($project->image_url))
      <img src="{{ $project->image_url }}"
           alt="Main Image"
           class="img-thumbnail mt-2"
           width="200">
    @endif
  </div>

  <div class="form-group">
    <label for="gallery_images">Gallery Images:</label>
    <input type="file"
           name="gallery_images[]"
           id="gallery_images"
           class="form-control"
           multiple>
    @if(!empty($project->gallery_images))
      <div class="row mt-2">
        @foreach ($project->gallery_images as $image)
          <div class="col-md-3 mb-2">
            <img src="{{ $image }}"
                 alt="Gallery Image"
                 class="img-thumbnail">
          </div>
        @endforeach
      </div>
    @endif
  </div>

  <div class="form-group">
    <label for="project_url">Project URL:</label>
    <input type="url"
           name="project_url"
           id="project_url"
           class="form-control"
           value="{{ old('project_url', $project->project_url ?? '') }}">
  </div>

  <div class="form-group">
    <label for="github_url">GitHub URL:</label>
    <input type="url"
           name="github_url"
           id="github_url"
           class="form-control"
           value="{{ old('github_url', $project->github_url ?? '') }}">
  </div>
</div>

{{-- Files and Badges Section --}}
<div class="form-section">
  <h2>Files and Badges</h2>

  <div class="form-group">
    <label for="files">Files:</label>
    <input type="file"
           name="files[]"
           id="files"
           class="form-control"
           multiple>
    @if(!empty($project->files))
      <ul class="mt-2">
        @foreach ($project->files as $file)
          <li>
            <a href="{{ $file['path'] }}">
              {{ $file['name'] }}
            </a>
          </li>
        @endforeach
      </ul>
    @endif
  </div>

  <div class="form-group">
    <label>Badges:</label>
    @php
      // Fetch badge groups from the database
      $badgeGroups = \App\Models\Badge::orderBy('group')->get()->groupBy('group');

      // $projectBadges might be array or JSON
      $projectBadges = isset($project->badges)
          ? (is_string($project->badges)
               ? json_decode($project->badges, true) ?? []
               : $project->badges)
          : old('badges', []);
    @endphp
    <div class="badge-groups">
      @foreach($badgeGroups as $groupName => $badges)
        <div class="badge-group">
          <h3>{{ $groupName }}</h3>
          @foreach($badges as $badge)
            <div class="form-check">
              <input type="checkbox"
                     name="badges[]"
                     id="badge-{{ strtolower(str_replace(' ', '-', $badge->name)) }}"
                     class="form-check-input"
                     value="{{ $badge->name }}"
                     @if(in_array($badge->name, $projectBadges)) checked @endif>
              <label class="form-check-label"
                     for="badge-{{ strtolower(str_replace(' ', '-', $badge->name)) }}">
                {{ $badge->name }}
              </label>
              <button type="button"
                      class="btn btn-danger btn-sm ml-2"
                      onclick="deleteBadge({{ $badge->id }})">
                Delete
              </button>
            </div>
          @endforeach
        </div>
      @endforeach
    </div>
    <button type="button"
            class="btn btn-outline-secondary mt-2"
            data-toggle="modal"
            data-target="#addBadgeModal">
      Add Badge
    </button>
  </div>
</div>

{{-- Additional Fields (download_url, repo_url, status, type, etc.) --}}
<div class="form-section">
  <h2>Additional Info</h2>

  <div class="form-group">
    <label for="download_url">Download URL</label>
    <input type="url"
           name="download_url"
           id="download_url"
           class="form-control"
           value="{{ old('download_url', $project->download_url ?? '') }}">
  </div>

  <div class="form-group">
    <label for="repo_url">Repository URL</label>
    <input type="url"
           name="repo_url"
           id="repo_url"
           class="form-control"
           value="{{ old('repo_url', $project->repo_url ?? '') }}">
  </div>

  <div class="form-group">
    <label for="status">Status</label>
    <input type="text"
           name="status"
           id="status"
           class="form-control"
           value="{{ old('status', $project->status ?? '') }}">
  </div>

  <div class="form-group">
    <label for="type">Type</label>
    <input type="text"
           name="type"
           id="type"
           class="form-control"
           value="{{ old('type', $project->type ?? '') }}">
  </div>

  <div class="form-group">
    <label for="version">Version</label>
    <input type="text"
           name="version"
           id="version"
           class="form-control"
           value="{{ old('version', $project->version ?? '1.0.0') }}">
  </div>

  <div class="form-group">
    <label for="version_history">Version History</label>
    <textarea name="version_history"
              id="version_history"
              class="form-control"
              rows="4">{{ old('version_history', $project->version_history ?? '') }}</textarea>
  </div>
</div>


<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" ...>
   ...
</div>

<!-- Add Badge Modal -->
<div class="modal fade" id="addBadgeModal" ...>
   ...
</div>

<script>
function deleteBadge(badgeId) {
    if (confirm('Are you sure you want to delete this badge?')) {
        fetch(`/admin/badges/${badgeId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Badge deleted successfully') {
                location.reload();
            } else {
                alert('Failed to delete badge');
            }
        });
    }
}
</script>
