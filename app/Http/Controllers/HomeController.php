<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('pages.index', compact('projects'));
    }
}
