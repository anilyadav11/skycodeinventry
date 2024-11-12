@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Edit Customer</h1>

        <form action="{{ route('customer-creation.update', $customer) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="region_zone_id" class="form-label">Region Zone</label>
                <select name="region_zone_id" id="region_zone_id" class="form-control">
                    <!-- Populate options dynamically and mark the selected one -->
                    <option value="1" {{ $customer->region_zone_id == 1 ? 'selected' : '' }}>Region 1</option>
                    <!-- Add more options here -->
                </select>
            </div>

            <div class="mb-3">
                <label for="state_id" class="form-label">State</label>
                <select name="state_id" id="state_id" class="form-control">
                    <!-- Populate options dynamically and mark the selected one -->
                    <option value="1" {{ $customer->state_id == 1 ? 'selected' : '' }}>State 1</option>
                    <!-- Add more options here -->
                </select>
            </div>

            <div class="mb-3">
                <label for="district_id" class="form-label">District</label>
                <select name="district_id" id="district_id" class="form-control">
                    <!-- Populate options dynamically and mark the selected one -->
                    <option value="1" {{ $customer->district_id == 1 ? 'selected' : '' }}>District 1</option>
                    <!-- Add more options here -->
                </select>
            </div>

            <div class="mb-3">
                <label for="area_id" class="form-label">Area</label>
                <select name="area_id" id="area_id" class="form-control">
                    <!-- Populate options dynamically and mark the selected one -->
                    <option value="1" {{ $customer->area_id == 1 ? 'selected' : '' }}>Area 1</option>
                    <!-- Add more options here -->
                </select>
            </div>

            <div class="mb-3">
                <label for="customer_type" class="form-label">Customer Type</label>
                <select name="customer_type" id="customer_type" class="form-control">
                    <option value="Super Stockist" {{ $customer->customer_type == 'Super Stockist' ? 'selected' : '' }}>
                        Super Stockist</option>
                    <option value="Distributor" {{ $customer->customer_type == 'Distributor' ? 'selected' : '' }}>
                        Distributor</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="supplier" class="form-label">Supplier</label>
                <input type="text" name="supplier" id="supplier" class="form-control" value="{{ $customer->supplier }}">
            </div>

            <div class="mb-3">
                <label for="customer_name" class="form-label">Customer Name</label>
                <input type="text" name="customer_name" id="customer_name" class="form-control"
                    value="{{ $customer->customer_name }}" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $customer->address }}">
            </div>

            <div class="mb-3">
                <label for="owner_name" class="form-label">Owner Name</label>
                <input type="text" name="owner_name" id="owner_name" class="form-control"
                    value="{{ $customer->owner_name }}">
            </div>

            <div class="mb-3">
                <label for="phone_no" class="form-label">Phone No</label>
                <input type="text" name="phone_no" id="phone_no" class="form-control"
                    value="{{ $customer->phone_no }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $customer->email }}">
            </div>

            <div class="mb-3">
                <label for="GST" class="form-label">GST</label>
                <input type="text" name="GST" id="GST" class="form-control" value="{{ $customer->GST }}">
            </div>

            <div class="mb-3">
                <label for="PAN" class="form-label">PAN</label>
                <input type="text" name="PAN" id="PAN" class="form-control" value="{{ $customer->PAN }}">
            </div>

            <div class="mb-3">
                <label for="beat_10" class="form-label">Beat 10</label>
                <input type="text" name="beat_10" id="beat_10" class="form-control"
                    value="{{ $customer->beat_10 }}">
            </div>

            <div class="mb-3">
                <label for="beat_11" class="form-label">Beat 11</label>
                <input type="text" name="beat_11" id="beat_11" class="form-control"
                    value="{{ $customer->beat_11 }}">
            </div>

            <div class="mb-3">
                <label for="beat_12" class="form-label">Beat 12</label>
                <input type="text" name="beat_12" id="beat_12" class="form-control"
                    value="{{ $customer->beat_12 }}">
            </div>

            <div class="mb-3">
                <label for="rsm" class="form-label">RSM</label>
                <input type="text" name="rsm" id="rsm" class="form-control" value="{{ $customer->rsm }}">
            </div>

            <div class="mb-3">
                <label for="asm" class="form-label">ASM</label>
                <input type="text" name="asm" id="asm" class="form-control" value="{{ $customer->asm }}">
            </div>

            <div class="mb-3">
                <label for="ase" class="form-label">ASE</label>
                <input type="text" name="ase" id="ase" class="form-control" value="{{ $customer->ase }}">
            </div>

            <div class="mb-3">
                <label for="so" class="form-label">SO</label>
                <input type="text" name="so" id="so" class="form-control" value="{{ $customer->so }}">
            </div>

            <div class="mb-3">
                <label for="sr" class="form-label">SR</label>
                <input type="text" name="sr" id="sr" class="form-control" value="{{ $customer->sr }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
