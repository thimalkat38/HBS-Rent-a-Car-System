<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HBS Car Rental Management System</title>
    <!-- Google Fonts for Oxanium -->
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo-section">
                <img src="{{ asset('images/logo.png') }}" class="logo-icon" alt="HBS Car Rental Logo">
            </div>
            <div class="header-title">HBS Car Rental Management System</div>
            <div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
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
                        <a class="nav-link"><img src="{{ asset('images/2.png') }}" alt="Vehicles" class="nav-icon">
                            VEHICLES</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('addvehicle') }}">Add Vehicle</a>
                            <a class="dropdown-link" href="{{ url('manager/vehicles') }}">List Vehicle</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link active"><img src="{{ asset('images/3.png') }}" alt="Bookings"
                                class="nav-icon">
                            BOOKINGS</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('manager/addbook') }}">Book Vehicle</a>
                            <a class="dropdown-link" href="{{ url('bookings') }}">Booking History</a>
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
                        <a class="nav-link"><img src="{{ asset('images/5.png') }}" alt="HRM" class="nav-icon"> HRM
                            (under development...)</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('manager/addemp') }}">Add Employee</a>
                            <a class="dropdown-link" href="{{ url('manager/emp') }}">List Employee</a>
                            <a class="dropdown-link" href="{{ url('hrm/details') }}">Employee Details</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ asset('images/6.png') }}" alt="CRM"
                                class="nav-icon"> CRM (under development...)</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ asset('images/7.png') }}" alt="Inventory"
                                class="nav-icon"> INVENTORY (under development...)</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ asset('images/8.png') }}" alt="Accounting"
                                class="nav-icon"> ACCOUNTING (under development...)</a>
                    </div>
                </nav>
            </div>

            <!-- Form Section -->
            <div class="content">
                <!-- Form Section -->
                <form method="POST" class="form-section" action="{{ route('bookings.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-section">

                        <div class="form-row">
                            <select name="title" class="selection-list" required>
                                <option value="" disabled selected>Title</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                            </select>
                            <input type="text" name="full_name" id="full_name" placeholder="Full Name" required
                                autocomplete="off">
                            <!-- Moved outside the form row to ensure proper positioning -->
                            <ul id="customer-list" class="list-group" style="position: absolute; display: none;">
                            </ul>
                            <input type="text" name="mobile_number" placeholder="Mobile number" readonly>
                        </div>

                        <!-- Customer List Dropdown -->

                        <div class="form-row">
                            <input type="text" id="vehicle_number" name="vehicle_number" list="vehicle_numbers"
                                class="block w-full mt-1" placeholder="Enter vehicle number" required>
                            <datalist id="vehicle_numbers">
                                <!-- Options will be populated dynamically using JavaScript -->
                            </datalist>
                            <input type="text" name="fuel_type" id="fuel_type" class="block w-full mt-1"
                                placeholder="Fuel Type" required readonly>
                            <input type="text" name="vehicle_name" id="vehicle_name" class="block w-full mt-1"
                                placeholder="Vehicle Name" required readonly>
                            <input type="text" name="price_per_day" id="price_per_day" class="block w-full mt-1"
                                placeholder="Price Per Day (LKR)" required readonly>
                        </div>


                        <div class="form-row">
                            <input type="date" name="from_date" placeholder="From Date" required
                                min="<?php echo date('Y-m-d'); ?>" onclick="this.showPicker()">
                            <input type="date" name="to_date" placeholder="To Date" required
                                min="<?php echo date('Y-m-d'); ?>" onclick="this.showPicker()">
                            <input type="time" name="booking_time" class="small-input" required onclick="this.showPicker()">
                        </div>
                        
                        <div class="form-row">
                            <input type="text" name="additional_chagers" placeholder="Additional Chagers (LKR)">
                            <input type="text" name="price" placeholder="Total Price (LKR)" readonly>
                        </div>
                        <!-- Upload Sections in Form Row -->
                        <div class="form-row">
                            <div class="upload-section">
                                <label for="driving_photos" class="upload-label">
                                    <p>Vehicle Photos Before Release</p>
                                    <input type="file" name="driving_photos[]" id="driving_photos" multiple
                                        class="file-input">
                                </label>
                            </div>
                            <div class="upload-section">
                                <label for="nic_photos" class="upload-label">
                                    <p>Driving Lisance and NIC</p>
                                    <input type="file" name="nic_photos[]" id="nic_photos" multiple
                                        class="file-input">
                                </label>
                            </div>
                        </div>

                    </div>
                    <!-- Submit Buttons -->
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
        // Vehicle Number Fetching
        document.getElementById('vehicle_number').addEventListener('input', function() {
            const vehicleNumber = this.value;

            if (vehicleNumber.length >= 2) {
                fetch(`/vehicles/search?query=${vehicleNumber}`)
                    .then(response => response.json())
                    .then(data => {
                        const datalist = document.getElementById('vehicle_numbers');
                        datalist.innerHTML = '';

                        data.forEach(vehicle => {
                            const option = document.createElement('option');
                            option.value = vehicle.vehicle_number;
                            datalist.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching vehicle numbers:', error));
            }
        });

        document.getElementById('vehicle_number').addEventListener('change', function() {
            const vehicleNumber = this.value;

            fetch(`/vehicles/get-details/${vehicleNumber}`)
                .then(response => response.json())
                .then(data => {
                    if (data.fuel_type && data.vehicle_name && data.price_per_day) {
                        document.getElementById('fuel_type').value = data.fuel_type;
                        document.getElementById('vehicle_name').value = data.vehicle_name;
                        document.getElementById('price_per_day').value = data.price_per_day;
                    } else {
                        alert(data.message || 'Vehicle details not found');
                        document.getElementById('fuel_type').value = '';
                        document.getElementById('vehicle_name').value = '';
                        document.getElementById('price_per_day').value = '';
                    }
                })
                .catch(error => console.error('Error fetching vehicle details:', error));
        });
    </script>

    <script>
        $(document).ready(function() {
            // When typing in the full name field
            $('#full_name').on('input', function() {
                var query = $(this).val();

                if (query.length >= 2) {
                    // Fetch matching customer names from the server
                    $.ajax({
                        url: '/customers/search', // Route to get customer names
                        method: 'GET',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#customer-list').empty().show(); // Show the list
                            if (data.length > 0) {
                                $.each(data, function(index, customer) {
                                    $('#customer-list').append(
                                        '<li class="list-group-item customer-item" data-id="' +
                                        customer.id + '" data-name="' + customer
                                        .full_name + '">' +
                                        customer.full_name + '</li>'
                                    );
                                });
                            } else {
                                $('#customer-list').append(
                                    '<li class="list-group-item add-customer-item" style="font-weight:bold; color: blue;">' +
                                    'Add Customer' +
                                    '</li>'
                                );
                            }
                        }
                    });
                } else {
                    $('#customer-list').hide();
                }
            });

            // When a customer name is selected from the dropdown
            $(document).on('click', '.customer-item', function() {
                var selectedName = $(this).data('name');
                var customerId = $(this).data('id');

                $('#full_name').val(selectedName); // Set the input field with the selected name
                $('#customer-list').hide(); // Hide the list

                // Fetch the selected customer's details
                $.ajax({
                    url: '/customers/get-details/' +
                        customerId, // Route to get customer details by ID
                    method: 'GET',
                    success: function(data) {
                        if (data.phone) {
                            $('input[name="mobile_number"]').val(data
                                .phone); // Autofill mobile number
                        } else {
                            $('input[name="mobile_number"]').val(
                                ''); // Clear the field if phone not found
                            alert('Customer details not found');
                        }
                    },
                    error: function() {
                        console.error('Error fetching customer details');
                    }
                });
            });

            // Redirect to "Add Customer" page if the "Add Customer" option is clicked
            $(document).on('click', '.add-customer-item', function() {
                window.location.href =
                    '{{ route('customers.create') }}'; // Redirect to the create customer route
            });

            // Hide the dropdown if clicking outside of it
            $(document).click(function(e) {
                if (!$(e.target).closest('#full_name, #customer-list').length) {
                    $('#customer-list').hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Function to calculate total price
            function calculateTotalPrice() {
                const pricePerDay = parseFloat($('#price_per_day').val()) || 0;
                const additionalCharges = parseFloat($('input[name="additional_chagers"]').val()) || 0;
                const fromDate = new Date($('input[name="from_date"]').val());
                const toDate = new Date($('input[name="to_date"]').val());
                const timeDiff = toDate - fromDate;
                const days = timeDiff / (1000 * 60 * 60 * 24) + 1; // Add 1 to include the start day

                if (!isNaN(days) && days > 0) {
                    const totalPrice = (pricePerDay * days) + additionalCharges;
                    $('input[name="price"]').val(totalPrice.toFixed(2)); // Update the price input field
                } else {
                    $('input[name="price"]').val(''); // Clear the price input field if date range is invalid
                }
            }

            // Trigger calculation when relevant inputs change
            $('input[name="from_date"], input[name="to_date"], #price_per_day, input[name="additional_chagers"]')
                .on('input change', calculateTotalPrice);
        });
    </script>


    <style>
        #customer-list {
            background-color: #fff;
            border: 1px solid #ccc;
            max-height: 200px;
            /* Adjust based on your preference */
            overflow-y: auto;
            list-style-type: none;
            padding: 0;
            margin-top: 3%;
            margin-left: 25%;
            width: 20%;
            align-content: left;
        }

        #customer-list .list-group-item {
            padding: 10px;
            cursor: pointer;
        }

        #customer-list .list-group-item:hover {
            background-color: #f0f0f0;
        }
    </style>

</body>

</html>
