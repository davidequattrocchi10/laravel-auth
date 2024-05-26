@extends('layouts.guest')


@section('content')

<header class="bg-dark py-4" style="color: var(--bool-logo);">
    <div class="container d-flex justify-content-between align-items-center">
        <h3>{{$project->title}}</h3>
        <a class="btn btn-warning" href="{{route('projects.index')}}">Back</a>
    </div>
</header>

<div class="container mt-4 border border-warning p-2">
    <div class="row">
        <div class="col-6 text-center my-2">
            @if (Str::startsWith($project->cover_image, 'https://'))
            <img src="{{$project->cover_image}}" alt="Image" width="100%">

            @else
            <img src="{{asset('storage/' . $project->cover_image)}}" alt="Image">

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