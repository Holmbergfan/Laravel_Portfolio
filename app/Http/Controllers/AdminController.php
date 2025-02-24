<?php
namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category; // if you have a Category model
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalProjects = Project::count();
        // If you have a Category model:
        $totalCategories = Category::count();

        $latestProjects = Project::orderBy('created_at','desc')->take(5)->get();

        return view('admin.dashboard', [
            'totalProjects'   => $totalProjects,
            'totalCategories' => $totalCategories ?? 0,
            'latestProjects'  => $latestProjects,
        ]);
    }
}
