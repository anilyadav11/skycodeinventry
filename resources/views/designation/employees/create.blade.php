<!-- resources/views/employees/create.blade.php -->
@extends('layout.app')

@section('title', 'Add Employee')

@section('content')
    <div class="container mt-4">
        <h2>Add Employee</h2>
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="designation">Designation</label>
                <select name="designation" class="form-control" required>
                    <option value="RSM">RSM</option>
                    <option value="ASM">ASM</option>
                    <option value="ASE">ASE</option>
                    <option value="SO">SO</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="empid">Employee ID</label>
                <input type="text" name="empid" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="salary">Salary</label>
                <input type="number" name="salary" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="doj">Date of Joining</label>
                <input type="date" name="doj" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Add Employee</button>
        </form>
    </div>
@endsection
