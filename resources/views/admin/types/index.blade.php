@extends('layouts.admin')


@section('content')


<header class="bg-danger text-white py-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h3>Types</h3>
        <a class="btn btn-primary" href="{{route('admin.types.create')}}">Create</a>
    </div>
</header>

<div class="container mt-4">

    @if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif

    <div class="table-responsive">
        <table class="table table-light">
            <thead>
                <tr>
                    <th scope="col" class="col-2">ID</th>
                    <th scope="col" class="col-2">Name</th>
                    <th scope="col" class="col-2">Slug</th>
                    <th scope="col" class="col-3">Total projects</th>
                    <th scope="col" class="col-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($types as $type)
                <tr class="">
                    <td scope="row">{{$type->id}}</td>
                    <td>{{$type->name}}</td>
                    <td>{{$type->slug}}</td>
                    <td>
                        <span class="badge bg-primary">
                            {{count($type->projects)}}
                        </span>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-primary my-1" href="{{route('admin.types.show', $type)}}">
                            <i class="fas fa-eye fa-xs fa-fw"></i> View</a>
                        <a class="btn btn-sm btn-secondary my-1" href="{{route('admin.types.edit', $type)}}">
                            <i class="fas fa-pencil fa-xs fa-fw"></i>Edit</a>

                        <!-- Modal trigger button -->
                        <button type="button" class="btn btn-sm btn-danger my-1" data-bs-toggle="modal" data-bs-target="#modal-{{$type->id}}">
                            <i class="fas fa-trash fa-xs fa-fw"></i> Delete
                        </button>

                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade" id="modal-{{$type->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalName-{{$type->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalName-{{$type->id}}">
                                            Delete type
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        You are about to destroy this type:
                                        <strong>{{$type->name}}</strong>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>

                                        <form action="{{route('admin.types.destroy', $type)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                Confirm
                                            </button>


                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                @empty
                <tr class="">
                    <td scope="row" colspan="6">No types yet!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>


</div>


@endsection