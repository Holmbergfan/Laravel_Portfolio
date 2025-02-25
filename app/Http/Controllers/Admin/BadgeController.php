<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Badge;

class BadgeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $badge = new Badge();
        $badge->name = $request->name;
        $badge->group = $request->group;
        $badge->save();

        return response()->json($badge);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $badge = Badge::findOrFail($id);
        $badge->delete();

        return response()->json(['message' => 'Badge deleted successfully']);
    }
}
