@extends('layouts.admin')


@section('content')

<header class="bg-danger text-white py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h3>Editing: {{$project->title}}</h3>
        <a class="btn btn-secondary" href="{{route('admin.projects.index')}}">Cancel</a>
    </div>
</header>

<div class="container mt-4">

    @include('partials.errors')


    <form action="{{route('admin.projects.update', $project)}}" method="post" enctype="multipart/form-data">
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

        <div class="d-flex gap-3">
            @if (Str::startsWith($project->cover_image, 'https://'))
            <img src="{{$project->cover_image}}" alt="Image" width="100%">

            @else
            <img src="{{asset('storage/' . $project->cover_image)}}" alt="Image">

            @endif


            <div class="mb-3">
                <label for="cover_image" class="form-label">Upload cover image</label>
                <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder="cover_image" aria-describedby="coverImageHelper" />
                <div id="coverImageHelper" class="form-text">Upload a cover image</div>
            </div>

        </div>
        <button type="submit" class="mt-3 btn btn-primary">Update</button>

    </form>
</div>

@endsection