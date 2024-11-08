<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HBS Car Rental Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <style>
        /* Global Styles */
body {
    font-family: 'Oxanium', sans-serif; /* Font family */
    font-weight: bold; /* Make all text bold */
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: #f8f9fa;
}

.container {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Full height */
}

/* Header Styles */
.header {
    display: flex; /* Flexbox for alignment */
    align-items: center; /* Center vertically */
    padding: 10px 20px; /* Padding for the header */
    background-color: #FFAA00;
    color: white;
    height: 60px; /* Fixed height */
}

.logo-icon {
    width: 150px; /* Maintain aspect ratio */
    height: 85px; /* Set height to match header height */
    margin-left: 50px; /* Space between logo and title */
}

.logo-section {
    flex-shrink: 0; /* Prevent shrinking */
}

.header-title {
    flex-grow: 1; /* Take remaining space */
    text-align: center; /* Center the title */
    font-size: 1.5rem;
}

/* Main Content Styles */
.main-content {
    display: flex;
    flex: 1; /* Fill remaining space */
    overflow: hidden; /* Hide overflow */
}

/* Sidebar Styles */
.sidebar {
    width: 20%;
    background-color: #ffcfd1;
    padding: 10px; /* Padding for better spacing */
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.nav {
    display: flex;
    flex-direction: column;
}

.nav-item {
    position: relative;
}

.dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #f7f7f7;
    border: 1px solid #ddd;
    min-width: 100%;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
    z-index: 1;
    border-color: red;
}

.nav-item:hover .dropdown-menu {
    display: block;
}

.dropdown-link {
    display: block;
    padding: 10px 15px;
    color: red;
    text-decoration: none;
}

.dropdown-link:hover {
    background-color: #e6e6e6;
}

.nav-link {
    color: #000;
    font-weight: bold; /* Keep link text bold */
    padding: 10px;
    text-decoration: none;
    font-size: 1rem; /* Slightly reduced font size */
    display: flex;
    align-items: center;
    transition: background-color 0.3s; /* Smooth transition */
}

.nav-link:hover {
    background-color: red; /* Change to red on hover */
    color: #fff; /* Change text color to white for better contrast */
}

.nav-icon {
    width: 18%; /* Adjust icon size */
    height: 18%; /* Adjust icon size */
    margin-right: 10px; /* Space between icon and text */
}

/* Main Content Styles */
.content {
    width: 80%; /* 80% of the container */
    padding: 10px; /* Padding for content */
    overflow-y: auto; /* Enable vertical scrolling for content only */
}

/* Form Section */
.form-section {
    background-color: #e8e8ff;
    padding: 25px; /* Padding for the form */
    flex: 1; /* Allow it to take available space */
    overflow-y: auto; /* Allow scrolling inside the form */
}

/* Form Row */
.form-row {
    display: flex;
    gap: 20px; /* Space between items */
    margin-bottom: 20px; /* Space below form row */
    justify-content: flex-start; /* Space out items evenly */
}

/* Input Styles */
.form-row input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px; /* Border radius for input fields */
    font-family: 'Oxanium', sans-serif;
}

/* Adjusted Widths for Inputs */
.form-row input.small-input {
    width: 10%; /* Divide the width by 4 for smaller inputs */
}

.form-row input:not(.small-input) {
    width: calc(50% - 10px); /* Adjusted width for other inputs */
}

/* Upload Section Styles */
.upload-section {
    border: 2px dashed #bbb;
    text-align: center;
    background-color: #f7f7f7;
    font-weight: bold; /* Keep upload section text bold */
    color: #666;
    flex: 1; /* Allow each section to grow and fill space equally */
    margin: 0px; /* Optional: Add margin for spacing */
}

.upload-icon {
    width: 50px; /* Adjust size of the upload icon */
    height: 50px; /* Adjust size of the upload icon */
    margin-bottom: 0px; /* Space below the icon */
    margin-top: 5px;
}

/* Submit Button Styles */
.submit-container {
    text-align: right;
    margin-top: 205px;
}

.btn-submit {
    padding: 10px 30px;
    background-color: #365C96; /* Button color */
    color: white;
    border: none;
    border-radius: 20px; /* Rounded corners */
    cursor: pointer; /* Pointer on hover */
    font-family: 'Oxanium', sans-serif;
}

