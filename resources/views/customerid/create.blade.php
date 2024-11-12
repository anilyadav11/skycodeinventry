@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Add New Customer</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('customer-creation.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="region_zone_id" class="form-label">Region Zone</label>
                <select name="region_zone_id" id="region_zone_id" class="form-control">
                    <option value="">Select Zone</option>
                    @foreach ($regions as $region)
                        <option value="{{ $region->region_zone }}">{{ $region->region_zone }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="state_id" class="form-label">State</label>
                <select name="state_id" id="state_id" class="form-control"></select>
            </div>
            <div class="mb-3">
                <label for="district_id" class="form-label">District</label>
                <select name="district_id" id="district_id" class="form-control"></select>
            </div>
            <div class="mb-3">
                <label for="area_id" class="form-label">Area</label>
                <select name="area_id" id="area_id" class="form-control"></select>
            </div>


            <div class="mb-3">
                <label for="customer_type" class="form-label">Customer Type</label>
                <select name="customer_type" id="customer_type" class="form-control">
                    <option value="Super Stockist">Super Stockist</option>
                    <option value="Distributor">Distributor</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="supplier" class="form-label">Supplier</label>
                <input type="text" name="supplier" id="supplier" class="form-control">
            </div>

            <div class="mb-3">
                <label for="customer_name" class="form-label">Customer Name</label>
                <input type="text" name="customer_name" id="customer_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control">
            </div>

            <div class="mb-3">
                <label for="owner_name" class="form-label">Owner Name</label>
                <input type="text" name="owner_name" id="owner_name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="phone_no" class="form-label">Phone No</label>
                <input type="text" name="phone_no" id="phone_no" class="form-control">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>

            <div class="mb-3">
                <label for="GST" class="form-label">GST</label>
                <input type="text" name="GST" id="GST" class="form-control">
            </div>

            <div class="mb-3">
                <label for="PAN" class="form-label">PAN</label>
                <input type="text" name="PAN" id="PAN" class="form-control">
            </div>

            <div class="mb-3">
                <label for="rsm" class="form-label">RSM</label>
                <input type="text" name="rsm" id="rsm" class="form-control">
            </div>

            <div class="mb-3">
                <label for="asm" class="form-label">ASM</label>
                <input type="text" name="asm" id="asm" class="form-control">
            </div>

            <div class="mb-3">
                <label for="ase" class="form-label">ASE</label>
                <input type="text" name="ase" id="ase" class="form-control">
            </div>

            <div class="mb-3">
                <label for="so" class="form-label">SO</label>
                <input type="text" name="so" id="so" class="form-control">
            </div>

            <div class="mb-3">
                <label for="sr" class="form-label">SR</label>
                <input type="text" name="sr" id="sr" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
