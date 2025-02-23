<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $categories = Category::all();
        return view('pages.index', compact('projects', 'categories'));
    }
}
