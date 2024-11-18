@extends('layout.app')

@section('content')
<div class="container">
    <h1>Customers</h1>
    <a href="{{ route('customer-creation.create') }}" class="btn btn-primary mb-3">Add New Customer</a>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <!-- Filter Form for Status -->
    <form action="{{ route('customer-creation.index') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>
    </form>
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
                    <!-- Toggle Status Button -->
                    <form action="{{ route('customers.toggleStatus', $customer->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                            class="btn btn-sm {{ $customer->status === 'active' ? 'btn-secondary' : 'btn-success' }}">
                            {{ $customer->status === 'active' ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>
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