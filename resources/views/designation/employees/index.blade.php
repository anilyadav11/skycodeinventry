<!-- resources/views/employees/index.blade.php -->
@extends('layout.app')

@section('title', 'Employee List')

@section('content')
    <div class="container mt-4">
        <h2>Employee List</h2>
        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Add New Employee</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Designation</th>
                    <th>Emp ID</th>
                    <th>Salary</th>
                    <th>DOJ</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->designation }}</td>
                        <td>{{ $employee->empid }}</td>
                        <td>{{ $employee->salary }}</td>
                        <td>{{ $employee->doj }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
