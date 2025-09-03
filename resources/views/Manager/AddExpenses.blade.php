<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Management System</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <!-- Google Fonts for Oxanium -->
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>



    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #E6E0F8;
        }

        .form-container {
            background-color: #E6E0F8;
            padding: 20px;
            border-radius: 5px;
            max-width: 700px;
            margin: 0 auto;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        input,
        select {
            width: 48%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            background-color: white;
        }

        .full-width {
            width: 100%;
        }

        /* Buttons */
        .button-group {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .btn {
            background-color: #34568B;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            border: none;
            cursor: pointer;
            margin: 5px;
        }

        .btn:hover {
            background-color: #2b3e63;
        }
    </style>

</head>

<body>
    @php
        $bName = \App\Models\Business::where('id', auth()->user()->business_id)->value('b_name');
        $bLogo = \App\Models\Business::where('id', auth()->user()->business_id)->value('logo');
    @endphp
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo-section">
                <img src="{{ $bLogo ? asset('storage/' . $bLogo) : asset('images/logo.png') }}" class="logo-icon"
                    alt="HBS Car Rental Logo">

            </div>

            <div class="header-title">
                {{ $bName ?? 'Business Name' }}
            </div>
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
                        <a class="nav-link" href="{{ url('manager/dashboard') }}">
                            <img src="{{ asset('images/1.png') }}" alt="Dashboard" class="nav-icon"> DASHBOARD
                        </a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link"><img src="{{ asset('images/2.png') }}" alt="Vehicles" class="nav-icon">
                            VEHICLES</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('addvehicle') }}">Add Vehicle</a>
                            <a class="dropdown-link" href="{{ url('allvehicles') }}">All Vehicles</a>
                            <a class="dropdown-link" href="{{ url('vehicle_owners') }}">Vehicle Owner Management</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link"><img src="{{ asset('images/3.png') }}" alt="Bookings" class="nav-icon">
                            BOOKINGS</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('addbooking') }}">Book Vehicle</a>
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
                            <img src="{{ asset('images/7.png') }}" alt="Inventory" class="nav-icon"> INVENTORY
                        </a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link active" href="#"><img src="{{ asset('images/8.png') }}"
                                alt="Accounting" class="nav-icon"> Finance</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('expenses') }}">Expences</a>
                            <a class="dropdown-link" href="{{ url('profit-loss-report') }}">P/L Report</a>
                            <a class="dropdown-link" href="{{ url('commission') }}">Commission</a>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="content">
                <form action="{{ route('expenses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-section">
                        <div class="form-row">
                            <select name="cat" id="expense_category" class="form-control" onchange="toggleOtherCategoryInput()" required>
                                <option value="">Select Expense Category</option>
                                <option value="Fuel" {{ old('cat') == 'Fuel' ? 'selected' : '' }}>Fuel</option>
                                <option value="Utility Bills" {{ old('cat') == 'Utility Bills' ? 'selected' : '' }}>Utility Bills</option>
                                <option value="Travel" {{ old('cat') == 'Travel' ? 'selected' : '' }}>Travel</option>
                                <option value="Office Supplies" {{ old('cat') == 'Office Supplies' ? 'selected' : '' }}>Office Supplies</option>
                                <option value="Foods" {{ old('cat') == 'Foods' ? 'selected' : '' }}>Foods</option>
                                <option value="Other" {{ old('cat') && !in_array(old('cat'), ['Fuel','Utility Bills','Travel','Office Supplies','Foods']) ? 'selected' : '' }}>Other</option>
                            </select>
                            <input 
                                type="text" 
                                name="cat" 
                                id="other_cat_input" 
                                class="form-control mt-2" 
                                placeholder="Please specify other category"
                                style="display: none;"
                                value="{{ old('cat') && !in_array(old('cat'), ['Fuel','Utility Bills','Travel','Office Supplies','Foods']) ? old('cat') : '' }}"
                            >
                            <script>
                                function toggleOtherCategoryInput() {
                                    var select = document.getElementById('expense_category');
                                    var otherInput = document.getElementById('other_cat_input');
                                    if (select.value === 'Other') {
                                        otherInput.style.display = 'block';
                                        otherInput.required = true;
                                        otherInput.name = 'cat'; // ensure the input is named 'cat'
                                        select.name = 'cat_select'; // change select name so only input is submitted as 'cat'
                                    } else {
                                        otherInput.style.display = 'none';
                                        otherInput.required = false;
                                        otherInput.value = '';
                                        otherInput.name = 'cat_other'; // dummy name so not submitted
                                        select.name = 'cat'; // ensure select is named 'cat'
                                    }
                                }
                                document.addEventListener('DOMContentLoaded', function() {
                                    toggleOtherCategoryInput();
                                });
                            </script>

                            <input type="date" name="date" class="form-control" required>
                        </div>

                        <div class="form-row">
                            <label for="for_emp">Select Employee Expense:</label>
                            <select id="for_emp" name="for_emp" class="form-control">
                                <option value="">Search Employee...</option>
                            </select>
                        </div>

                        <div class="form-row">
                            <label for="for_cus">Select Customer Expense:</label>
                            <select id="for_cus" name="for_cus" class="form-control">
                                <option value="">Search Customer...</option>
                            </select>
                        </div>

                        <!-- Fuel For Dropdown (Initially Hidden) -->
                        <div class="form-row" id="fuel_for_container">
                            <label for="fuel_for">Fuel For Vehicle:</label>
                            <div style="width: 100%; position: relative;">
                                <input type="text" id="fuel_for" name="fuel_for" class="form-control"
                                    placeholder="Type to search vehicle..." autocomplete="off" style="width: 100%;">
                                <div id="vehicle_list" class="dropdown-car" style="display: none; position: absolute; left: 0; right: 0; top: 100%; z-index: 1000; background: #fff; border: 1px solid #d1d5db; border-radius: 0.5rem; box-shadow: 0 2px 8px rgba(0,0,0,0.08); min-width: 220px; max-height: 220px; overflow-y: auto; padding: 0.25rem 0;">
                                    <!-- Vehicle suggestions will appear here -->
                                </div>
                            </div>
                        </div>



                        <div class="form-row">
                            <label>Attach Document:</label>
                            <input type="file" name="docs" class="form-control">
                        </div>

                        <div class="form-row">
                            <input type="text" name="amnt" class="form-control" placeholder="Amount">
                        </div>

                        <div class="form-row">
                            <input type="text" name="note" class="form-control full-width" placeholder="NOTE">
                        </div>


                    </div>
                    <div class="btn-container">
                        <button type="reset" class="btn-submit">Clear</button>
                        <button type="submit" class="btn-submit">Submit</button>
                    </div>
                </form>

            </div>
        </div>
        <!-- Footer -->
        <div class="footer">
            <p>© 2024. All rights reserved. Designed by Ezone IT Solutions.</p>
        </div>

