@extends('layout.app')

@section('content')
<div class="container">
    <h1>Add Price for {{ $product->name }}</h1>
    <form action="{{ route('product-pricing.store', $product->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="customer_type">Product</label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="region_zone">Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="">Select</option>
                <option value="classic">Classic</option>
                <option value="premium">Premium</option>
            </select>
            <div class="invalid-feedback">Please select a region zone.</div>
        </div>
        <div class="form-group">
            <label for="unit_type">Unit Type</label>
            <select name="unit_type" id="unit_type" class="form-control" required>
                <option value="">Selete</option>
                <option value="per_piece">Per Unit</option>
                <option value="per_case">Per Case</option>
            </select>
        </div>
        <div class="form-group">
            <label for="customer_type">Customer Type</label>
            <select name="customer_type" id="customer_type" class="form-control" required>
                <option value="retail">Retail</option>
                <option value="distributor">Distributor</option>
                <option value="wholesaler">Wholesaler</option>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" required min="0">
        </div>
        <button type="submit" class="btn btn-success mt-3">Add Price</button>
    </form>
</div>
@endsection