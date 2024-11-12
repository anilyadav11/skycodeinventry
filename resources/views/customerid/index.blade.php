@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Customers</h1>
        <a href="{{ route('customer-creation.create') }}" class="btn btn-primary mb-3">Add New Customer</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Phone No</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->customer_name }}</td>
                        <td>{{ $customer->phone_no }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            <a href="{{ route('customer-creation.show', $customer->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('customer-creation.edit', $customer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('customer-creation.destroy', $customer->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
