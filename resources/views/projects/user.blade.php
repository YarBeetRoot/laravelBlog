@extends('layouts.base')

@section('content')
    <div class="container">
        <table class="table">
            <tbody>
            <tr>
                <th>User Details</th>
            </tr>
            <tr>
                <th>Avatar</th>
                <td><img src="{{asset('storage/avatar/'.$user->image)}}" class="avatar" alt="Avatar"></td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{$user->name}}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>{{$user->code}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
@section('side-bar')
@endsection