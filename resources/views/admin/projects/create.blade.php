@extends('layouts.admin')


@section('content')

<div class="container mt-3">
    <form action="{{route('admin.projects.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelper" placeholder="" />
            <small id="titleHelper" class="form-text text-muted">Add the project title here</small>
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



        <button type="submit" class="btn btn-primary">Create</button>

    </form>
</div>

@endsection