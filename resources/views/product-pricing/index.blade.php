@extends('layout.app')

@section('content')
<div class="container">

    <a href="{{ route('product-pricing.create') }}" class="btn btn-primary">Add Price</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Product</th>
                <th>Type</th>
                <th>Unit Type</th>
                <th>Customer Type</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prices as $price)
            <tr>
                <td>{{ $price->product->name }}</td>
                <td>{{ $price->type }}</td>
                <td>{{ $price->unit_type }}</td>
                <td>{{ $price->customer_type }}</td>
                <td>{{ $price->price }}</td>
                <td>
                    <a href="{{ route('product-pricing.edit', $price->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('product-pricing.destroy', $price->id) }}" method="POST" style="display:inline;"
                        onsubmit="return confirmDelete(this)">
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