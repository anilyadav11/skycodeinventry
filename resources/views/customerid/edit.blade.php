@extends('layout.app')

@section('content')
<div class="container">
    <h1>Edit Customer</h1>

    <form action="{{ route('customer-creation.update',  $customer->id)}}" method="POST">
        @csrf
        @method('PUT')

        <!-- Region Dropdown -->
        <div class="mb-3">
            <label for="region_zone_id" class="form-label">Region Zone</label>
            <select class="form-control" name="region_id" id="region-dropdown" required>
                <option value="">Select Region Zone</option>
                @foreach ($regions as $region)
                <option value="{{ $region->region_zone }}" {{ old('region_zone', $customer->region_zone_id) == $region->region_zone ? 'selected' : '' }}>
                    {{ $region->region_zone }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- State Dropdown -->
        <div class="mb-3">
            <label for="region_zone_id" class="form-label">State</label>
            <select id="state-dropdown" name="state_id" class="form-control" {{ $customer->region_id ? '' : 'disabled' }}>
                <option value="">Select State</option>
                @foreach ($states as $state)
                <option value="{{ $state->id }}" {{ old('state_id', $customer->state_id) == $state->id ? 'selected' : '' }}>
                    {{ $state->state }}
                </option>
                @endforeach
            </select>

        </div>

        <!-- District Dropdown -->
        <div class="mb-3">
            <label for="region_zone_id" class="form-label">District</label>
            <select id="district-dropdown" name="district_id" class="form-control" {{ $customer->state_id ? '' : 'disabled' }}>
                <option value="">Select District</option>
                @foreach ($districts as $district)
                <option value="{{ $district->id }}" {{ old('district_id', $customer->district_id) == $district->id ? 'selected' : '' }}>
                    {{ $district->district }}
                </option>
                @endforeach
            </select>


        </div>

        <!-- Area Dropdown -->
        <div class="mb-3">
            <label for="region_zone_id" class="form-label">Area</label>
            <select id="area-dropdown" name="area_id" class="form-control" {{ $customer->district_id ? '' : 'disabled' }}>
                <option value="">Select Area</option>
                @foreach ($areas as $area)
                <option value="{{ $area->id }}" {{ old('area_id', $customer->area_id) == $area->id ? 'selected' : '' }}>
                    {{ $area->area }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="customer_type" class="form-label">Customer Type</label>
            <select name="customer_type" id="customer_type" class="form-control">
                <option value="Super Stockist" {{ old('customer_type', $customer->customer_type) == 'Super Stockist' ? 'selected' : '' }}>Super Stockist</option>
                <option value="Distributor" {{ old('customer_type', $customer->customer_type) == 'Distributor' ? 'selected' : '' }}>Distributor</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="supplier" class="form-label">Supplier</label>
            <input type="text" name="supplier" id="supplier" class="form-control" value="{{ old('supplier', $customer->supplier) }}">
        </div>

        <div class="mb-3">
            <label for="customer_name" class="form-label">Customer Name</label>
            <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{ old('customer_name', $customer->customer_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $customer->address) }}">
        </div>

        <div class="mb-3">
            <label for="owner_name" class="form-label">Owner Name</label>
            <input type="text" name="owner_name" id="owner_name" class="form-control" value="{{ old('owner_name', $customer->owner_name) }}">
        </div>

        <div class="mb-3">
            <label for="phone_no" class="form-label">Phone No</label>
            <input type="text" name="phone_no" id="phone_no" class="form-control" value="{{ old('phone_no', $customer->phone_no) }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $customer->email) }}">
        </div>

        <div class="mb-3">
            <label for="GST" class="form-label">GST</label>
            <input type="text" name="GST" id="GST" class="form-control" value="{{ old('GST', $customer->GST) }}">
        </div>

        <div class="mb-3">
            <label for="PAN" class="form-label">PAN</label>
            <input type="text" name="PAN" id="PAN" class="form-control" value="{{ old('PAN', $customer->PAN) }}">
        </div>

        <div class="mb-3">
            <label for="beat_10" class="form-label">Beat 10</label>
            <input type="text" name="beat_10" id="beat_10" class="form-control" value="{{ old('beat_10', $customer->beat_10) }}">
        </div>

        <div class="mb-3">
            <label for="beat_11" class="form-label">Beat 11</label>
            <input type="text" name="beat_11" id="beat_11" class="form-control" value="{{ old('beat_11', $customer->beat_11) }}">
        </div>

        <div class="mb-3">
            <label for="beat_12" class="form-label">Beat 12</label>
            <input type="text" name="beat_12" id="beat_12" class="form-control" value="{{ old('beat_12', $customer->beat_12) }}">
        </div>

        <div class="mb-3">
            <label for="rsm" class="form-label">RSM</label>
            <input type="text" name="rsm" id="rsm" class="form-control" value="{{ old('rsm', $customer->rsm) }}">
        </div>

        <div class="mb-3">
            <label for="asm" class="form-label">ASM</label>
            <input type="text" name="asm" id="asm" class="form-control" value="{{ old('asm', $customer->asm) }}">
        </div>

        <div class="mb-3">
            <label for="ase" class="form-label">ASE</label>
            <input type="text" name="ase" id="ase" class="form-control" value="{{ old('ase', $customer->ase) }}">
        </div>

        <div class="mb-3">
            <label for="so" class="form-label">SO</label>
            <input type="text" name="so" id="so" class="form-control" value="{{ old('so', $customer->so) }}">
        </div>

        <div class="mb-3">
            <label for="sr" class="form-label">SR</label>
            <input type="text" name="sr" id="sr" class="form-control" value="{{ old('sr', $customer->sr) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection