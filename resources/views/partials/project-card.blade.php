<div class="col">
    <div class="card h-100">
        <a href="{{route('projects.show', $project)}}">
            @if (Str::startsWith($project->cover_image, 'https://'))
            <img class="card-img-top" src="{{$project->cover_image}}" alt="Image" width="100%">
            @else
            <img class="card-img-top" src="{{asset('storage/' . $project->cover_image)}}" alt="Image">
            @endif
        </a>
        <div class="card-body">
            {{$project->title}}
        </div>

    </div>
</div>