@extends('layout.app')
@section('content')
<h1>Create Outlet</h1>
<form action="{{ route('outlettype.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="level">Name</label>
        <input type="text" name="outlate_name" class="form-control @error('name') is-invalid @enderror">
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection