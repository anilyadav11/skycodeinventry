@extends('layout.app')

@section('content')
<h1>Create Outlate </h1>
<form action="{{ route('outlets.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="region_zone_id">Zone</label>
        <select name="region_id" id="region-dropdown" class="form-control">
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
    <div class="form-group">
        <label for="region_zone_id">User Role</label>
        <select name="user_role" id="region-dropdown" class="form-control">
            <option value="">Select User Role</option>
            @foreach ($user_role as $user_role)
            <option value="{{ $user_role->id }}">{{ $user_role->role }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="region_zone_id">Employee Name</label>
        <select name="emp_name" id="region-dropdown" class="form-control">
            <option value="">Select Employee</option>
            @foreach ($emoloyee as $emoloyee)
            <option value="{{ $emoloyee->id }}">{{ $emoloyee->employee_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="region_zone_id">Distributors</label>
        <select name="distributor_name" id="region-dropdown" class="form-control">
            <option value="">Select Distributors</option>
            @foreach ($custoner as $custoner)
            <option value="{{ $custoner->id }}">{{ $custoner->customer_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="region_zone_id">Beat</label>
        <select name="beat_name" id="region-dropdown" class="form-control">
            <option value="">Select Beat</option>
            @foreach ($beat as $beat)
            <option value="{{ $beat->id }}">{{ $beat->beat_1 }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="region_zone_id">Outlet Type</label>
        <select name="outlate_type" id="region-dropdown" class="form-control">
            <option value="">Select Outlet Type</option>
            @foreach ($outlettype as $outlettype)
            <option value="{{ $outlettype->id }}">{{ $outlettype->outlate_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="level">Outlet Name</label>
        <input type="text" name="outlate_name" class="form-control @error('outlate_name') is-invalid @enderror">
        @error('outlate_name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="level">Outlet Address</label>
        <input type="text" name="outlate_address" class="form-control @error('outlate_address') is-invalid @enderror">
        @error('outlate_address')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="level">Outlet Person Name</label>
        <input type="text" name="outlate_contact_person_name" class="form-control @error('outlate_contact_person_name') is-invalid @enderror">
        @error('outlate_contact_person_name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="level">Outlet Person Contact</label>
        <input type="text" name="outlate_contact_person_number" class="form-control @error('outlate_contact_person_number') is-invalid @enderror">
        @error('outlate_contact_person_number')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="level">Outlet Activation Date</label>
        <input type="date" name="dat_of_activation" class="form-control @error('dat_of_activation') is-invalid @enderror">
        @error('dat_of_activation')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>




    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection