@extends('layout.app')
@section('title', 'Roles')

@section('content')
    <div class="container">
        <h1>User Roles</h1>
        <a href="{{ route('roles.create') }}" class="btn btn-primary">Add Role</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Level</th>
                    <th>Role</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->level }}</td>
                        <td>{{ $role->role }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('roles.destroy', $role) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
