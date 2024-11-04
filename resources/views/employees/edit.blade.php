@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Edit Employee</h1>
        <form action="{{ route('employees.update', $employee) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>User Code</label>
                <input type="text" name="user_code" class="form-control" value="{{ $employee->user_code }}" required>
            </div>
            <div class="form-group">
                <label>EMP Name</label>
                <input type="text" name="emp_name" class="form-control" value="{{ $employee->emp_name }}" required>
            </div>
            <div class="form-group">
                <label>User Role</label>
                <select name="user_role_id" class="form-control" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $role->id == $employee->user_role_id ? 'selected' : '' }}>
                            {{ $role->role }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Phone No</label>
                <input type="text" name="phone_no" class="form-control" value="{{ $employee->phone_no }}" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $employee->email }}">
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea name="address" class="form-control">{{ $employee->address }}</textarea>
            </div>
            <div class="form-group">
                <label>Region</label>
                <select name="region_id" class="form-control" id="region-select" required>
                    @foreach ($regions as $region)
                        <option value="{{ $region->id }}" {{ $region->id == $employee->region_id ? 'selected' : '' }}>
                            {{ $region->region_zone }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="state">State:</label>
                <input type="text" name="state" class="form-control" id="state" value="{{ $employee->state }}">
            </div>

            <!-- District Dropdown -->
            <div class="form-group">
                <label for="district">District:</label>
                <input type="text" name="district" class="form-control" id="district"
                    value="{{ $employee->district }}">
            </div>
            <div class="form-group">
                <label>Area</label>
                <input type="text" name="area" class="form-control" id="area-input">
            </div>
            <div class="form-group">
                <label>Beat</label>
                <select name="beat" class="form-control">
                    <option value="">Select Beat</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="Beat {{ $i }}" {{ $employee->beat == "Beat {$i}" ? 'selected' : '' }}>
                            Beat {{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label>RSM</label>
                <select name="rsm" class="form-control" id="region-select" required>
                    <option value="">Select RSM</option>
                    @foreach ($employees as $emp)
                        <option value="{{ $emp->rsm }}" {{ $emp->rsm == $employee->rsm ? 'selected' : '' }}>
                            {{ $emp->rsm }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label>ASM</label>
                <input type="text" name="asm" class="form-control" value="{{ $employee->asm }}">
            </div>
            <div class="form-group">
                <label>ASE</label>
                <input type="text" name="ase" class="form-control" value="{{ $employee->ase }}">
            </div>
            <div class="form-group">
                <label>SO</label>
                <input type="text" name="so" class="form-control" value="{{ $employee->so }}">
            </div>
            <div class="form-group">
                <label>SR</label>
                <input type="text" name="sr" class="form-control" value="{{ $employee->sr }}">
            </div>
            <div class="form-group">
                <label>Distributor</label>
                <select name="distributor[]" class="form-control" multiple>
                    <option value="Distributor 1">Distributor 1</option>
                    <option value="Distributor 2">Distributor 2</option>
                    <option value="Distributor 3">Distributor 3</option>
                </select>
            </div>
            <div class="form-group">
                <label>Super Stokiest (SS)</label>
                <select name="super_stokiest[]" class="form-control" multiple>
                    <option value="SS 1">SS 1</option>
                    <option value="SS 2">SS 2</option>
                    <option value="SS 3">SS 3</option>
                </select>
            </div>
            <div class="form-group">
                <label>EMP CODE</label>
                <input type="text" name="emp_code" class="form-control" value="{{ $employee->emp_code }}"
                    placeholder="Editable, Created By HR">
            </div>
            <button type="submit" class="btn btn-success">Update Employee</button>
        </form>
    </div>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stateCodeMap = {}; // Object to map state names to codes

            // Fetch states when the page loads
            fetch('/api/states')
                .then(response => response.json())
                .then(states => {
                    let stateSelect = document.getElementById('state');
                    // Populate the state dropdown
                    Object.entries(states).forEach(([code, name]) => {
                        // Store the state code in the mapping object
                        stateCodeMap[name] = code;

                        let option = document.createElement('option');
                        option.value = name; // Set the state name as the value
                        option.text = name; // Set the state name as the text
                        stateSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching states:', error));

            // Fetch districts based on selected state
            document.getElementById('state').addEventListener('change', function() {
                const stateName = this.value; // Get the selected state name
                const stateCode = stateCodeMap[stateName]; // Convert name to code
                let districtSelect = document.getElementById('district');

                // Clear previous districts
                districtSelect.innerHTML = '<option value="">Select District</option>';

                if (stateCode) {
                    // Fetch districts for the selected state
                    fetch(`/api/districts/${stateCode}`)
                        .then(response => response.json())
                        .then(districts => {
                            districts.forEach(district => {
                                let option = document.createElement('option');
                                option.value = district
                                    .name; // Set the district name as the value
                                option.text = district
                                    .name; // Set the district name as the text
                                districtSelect.appendChild(option);
                            });
                        })
                        .catch(error => console.error('Error fetching districts:', error));
                }
            });
        });
    </script> --}}
@endsection
