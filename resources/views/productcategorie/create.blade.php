@extends('layout.app')

@section('content')
<h1>Create Product Categorie</h1>
<form action="{{ route('products-categories.store') }}" method="POST">
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