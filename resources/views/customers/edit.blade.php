@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Edit Customer</h1>
        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="customer_type">Customer Type</label>
                <input type="text" name="customer_type" class="form-control" id="customer_type"
                    value="{{ $customer->customer_type }}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
@endsection
