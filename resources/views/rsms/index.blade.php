<!-- resources/views/rsms/index.blade.php -->

@extends('layout.app')
@section('title', 'RSM List')

@section('content')
    <div class="m-4">
        <h2 class="my-4">RSM List</h2>
        <!-- Display Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display Error Message -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ route('rsms.create') }}" class="btn btn-primary mb-3">Create RSM</a>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>User ID</th>
                    <th>Employee Name</th>
                    <th>Phone No</th>
                    <th>Region</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rsms as $rsm)
                    <tr>
                        <td>{{ $rsm->user_id }}</td>
                        <td>{{ $rsm->emp_name }}</td>
                        <td>{{ $rsm->phone_no }}</td>
                        <td>{{ $rsm->region }}</td>
                        <td>
                            <a href="{{ route('rsms.show', $rsm) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('rsms.edit', $rsm) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('rsms.destroy', $rsm) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
