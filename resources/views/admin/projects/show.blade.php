@extends('layouts.admin')


@section('content')
<div class="container">
    <div class="card">
        <div class="card-top">
            <h3>{{$project->title}}</h3>

        </div>
        <div class="card-body">
            <p>{{$project->description}}</p>
            <p>{{$project->final_goal}}</p>
            <p>{{$project->area}}</p>

        </div>

    </div>


</div>

@endsection