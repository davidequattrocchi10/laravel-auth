<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.types.index', ['types' => Type::orderByDesc('id')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        // validate
        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($request->name, '-');

        //dd($val_data);

        //create
        Type::create($val_data);

        //redirect
        return to_route('admin.types.index')->with('message', 'Type Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {

        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {

        // validate
        $val_data = $request->validated();
        $val_data['slug'] = Str::slug($request->name, '-');

        //update
        $type->update($val_data);

        //redirect
        return to_route('admin.types.index')->with('message', 'Type Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        //delete type
        $type->delete();

        //redirect
        return to_route('admin.types.index')->with('message', 'Type Deleted');
    }
}
