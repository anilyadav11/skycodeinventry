@extends('layout.app')

@section('content')
    <div class="container">
        <h2>Edit Employee</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- User Code (Disabled, can't edit) -->
            <div class="mb-3">
                <label for="user_code" class="form-label">User Code</label>
                <input type="text" class="form-control" name="user_code" id="user_code" value="{{ $employee->user_code }}"
                    disabled>
            </div>

            <!-- Employee Name -->
            <div class="mb-3">
                <label for="employee_name" class="form-label">Employee Name</label>
                <input type="text" class="form-control" name="employee_name" id="employee_name"
                    value="{{ old('employee_name', $employee->employee_name) }}" required>
            </div>

            <!-- User Role -->
            <div class="mb-3">
                <label for="user_role_id" class="form-label">User Role</label>
                <select class="form-control" name="user_role_id" id="user_role_id" required>
                    <option value="">Select Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $employee->user_role_id == $role->id ? 'selected' : '' }}>
                            {{ $role->role }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Phone No -->
            <div class="mb-3">
                <label for="phone_no" class="form-label">Phone No</label>
                <input type="text" class="form-control" name="phone_no" id="phone_no"
                    value="{{ old('phone_no', $employee->phone_no) }}" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email"
                    value="{{ old('email', $employee->email) }}" required>
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" name="address" id="address" rows="2">{{ old('address', $employee->address) }}</textarea>
            </div>
            <!-- Region Zone Dropdown -->
            <div class="mb-3">
                <label for="region_zone_id" class="form-label">Region Zone</label>
                <select class="form-control" name="region_id" id="region_zone_id" required>
                    <option value="">Select Region Zone</option>
                    @foreach ($regions as $region)
                        <option value="{{ $region->region_zone }}"
                            {{ old('region_id', $employee->region_id) == $region->region_zone ? 'selected' : '' }}>
                            {{ $region->region_zone }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- State Dropdown -->
            <div class="mb-3">
                <label for="state_id" class="form-label">State</label>
                <select class="form-control" name="state_id" id="state_id" required>
                    {{-- <option value="">Select State</option> --}}
                    @foreach ($states as $state)
                        <option value="{{ $state->state }}"
                            {{ old('state_id', $employee->state_id) == $state->state ? 'selected' : '' }}>
                            {{ $state->state }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- District Dropdown -->
            <div class="mb-3">
                <label for="district_id" class="form-label">District</label>
                <select class="form-control" name="district_id" id="district_id" required>
                    {{-- <option value="">Select District</option> --}}
                    @foreach ($districts as $district)
                        <option value="{{ $district->district }}"
                            {{ old('district_id', $employee->district_id) == $district->district ? 'selected' : '' }}>
                            {{ $district->district }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Area Dropdown -->
            <div class="mb-3">
                <label for="area_id" class="form-label">Area</label>
                <select class="form-control" name="area_id" id="area_id" required>
                    {{-- <option value="">Select Area</option> --}}
                    @foreach ($areas as $area)
                        <option value="{{ $area->area }}"
                            {{ old('area_id', $employee->area_id) == $area->area ? 'selected' : '' }}>
                            {{ $area->area }}
                        </option>
                    @endforeach
                </select>
            </div>


            <!-- Beats -->
            <!-- Multi-Beat Selection with Checkboxes -->
            <div class="mb-3">
                <label for="beats" class="form-label">Beats</label>
                <div class="form-check-group">
                    <div class="row">
                        @foreach ($beats as $beat)
                            @foreach (range(1, 12) as $index)
                                @php
                                    $beat_column = 'beat_' . $index;
                                @endphp
                                @if ($beat->$beat_column)
                                    <!-- Responsive column setup -->
                                    <div class="col-6 col-md-4 col-lg-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="beats[]"
                                                id="beat_{{ $loop->parent->index }}_{{ $loop->index }}"
                                                value="{{ $beat->$beat_column }}"
                                                {{ in_array($beat->$beat_column, old('beats', $employee->beats ?? [])) ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="beat_{{ $loop->parent->index }}_{{ $loop->index }}">
                                                {{ $beat->$beat_column }}
                                            </label>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="beats" class="form-label">Beats</label>
                <div class="form-check-group">
                    <div class="row" id="beats-container">
                        <!-- Dynamically populated beats will go here -->

                    </div>
                </div>
            </div>

            <!-- Distributors (Multi-Select with Checkboxes) -->

            <div class="mb-3">
                <label for="distributors" class="form-label">Distributors</label>
                <div class="form-check-group">
                    <div class="row">
                        @foreach ($distributors as $distributor)
                            <div class="col-6 col-md-4 col-lg-2">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="distributors[]"
                                        id="distributor_{{ $distributor->id }}" value="{{ $distributor->id }}"
                                        {{ in_array($distributor->id, old('distributors', is_array($employee->distributors) ? $employee->distributors : json_decode($employee->distributors, true) ?? [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="distributor_{{ $distributor->id }}">
                                        {{ $distributor->customer_name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Super Stockists (Multi-Select with Checkboxes) -->
            <div class="mb-3">
                <label for="super_stockists" class="form-label">Super Stockists</label>
                <div class="form-check-group">
                    <div class="row">
                        @foreach ($superStockists as $superStockist)
                            <div class="col-6 col-md-4 col-lg-2">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="super_stockists[]"
                                        id="super_stockist_{{ $superStockist->id }}" value="{{ $superStockist->id }}"
                                        {{ in_array($superStockist->id, old('super_stockists', is_array($employee->super_stockists) ? $employee->super_stockists : json_decode($employee->super_stockists, true) ?? [])) ? 'checked' : '' }}>
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
                <input type="text" class="form-control" name="emp_code" id="emp_code"
                    value="{{ old('emp_code', $employee->emp_code) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Employee</button>
        </form>
    </div>
@endsection
