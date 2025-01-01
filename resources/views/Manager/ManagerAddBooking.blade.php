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
                        <a class="nav-link"><img src="{{ asset('images/2.png') }}" alt="Vehicles" class="nav-icon">
                            VEHICLES</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('addvehicle') }}">Add Vehicle</a>
                            <a class="dropdown-link" href="{{ url('manager/vehicles') }}">List Vehicle</a>
                            <a class="dropdown-link" href="{{ url('vehicle_owners') }}">Vehicle Owner Management</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link active"><img src="{{ asset('images/3.png') }}" alt="Bookings"
                                class="nav-icon">
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
                        <a class="nav-link" href="{{ url('hr-management') }}"><img
                                src="{{ asset('images/5.png') }}" alt="HRM" class="nav-icon"> HRM</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ url('crms') }}"><img src="{{ asset('images/6.png') }}" alt="CRM"
                                class="nav-icon"> CRM</a>
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
                <!-- Form Section -->
                <form method="POST" class="form-section" action="{{ route('bookings.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-section">
                        <div class="form-row">
                            <select name="title" class="selection-list">
                                <option value="" disabled selected>Title</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                            </select>
                            @error('title')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                
                            <input type="text" name="full_name" id="full_name" placeholder="Full Name"  autocomplete="off">
                            @error('full_name')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                
                            <ul id="customer-list" class="list-group" style="position: absolute; display: none;"></ul>
                            <input type="text" name="mobile_number" placeholder="Mobile number">
                            @error('mobile_number')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                
                            <input type="text" name="nic" placeholder="NIC">
                            @error('nic')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                
                            <input type="text" name="deposit" placeholder="Deposit (Eg - RS ##### or Bike etc. )">
                            @error('deposit')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                
                        <div class="form-row">
                            <input type="text" id="vehicle_number" name="vehicle_number" list="vehicle_numbers" class="block w-full mt-1" placeholder="Enter vehicle number" maxlength="8" oninput="formatVehicleNumber(this)">
                            @error('vehicle_number')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                
                            <input type="text" name="vehicle_name" id="vehicle_name" class="block w-full mt-1" placeholder="Vehicle Name"  readonly>
                            @error('vehicle_name')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                
                            <input type="text" name="fuel_type" id="fuel_type" class="block w-full mt-1" placeholder="Fuel Type"  readonly>
                            @error('fuel_type')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                
                            <input type="text" name="price_per_day" id="price_per_day" class="block w-full mt-1" placeholder="Price Per Day (LKR)"  readonly>
                            @error('price_per_day')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                
                            <input type="text" name="officer" placeholder="Released Officer">
                            @error('officer')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                
                        <div class="form-row">
                            <input type="date" name="from_date" placeholder="From Date"  min="{{ date('Y-m-d') }}" onclick="this.showPicker()">
                            @error('from_date')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                
                            <input type="time" name="booking_time" class="small-input"  onclick="this.showPicker()">
                            @error('booking_time')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                
                            <input type="date" name="to_date" placeholder="To Date"  min="{{ date('Y-m-d', strtotime('+1 day')) }}" onclick="this.showPicker()">
                            @error('to_date')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                
                            <input type="time" name="arrival_time" class="small-input"  onclick="this.showPicker()">
                            @error('arrival_time')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                
                            <input type="number" name="days" id="days" placeholder="Total Days" readonly>
                            @error('days')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                
                        <div class="form-row">
                            <input type="text" name="additional_chagers" placeholder="Before Additional Chagers (LKR)">
                            @error('additional_chagers')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                
                            <input type="text" name="reason" placeholder="Reason for Additional Chagers">
                            @error('reason')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                
                            <input type="text" name="discount_price" placeholder="Discount Price (LKR)">
                            @error('discount_price')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                
                            <input type="text" name="payed" placeholder="PAID">
                            @error('payed')
                            <span class="error-message">{{ $message }}</span>
                            @enderror

                            <input type="text" name="method" placeholder="Paid Method (Note)">
                            @error('method')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                
                            <input type="text" name="price" placeholder="Total Price (LKR)" readonly>
                            @error('price')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                
                        <div class="form-row">
                            <div class="upload-section">
                                <label for="driving_photos" class="upload-label">
                                    <p>Vehicle Photos Before Release</p>
                                    <input type="file" name="driving_photos[]" id="driving_photos" multiple class="file-input">
                                </label>
                                @error('driving_photos')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="upload-section">
                                <label for="nic_photos" class="upload-label">
                                    <p>Driving Lisance and NIC</p>
                                    <input type="file" name="nic_photos[]" id="nic_photos" multiple class="file-input">
                                </label>
                                @error('nic_photos')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="upload-section">
                            <label for="deposit_img" class="upload-label">
                                <p>Deposited Vehicle Images (If any)</p>
                                <input type="file" name="deposit_img[]" id="deposit_img" multiple class="file-input">
                            </label>
                            @error('deposit_img')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="submit-container">
                        <button type="reset" class="btn-submit">CANCEL</button>
                        <button type="submit" class="btn-submit">SUBMIT</button>
                    </div>
                </form>
                
                <style>
                .error-message {
                    color: red;
                    font-size: 0.875rem;
                }
                </style>
                
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© 2024. All rights reserved. Designed by Ezone IT Solutions.</p>
        </div>
    </div>

    <script>
        document.getElementById('vehicle_number').addEventListener('change', function() {
    const vehicleNumber = this.value;

    fetch(`/vehicles/get-details/${vehicleNumber}`)
        .then(response => response.json())
        .then(data => {
            if (data.fuel_type && data.vehicle_name && data.vehicle_model && data.price_per_day) {
                document.getElementById('fuel_type').value = data.fuel_type;
                document.getElementById('vehicle_name').value = `${data.vehicle_model} ${data.vehicle_name}`;
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
                url: '/customers/get-details/' + customerId, // Route to get customer details by ID
                method: 'GET',
                success: function(data) {
                    if (data) {
                        if (data.phone) {
                            $('input[name="mobile_number"]').val(data.phone); // Autofill mobile number
                        } else {
                            $('input[name="mobile_number"]').val(''); // Clear the field if phone not found
                        }

                        if (data.nic) {
                            $('input[name="nic"]').val(data.nic); // Autofill NIC
                        } else {
                            $('input[name="nic"]').val(''); // Clear the field if NIC not found
                        }
                    } else {
                        $('input[name="mobile_number"], input[name="nic"]').val(''); // Clear all fields if no data found
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
            window.location.href = '{{ route('customers.create') }}'; // Redirect to the create customer route
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
    $(document).ready(function () {
        // Function to calculate total price and days
        function calculateTotalPriceAndDays() {
            const pricePerDay = parseFloat($('#price_per_day').val()) || 0;
            const additionalCharges = parseFloat($('input[name="additional_chagers"]').val()) || 0;
            const discountPrice = parseFloat($('input[name="discount_price"]').val()) || 0;
            const payed = parseFloat($('input[name="payed"]').val()) || 0;

            // Retrieve and parse the date and time values
            const fromDate = $('input[name="from_date"]').val();
            const bookingTime = $('input[name="booking_time"]').val();
            const toDate = $('input[name="to_date"]').val();
            const arrivalTime = $('input[name="arrival_time"]').val();

            if (fromDate && toDate && bookingTime && arrivalTime) {
                // Combine date and time for proper calculation
                const startDateTime = new Date(`${fromDate}T${bookingTime}`);
                const endDateTime = new Date(`${toDate}T${arrivalTime}`);

                // Calculate the time difference in milliseconds
                const timeDiff = endDateTime - startDateTime;

                if (timeDiff >= 0) { // Ensure valid date range
                    // Calculate total days as full 24-hour periods (no fractional days)
                    const days = Math.ceil(timeDiff / (1000 * 60 * 60 * 24)); // Full 24-hour periods only

                    // Update the days field
                    $('input[name="days"]').val(days); // Populate the days field

                    // Calculate the total price
                    const totalPrice = (pricePerDay * days) + additionalCharges - discountPrice - payed;
                    $('input[name="price"]').val(totalPrice.toFixed(2)); // Autofill the price field
                } else {
                    $('input[name="days"]').val(''); // Clear the days field if the date range is invalid
                    $('input[name="price"]').val(''); // Clear the price field if the date range is invalid
                }
            }
        }

        // Trigger calculation when any relevant input changes
        $('input[name="from_date"], input[name="booking_time"], input[name="to_date"], input[name="arrival_time"], #price_per_day, input[name="additional_chagers"], input[name="discount_price"], input[name="payed"]')
            .on('input change', calculateTotalPriceAndDays);
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
        #customer-list {
            background-color: #fff;
            border: 1px solid #ccc;
            max-height: 200px;
            /* Adjust based on your preference */
            overflow-y: auto;
            list-style-type: none;
            padding: 0;
            margin-top: 3%;
            margin-left: 15%;
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
