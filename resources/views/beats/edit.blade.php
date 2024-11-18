@extends('layout.app')

@section('content')
<div class="container">
    <h1>Edit Beat</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('beats.update', $beat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Region Dropdown -->
        <div class="mb-3">
            <label for="region_zone_id" class="form-label">Region Zone</label>
            <select class="form-control" name="region_id" id="region-dropdown" required>
                <option value="">Select Region Zone</option>
                @foreach ($regions as $region)
                <option value="{{ $region->region_zone }}" {{ old('region_zone', $beat->region_zone_id) == $region->region_zone ? 'selected' : '' }}>
                    {{ $region->region_zone }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- State Dropdown -->
        <div class="mb-3">
            <label for="region_zone_id" class="form-label">State</label>
            <select id="state-dropdown" name="state_id" class="form-control" {{ $beat->region_id ? '' : 'disabled' }}>
                <option value="">Select State</option>
                @foreach ($states as $state)
                <option value="{{ $state->id }}" {{ old('state_id', $beat->state_id) == $state->id ? 'selected' : '' }}>
                    {{ $state->state }}
                </option>
                @endforeach
            </select>

        </div>

        <!-- District Dropdown -->
        <div class="mb-3">
            <label for="District" class="form-label">District</label>
            <select id="district-dropdown" name="district_id" class="form-control" {{ $beat->state_id ? '' : 'disabled' }}>
                <option value="">Select District</option>
                @foreach ($districts as $district)
                <option value="{{ $district->id }}" {{ old('district_id', $beat->district_id) == $district->id ? 'selected' : '' }}>
                    {{ $district->district }}
                </option>
                @endforeach
            </select>

        </div>


        <!-- Area Dropdown -->
        <div class="mb-3">
            <label for="Area" class="form-label">Area</label>
            <select id="area-dropdown" name="area_id" class="form-control" {{ $beat->district_id ? '' : 'disabled' }}>
                <option value="">Select Area</option>
                @foreach ($areas as $area)
                <option value="{{ $area->id }}" {{ old('area_id', $beat->area_id) == $area->id ? 'selected' : '' }}>
                    {{ $area->area }}
                </option>
                @endforeach
            </select>
        </div>
        <!-- Beat fields -->
        @for ($i = 1; $i <= 12; $i++)
            <div class="form-group">
            <label for="beat_{{ $i }}">Beat {{ $i }}</label>
            <input type="text" name="beat_{{ $i }}" id="beat_{{ $i }}"
                value="{{ $beat->{'beat_' . $i} }}" class="form-control">
</div>
@endfor

<div class="form-group">
    <label for="emp_role_id">EMP Role</label>
    <select name="emp_role_id" id="emp_role_id" class="form-control">
        @foreach ($roles as $role)
        <option value="{{ $role->id }}" @if ($role->id == $beat->emp_role_id) selected @endif>
            {{ $role->role }}
        </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="customer_type">Customer Type</label>
    <select name="customer_type" id="customer_type" class="form-control">
        @foreach ($types as $type)
        <option value="{{ $type->customer_type }}" @if ($type->customer_type == $beat->customer_type) selected @endif>
            {{ $type->customer_type }}
        </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="customer_name">Customer Name</label>
    <input type="text" name="customer_name" id="customer_name" value="{{ $beat->customer_name }}"
        class="form-control">
</div>

<button type="submit" class="btn btn-primary mt-3">Update Beat</button>
</form>
</div>
@endsection