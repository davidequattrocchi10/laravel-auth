@extends('layouts.admin')


@section('content')

<header class="bg-danger text-white py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h3>Create Type</h3>
        <a class="btn btn-secondary" href="{{route('admin.types.index')}}">Cancel</a>
    </div>
</header>

<div class="container mt-4">


    @include('partials.errors')

    <form action="{{route('admin.types.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelper" placeholder="" />
            <small id="nameHelper" class="form-text text-muted">Add the type name here</small>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="6"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>

    </form>


</div>

@endsection