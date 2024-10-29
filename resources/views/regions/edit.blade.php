@extends('layout.app')

@section('content')
    <div class="container">
        <h2>Edit Region</h2>

        <form action="{{ route('regions.update', $region->id) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            @method('PUT')

            <!-- Region Zone Dropdown -->
            <div class="form-group">
                <label for="region_zone">Region Zone:</label>
                <select name="region_zone" id="region_zone" class="form-control" required>
                    <option value="">Select Zone</option>
                    <option value="East" {{ $region->region_zone == 'East' ? 'selected' : '' }}>East</option>
                    <option value="West" {{ $region->region_zone == 'West' ? 'selected' : '' }}>West</option>
                    <option value="South" {{ $region->region_zone == 'South' ? 'selected' : '' }}>South</option>
                    <option value="North" {{ $region->region_zone == 'North' ? 'selected' : '' }}>North</option>
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

            <!-- District Dropdown -->
            <div class="form-group">
                <label for="district">District:</label>
                <select id="district" name="district" class="form-control" required>
                    <option value="">Select District</option>
                </select>
                <div class="invalid-feedback">Please select a district.</div>
            </div>

            <!-- Area Input -->
            <div class="form-group">
                <label for="area">Area:</label>
                <input type="text" name="area" id="area" class="form-control"
                    value="{{ old('area', $region->area) }}" placeholder="Enter Area">
            </div>

            <div class="form-group">
                <label for="bzone">BZone:</label>
                <input type="text" name="bzone" id="bzone" class="form-control"
                    value="{{ old('bzone', $region->bzone) }}" placeholder="Enter BZone">
            </div>

            <div class="form-group">
                <label for="latitude">Latitude:</label>
                <input type="text" name="latitude" id="latitude" class="form-control"
                    value="{{ old('latitude', $region->latitude) }}" placeholder="Enter Latitude">
            </div>

            <div class="form-group">
                <label for="longitude">Longitude:</label>
                <input type="text" name="longitude" id="longitude" class="form-control"
                    value="{{ old('longitude', $region->longitude) }}" placeholder="Enter Longitude">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stateCodeMap = {}; // Object to map state names to codes

            // Fetch states when the page loads
            fetch('/api/states')
                .then(response => response.json())
                .then(states => {
                    let stateSelect = document.getElementById('state');
                    // Populate the state dropdown
                    Object.entries(states).forEach(([code, name]) => {
                        stateCodeMap[name] = code;
                        let option = document.createElement('option');
                        option.value = name; // Set the state name as the value
                        option.text = name; // Set the state name as the text
                        stateSelect.appendChild(option);
                    });

                    // Set the selected state based on the current region
                    stateSelect.value = "{{ old('state', $region->state) }}"; // Set the selected state
                    fetchDistricts(stateSelect.value); // Fetch districts for the selected state
                })
                .catch(error => console.error('Error fetching states:', error));

            // Fetch districts based on selected state
            document.getElementById('state').addEventListener('change', function() {
                const stateName = this.value; // Get the selected state name
                const stateCode = stateCodeMap[stateName]; // Convert name to code
                fetchDistricts(stateCode);
            });

            function fetchDistricts(stateCode) {
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
                                option.value = district.name; // Set the district name as the value
                                option.text = district.name; // Set the district name as the text
                                districtSelect.appendChild(option);
                            });

                            // Set the selected district based on the current region
                            districtSelect.value =
                                "{{ old('district', $region->district) }}"; // Set the selected district
                        })
                        .catch(error => console.error('Error fetching districts:', error));
                }
            }
        });
    </script>
@endsection
