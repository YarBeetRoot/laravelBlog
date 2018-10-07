@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>User <b>Management</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <a href="{{ route('projects.create') }}" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Date Created</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($projects as $project)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td><a href="{{ route('projects.show',$project->id) }}"><img src="{{asset('storage/'.$project->image)}}" class="avatar" alt="Avatar"> {{$project->name}}</a></td>
                    <td>04/10/2013</td>
                    <td>{{$project->code}}</td>
                    <td><span class="status text-success">&bull;</span> Active</td>
                    <td>
                        <a href="{{ route('projects.edit', $project->id) }}" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                        <a href="#" class="delete" title="Delete" data-toggle="modal" data-target="#deleteUser_{{ $project->id }}"><i class="material-icons">&#xE5C9;</i></a>
                    </td>
                </tr>
                @include('modals.delete-user')
                @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('side-bar')
@endsection
