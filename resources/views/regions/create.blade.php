<!-- resources/views/regions/create.blade.php -->

@extends('layout.app')
@section('title', 'Create Sales Regions')

@section('content')
    <div class="container">
        <h2 class="my-4">Create New Region</h2>
        <form action="{{ route('regions.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf

            <!-- Region Zone Dropdown -->
            <div class="form-group">
                <label for="region_zone">Region Zone:</label>
                <select name="region_zone" id="region_zone" class="form-control" required>
                    <option value="">Select Zone</option>
                    <option value="East">East</option>
                    <option value="West">West</option>
                    <option value="South">South</option>
                    <option value="North">North</option>
                </select>
                <div class="invalid-feedback">Please select a region zone.</div>
            </div>

            <!-- State Dropdown -->
            <div class="form-group">
                <label for="state">State:</label>
                <select id="state" name="state" class="form-control" required>
                    <option value="">Select State</option>
                </select>
                <div class="invalid-feedback">Please select a state.</div>
            </div>
            <div class="form-group">
                <label for="area">State:</label>
                <input type="text" name="state" id="state" class="form-control" placeholder="Enter State">
            </div>


            <div class="form-group">
                <label for="area">District:</label>
                <input type="text" name="district" id="district" class="form-control" placeholder="Enter District">
            </div>

            <!-- Other Inputs -->
            <div class="form-group">
                <label for="area">Area:</label>
                <input type="text" name="area" id="area" class="form-control" placeholder="Enter Area">
            </div>

            <div class="form-group">
                <label for="bzone">BZone:</label>
                <input type="text" name="bzone" id="bzone" class="form-control" placeholder="Enter BZone">
            </div>

            <div class="form-group">
                <label for="latitude">Latitude:</label>
                <input type="text" name="latitude" id="latitude" class="form-control" placeholder="Enter Latitude">
            </div>

            <div class="form-group">
                <label for="longitude">Longitude:</label>
                <input type="text" name="longitude" id="longitude" class="form-control" placeholder="Enter Longitude">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Create</button>
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
