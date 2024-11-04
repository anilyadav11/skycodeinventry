@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Add New Customer</h1>
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="customer_type">Customer Type</label>
                <input type="text" name="customer_type" class="form-control" id="customer_type" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </form>
    </div>
@endsection
