<!Doctype html>
<html lang="en" data-theme="light">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <meta name="color-scheme" content="dark light">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href={{ asset('css/main.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('css/utilities.css') }}>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href={{ asset('cdn.jsdelivr.net/npm/bootstrap-icons%401.7.2/font/bootstrap-icons.css') }}>
    <script defer="defer" data-domain="webpixels.works" src={{ asset('plausible.io/js/script.js') }}></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places">
    </script>
    <style>
        #location-form {
            width: 100%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
        }

        .form-group {
            margin-bottom: 15px;
        }

        select,
        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        @include('includes.sidebar')
        <div class="flex-lg-1 h-screen overflow-y-lg-auto">
            <nav class="navbar navbar-light position-lg-sticky top-lg-0 d-none d-lg-block overlap-10 flex-none bg-white border-bottom px-0 py-3"
                id="topbar">
                <div class="container-fluid">
                    <form class="form-inline ms-auto me-4 d-none d-md-flex">
                    </form>
                    <div class="navbar-user d-none d-sm-block">
                        <div class="hstack gap-3 ms-4">

                            <div class="dropdown"><a class="d-flex align-items-center" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                    <div>
                                        <div class="avatar avatar-sm  rounded-circle text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                fill="black" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                                <path fill-rule="evenodd"
                                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="d-none d-sm-block ms-3"><span class="h6">{{ $user->name }}</span>
                                    </div>
                                    <div class="d-none d-md-block ms-md-2"><i
                                            class="bi bi-chevron-down text-muted text-xs"></i></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="dropdown-divider"></div><a class="dropdown-item"
                                        href="{{ route('dashboard') }}"><i class="bi bi-house me-3"></i>Home </a><a
                                        class="dropdown-item" href="#"><i class="bi bi-pencil me-3"></i>Edit
                                        profile</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i
                                            class="bi bi-gear me-3"></i>Settings </a><a class="dropdown-item"
                                        href="#"><i class="bi bi-image me-3"></i>Media </a><a
                                        class="dropdown-item" href="#"><i
                                            class="bi bi-box-arrow-up me-3"></i>Share</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i
                                            class="bi bi-person me-3"></i>Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <main class="py-6 bg-surface-secondary">


                @yield('content')
            </main>
        </div>
    </div>


    <script src={{ asset('js/main.js') }}></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // When Region Zone is selected
            $('#region_zone_id').on('change', function() {
                var zoneId = $(this).val();
                $('#state_id').empty().append('<option value="">Select State</option>');
                $('#district_id').empty().append('<option value="">Select District</option>');
                $('#area_id').empty().append('<option value="">Select Area</option>');
                $('#beats-container').empty(); // Clear beats

                if (zoneId) {
                    $.ajax({
                        url: '/get-states/' + zoneId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(key, value) {
                                if ($('#state_id option[value="' + key + '"]').length === 0) {
                                    $('#state_id').append('<option value="' + key + '">' + value + '</option>');
                                }
                            });
                        }
                    });
                }
            });

            // When State is selected
            $('#state_id').on('change', function() {
                var stateName = $(this).find('option:selected').text(); // Get the state name
                $('#district_id').empty().append('<option value="">Select District</option>');
                $('#area_id').empty().append('<option value="">Select Area</option>');
                $('#beats-container').empty(); // Clear beats

                if (stateName) {
                    $.ajax({
                        url: '/get-districts/' + stateName,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(key, value) {
                                if ($('#district_id option[value="' + key + '"]').length === 0) {
                                    $('#district_id').append('<option value="' + key + '">' + value + '</option>');
                                }
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Error fetching districts: ', textStatus, errorThrown);
                        }
                    });
                }
            });

            // When District is selected
            $('#district_id').on('change', function() {
                var districtName = $(this).find('option:selected').text(); // Get the district name
                $('#area_id').empty().append('<option value="">Select Area</option>');
                $('#beats-container').empty(); // Clear beats

                // Update hidden field for district
                $('#hidden_district').val(districtName);

                // Store district in session
                $.ajax({
                    url: '/store-district',
                    type: 'POST',
                    data: {
                        district_name: districtName,
                        _token: '{{ csrf_token() }}' // Include CSRF token for Laravel
                    },
                    success: function() {
                        console.log('District stored in session');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error storing district: ', textStatus, errorThrown);
                    }
                });

                if (districtName) {
                    $.ajax({
                        url: '/get-areas/' + districtName,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(key, value) {
                                if ($('#area_id option[value="' + key + '"]').length === 0) {
                                    $('#area_id').append('<option value="' + key + '">' + value + '</option>');
                                }
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Error fetching areas: ', textStatus, errorThrown);
                        }
                    });
                }
            });

            // When Area is selected
            $('#area_id').on('change', function() {
                var areaName = $(this).find('option:selected').text(); // Get the area name
                $('#beats-container').empty(); // Clear previous beats

                // Update hidden field for area
                $('#hidden_area').val(areaName);

                // Store area in session
                $.ajax({
                    url: '/store-area',
                    type: 'POST',
                    data: {
                        area_name: areaName,
                        _token: '{{ csrf_token() }}' // Include CSRF token for Laravel
                    },
                    success: function() {
                        console.log('Area stored in session');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error storing area: ', textStatus, errorThrown);
                    }
                });

                if (areaName) {
                    $.ajax({
                        url: '/get-beats-by-area/' + areaName,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                var beatsHtml = '';
                                for (var i = 1; i <= 12; i++) {
                                    var beatKey = 'beat_' + i;
                                    if (response.beats[beatKey]) {
                                        beatsHtml += '<div class="col-6 col-md-4 col-lg-2">';
                                        beatsHtml += '<div class="form-check">';
                                        beatsHtml += '<input type="checkbox" class="form-check-input" name="beats[]" value="' + response.beats[beatKey] + '" id="beat_' + i + '">';
                                        beatsHtml += '<label class="form-check-label" for="beat_' + i + '">' + response.beats[beatKey] + '</label>';
                                        beatsHtml += '</div>';
                                        beatsHtml += '</div>';
                                    }
                                }
                                $('#beats-container').html(beatsHtml);
                            } else {
                                alert('No beats found for this area');
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Error fetching beats: ', textStatus, errorThrown);
                        }
                    });
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            function fetchEmployees(locationType, locationId) {
                $.ajax({
                    url: '/get-employees/' + locationType + '/' + locationId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        updateEmployeeDropdown(response.employees);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error fetching employees: ', textStatus, errorThrown);
                    }
                });
            }

            function updateEmployeeDropdown(employees) {
                const rsmDropdown = $('#rsm').empty().append('<option value="">Select RSM</option>');
                const asmDropdown = $('#asm').empty().append('<option value="">Select ASM</option>');
                const aseDropdown = $('#ase').empty().append('<option value="">Select ASE</option>');
                const soDropdown = $('#so').empty().append('<option value="">Select SO</option>');
                const seDropdown = $('#se').empty().append('<option value="">Select SE</option>');

                employees.forEach(employee => {
                    const option = `<option value="${employee.id}">${employee.employee_name}</option>`;
                    switch (employee.user_role_id) {
                        case 1:
                            rsmDropdown.append(option);
                            break;
                        case 2:
                            asmDropdown.append(option);
                            break;
                        case 3:
                            aseDropdown.append(option);
                            break;
                        case 4:
                            soDropdown.append(option);
                            break;
                        case 5:
                            seDropdown.append(option);
                            break;
                    }
                });
            }

            // Fetch employees when region, state, district, or area is selected
            $('#region_zone_id').on('change', function() {
                fetchEmployees('region', $(this).val());
            });

            $('#state_id').on('change', function() {
                fetchEmployees('state', $(this).val());
            });

            $('#district_id').on('change', function() {
                fetchEmployees('district', $(this).val());
            });

            $('#area_id').on('change', function() {
                fetchEmployees('area', $(this).val());
            });
        });
    </script>
    <script>
        $(document).ready(function() {


            $('#customer_type').on('change', function() {

                var idcustomer = this.value;

                $("#customer_name").html('');

                $.ajax({

                    url: "{{url('api/fetch-customers')}}",

                    type: "POST",

                    data: {

                        customer_id: idcustomer,

                        _token: '{{csrf_token()}}'

                    },

                    dataType: 'json',

                    success: function(result) {

                        $('#customer_name').html('<option value="">-- Select customer name --</option>');

                        $.each(result.customers, function(key, value) {

                            $("#customer_name").append('<option value="' + value

                                .id + '">' + value.customer_name + '</option>');

                        });



                    }

                });

            });




        });
    </script>



    <script>
        $(document).ready(function() {
            // Fetch States when a Country is selected
            $('#region-dropdown').change(function() {
                var countryId = $(this).val();
                if (countryId) {
                    $.ajax({
                        url: '{{ url("api/fetch-states") }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            country_id: countryId
                        },
                        success: function(response) {
                            $('#state-dropdown').empty().append('<option value="">Select State</option>');
                            $('#district-dropdown').empty().append('<option value="">Select District</option>').prop('disabled', true);
                            $('#area-dropdown').empty().append('<option value="">Select Area</option>').prop('disabled', true);

                            $.each(response.states, function(key, state) {
                                $('#state-dropdown').append('<option value="' + state.id + '">' + state.state + '</option>');
                            });

                            $('#state-dropdown').prop('disabled', false);
                        }
                    });
                } else {
                    $('#state-dropdown').empty().append('<option value="">Select State</option>').prop('disabled', true);
                    $('#district-dropdown').empty().append('<option value="">Select District</option>').prop('disabled', true);
                    $('#area-dropdown').empty().append('<option value="">Select Area</option>').prop('disabled', true);
                }
            });

            // Fetch Districts when a State is selected
            $('#state-dropdown').change(function() {
                var stateId = $(this).val();
                if (stateId) {
                    $.ajax({
                        url: '{{ url("api/fetch-distic") }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            state_id: stateId
                        },
                        success: function(response) {
                            $('#district-dropdown').empty().append('<option value="">Select District</option>');
                            $('#area-dropdown').empty().append('<option value="">Select Area</option>').prop('disabled', true);

                            $.each(response.districts, function(key, district) {
                                $('#district-dropdown').append('<option value="' + district.id + '">' + district.district + '</option>');
                            });

                            $('#district-dropdown').prop('disabled', false);
                        }
                    });
                } else {
                    $('#district-dropdown').empty().append('<option value="">Select District</option>').prop('disabled', true);
                    $('#area-dropdown').empty().append('<option value="">Select Area</option>').prop('disabled', true);
                }
            });

            // Fetch Areas when a District is selected
            $('#district-dropdown').change(function() {
                var districtId = $(this).val();
                if (districtId) {
                    $.ajax({
                        url: '{{ url("api/fetch-area") }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            district_id: districtId
                        },
                        success: function(response) {
                            $('#area-dropdown').empty().append('<option value="">Select Area</option>');

                            $.each(response.area, function(key, area) {
                                $('#area-dropdown').append('<option value="' + area.id + '">' + area.area + '</option>');
                            });

                            $('#area-dropdown').prop('disabled', false);
                        }
                    });
                } else {
                    $('#area-dropdown').empty().append('<option value="">Select Area</option>').prop('disabled', true);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Handle cascading dropdowns
            $('#region').change(function() {
                const regionId = $(this).val();
                $('#state').prop('disabled', true).html('<option value="">Loading...</option>');
                $.get(`/states/${regionId}`, function(data) {
                    $('#state').prop('disabled', false).html('<option value="">Select State</option>');
                    data.forEach(state => {
                        $('#state').append(`<option value="${state.id}">${state.state}</option>`);
                    });
                });
            });

            $('#state').change(function() {
                const stateId = $(this).val();
                $('#district').prop('disabled', true).html('<option value="">Loading...</option>');
                $.get(`/districts/${stateId}`, function(data) {
                    $('#district').prop('disabled', false).html('<option value="">Select District</option>');
                    data.forEach(district => {
                        $('#district').append(`<option value="${district.id}">${district.district}</option>`);
                    });
                });
            });

            $('#district').change(function() {
                const districtId = $(this).val();
                $('#area').prop('disabled', true).html('<option value="">Loading...</option>');
                $.get(`/areas/${districtId}`, function(data) {
                    $('#area').prop('disabled', false).html('<option value="">Select Area</option>');
                    data.forEach(area => {
                        $('#area').append(`<option value="${area.id}">${area.area}</option>`);
                    });
                });
            });

            // Load employees based on filters
            $('#filterButton').click(function() {
                const regionId = $('#region').val();
                const stateId = $('#state').val();
                const districtId = $('#district').val();
                const areaId = $('#area').val();

                $.get('/attendance/filter', {
                    region_id: regionId,
                    state_id: stateId,
                    district_id: districtId,
                    area_id: areaId
                }, function(data) {
                    const tableBody = $('#employeeTable');
                    tableBody.empty();

                    if (data.length > 0) {
                        data.forEach((employee, index) => {
                            tableBody.append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${employee.employee_name}</td>
                                <td>
                                    <select name="employee_attendance[${index}][status]" class="form-select" required>
                                        <option value="">Select Status</option>
                                        <option value="Present">Present</option>
                                        <option value="Absent">Absent</option>
                                        <option value="Leave">Leave</option>
                                    </select>
                                    <input type="hidden" name="employee_attendance[${index}][employee_id]" value="${employee.id}">
                                </td>
                            </tr>
                        `);
                        });
                    } else {
                        tableBody.append('<tr><td colspan="3" class="text-center">No employees available</td></tr>');
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#region').change(function() {
                const regionId = $(this).val();
                $('#state').prop('disabled', true).html('<option value="">Loading...</option>');
                $.get(`/states/${regionId}`, function(data) {
                    $('#state').prop('disabled', false).html('<option value="">Select State</option>');
                    data.forEach(state => {
                        $('#state').append(`<option value="${state.id}">${state.state}</option>`);
                    });
                });
            });

            $('#state').change(function() {
                const stateId = $(this).val();
                $('#district').prop('disabled', true).html('<option value="">Loading...</option>');
                $.get(`/districts/${stateId}`, function(data) {
                    $('#district').prop('disabled', false).html('<option value="">Select District</option>');
                    data.forEach(district => {
                        $('#district').append(`<option value="${district.id}">${district.district}</option>`);
                    });
                });
            });

            $('#district').change(function() {
                const districtId = $(this).val();
                $('#area').prop('disabled', true).html('<option value="">Loading...</option>');
                $.get(`/areas/${districtId}`, function(data) {
                    $('#area').prop('disabled', false).html('<option value="">Select Area</option>');
                    data.forEach(area => {
                        $('#area').append(`<option value="${area.id}">${area.area}</option>`);
                    });
                });
            });

            $('#filterButton').click(function() {
                const formData = $('#filterForm').serialize();
                $.get(`/attendance/filter`, formData, function(data) {
                    const tableBody = $('#attendanceTable');
                    tableBody.empty();
                    if (data.length > 0) {
                        data.forEach((employee, index) => {
                            tableBody.append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${employee.employee_name}</td>
                                <td>${employee.region}</td>
                                <td>${employee.state}</td>
                                <td>${employee.district}</td>
                                <td>${employee.area}</td>
                            </tr>
                        `);
                        });
                    } else {
                        tableBody.append('<tr><td colspan="6" class="text-center">No data available</td></tr>');
                    }
                });
            });
        });

        $('#filterButton').click(function() {
            const formData = $('#filterForm').serialize();
            $.get(`/attendance/filter`, formData, function(data) {
                const tableBody = $('#attendanceTable');
                tableBody.empty();
                if (data.length > 0) {
                    data.forEach((employee, index) => {
                        tableBody.append(`
                <tr>
                    <td>${index + 1}</td>
                    <td>${employee.employee_name}</td>
                    <td>${employee.region}</td>
                    <td>${employee.state}</td>
                    <td>${employee.district}</td>
                    <td>${employee.area}</td>
                </tr>
            `);
                    });
                } else {
                    tableBody.append('<tr><td colspan="6" class="text-center">No data available</td></tr>');
                }
            });
        });
    </script>
</body>

</html>