@extends('layouts.admin')


@section('content')

<div class="container mt-3">
    <form action="{{route('admin.projects.update', $project)}}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelper" placeholder="" value="{{old('title', $project->title)}}" />
            <small id="titleHelper" class="form-text text-muted">Add the project title here</small>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="6">{{old('description', $project->description)}}</textarea>
        </div>


        <div class="mb-3">
            <label for="final_goal" class="form-label"> Final Goal</label>
            <textarea class="form-control" name="final_goal" id="final_goal" rows="4">{{old('final_goal', $project->final_goal)}}</textarea>
        </div>


        <div class="mb-3">
            <label for="area" class="form-label">Area of project</label>
            <input type="text" class="form-control" name="area" id="area" aria-describedby="areaHelper" placeholder="" value="{{old('area', $project->area)}}" />
            <small id="areaHelper" class="form-text text-muted">Add the project area here</small>
        </div>



        <button type="submit" class="btn btn-primary">Update</button>

    </form>
</div>

@endsection