@extends('layouts.admin')


@section('content')

<header class="bg-danger text-white py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h3>{{$type->name}}</h3>
        <a class="btn btn-primary" href="{{route('admin.types.index')}}">Back</a>
    </div>
</header>

<div class="container mt-4 border border-primary p-2">
    <div class="row">
        <div class="col-12">
            <p>
                <strong>Name </strong>
                <br>
                {{$type->name}}
            </p>
            <p>
                <strong>Description </strong>
                <br>
                {{$type->description}}
            </p>
            <p>
                <strong> Slug </strong>
                <br>
                {{$type->slug}}
            </p>
        </div>

    </div>



</div>

@endsection