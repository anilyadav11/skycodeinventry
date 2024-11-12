@extends('layout.app')

@section('content')
    <div class="container">
        <h2>Employee List</h2>
        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Add Employee</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Filter Form for Status -->
        <form action="{{ route('employees.index') }}" method="GET" class="mb-3">
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
                    <th>User Code</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->user_code }}</td>
                        <td>{{ $employee->employee_name }}</td>
                        <td>{{ $employee->userRole->role ?? 'N/A' }}</td>
                        <td>{{ $employee->phone_no }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>
                            @if ($employee->status === 'active')
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Toggle Status Button -->
                            <form action="{{ route('employees.toggleStatus', $employee->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="btn btn-sm {{ $employee->status === 'active' ? 'btn-secondary' : 'btn-success' }}">
                                    {{ $employee->status === 'active' ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>

                            <!-- Delete Button -->
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
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
