<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Services\ProjectService;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    protected $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    // List all projects
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    // Show form to create new project
    public function create()
    {
        $categories = Category::all();
        return view('admin.projects.create', compact('categories'));
    }

    // Store new project
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        $project = $this->projectService->createProject($data, $request);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully!');
    }

    // Show form to edit a project
    public function edit(Project $project)
    {
        $categories = Category::all();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    // Update a project
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        $this->projectService->updateProject($project, $data, $request);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully!');
    }

    // Delete project
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully');
    }

    // Show a single project detail page
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
    }
}
