@extends('layouts.guest')


@section('content')

<div class="jumbotron p-2 mb-4" style="background-image: url({{asset('storage/' . $projects[0]->cover_image)}});
background-size: cover; opacity: 0.85;">
    <div class="container py-3 text-black">
        <h1 class="display-5 fw-bold">
            Projects
        </h1>

        <p class="col-md-8 fs-4" style="color: var(--bool-logo);">Read our amazing blog</p>

        <a href="#projects" class="btn btn-outline-warning">
            <i class="fa fa-chevron-down" aria-hidden="true"></i>
        </a>

    </div>
</div>

<section id="projects" class="bg-dark">

    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-sm-3 g-4">
            @forelse ($projects as $project)
            @include('partials.project-card')
            @empty
            <div class="col-12">
                <p>No project here!</p>
            </div>
            @endforelse
        </div>

        {{$projects->links('pagination::bootstrap-5')}}
    </div>
</section>


@endsection