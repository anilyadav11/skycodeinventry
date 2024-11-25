@extends('layout.app')

@section('content')
<h1>Edit Outlet</h1>
<form action="{{ route('outlets.update', $outlet->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Zone Dropdown -->
    <div class="mb-3">
        <label for="region_zone_id" class="form-label">Region Zone</label>
        <select class="form-control" name="region_id" id="region-dropdown" required>
            <option value="">Select Region Zone</option>
            @foreach ($regions as $region)
            <option value="{{ $region->region_zone }}" {{ old('region_zone', $outlet->region_id) == $region->region_zone ? 'selected' : '' }}>
                {{ $region->region_zone }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="region_zone_id" class="form-label">State</label>
        <select id="state-dropdown" name="state_id" class="form-control" {{ $outlet->region_id ? '' : 'disabled' }}>
            <option value="">Select State</option>
            @foreach ($states as $state)
            <option value="{{ $state->id }}" {{ old('state_id', $outlet->state_id) == $state->id ? 'selected' : '' }}>
                {{ $state->state }}
            </option>
            @endforeach
        </select>

    </div>
    <!-- District Dropdown -->
    <div class="mb-3">
        <label for="District" class="form-label">District</label>
        <select id="district-dropdown" name="district_id" class="form-control" {{ $outlet->state_id ? '' : 'disabled' }}>
            <option value="">Select District</option>
            @foreach ($districts as $district)
            <option value="{{ $district->id }}" {{ old('district_id', $outlet->district_id) == $district->id ? 'selected' : '' }}>
                {{ $district->district }}
            </option>
            @endforeach
        </select>

    </div>


    <!-- Area Dropdown -->
    <div class="mb-3">
        <label for="Area" class="form-label">Area</label>
        <select id="area-dropdown" name="area_id" class="form-control" {{ $outlet->district_id ? '' : 'disabled' }}>
            <option value="">Select Area</option>
            @foreach ($areas as $area)
            <option value="{{ $area->id }}" {{ old('area_id', $outlet->area_id) == $area->id ? 'selected' : '' }}>
                {{ $area->area }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="region_zone_id" class="form-label">User Role</label>
        <select class="form-control" name="user_role" id="user-dropdown" required>
            <option value="">Select User Role</option>
            @foreach ($user_role as $user_role)
            <option value="{{ $user_role->id }}" {{ old('role', $outlet->user_role) == $user_role->id ? 'selected' : '' }}>
                {{ $user_role->role }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="region_zone_id" class="form-label">Employee Name</label>
        <select class="form-control" name="user_role" id="user-dropdown" required>
            <option value="">Select Employee Name</option>
            @foreach ($emoloyee as $emoloyee)
            <option value="{{ $emoloyee->id }}" {{ old('employee_name', $outlet->emp_name) == $emoloyee->id ? 'selected' : '' }}>
                {{ $emoloyee->employee_name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="region_zone_id" class="form-label">Distributors</label>
        <select class="form-control" name="user_role" id="user-dropdown" required>
            <option value="">Select Distributors</option>
            @foreach ($custoner as $custoner)
            <option value="{{ $custoner->id }}" {{ old('customer_name', $outlet->distributor_name) == $custoner->id ? 'selected' : '' }}>
                {{ $custoner->customer_name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="region_zone_id" class="form-label">Beat</label>
        <select class="form-control" name="user_role" id="user-dropdown" required>
            <option value="">Select Beat</option>
            @foreach ($beat as $beat)
            <option value="{{ $beat->id }}" {{ old('beat_1', $outlet->beat_name) == $beat->id ? 'selected' : '' }}>
                {{ $beat->beat_1 }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="region_zone_id" class="form-label">Outlet Type</label>
        <select class="form-control" name="user_role" id="user-dropdown" required>
            <option value="">Select Outlet Type</option>
            @foreach ($outlettype as $outlettype)
            <option value="{{ $outlettype->id }}" {{ old('outlate_name', $outlet->outlate_type) == $outlettype->id ? 'selected' : '' }}>
                {{ $outlettype->outlate_name }}
            </option>
            @endforeach
        </select>
    </div>
    <!-- Repeat for other dropdowns and fields -->
    <div class="form-group">
        <label for="outlate_name">Outlet Name</label>
        <input type="text" name="outlate_name" class="form-control @error('outlate_name') is-invalid @enderror"
            value="{{ old('outlate_name', $outlet->outlate_name) }}">
        @error('outlate_name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <!-- Example for Outlet Address -->
    <div class="form-group">
        <label for="outlate_address">Outlet Address</label>
        <input type="text" name="outlate_address" class="form-control @error('outlate_address') is-invalid @enderror"
            value="{{ old('outlate_address', $outlet->outlate_address) }}">
        @error('outlate_address')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="outlate_address">Outlet Person Name</label>
        <input type="text" name="outlate_contact_person_name" class="form-control @error('outlate_contact_person_name') is-invalid @enderror"
            value="{{ old('outlate_contact_person_name', $outlet->outlate_contact_person_name) }}">
        @error('outlate_contact_person_name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="outlate_address">Outlet Person Number</label>
        <input type="text" name="outlate_contact_person_number" class="form-control @error('outlate_contact_person_number') is-invalid @enderror"
            value="{{ old('outlate_contact_person_number', $outlet->outlate_contact_person_number) }}">
        @error('outlate_contact_person_number')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="outlate_address">Date Of Deactivation</label>
        <input type="date" name="dat_of_deactivation" class="form-control @error('dat_of_deactivation') is-invalid @enderror"
            value="{{ old('dat_of_deactivation', $outlet->dat_of_deactivation) }}">
        @error('dat_of_deactivation')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <!-- Add other input fields and dropdowns here with pre-populated data -->

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection