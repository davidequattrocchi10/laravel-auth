@extends('layouts.admin')


@section('content')

<header class="bg-danger text-white py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h3>{{$technology->name}}</h3>
        <a class="btn btn-primary" href="{{route('admin.technologies.index')}}">Back</a>
    </div>
</header>

<div class="container mt-4 border border-primary p-2">
    <div class="row">
        <div class="col-12">
            <p>
                <strong>Description </strong>
                <br>
                {{$technology->description}}
            </p>
            <p>
                <strong> Slug </strong>
                <br>
                {{$technology->category}}
            </p>
        </div>

    </div>



</div>

@endsection