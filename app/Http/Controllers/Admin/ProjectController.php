<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.projects.index', ['projects' => Project::where('user_id', auth()->id())->orderByDesc('id')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create', ['types' => Type::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        // validate
        $val_data = $request->validated();
        // dd($val_data);
        $val_data['slug'] = Str::slug($request->title, '-');

        // check if request has a cover_image
        if ($request->has('cover_image')) {
            $image_path = Storage::put('uploads', $request->cover_image);

            $val_data['cover_image'] = $image_path;
        }

        $val_data['user_id'] = auth()->id();

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
        if ($project->user_id == auth()->id()) {
            $types = Type::all();
            return view('admin.projects.edit', compact('project', 'types'));
        }
        abort(403, 'You cannot edit projects that do not belong to you!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        if (auth()->id() != $project->user_id) {
            abort(403, 'Did you really try to hack my app?');
        }

        // validate
        $val_data = $request->validated();

        $val_data['slug'] = Str::slug($request->title, '-');

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
        if (auth()->id() != $project->user_id) {
            abort(403, 'You cannot delete projects that do not belong to you');
        }


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
