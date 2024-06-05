<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => 'true',
            'results' => Project::with(['type', 'user', 'technologies'])->orderByDesc('id')->get()
        ]);
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
