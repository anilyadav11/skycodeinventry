<div>
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
</div>
@extends('layout.app')

@section('content')
<h1>Product Outlet Type</h1>
<a href="{{ route('outlettype.create') }}" class="btn btn-primary">Add Outlet Type</a>
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table">
    <thead>
        <tr>
            <th>Name</th>

            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($outlatetype as $outlatetype)
        <tr>
            <td>{{ $outlatetype->outlate_name }}</td>

            <td>{{ $outlatetype->description }}</td>
            <td>
                {{-- <a href="{{ route('u_roles.show', $outlatetype) }}" class="btn btn-info">View</a> --}}
                <a href="{{ route('outlettype.edit', $outlatetype) }}" class="btn btn-warning">Edit</a>

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