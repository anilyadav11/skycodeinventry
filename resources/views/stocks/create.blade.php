@extends('layout.app')

@section('content')
<div class="container">
    <h1>Create Beat</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('stocks.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="region_zone_id">Zone</label>
                    <select name="zone_id" id="region-dropdown" class="form-control">
                        <option value="">Select Zone</option>
                        @foreach ($regions as $region)
                        <option value="{{ $region->region_zone }}">{{ $region->region_zone }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <!-- State Dropdown -->
                <div class="mb-3">
                    <label for="state_id" class="form-label">State</label>
                    <select id="state-dropdown" name="state_id" class="form-control" disabled>
                        <option value="">Select State</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- District Dropdown -->
                <div class="mb-3">
                    <label for="district_id" class="form-label">District</label>
                    <select id="district-dropdown" name="district_id" class="form-control" disabled>
                        <option value="">Select District</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Area Dropdown -->
                <div class="mb-3">
                    <label for="area_id" class="form-label">Area</label>
                    <select id="area-dropdown" name="area_id" class="form-control" disabled>
                        <option value="">Select Area</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Product">Product</label>
                    <select name="product_id" id="product-dropdown" class="form-control">
                        <option value="">Select Product</option>
                        @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Product">Unit</label>
                    <select name="unit" id="unit-dropdown" class="form-control">
                        <option value="">Select Unit</option>
                        <option value="per_pece">Per Piece</option>
                        <option value="per_case">Per Case</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Product">Price</label>
                    <input type="text" name="price" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Product">Sept Month Opening Stock</label>
                    <input type="text" name="sept_month_opening_stock" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="quantity">Sept Primary Order</label>
                    <input type="number" name="sept_primary_order" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Product">Sept Month Closing Stock</label>
                    <input type="text" name="sept_month_closing_stock" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="quantity">Sept Secondry Order</label>
                    <input type="number" name="sept_secondary" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Product">Tdp1 Opening Stock</label>
                    <input type="text" name="tdp1_opening_stock" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="quantity">Tdp1 Primary Order</label>
                    <input type="number" name="tdp1_primary_order" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Product">Tdp1 Month Closing Stock</label>
                    <input type="text" name="tdp1_month_closing_stock" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="quantity">Tdp1 Secondry Order</label>
                    <input type="number" name="tdp1_secondary" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Product">Tdp2 Opening Stock</label>
                    <input type="text" name="tdp2_opening_stock" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="quantity">Tdp2 Primary Order</label>
                    <input type="number" name="tdp2_primary_order" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Product">Tdp2 Secondary Stock</label>
                    <input type="text" name="tdp2_secondary" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="quantity">Tdp3 Opening Stock</label>
                    <input type="number" name="tdp3_opening_stock" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Product">Tdp3 Primary Order</label>
                    <input type="text" name="tdp3_primary_order" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="quantity">Tdp3 Month Closing Stock</label>
                    <input type="number" name="tdp3_month_closing_stock" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="quantity">Tdp3 Secondry Stock</label>
                    <input type="number" name="tdp3_secondary" class="form-control" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>
@endsection