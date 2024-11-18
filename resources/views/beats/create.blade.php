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

    <form action="{{ route('beats.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="region_zone_id">Zone</label>
            <select name="region_zone_id" id="region-dropdown" class="form-control">
                <option value="">Select Zone</option>
                @foreach ($regions as $region)
                <option value="{{ $region->region_zone }}">{{ $region->region_zone }}</option>
                @endforeach
            </select>
        </div>

        <!-- State Dropdown -->

        <div class="mb-3">
            <label for="state_id" class="form-label">State</label>
            <select id="state-dropdown" name="state_id" class="form-control" disabled>
                <option value="">Select State</option>
                <!-- States will be loaded dynamically based on selected country -->
            </select>
        </div>
        <!-- District Dropdown -->

        <div class="mb-3">
            <label for="district_id" class="form-label">District</label>
            <select id="district-dropdown" name="district_id" class="form-control" disabled>
                <option value="">Select District</option>
                <!-- Districts will be loaded dynamically based on selected state -->
            </select>
        </div>


        <div class="mb-3">
            <label for="area_id" class="form-label">Area</label>
            <select id="area-dropdown" name="area_id" class="form-control" disabled>
                <option value="">Select Area</option>
                <!-- Areas will be loaded dynamically based on selected district -->
            </select>
        </div>

        <!-- Beat fields -->
        @for ($i = 1; $i <= 12; $i++)
            <div class="form-group">
            <label for="beat_{{ $i }}">Beat {{ $i }}</label>
            <input type="text" name="beat_{{ $i }}" id="beat_{{ $i }}"
                class="form-control">
</div>
@endfor

<div class="form-group">
    <label for="emp_role_id">EMP Role</label>
    <select name="emp_role_id" id="emp_role_id" class="form-control">
        @foreach ($roles as $role)
        <option value="{{ $role->id }}">{{ $role->role }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="customer_type">Customer Type</label>
    <select name="customer_type" id="customer_type" class="form-control">
        @foreach ($types as $type)
        <option value="{{ $type->id }}">{{ $type->customer_type }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="customer_name">Customer Name</label>
    <select name="customer_name" id="customer_name" class="form-control">

    </select>
</div>

<button type="submit" class="btn btn-primary mt-3">Save Customer</button>
</form>
</div>
@endsection