<div>
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
</div>
@extends('layout.app')

@section('content')
<h1>Product Category</h1>
<a href="{{ route('products-categories.create') }}" class="btn btn-primary">Add Category</a>
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
        @foreach ($categories as $categorie)
        <tr>
            <td>{{ $categorie->name }}</td>

            <td>{{ $categorie->description }}</td>
            <td>
                {{-- <a href="{{ route('u_roles.show', $categorie) }}" class="btn btn-info">View</a> --}}
                <a href="{{ route('products-categories.edit', $categorie) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('products-categories.destroy', $categorie) }}" method="POST" style="display:inline;"
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