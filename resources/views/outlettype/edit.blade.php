@extends('layout.app')

@section('content')
<h1>Edit Outlet</h1>
<form action="{{ route('outlettype.update', $outlettype) }}" method="POST">

    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="outlate_name" class="form-control" value="{{ $outlettype->outlate_name }}" required>
    </div>


    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection