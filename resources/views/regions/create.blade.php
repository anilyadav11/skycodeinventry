<!-- resources/views/regions/create.blade.php -->

@extends('layout.app')
@section('title', 'Create Sales Regions')

@section('content')
    <div class="container">
        <h2 class="my-4">Create New Region</h2>
        <form action="{{ route('regions.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf

            <div class="form-group">
                <label for="region_zone">Region Zone:</label>
                <select name="region_zone" id="region_zone" class="form-control" required>
                    <option value="">Select Zone</option>
                    <option value="North">North</option>
                    <option value="East">East</option>
                    <option value="West">West</option>
                    <option value="South">South</option>
                </select>
                <div class="invalid-feedback">Please select a region zone.</div>
            </div>

            <!-- State Dropdown -->
            <div class="form-group">
                <label for="state">State:</label>
                <select name="state" id="state" class="form-control" required>
                    <option value="">Select State</option>
                </select>
                <div class="invalid-feedback">Please select a state.</div>
            </div>
            <script>
                function initialize() {
                    const input = document.createElement('input'); // Create an invisible input for Places service
                    const autocompleteService = new google.maps.places.AutocompleteService();

                    const stateSelect = document.getElementById('state');

                    // Create the 'select' dropdown options for the Indian states
                    autocompleteService.getPlacePredictions({
                            input: 'India', // Use 'India' to restrict to Indian regions
                            types: ['(regions)'],
                            componentRestrictions: {
                                country: 'IN'
                            }
                        },
                        function(predictions, status) {
                            if (status === google.maps.places.PlacesServiceStatus.OK && predictions) {
                                // Loop through the predictions (states in India)
                                predictions.forEach(function(prediction) {
                                    // Add each state as an option to the dropdown
                                    const option = document.createElement('option');
                                    option.value = prediction.description;
                                    option.textContent = prediction.description;
                                    stateSelect.appendChild(option);
                                });
                            } else {
                                console.log('Error fetching predictions:', status);
                            }
                        }
                    );
                }

                // Initialize when the Google Maps API has loaded
                google.maps.event.addDomListener(window, 'load', initialize);
            </script>


            <!-- District Dropdown -->
            <div class="form-group">
                <label for="district">District:</label>
                <select name="district" id="district" class="form-control" required>
                    <option value="">Select District</option>
                </select>
                <div class="invalid-feedback">Please select a district.</div>
            </div>

            <!-- JavaScript to handle dynamic fetching -->
            <script>
                // Store state names and codes
                let stateNames = {};

                // Fetch states based on region
                document.getElementById('region_zone').addEventListener('change', function() {
                    const region = this.value;
                    const stateSelect = document.getElementById('state');
                    const districtSelect = document.getElementById('district');

                    // Clear previous options
                    stateSelect.innerHTML = '<option value="">Select State</option>';
                    districtSelect.innerHTML = '<option value="">Select District</option>';

                    if (region) {
                        fetch(`/region-states?region=${region}`)
                            .then(response => response.json())
                            .then(data => {
                                if (data[region]) {
                                    Object.entries(data[region]).forEach(([stateCode, stateName]) => {
                                        // Store state code and name
                                        stateNames[stateCode] = stateName;
                                        const option = document.createElement('option');
                                        option.value = stateCode; // Use state code as value
                                        option.textContent = stateName; // Display state name
                                        stateSelect.appendChild(option);
                                    });
                                }
                            })
                            .catch(error => console.error('Error fetching states:', error));
                    }
                });

                // Fetch districts based on selected state code
                document.getElementById('state').addEventListener('change', function() {
                    const stateCode = this.value; // Use state code for API call
                    const districtSelect = document.getElementById('district');

                    // Clear previous district options
                    districtSelect.innerHTML = '<option value="">Select District</option>';

                    if (stateCode) {
                        fetch(`/api/districts/${encodeURIComponent(stateCode)}`)
                            .then(response => response.json())
                            .then(data => {
                                if (Array.isArray(data)) {
                                    data.forEach(district => {
                                        const option = document.createElement('option');
                                        option.value = district.code; // Store district code as value
                                        option.textContent = district.name; // Display district name
                                        districtSelect.appendChild(option);
                                    });
                                } else {
                                    console.error('Unexpected response:', data);
                                }
                            })
                            .catch(error => console.error('Error fetching districts:', error));
                    }
                });

                // Fetch selected state name and district name after selection
                document.getElementById('district').addEventListener('change', function() {
                    const stateCode = document.getElementById('state').value;
                    const districtCode = this.value;

                    if (stateCode && districtCode) {
                        const stateName = stateNames[stateCode]; // Get the state name from the stored object

                        // Fetch the district name based on district code
                        fetch(`/api/districts/${encodeURIComponent(stateCode)}`)
                            .then(response => response.json())
                            .then(data => {
                                const district = data.find(d => d.code === districtCode);
                                if (district) {
                                    const districtName = district.name;
                                    console.log('Selected State:', stateName);
                                    console.log('Selected District:', districtName);
                                } else {
                                    console.error('District not found');
                                }
                            })
                            .catch(error => console.error('Error fetching district details:', error));
                    }
                });
            </script>



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
                <input type="text" name="latitude" id="latitude" class="form-control" placeholder="Enter Latitude"
                    readonly>
            </div>

            <div class="form-group">
                <label for="longitude">Longitude:</label>
                <input type="text" name="longitude" id="longitude" class="form-control" placeholder="Enter Longitude"
                    readonly>
            </div>
            <script>
                window.onload = function() {
                    initAutocomplete();
                };

                function initAutocomplete() {
                    const input = document.getElementById('area');
                    const options = {
                        types: ['(regions)'],
                        componentRestrictions: {
                            country: 'IN'
                        }
                    };

                    const autocomplete = new google.maps.places.Autocomplete(input, options);

                    autocomplete.addListener('place_changed', function() {
                        const place = autocomplete.getPlace();
                        if (!place.geometry) {
                            return;
                        }

                        const lat = place.geometry.location.lat();
                        const lng = place.geometry.location.lng();

                        document.getElementById('latitude').value = lat;
                        document.getElementById('longitude').value = lng;
                    });
                }
            </script>


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

    <!-- JavaScript to fetch states based on region -->


@endsection
