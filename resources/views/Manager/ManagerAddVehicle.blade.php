<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HBS Car Rental Management System</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <!-- Google Fonts for Oxanium -->
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo-section">
                <img src="{{ asset('images/logo.png') }}" class="logo-icon" alt="HBS Car Rental Logo">
            </div>
            <div class="header-title">HBS RENT A CAR</div>
            <div class="card1">
                <div class="card1-content">
                    <form method="POST" class="btn1-submit" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('LogOut') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Sidebar -->
            <div class="sidebar">
                <nav class="nav">
                    <div class="nav-item">
                        <a class="nav-link" href="{{ url('manager/dashboard') }}"><img src="{{ asset('images/1.png') }}"
                                alt="Dashboard" class="nav-icon"> DASHBOARD</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link active"><img src="{{ asset('images/2.png') }}" alt="Vehicles"
                                class="nav-icon">
                            VEHICLES</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('addvehicle') }}">Add Vehicle</a>
                            <a class="dropdown-link" href="{{ url('manager/vehicles') }}">List Vehicle</a>
                            <a class="dropdown-link" href="{{ url('vehicle_owners') }}">Vehicle Owner Management</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link"><img src="{{ asset('images/3.png') }}" alt="Bookings" class="nav-icon">
                            BOOKINGS</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('manager/addbook') }}">Book Vehicle</a>
                            <a class="dropdown-link" href="{{ url('bookings') }}">Booking History</a>
                            <a class="dropdown-link" href="{{ url('postbookings') }}">Completed Businesses</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link"><img src="{{ asset('images/4.png') }}" alt="Customers" class="nav-icon">
                            CUSTOMERS</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('/customers/create') }}">Add Customer</a>
                            <a class="dropdown-link" href="{{ url('customers') }}">List Customer</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ url('hr-management') }}"><img src="{{ asset('images/5.png') }}"
                                alt="HRM" class="nav-icon"> HRM</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ url('crms') }}"><img src="{{ asset('images/6.png') }}"
                                alt="CRM" class="nav-icon"> CRM</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('inventory.index') }}">
                            <img src="{{ asset('images/7.png') }}" alt="Inventory" class="nav-icon">
                            INVENTORY
                        </a>
                    </div>
                    {{-- <div class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ asset('images/8.png') }}" alt="Accounting"
                                class="nav-icon"> ACCOUNTING</a>
                    </div> --}}
                </nav>
            </div>

            <!-- Form Section -->
            <div class="content">
                <form action="{{ route('manager.storevehicle') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-section">

                        {{-- error handling --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-row">
                            <input type="text" name="vehicle_number" placeholder="Register Number"
                                id="vehicle_number" maxlength="8" oninput="formatVehicleNumber(this)" />
                            <input type="text" name="vehicle_name" id="vehicle_name" placeholder="Vehicle Model"
                                autocomplete="off">
                            <ul id="model-suggestions" class="list-group" style="position: absolute; display: none;">
                            </ul>
                        </div>


                        <div class="form-row">
                            <select name="vehicle_type" class="selection-list">
                                <option value="" disabled selected>Vehicle Type</option>
                                <option value="Car">Car</option>
                                <option value="Van">Van</option>
                                <option value="Bus">Bus</option>
                                <option value="Other">Other</option>
                            </select>
                            <input type="text" id="vehicle_model" name="vehicle_model"
                                placeholder="Manufacturer">
                        </div>
                        <div class="form-row">
                            <input type="text" name="engine_number" placeholder="Engine Number">
                            <select name="fuel_type" class="selection-list">
                                <option value="" disabled selected>Fuel Type</option>
                                <option value="Petrol">Petrol</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Electric">Electric</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <input type="text" name="chassis_number" placeholder="Chassis Number">
                            <input type="text" name="model_year" placeholder="Year Of Manufacture">
                        </div>
                        <div class="form-row">
                            <input type="text" name="price_per_day" placeholder="Price Per Day">
                            <input type="text" name="free_km" placeholder="Free KM">
                            <input type="text" name="extra_km_chg" placeholder="Extra 1 KM Charge">
                        </div>
                        <div class="upload-section">
                            <p>Add Vehicle Images</p>
                            <input type="file" name="images[]" accept="image/*" multiple>
                        </div>

                    </div>
                    <div class="submit-container">
                        <button type="reset" class="btn-submit">CANCEL</button>
                        <button type="submit" class="btn-submit">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© 2024. All rights reserved. Designed by Ezone IT Solutions.</p>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#vehicle_name').on('keyup', function() {
                let query = $(this).val();
                if (query.length >= 2) {
                    $.ajax({
                        url: "{{ route('getVehicleModels') }}",
                        type: "GET",
                        data: {
                            query: query
                        },
                        success: function(data) {
                            // Remove duplicate models from data
                            let uniqueData = Array.from(new Set(data));

                            let dropdown = $('#model-suggestions');
                            dropdown.empty().show();
                            if (uniqueData.length) {
                                $.each(uniqueData, function(index, model) {
                                    dropdown.append(
                                        `<div class="list-group-item" onclick="selectModel('${model}')">${model}</div>`
                                        );
                                });
                            } else {
                                dropdown.append(
                                    `<div class="list-group-item">No results found. Type to Add New model.</div>`
                                    );
                            }
                        }
                    });
                } else {
                    $('#model-suggestions').hide();
                }
            });

            // Function to set the selected model in the input field and hide the dropdown
            window.selectModel = function(model) {
                $('#vehicle_name').val(model);
                $('#model-suggestions').hide();
            };

            // Hide dropdown when clicking outside of it
            $(document).on('click', function(event) {
                if (!$(event.target).closest('#vehicle_name, #model-suggestions').length) {
                    $('#model-suggestions').hide();
                }
            });
        });
    </script>
    <script>
        function formatVehicleNumber(input) {
            // Remove all characters that are not uppercase letters, digits, or "-"
            input.value = input.value.toUpperCase().replace(/[^A-Z0-9-]/g, '');

            // Ensure it follows the pattern "AAA-1234"
            const match = input.value.match(/^([A-Z]{0,3})(-?)([0-9]{0,4})$/);
            if (match) {
                input.value = (match[1] || '') + (match[3] ? '-' + match[3] : '');
            }
        }
    </script>


    <style>
        #model-suggestions {
            background-color: #fff;
            border: 1px solid #ccc;
            max-height: 200px;
            /* Adjust based on your preference */
            overflow-y: auto;
            list-style-type: none;
            padding: 1%;
            margin-top: 3%;
            margin-left: 38%;
            width: 35%;
            align-content: left;
        }

        #model-suggestions .list-group-item {
            padding: 10px;
            cursor: pointer;
        }

        #model-suggestions .list-group-item:hover {
            background-color: #f0f0f0;
        }
    </style>
    <script>
        $(document).ready(function() {
            $("#vehicle_model").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "/autocomplete-vehicle-models",
                        type: "GET",
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                minLength: 1 // Start showing suggestions after 1 character
            });
        });
    </script>
</body>
<style>
    /* Style for input field */
    /* #vehicle_model {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 2px solid #ccc;
        border-radius: 5px;
        outline: none;
        transition: 0.3s;
    } */

    /* #vehicle_model:focus {
        border-color: #ffffff;
        box-shadow: 0px 0px 8px rgba(0, 123, 255, 0.5);
    } */

    /* Custom jQuery UI Autocomplete Dropdown */
    .ui-autocomplete {
        background: white;
        border: 1px solid #ccc;
        max-height: 200px;
        overflow-y: auto;
        border-radius: 5px;
    }

    /* Individual dropdown item */
    .ui-menu-item {
        padding: 10px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    /* Hover effect */
    .ui-menu-item:hover {
        background-color: #007bff;
        color: white;
    }

    /* Active selection effect */
    .ui-state-active {
        background-color: #007bff !important;
        color: white !important;
        border-radius: 5px;
    }
</style>

</html>
