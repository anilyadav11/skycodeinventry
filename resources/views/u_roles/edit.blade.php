@extends('layout.app')

@section('content')
    <h1>Edit Role</h1>
    <form action="{{ route('u_roles.update', $uRole) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="level">Level</label>
            <input type="text" name="level" class="form-control" value="{{ $uRole->level }}" required>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" name="role" class="form-control" value="{{ $uRole->role }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" value="{{ $uRole->description }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
