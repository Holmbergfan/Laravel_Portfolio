<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectService
{
    public function createProject(array $data, Request $request): Project
    {
        // Handle main image
        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('projects/images', 'public');
            $data['image_url'] = Storage::url($path);
        }

        // Handle gallery images
        if ($request->hasFile('gallery_images')) {
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('projects/gallery', 'public');
                $galleryImages[] = Storage::url($path);
            }
            $data['gallery_images'] = $galleryImages;
        }

        // Handle project files
        if ($request->hasFile('files')) {
            $files = [];
            foreach ($request->file('files') as $file) {
                $path = $file->store('projects/files', 'public');
                $files[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => Storage::url($path)
                ];
            }
            $data['files'] = json_encode($files);
        }

        // Handle badges
        if (isset($data['badges']) && is_array($data['badges'])) {
            $data['badges'] = json_encode($data['badges']);
        } else {
            $data['badges'] = null;
        }

        return Project::create($data);
    }

    public function updateProject(Project $project, array $data, Request $request): Project
    {
        // Handle main image
        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('projects/images', 'public');
            $data['image_url'] = Storage::url($path);
        }

        // Handle gallery images
        if ($request->hasFile('gallery_images')) {
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('projects/gallery', 'public');
                $galleryImages[] = Storage::url($path);
            }
            $data['gallery_images'] = $galleryImages;
        }

        // Handle project files
        if ($request->hasFile('files')) {
            $files = [];
            foreach ($request->file('files') as $file) {
                $path = $file->store('projects/files', 'public');
                $files[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => Storage::url($path)
                ];
            }
            $data['files'] = json_encode($files);
        }

         // Handle badges
        if (isset($data['badges']) && is_array($data['badges'])) {
            $data['badges'] = json_encode($data['badges']);
        } else {
            $data['badges'] = null;
        }

        $project->update($data);

        return $project;
    }
}