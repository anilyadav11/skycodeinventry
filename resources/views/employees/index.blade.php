@extends('layout.app')
@section('title', 'Employees list')

@section('content')
    <div class="container">
        <h1>Employees</h1>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
        <table class="table">
            <thead>
                <tr>
                    <th>User Code</th>
                    <th>EMP Name</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->user_code }}</td>
                        <td>{{ $employee->emp_name }}</td>
                        <td>{{ $employee->userRole->role }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline;">
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