.btn-submit:hover {
    background-color: #ff8c00; /* Darker shade on hover */
}

/* Footer Styles */
.footer {
    background-color: #ffa500;
    color: white;
    text-align: center;
    padding: 10px 0; /* Padding for footer */
    margin-top: auto; /* Push footer to the bottom */
}

.content {
    max-width: 700px;
    margin: 0 auto;
    
}

.form-section {
    padding: 20px;
    background-color: #f5f5f5;
    border-radius: 8px;
}

.form-row {
    display: flex;
    gap: 10px; /* Add gap for spacing between inputs */
    margin-bottom: 15px;
}

.small-input {
    flex: 0 0 100px; /* Set a fixed width for small inputs */
}

.full-input {
    flex: 1; /* Full width for the main input fields */
}

.address-input {
    width: 100%; /* Ensure the address field spans the full width */
}

.submit-container {
    text-align: center;
}

.btn-submit {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

    </style>

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
                        <a class="nav-link" href="{{ url('admin/dashboard') }}"><img src="{{ asset('images/1.png') }}" alt="Dashboard" class="nav-icon"> DASHBOARD</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link"><img src="{{ asset('images/2.png') }}" alt="Vehicles" class="nav-icon"> VEHICLES</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('admin/addvehicle') }}">Add Vehicle</a>
                            <a class="dropdown-link" href="{{ url('admin/vehicles') }}">List Vehicle</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link"><img src="{{ asset('images/3.png') }}" alt="Bookings" class="nav-icon"> BOOKINGS</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('admin/addbook') }}">Book Vehicle</a>
                            <a class="dropdown-link" href="{{ url('admin/books') }}">Booking History</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link"><img src="{{ asset('images/4.png') }}" alt="Customers" class="nav-icon"> CUSTOMERS</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('admin/addcus') }}">Add Customer</a>
                            <a class="dropdown-link" href="{{ url('admin/cus') }}">List Customer</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link"><img src="{{ asset('images/5.png') }}" alt="HRM" class="nav-icon"> HRM</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('admin/addemp') }}">Add Employee</a>
                            <a class="dropdown-link" href="{{ url('admin/emp') }}">List Employee</a>
                            <a class="dropdown-link" href="{{ url('hrm/details') }}">Employee Details</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ asset('images/6.png') }}" alt="CRM" class="nav-icon"> CRM</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ asset('images/7.png') }}" alt="Inventory" class="nav-icon"> INVENTORY</a>
                    </div>
                </nav>
            </div>
            <!-- Form Section -->
            <div class="content">
                <div class="form-section">
                    <form>
                        <div class="form-row">
                            <!-- Title dropdown -->
                            <select class="small-input">
                                <option>Mr</option>
                                <option>Ms</option>
                                <option>Mrs</option>
                                <option>Dr</option>
                            </select>
                            <!-- Full name input -->
                            <input type="text" class="full-input" placeholder="Full Name">
                        </div>
                        <div class="form-row">
                            <!-- Country code with intl-tel-input -->
                            <input type="tel" id="phone" class="small-input">
                            <!-- Phone number input -->
                            <input type="text" class="full-input" placeholder="Mobile number">
                        </div>
                        <div class="form-row">
                            <input type="email" class="full-input" placeholder="E-mail Address">
                        </div>
                        <div class="form-row">
                            <input type="text" class="full-input" placeholder="NIC">
                        </div>
                        <div class="form-row">
                            <input type="text" class="full-input" placeholder="Address">
                        </div>
                        <div class="submit-container">
                            <button type="submit" class="btn-submit">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Copyright © 2022 Golden Ray. All Rights Reserved. Designed By Ezone IT SOLUTION</p>
        </div>
    </div>
</body>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        initialCountry: "auto",
        geoIpLookup: function(success, failure) {
            fetch("https://ipinfo.io", { headers: { "Accept": "application/json" }})
                .then(function(resp) { return resp.json(); })
                .then(function(resp) { success(resp.country); })
                .catch(function() { success("us"); });
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });
</script>
</html>
