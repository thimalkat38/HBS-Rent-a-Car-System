<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HBS Car Rental Management System</title>
    <!-- Google Fonts for Oxanium -->
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Oxanium', sans-serif;
            /* Font family */
            font-weight: bold;
            /* Make all text bold */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f9fa;
        }

        .container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            /* Full height */
        }

        /* Header Styles */
        .header {
            display: flex;
            /* Flexbox for alignment */
            align-items: center;
            /* Center vertically */
            padding: 10px 20px;
            /* Padding for the header */
            background-color: #FFAA00;
            color: white;
            height: 60px;
            /* Fixed height */
        }

        .logo-icon {
            width: 150px;
            /* Maintain aspect ratio */
            height: 85px;
            /* Set height to match header height */
            margin-left: 50px;
            /* Space between logo and title */
        }

        .logo-section {
            flex-shrink: 0;
            /* Prevent shrinking */
        }

        .header-title {
            flex-grow: 1;
            /* Take remaining space */
            text-align: center;
            /* Center the title */
            font-size: 1.5rem;
        }

        /* Main Content Styles */
        .main-content {
            display: flex;
            flex: 1;
            /* Fill remaining space */
            overflow: hidden;
            /* Hide overflow */
        }

        /* Sidebar Styles */
        .sidebar {
            width: 20%;
            background-color: #ffcfd1;
            padding: 10px;
            /* Padding for better spacing */
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
            font-weight: bold;
            /* Keep link text bold */
            padding: 10px;
            text-decoration: none;
            font-size: 1rem;
            /* Slightly reduced font size */
            display: flex;
            align-items: center;
            transition: background-color 0.3s;
            /* Smooth transition */
        }

        .nav-link:hover {
            background-color: red;
            /* Change to red on hover */
            color: #fff;
            /* Change text color to white for better contrast */
        }

        .nav-icon {
            width: 18%;
            /* Adjust icon size */
            height: 18%;
            /* Adjust icon size */
            margin-right: 10px;
            /* Space between icon and text */
        }

        /* Main Content Styles */
        .content {
            width: 80%;
            /* 80% of the container */
            padding: 10px;
            /* Padding for content */
            overflow-y: auto;
            /* Enable vertical scrolling for content only */
        }

        /* Form Section */
        .form-section {
            background-color: #e8e8ff;
            padding: 25px;
            /* Padding for the form */
            flex: 1;
            /* Allow it to take available space */
            overflow-y: auto;
            /* Allow scrolling inside the form */
        }

        /* Form Row for Two-Column Layout */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            /* Two equal columns */
            column-gap: 30px;
            /* Space between columns */
            margin-bottom: 20px;
            /* Space below the form row */
        }

        /* Left and Right Columns Styling */
        .left-column,
        .right-column {
            display: flex;
            flex-direction: column;
            gap: 20px;
            /* Space between rows within the column */
        }

        /* Left Inner Row Styling */
        .left-inner-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            /* Two equal columns */
            column-gap: 30px;
            /* Space between inner columns */
        }

        /* Input Styles */
        .form-row input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            /* Border radius for input fields */
            font-family: 'Oxanium', sans-serif;
            width: 100%;
            /* Full width of each grid column by default */
        }

        /* Small Input Styles */
        .small-input {
            width: 30%;
            /* Make small inputs narrower */
        }

        /* EMP ID Input Styles */
        .emp-id-input {
            width: 100%;
            /* Full width to take up the space of two rows */
        }

        /* Submit Button Styles */
        .submit-container {
            text-align: right;
            margin-top: 200px;
            /* Space before the button */
        }

        .btn-submit {
            padding: 10px 30px;
            background-color: #365C96;
            /* Button color */
            color: white;
            border: none;
            border-radius: 20px;
            /* Rounded corners */
            cursor: pointer;
            /* Pointer on hover */
        }

        .btn-submit:hover {
            background-color: #ff8c00;
            /* Darker shade on hover */
        }

        /* Footer Styles */
        .footer {
            background-color: #ffa500;
            color: white;
            text-align: center;
            padding: 10px 0;
            /* Padding for footer */
            margin-top: auto;
            /* Push footer to the bottom */
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
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link"><img src="{{ asset('images/3.png') }}" alt="Bookings" class="nav-icon">
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
                        <a class="nav-link" href="{{ url('hr-management') }}"><img
                                src="{{ asset('images/5.png') }}" alt="HRM" class="nav-icon"> HRM</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ asset('images/6.png') }}" alt="CRM"
                                class="nav-icon"> CRMHRM (under development...)</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ asset('images/7.png') }}" alt="Inventory"
                                class="nav-icon"> INVENTORYHRM (under development...)</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ asset('images/8.png') }}" alt="Accounting"
                                class="nav-icon"> ACCOUNTINGHRM (under development...)</a>
                    </div>
                </nav>
            </div>

            <!-- Form Section -->
            <div class="content">
                <div class="form-section">
                    <form>
                        <!-- First Row -->
                        <div class="form-row">
                            <div class="left-column">
                                <div class="left-inner-row">
                                    <input type="text" class="small-input" placeholder="Mr">
                                    <input type="text" placeholder="First Name">
                                </div>
                                <div class="left-inner-row">
                                    <input type="text" class="small-input" placeholder="+94">
                                    <input type="text" placeholder="Mobile Number">
                                </div>
                            </div>
                            <div class="right-column">
                                <input type="text" placeholder="Last Name">
                                <input type="text" placeholder="Joining Date">
                            </div>
                        </div>

                        <!-- Second Row -->
                        <div class="form-row">
                            <div class="left-column">
                                <input type="text" placeholder="E-mail Address">
                                <input type="text" placeholder="Select District">
                            </div>
                            <div class="right-column">
                                <input type="text" placeholder="NIC Number">
                                <input type="text" placeholder="EMP ID" class="emp-id-input">
                            </div>
                        </div>

                        <!-- Full Address Row -->
                        <div class="form-row">
                            <input type="text" placeholder="Address" style="grid-column: span 2;">
                        </div>

                        <!-- Submit Button -->
                        <div class="submit-container">
                            <button type="submit" class="btn-submit">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© 2024. All rights reserved. Designed by Ezone IT Solutions.</p>
        </div>
    </div>
</body>

</html>
