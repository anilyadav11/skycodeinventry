@extends('layout.app')

@section('content')
<div class="container">

    <form action="" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="customer_type">Product</label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="unit_type"> Type</label>
            <select name="unit_type" id="unit_type" class="form-control" required>
                <option value="per_piece" {{ $pricing->type == 'classic' ? 'selected' : '' }}>classic</option>
                <option value="per_case" {{ $pricing->type == 'premium' ? 'selected' : '' }}>premium</option>
            </select>
        </div>
        <div class="form-group">
            <label for="unit_type">Unit Type</label>
            <select name="unit_type" id="unit_type" class="form-control" required>
                <option value="per_piece" {{ $pricing->unit_type == 'per_piece' ? 'selected' : '' }}>Per Piece</option>
                <option value="per_case" {{ $pricing->unit_type == 'per_case' ? 'selected' : '' }}>Per Case</option>
            </select>
        </div>
        <div class="form-group">
            <label for="customer_type">Customer Type</label>
            <select name="customer_type" id="customer_type" class="form-control" required>
                <option value="retail" {{ $pricing->customer_type == 'retail' ? 'selected' : '' }}>Retail</option>
                <option value="distributor" {{ $pricing->customer_type == 'distributor' ? 'selected' : '' }}>Distributor</option>
                <option value="wholesaler" {{ $pricing->customer_type == 'wholesaler' ? 'selected' : '' }}>Wholesaler</option>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $pricing->price) }}" required min="0">
        </div>
        <button type="submit" class="btn btn-success mt-3">Update Price</button>
    </form>
</div>
@endsection