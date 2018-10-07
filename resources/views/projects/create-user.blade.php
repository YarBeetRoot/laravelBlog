@extends('layouts.base')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('projects.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Your name">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" name="code" class="form-control" id="role" placeholder="Role">
            </div>
            <div class="form-group">
                <label for="image">Your photo</label>
                <input type="file" name="image" class="form-control-file" id="image">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
@endsection
@section('side-bar')
@endsection