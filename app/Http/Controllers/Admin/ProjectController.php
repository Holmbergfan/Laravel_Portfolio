<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category' => 'required',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'files.*' => 'nullable|file|max:10240',
            'download_url' => 'nullable|url',
            'repo_url' => 'nullable|url',
            'status' => 'nullable|string',
            'type' => 'nullable|string',
            'version' => 'nullable|string',
            'version_history' => 'nullable|string',
        ]);

        $project = new Project($validated);

        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('projects', 'public');
            $project->image_url = Storage::url($path);
        }

        if ($request->hasFile('gallery_images')) {
            $gallery_images = [];
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('projects/gallery', 'public');
                $gallery_images[] = Storage::url($path);
            }
            $project->gallery_images = $gallery_images;
        }

        if ($request->hasFile('files')) {
            $files = [];
            foreach ($request->file('files') as $file) {
                $path = $file->store('projects/files', 'public');
                $files[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => Storage::url($path)
                ];
            }
            $project->files = $files;
        }

        $project->save();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        // Make sure arrays are properly handled
        $project->badges = is_string($project->badges) ? (json_decode($project->badges, true) ?: []) : [];
        $project->gallery_images = is_string($project->gallery_images) ? (json_decode($project->gallery_images, true) ?? []) : [];
        $project->files = is_string($project->files) ? (json_decode($project->files, true) ?? []) : [];

        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category' => 'required',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'files.*' => 'nullable|file|max:10240',
            'download_url' => 'nullable|url',
            'repo_url' => 'nullable|url',
            'status' => 'nullable|string',
            'type' => 'nullable|string',
            'version' => 'nullable|string',
            'version_history' => 'nullable|string',
        ]);

        $project->fill($validated);

        if ($request->hasFile('main_image')) {
            // Delete old image if exists
            if ($project->image_url) {
                Storage::delete(str_replace('/storage/', 'public/', $project->image_url));
            }
            $path = $request->file('main_image')->store('projects', 'public');
            $project->image_url = Storage::url($path);
        }

        if ($request->hasFile('gallery_images')) {
            $gallery_images = $project->gallery_images ?? [];
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('projects/gallery', 'public');
                $gallery_images[] = Storage::url($path);
            }
            $project->gallery_images = $gallery_images;
        }

        if ($request->hasFile('files')) {
            $files = $project->files ?? [];
            foreach ($request->file('files') as $file) {
                $path = $file->store('projects/files', 'public');
                $files[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => Storage::url($path)
                ];
            }
            $project->files = $files;
        }

        $project->save();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        // Delete associated files
        if ($project->image_url) {
            Storage::delete(str_replace('/storage/', 'public/', $project->image_url));
        }

        if ($project->gallery_images) {
            foreach ($project->gallery_images as $image) {
                Storage::delete(str_replace('/storage/', 'public/', $image));
            }
        }

        if ($project->files) {
            foreach ($project->files as $file) {
                Storage::delete(str_replace('/storage/', 'public/', $file['path']));
            }
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}