@extends('layouts.admin')


@section('content')

<header class="bg-danger text-white py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h3>Create Project</h3>
        <a class="btn btn-secondary" href="{{route('admin.projects.index')}}">Cancel</a>
    </div>
</header>

<div class="container mt-4">


    @include('partials.errors')


    <form action="{{route('admin.projects.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelper" placeholder="" />
            <small id="titleHelper" class="form-text text-muted">Add the project title here</small>
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Type</label>
            <select class="form-select form-select-lg" name="type_id" id="type_id">
                <option selected disabled>Select one</option>
                @foreach ($types as $type)
                <option value="{{$type->id}}" {{$type->id == old('type_id') ? 'selected' : ''}}>{{$type->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 d-flex gap-3">
            @foreach ($technologies as $tech)
            <div class="form-check ">
                <input class="form-check-input" type="checkbox" value="{{$tech->id}}" id="tech-{{$tech->id}}" name="technologies[]" {{in_array($tech->id, old('technologies', []))  ?  'checked' : '' }} />
                <label class="form-check-label" for="tech-{{$tech->id}}"> {{$tech->name}} </label>
            </div>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="6"></textarea>
        </div>


        <div class="mb-3">
            <label for="final_goal" class="form-label"> Final Goal</label>
            <textarea class="form-control" name="final_goal" id="final_goal" rows="4"></textarea>
        </div>


        <div class="mb-3">
            <label for="area" class="form-label">Area of project</label>
            <input type="text" class="form-control" name="area" id="area" aria-describedby="areaHelper" placeholder="" />
            <small id="areaHelper" class="form-text text-muted">Add the project area here</small>
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Upload cover image</label>
            <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder="cover_image" aria-describedby="coverImageHelper" />
            <div id="coverImageHelper" class="form-text">Upload a cover image</div>
        </div>




        <button type="submit" class="btn btn-primary">Create</button>

    </form>
</div>

@endsection