@extends('layouts.admin')


@section('content')


<header class="bg-danger text-white text-center py-2">
    <h3>Technologies</h3>
</header>

<div class="container mt-4">

    @if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif


    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <form action="{{route('admin.technologies.store')}}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelper" placeholder="Programming" />
                    <small id="nameHelper" class="form-text text-muted">Name of technology</small>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-plus fa-sm fa-fw"></i>
                </button>


            </form>

        </div>
        <div class="col">
            <div class="table-responsive">
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col" class="col-2">ID</th>
                            <th scope="col" class="col-2">Name</th>
                            <th scope="col" class="col-2">Category</th>
                            <th scope="col" class="col-3">Total projects</th>
                            <th scope="col" class="col-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($technologies as $tech)
                        <tr class="">
                            <td scope="row">{{$tech->id}}</td>
                            <td>{{$tech->name}}</td>
                            <td>{{$tech->category}}</td>
                            <td><span class="badge bg-primary">
                                    {{count($tech->projects)}}
                                </span></td>
                            <td>
                                <a class="btn btn-sm btn-primary my-1" href="{{route('admin.technologies.show', $tech)}}">
                                    <i class="fas fa-eye fa-xs fa-fw"></i> View</a>
                                <a class="btn btn-sm btn-secondary my-1" href="{{route('admin.technologies.edit', $tech)}}">
                                    <i class="fas fa-pencil fa-xs fa-fw"></i>Edit</a>

                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-sm btn-danger my-1" data-bs-toggle="modal" data-bs-target="#modal-{{$tech->id}}">
                                    <i class="fas fa-trash fa-xs fa-fw"></i> Delete
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modal-{{$tech->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalName-{{$tech->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalName-{{$tech->id}}">
                                                    Delete technology
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                You are about to destroy this technology:
                                                <strong>{{$tech->name}}</strong>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>

                                                <form action="{{route('admin.technologies.destroy', $tech)}}" method="post">
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
                            <td scope="row" colspan="6">No technologies yet!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>




</div>


@endsection