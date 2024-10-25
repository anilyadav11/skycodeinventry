{{-- resources/views/regions/partials/form-scripts.blade.php --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Fetch states on page load
        fetchStates();

        // Pre-select state and district if editing
        @if (isset($region))
            setTimeout(function() {
                $('#state').val("{{ $region->state }}").trigger('change');
            }, 500); // Wait for the state dropdown to be populated

            $('#state').change(function() {
                const state = $(this).val();
                if (state) {
                    fetchDistricts(state, "{{ $region->district }}");
                }
            });
        @endif

        // When a state is selected, fetch the districts
        $('#state').change(function() {
            const state = $(this).val();
            if (state) {
                fetchDistricts(state);
            } else {
                $('#district').html('<option value="">Select District</option>');
            }
        });
    });

    // Function to fetch states
    function fetchStates() {
        $.ajax({
            url: "{{ route('regions.fetchStates') }}",
            method: 'GET',
            success: function(data) {
                let options = '<option value="">Select State</option>';
                data.forEach(function(state) {
                    options += `<option value="${state}">${state}</option>`;
                });
                $('#state').html(options);
            },
            error: function() {
                alert('Failed to fetch states');
            }
        });
    }

    // Function to fetch districts based on the selected state
    function fetchDistricts(state, selectedDistrict = null) {
        $.ajax({
            url: "{{ route('regions.fetchDistricts') }}",
            method: 'GET',
            data: {
                state: state
            },
            success: function(data) {
                let options = '<option value="">Select District</option>';
                data.forEach(function(district) {
                    options += `<option value="${district}">${district}</option>`;
                });
                $('#district').html(options);

                // Pre-select district if editing
                if (selectedDistrict) {
                    $('#district').val(selectedDistrict);
                }
            },
            error: function() {
                alert('Failed to fetch districts');
            }
        });
    }
</script>
