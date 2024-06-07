<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            return response()->json([
                'success' => true,
                'results' => Project::with(['type', 'user', 'technologies'])->orderByDesc('id')->where('title', 'LIKE', '%' . $request->search . '%')->paginate(6)

            ]);
        } else {
            return response()->json([
                'success' => true,
                'results' => Project::with(['type', 'user', 'technologies'])->orderByDesc('id')->paginate(6)
            ]);
        }
    }

    public function show($id)
    {
        // return $id;
        $project = Project::with(['type', 'user', 'technologies'])->where('id', $id)->first();
        if ($project) {
            return response()->json([
                'success' => 'true',
                'results' => $project
            ]);
        } else {
            return response()->json([
                'success' => 'false',
                'results' => "404 Not found"
            ]);
        }
    }
}
