<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        
        return view('pages.index', [
            'projects' => $projects
        ]);
    }
}
