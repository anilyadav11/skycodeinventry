@extends('layout.app')

@section('content')
<div class="container">
    <h2>Outlet List</h2>
    <a href="{{ route('outlets.create') }}" class="btn btn-primary mb-3">Add Outlet</a>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif



    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date Of Joine</th>
                <th>Name</th>
                <th>Employee Name</th>
                <th>Outlet Name</th>
                <th>Outlet Type</th>
                <th>Outlet Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($outlets as $outlets)
            <tr>
                <td>{{ $outlets->doj }}</td>
                <td>{{ $outlets->emp_name }}</td>
                <td>{{ $outlets->outlate_name }}</td>
                <td>{{ $outlets->outlate_type }}</td>
                <td>{{ $outlets->outlate_address }}</td>

                <td>
                    <a href="{{ route('outlets.edit', $outlets->id) }}" class="btn btn-warning btn-sm">Edit</a>



                    <!-- Delete Button -->
                    <form action="{{ route('outlets.destroy', $outlets->id) }}" method="POST"
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