@extends('layouts.app')
@section('content')

<div class="jumbotron p-2 mb-4 bg-light rounded-3">
    <div class="container py-3">

        <div class="logo_laravel">
            <img class="img-fluid rounded-circle" width="200" src="https://avatars.githubusercontent.com/u/75373080?v=4" alt="">
        </div>

        <h1 class="display-5 fw-bold">
            Welcome to Boolpress
        </h1>

        <p class="col-md-8 fs-4">Read our amazing blog</p>

    </div>
</div>

</div>
<div class="content">
    <div class="container">
        <h4>Welcome to a Collaborative Hub of Inspiration and Innovation</h4>

        <p>This site is your one-stop shop for exploring a vast landscape of projects, big and small,
            that are shaping our world. Whether you're a seasoned professional, a curious student, or an aspiring entrepreneur,
            you'll find a wealth of resources to fuel your creativity and ignite your passion.
        </p>
    </div>
</div>

<section class="latest_projects mb-4">
    <div class="container">
        <div class="row">
            @forelse ($latest_projects as $project)
            <div class="col">
                <div class="card">
                    @if (Str::startsWith($project->cover_image, 'https://'))
                    <img class="card-img-top" src="{{$project->cover_image}}" alt="Image" width="100%">
                    @else
                    <img class="card-img-top" src="{{asset('storage/' . $project->cover_image)}}" alt="Image">
                    @endif

                    <div class="card-body">
                        <h3>{{$project->title}}</h3>
                    </div>
                </div>
            </div>

            @empty
            <div class="col-12">
                <p>No projects here!</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection