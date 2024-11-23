@extends('layout.app')

@section('content')
<h1>Create Product </h1>
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="level">Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="region_zone">Category</label>
        <select name="category_id" id="category_id" class="form-control" required>
            <option value="">Select Category</option>
            @foreach($category as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach

        </select>
        <div class="invalid-feedback">Please select a region zone.</div>
    </div>
    <div class="form-group">
        <label for="level">Sku</label>
        <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror">
        @error('sku')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="level">Image</label>
        <input type="file" name="image" class="form-control @error('sku') is-invalid @enderror">
        @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>


    <div class="form-group">
        <label for="role">Description</label>
        <textarea name="description" class="form-control  @error('description') is-invalid @enderror" rows="4"></textarea>
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection