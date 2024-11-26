@extends('layout.app')

@section('content')
<div class="container">
    <h1>Stock</h1>
    <a href="{{ route('stocks.create') }}" class="btn btn-primary">Add New Stock</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Zone</th>
                <th>District</th>
                <th>Area</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stocks as $stock)
            <tr>
                <td>{{ $stock->id }}</td>
                <td>{{ $stock->product->name }}</td>
                <td>{{ $stock->quantity }}</td>
                <td>{{ $stock->unit }}</td>
                <td>{{ $stock->total_price }}</td>
                <td>{{ $stock->Zone_id}}</td>
                <td>{{ $stock->state_id}}</td>
                <td>{{ $stock->area_id}}</td>
                <td>
                    <a href="{{ route('customers.show', $stock->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('stocks.edit', $stock->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST"
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