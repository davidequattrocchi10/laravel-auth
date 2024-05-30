@extends('layouts.admin')


@section('content')

<header class="bg-danger text-white py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h3>{{$technology->name}}</h3>
        <a class="btn btn-secondary" href="{{route('admin.technologies.index')}}">Cancel</a>
    </div>
</header>

<div class="container mt-4">

    @include('partials.errors')


    <form action="{{route('admin.technologies.update', $technology)}}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelper" placeholder="" value="{{old('name', $technology->name)}}" />
            <small id="nameHelper" class="form-text text-muted">Change technology name here</small>
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="6">{{old('description', $technology->description)}}</textarea>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" name="category" id="category" aria-describedby="categoryHelper" placeholder="" value="{{old('category', $technology->category)}}" />
            <small id="categoryHelper" class="form-text text-muted">Change technology category here</small>
        </div>

        <button type="submit" class="mt-3 btn btn-primary">Update</button>

    </form>
</div>

@endsection