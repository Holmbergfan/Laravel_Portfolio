<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'NeoStore E-Commerce',
                'description' => 'Designed with a responsive UI, advanced interactions, and SEO best practices.',
                'category' => 'Web',
                'image_url' => 'https://cdn.prod.website-files.com/619e15d781b21202de206fb5/6687b270adb032fc86c8ea6b_testing-web-apps-on-right-devices-guide-main.webp',
                'badges' => ['Laravel', 'Open Source', 'HTML'],
                'status' => 'active'
            ],
            [
                'title' => 'TechBlog Platform',
                'description' => 'Showcases blogging capabilities, custom CMS integration, and sleek animations.',
                'category' => 'Web',
                'image_url' => 'https://cdn.prod.website-files.com/619e15d781b21202de206fb5/6687b270adb032fc86c8ea6b_testing-web-apps-on-right-devices-guide-main.webp',
                'badges' => ['PHP', 'C#'],
                'status' => 'active'
            ],
            // Add more sample projects here
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
