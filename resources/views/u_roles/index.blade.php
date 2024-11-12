@extends('layout.app')

@section('content')
    <h1>User Roles</h1>
    <a href="{{ route('u_roles.create') }}" class="btn btn-primary">Add Role</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
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
                        {{-- <a href="{{ route('u_roles.show', $role) }}" class="btn btn-info">View</a> --}}
                        <a href="{{ route('u_roles.edit', $role) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('u_roles.destroy', $role) }}" method="POST" style="display:inline;"
                            onsubmit="return confirmDelete(this)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        function confirmDelete(form) {
            if (confirm('Warning: Deleting this role will also delete all associated employees. Do you want to proceed?')) {
                return true; // proceed with form submission
            } else {
                return false; // prevent form submission
            }
        }
    </script>
@endsection