</body>
<script>
    $(document).ready(function() {
        $('#for_emp').select2({
            placeholder: "Search for Employee",
            allowClear: true,
            minimumInputLength: 1,
            ajax: {
                url: "{{ route('employees.search') }}",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: data.map(employee => ({
                            id: employee.emp_id,
                            text: employee.emp_name
                        }))
                    };
                }
            }
        });

        $('#for_cus').select2({
            placeholder: "Search for Customer",
            allowClear: true,
            minimumInputLength: 1,
            ajax: {
                url: "{{ route('customers.search') }}",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function(data) {
                    return {
                        results: data.map(customer => ({
                            id: customer.id,
                            text: customer.full_name
                        }))
                    };
                }
            }
        });

        // Disable one dropdown when the other is selected
        $('#for_emp').on('change', function() {
            if ($(this).val()) {
                $('#for_cus').prop('disabled', true);
            } else {
                $('#for_cus').prop('disabled', false);
            }
        });

        $('#for_cus').on('change', function() {
            if ($(this).val()) {
                $('#for_emp').prop('disabled', true);
            } else {
                $('#for_emp').prop('disabled', false);
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Always show the Fuel For field
        $('#fuel_for_container').show();

        // Fetch vehicle suggestions when typing
        $('#fuel_for').on('keyup', function() {
            let query = $(this).val();
            if (query.length > 1) {
                $.ajax({
                    url: '/api/vehicles/search',
                    type: 'GET',
                    data: {
                        query: query
                    },
                    success: function(response) {
                        let dropdown = $('#vehicle_list');
                        dropdown.empty(); // Clear old options

                        if (response.length > 0) {
                            response.forEach(function(vehicle) {
                                dropdown.append(
                                    '<div class="dropdown-item" style="cursor: pointer;" data-value="' +
                                    vehicle + '">' + vehicle + '</div>');
                            });
                            dropdown.show(); // Show the dropdown
                        } else {
                            dropdown.hide(); // Hide if no results
                        }
                    },
                    error: function(xhr) {
                        console.error("Error fetching vehicles:", xhr.responseText);
                    }
                });
            } else {
                $('#vehicle_list').hide(); // Hide dropdown if no query
            }
        });

        // Select a vehicle from the list
        $(document).on('click', '.dropdown-item', function() {
            $('#fuel_for').val($(this).data('value')); // Set the selected value
            $('#vehicle_list').hide(); // Hide the dropdown
        });

        // Hide dropdown when clicking outside
        $(document).click(function(e) {
            if (!$(e.target).closest("#fuel_for_container").length) {
                $('#vehicle_list').hide();
            }
        });
    });
</script>


</html>
