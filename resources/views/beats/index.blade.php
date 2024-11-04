@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Customer List</h1>
        <a href="{{ route('beats.create') }}" class="btn btn-primary">Add Customer</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Customer Type</th>
                    <th>Region</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($beats as $beat)
                    <tr>
                        <td>{{ $beat->customer_name }}</td>
                        <td>{{ $beat->customer_type }}</td>
                        <td>{{ $beat->region_zone_id }}</td>
                        <td>{{ $beat->state_id }}</td>
                        <td>{{ $beat->district_id }}</td>
                        <td>
                            <a href="{{ route('beats.show', $beat->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('beats.edit', $beat->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('beats.destroy', $beat->id) }}" method="POST" style="display:inline;">
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
