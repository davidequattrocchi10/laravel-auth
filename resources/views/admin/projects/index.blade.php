@extends('layouts.admin')


@section('content')

<div class="container">
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Final Goal</th>
                    <th scope="col">Area</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                <tr class="">
                    <td scope="row">{{$project->id}}</td>
                    <td>{{$project->title}}</td>
                    <td>{{$project->description}}</td>
                    <td>{{$project->final_goal}}</td>
                    <td>{{$project->area}}</td>
                    <td>
                        <a href="{{route('admin.projects.show', $project)}}">View</a>
                        <a href="#">Edit</a>
                        <a href="#">Delete</a>
                    </td>
                </tr>

                @empty
                <tr class="">
                    <td scope="row" colspan="6">No projects yet!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>


</div>


@endsection