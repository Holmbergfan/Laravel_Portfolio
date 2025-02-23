<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use Illuminate\Http\Request;

class BadgeController extends Controller
{
    public function store(Request $request)
    {
        $badge = new Badge();
        $badge->name = $request->input('name');
        $badge->image_url = $request->input('image_url');
        $badge->save();

        return redirect()->route('admin.badges.index');
    }
}
