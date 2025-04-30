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
    <!-- Include jQuery and jQuery UI -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo-section">
                <img src="{{ asset('images/logo.png') }}" class="logo-icon" alt="HBS Car Rental Logo">
            </div>
            @php
    $bName = \App\Models\Business::where('id', auth()->user()->business_id)->value('b_name');
@endphp

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
                        <a class="nav-link" href="{{ url('manager/dashboard') }}"><img src="{{ asset('images/1.png') }}"
                                alt="Dashboard" class="nav-icon"> DASHBOARD</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link active"><img src="{{ asset('images/2.png') }}" alt="Vehicles" class="nav-icon">
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
                    <div class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ asset('images/8.png') }}" alt="Accounting"
                                class="nav-icon"> Finance</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-link" href="{{ url('expenses') }}">Expences</a>
                                    <a class="dropdown-link" href="{{ url('profit-loss-report') }}">P/L Report</a>
                                    {{-- <a class="dropdown-link" href="{{ url('customers') }}">Cash Book</a> --}}
                                </div>
                    </div>
                </nav>
            </div>


            <!-- Form Section -->

            <div class="content">
                <form method="POST" action="{{ route('vehicle_owners.store') }}" enctype="multipart/form-data">
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
                            <select id="title" name="title" class="selection-list">
                                <option value="" disabled selected>Title</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                            </select>
                            <input type="text" id="full_name" name="full_name" placeholder="Full name" required>
                        </div>
                        <div class="form-row">
                            <input type="text" id="vehicle_number" name="vehicle_number" placeholder="Vehicle number" required>
                            <input type="text" id="vehicle_name" name="vehicle_name" placeholder="Vehicle_Name">
                        </div>
                        <div class="form-row">
                            <input type="tel" id="phone" name="phone" placeholder="Mobile number" required>
                            <input type="text" id="address" name="address" placeholder="Address">
                        </div>
                        <div class="form-row">
                            <input type="date" id="start_date" name="start_date" placeholder="Start Date" required>
                            <input type="date" id="end_date" name="end_date" placeholder="End date">
                        </div>
                        <div class="form-row">
                            <input type="text" id="rental_amnt" name="rental_amnt" placeholder="Rental Amount" required>
                            <input type="text" id="monthly_km" name="monthly_km" placeholder="Monthly KM" required>
                            <input type="text" id="extra_km_chg" name="extra_km_chg" placeholder="Extra KM Chagers" required>
                        </div>
                        <div class="form-row">
                            <input type="text" id="acc_no" name="acc_no" placeholder="Bank Account Number" required>
                            <input type="text" id="bank_detais" name="bank_detais" placeholder="Bank Details (Bank, Bank Name, Owner Name or etc.)">
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="submit-container">
                        <button type="submit" class="btn-submit">CANCEL</button>
                        <button type="submit" class="btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© 2024. All rights reserved. Designed by Ezone IT Solutions.</p>
        </div>
    </div>
</body>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        initialCountry: "auto",
        geoIpLookup: function(success, failure) {
            fetch("https://ipinfo.io", {
                    headers: {
                        "Accept": "application/json"
                    }
                })
                .then(function(resp) {
                    return resp.json();
                })
                .then(function(resp) {
                    success(resp.country);
                })
                .catch(function() {
                    success("us");
                });
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });
</script>
<script>
    $(document).ready(function() {
        $("#vehicle_number").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ url('/get-vehicle-numbers') }}",
                    data: {
                        query: request.term
                    },
                    dataType: "json",
                    success: function(data) {
                        response(data);
                    }
                });
            },
            minLength: 1
        });
    });
</script>
</html>
