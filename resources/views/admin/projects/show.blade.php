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
        <div class="col-6">
            @if (Str::startsWith($project->cover_image, 'https://'))
            <img loading="lazy" src="{{$project->cover_image}}" alt="Image" width="100%">

            @else
            <img loading="lazy" src="{{asset('storage/' . $project->cover_image)}}" alt="Image">

            @endif
        </div>
        <div class="col-6">
            <p class="metadata">
                <strong>Type</strong>
                <br>
                {{$project->type ? $project->type->name : 'Uncategorized' }}
            </p>
            <p>
                <strong>Description </strong>
                <br>
                {{$project->description}}
            </p>
            <p>
                <strong> Final goal </strong>
                <br>
                {{$project->final_goal}}
            </p>
            <p>
                <strong> Slug </strong>
                <br>
                {{$project->slug}}
            </p>
        </div>

    </div>



</div>

@endsection