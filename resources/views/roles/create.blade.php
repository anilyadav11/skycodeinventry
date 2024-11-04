@extends('layout.app')
@section('title', 'Create Roles')

@section('content')
    <div class="container">
        <h1>Add User Role</h1>
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Level</label>
                <input type="text" name="level" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Role</label>
                <input type="text" name="role" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Role</button>
        </form>
    </div>
@endsection
