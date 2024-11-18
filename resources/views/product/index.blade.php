<div>
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
</div>
@extends('layout.app')

@section('content')
<h1>Product</h1>
<a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table">
    <thead>
        <tr>

            <th>Category Id</th>
            <th>Name</th>
            <th> Image</th>
            <th> Sku</th>
            <th> Price</th>
            <th> Tax</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($product as $p)
        <tr>
            <td>{{ $p->category->name ?? 'N/A' }}</td>
            <td>{{ $p->name }}</td>
            <td>
                <img src="{{ asset('images/' . $p->image) }}" alt="Image" style="width: 100px; height: auto;">
            </td>

            <td>{{ $p->sku }}</td>
            <td>{{ $p->price}}</td>
            <td>{{ $p->tax }}</td>

            <td>{{ $p->description }}</td>
            <td>
                {{-- <a href="{{ route('products.show', $p) }}" class="btn btn-info">View</a> --}}
                <a href="{{ route('products.edit', $p) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('products.destroy', $p) }}" method="POST" style="display:inline;"
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