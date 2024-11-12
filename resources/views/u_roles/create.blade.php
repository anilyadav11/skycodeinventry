@extends('layout.app')

@section('content')
    <h1>Create Role</h1>
    <form action="{{ route('u_roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="level">Level</label>
            <input type="text" name="level" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" name="role" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
