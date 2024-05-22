<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.projects.index', ['projects' => Project::orderByDesc('id')->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        // validate
        $val_data = $request->validated();
        // dd($val_data);

        $image_path = Storage::put('uploads', $request->cover_image);

        $val_data['cover_image'] = $image_path;

        //create
        Project::create($val_data);

        //redirect
        return to_route('admin.projects.index')->with('message', 'Project Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        // validate
        $val_data = $request->validated();

        // check if request has a cover_image
        if ($request->has('cover_image')) {
            // check if the current project has a cover_image
            if ($project->cover_image) {
                // delete old cover_image
                Storage::delete($project->cover_image);
            }
            //upload new cover_image
            $image_path = Storage::put('uploads', $request->cover_image);
            //add new cover_image in data validation
            $val_data['cover_image'] = $image_path;
        }

        //update
        $project->update($val_data);

        //redirect
        return to_route('admin.projects.index')->with('message', 'Project Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        // check if the current project has a cover_image
        if ($project->cover_image) {
            // delete old cover_image
            Storage::delete($project->cover_image);
        }

        //delete project
        $project->delete();

        //redirect
        return to_route('admin.projects.index')->with('message', 'Project Deleted');
    }
}
