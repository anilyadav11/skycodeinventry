@extends('layout.app')

@section('content')
<h1>Edit Product Category</h1>
<form action="{{ route('products-categories.update', $products_category) }}" method="POST">

    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $products_category->name }}" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" rows="4" required>{{ $products_category->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection