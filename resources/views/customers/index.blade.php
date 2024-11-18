@extends('layout.app')

@section('content')
<div class="container">
    <h1>Customers Type</h1>
    <a href="{{ route('customers.create') }}" class="btn btn-primary">Add New Customer</a>
    <form action="{{ route('customers.index') }}" method="GET" class="mb-3">
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
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->customer_type }}</td>
                <td>
                    <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection