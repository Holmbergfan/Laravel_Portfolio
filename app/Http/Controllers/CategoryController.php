<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($name)
    {
        $category = Category::where('name', $name)->firstOrFail();
        $projects = $category->projects;
        return view('categories.show', compact('category', 'projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        $category = Category::create([
            'name' => $request->name,
        ]);

        return response()->json($category);
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }
}
