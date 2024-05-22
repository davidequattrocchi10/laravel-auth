@extends('layouts.admin')


@section('content')

<header class="bg-danger text-white py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h3>{{$project->title}}</h3>
        <a class="btn btn-primary" href="{{route('admin.projects.index')}}">Back</a>
    </div>
</header>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <p>{{$project->area}}</p>
        </div>
        <div class="col">
            <p>{{$project->description}}</p>
            <p>{{$project->final_goal}}</p>
        </div>
        <div class="col">
            <img src="{{$project->cover_image}}" alt="Image">
        </div>
    </div>



</div>

@endsection