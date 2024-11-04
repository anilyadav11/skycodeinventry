@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Customer Details</h1>
        <p><strong>ID:</strong> {{ $customer->id }}</p>
        <p><strong>Customer Type:</strong> {{ $customer->customer_type }}</p>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
