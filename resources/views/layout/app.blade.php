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
                                if ($('#state_id option[value="' + key + '"]')
                                    .length === 0) {
                                    $('#state_id').append('<option value="' + key +
                                        '">' + value + '</option>');
                                }
                            });
                        }
                    });
                }
            });

            // When State is selected
            // $('#state_id').on('change', function() {
            //     var stateName = $(this).find('option:selected').text(); // Get the state name
            //     $('#district_id').empty().append('<option value="">Select District</option>');
            //     $('#area_id').empty().append('<option value="">Select Area</option>');
            //     $('#beats-container').empty(); // Clear beats

            //     if (stateName) {
            //         $.ajax({
            //             url: '/get-districts/' + stateName, // Send the state name
            //             type: 'GET',
            //             dataType: 'json',
            //             success: function(data) {
            //                 $.each(data, function(key, value) {
            //                     if ($('#district_id option[value="' + key + '"]')
            //                         .length === 0) {
            //                         $('#district_id').append('<option value="' + key +
            //                             '">' + value + '</option>');
            //                     }
            //                 });
            //             },
            //             error: function(jqXHR, textStatus, errorThrown) {
            //                 console.error('Error fetching districts: ', textStatus,
            //                     errorThrown);
            //             }
            //         });
            //     }
            // });

            // When District is selected
            $('#district_id').on('change', function() {
                var districtName = $(this).find('option:selected').text(); // Get the district name
                $('#area_id').empty().append('<option value="">Select Area</option>');
                $('#beats-container').empty(); // Clear beats

                if (districtName) {
                    $.ajax({
                        url: '/get-areas/' + districtName, // Send the district name
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(key, value) {
                                if ($('#area_id option[value="' + key + '"]').length ===
                                    0) {
                                    $('#area_id').append('<option value="' + key +
                                        '">' + value + '</option>');
                                }
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Error fetching areas: ', textStatus, errorThrown);
                        }
                    });
                }
            });

            $('#area_id').on('change', function() {
                var areaId = $(this).val(); // Get the area ID
                $('#beats-container').empty(); // Clear previous beats

                if (areaId) {
                    $.ajax({
                        url: '/get-beats-by-area/' + areaId, // Fetch beats based on area
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                var beatsHtml = '';
                                // Loop through each beat (beat_1 to beat_12)
                                for (var i = 1; i <= 12; i++) {
                                    var beatKey = 'beat_' + i;
                                    if (response.beats[beatKey]) {
                                        beatsHtml += '<div class="col-6 col-md-4 col-lg-2">';
                                        beatsHtml += '<div class="form-check">';
                                        beatsHtml +=
                                            '<input type="checkbox" class="form-check-input" name="beats[]" value="' +
                                            response.beats[beatKey] + '" id="beat_' + i + '">';
                                        beatsHtml +=
                                            '<label class="form-check-label" for="beat_' + i +
                                            '">' + response.beats[beatKey] + '</label>';
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

</body>

</html>
