<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Project;

class ProjectComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view)
    {
        // Fetch all projects (or limit, or order if you want).
        $projects = Project::all();

        // Make them available as $projects in the blade.
        $view->with('projects', $projects);
    }
}
