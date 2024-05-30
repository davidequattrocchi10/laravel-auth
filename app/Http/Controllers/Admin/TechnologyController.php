<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Http\Controllers\Controller;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.technologies.index', ['technologies' => Technology::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        // dd($request->all());
        //validate
        $val_data = $request->validated();

        //create
        Technology::create($val_data);

        //redirect
        return to_route('admin.technologies.index')->with('message', 'Technology Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        // dd($request->all());
        //validate
        $val_data = $request->validated();

        //update
        $technology->update($val_data);

        //redirect
        return to_route('admin.technologies.index')->with('message', 'Technology Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        //delete technology
        $technology->delete();

        //redirect
        return to_route('admin.technologies.index')->with('message', 'Technology Deleted');
    }
}
