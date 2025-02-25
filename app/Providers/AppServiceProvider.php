<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Project;
use App\View\Composers\ProjectComposer;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // 1) An example approach: A single line that passes all projects to a single partial:
        // View::composer('partials.navigation', function($view) {
        //     $view->with('projects', Project::all());
        // });

        // 2) OR use a dedicated composer class:
        View::composer(['partials.navigation'], ProjectComposer::class);
    }
}
