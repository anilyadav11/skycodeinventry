@extends('layout.app')

@section('content')
<div class="container">
    <h2>Create Employee</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf

        <!-- User Code -->
        <div class="mb-3">
            <label for="user_code" class="form-label">User Code</label>
            <input type="text" class="form-control" name="user_code" id="user_code" value="Auto-generated" disabled>
        </div>

        <!-- Employee Name -->
        <div class="mb-3">
            <label for="employee_name" class="form-label">Employee Name</label>
            <input type="text" class="form-control" name="employee_name" id="employee_name" required>
        </div>

        <!-- User Role -->
        <div class="mb-3">
            <label for="user_role_id" class="form-label">User Role</label>
            <select class="form-control" name="user_role_id" id="user_role_id" required>
                <option value="">Select Role</option>
                @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->role }}</option>
                @endforeach
            </select>
        </div>

        <!-- Phone No -->
        <div class="mb-3">
            <label for="phone_no" class="form-label">Phone No</label>
            <input type="text" class="form-control" name="phone_no" id="phone_no" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <!-- Address -->

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" name="address" id="address" rows="2"></textarea>
        </div>

        <!-- Region Dropdown -->
        <div class="mb-3">
            <label for="region_zone_id" class="form-label">Region Zone</label>
            <select class="form-control" name="region_id" id="region-dropdown" required>
                <option value="">Select Region Zone</option>
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
        <!-- <div class="mb-3">
            <label for="rsm" class="form-label">Respective RSM</label>
            <select class="form-control" name="rsm_id" id="rsm">
                <option value="">Select RSM</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="asm" class="form-label">Respective ASM</label>
            <select class="form-control" name="asm_id" id="asm">
                <option value="">Select ASM</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="ase" class="form-label">Respective ASE</label>
            <select class="form-control" name="ase_id" id="ase">
                <option value="">Select ASE</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="so" class="form-label">Respective SO</label>
            <select class="form-control" name="so_id" id="so">
                <option value="">Select SO</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="se" class="form-label">Respective SE</label>
            <select class="form-control" name="se_id" id="se">
                <option value="">Select SE</option>
            </select>
        </div> -->

        <!-- Beats (Multiple Checkboxes) -->
        <div class="mb-3">
            <label for="beats" class="form-label">Beats</label>
            <div class="form-check-group">
                <div class="row" id="beats-container">
                    <!-- Dynamically populated beats will go here -->
                </div>
            </div>
        </div>

        <!-- Distributors (Multiple Checkboxes) -->
        <div class="mb-3">
            <label for="distributors" class="form-label">Distributors</label>
            <div class="form-check-group">
                <div class="row">
                    @foreach ($distributors as $distributor)
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="distributors[]"
                                id="distributor_{{ $distributor->id }}" value="{{ $distributor->id }}">
                            <label class="form-check-label" for="distributor_{{ $distributor->id }}">
                                {{ $distributor->customer_name }}
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Super Stockists (Multiple Checkboxes) -->
        <div class="mb-3">
            <label for="super_stockists" class="form-label">Super Stockists</label>
            <div class="form-check-group">
                <div class="row">
                    @foreach ($superStockists as $superStockist)
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="super_stockists[]"
                                id="super_stockist_{{ $superStockist->id }}" value="{{ $superStockist->id }}">
                            <label class="form-check-label" for="super_stockist_{{ $superStockist->id }}">
                                {{ $superStockist->customer_name }}
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


        <!-- Employee Code -->
        <div class="mb-3">
            <label for="emp_code" class="form-label">Employee Code</label>
            <input type="text" class="form-control" name="emp_code" id="emp_code" required>
        </div>
        <input type="hidden" id="hidden_district" name="district_name" value="">
        <input type="hidden" id="hidden_area" name="area_name" value="">

        <button type="submit" class="btn btn-primary">Create Employee</button>
    </form>
</div>
@endsection