@extends('layout.app')
@section('title', 'Edit Roles')


@section('content')
    <div class="container">
        <h1>Edit User Role</h1>
        <form action="{{ route('roles.update', $uRole) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Level</label>
                <input type="text" name="level" class="form-control" value="{{ $uRole->level }}" required>
            </div>
            <div class="form-group">
                <label>Role</label>
                <input type="text" name="role" class="form-control" value="{{ $uRole->role }}" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" required>{{ $uRole->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Role</button>
        </form>
    </div>
@endsection
