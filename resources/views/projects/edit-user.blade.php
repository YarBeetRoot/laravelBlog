@extends('layouts.base')

@section('content')
    <div class="container">
        <form method="post" action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Your name" value="{{$project->name}}">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" name="code" class="form-control" id="role" placeholder="Role" value="{{$project->code}}">
            </div>
            <div class="form-group">
                <img src="{{asset('storage/avatar/'.$project->image)}}" class="avatar btn" alt="Avatar" id="avatar">
                <label for="image">Your photo</label>
                <input type="file" name="image" class="d-none form-control-file" id="image">
                <input type="hidden" name="old_image" value="{{$project->image}}">
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
@section('scripts')
<script>

    $('#avatar').click(function () {
        $('#image').click();
    })

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function() {
        readURL(this);
    });
</script>
@endsection