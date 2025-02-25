<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProjectController extends Controller
{
    public function createVersionHistory()
    {
        return view('admin.projects.version_history.create');
    }

    public function storeVersionHistory(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'version' => 'required|string',
            'release_date' => 'required|date',
            'description' => 'required|string',
        ]);
        
        return redirect()->route('admin.projects.edit', $request->project_id)->with('success', 'Version history added successfully.');
    }
}
