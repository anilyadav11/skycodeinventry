@extends('layout.app')

@section('content')
<h1>Edit Product Category</h1>
<form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Name -->
    <div class="form-group">
        <label for="name">Name</label>
        <input
            type="text"
            name="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $product->name) }}">
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <!-- Category -->
    <div class="form-group">
        <label for="category_id">Category</label>
        <select
            name="category_id"
            id="category_id"
            class="form-control @error('category_id') is-invalid @enderror"
            required>
            <option value="">Select Category</option>
            @foreach($categories as $c)
            <option
                value="{{ $c->id }}"
                {{ old('category_id', $product->category_id) == $c->id ? 'selected' : '' }}>
                {{ $c->name }}
            </option>
            @endforeach
        </select>
        @error('category_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <!-- SKU -->
    <div class="form-group">
        <label for="sku">SKU</label>
        <input
            type="text"
            name="sku"
            class="form-control @error('sku') is-invalid @enderror"
            value="{{ old('sku', $product->sku) }}">
        @error('sku')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <!-- Image -->
    <div class="form-group">

        <label for="image">Image</label>
        <input
            type="file"
            name="image"
            class="form-control @error('image') is-invalid @enderror">
        <img src="{{ asset('images/' . $product->image) }}" alt="Image" style="width: 100px; height: auto;">
        @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <!-- Price -->
    <div class="form-group">
        <label for="price">Price</label>
        <input
            type="text"
            name="price"
            class="form-control @error('price') is-invalid @enderror"
            value="{{ old('price', $product->price) }}">
        @error('price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <!-- Tax -->
    <div class="form-group">
        <label for="tax">Tax</label>
        <input
            type="text"
            name="tax"
            class="form-control @error('tax') is-invalid @enderror"
            value="{{ old('tax', $product->tax) }}">
        @error('tax')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <!-- Description -->
    <div class="form-group">
        <label for="description">Description</label>
        <textarea
            name="description"
            class="form-control @error('description') is-invalid @enderror"
            rows="4">{{ old('description', $product->description) }}</textarea>
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection