<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HBS Car Rental Management System</title>
    <!-- Google Fonts for Oxanium -->
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Internal CSS -->
    <style>
        /* Global Styles */
        body {
            font-family: 'Oxanium', sans-serif;
            font-weight: bold;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f9fa;
        }

        .container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Styles */
        .header {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #FFAA00;
            color: white;
            height: 60px;
        }

        .logo-icon {
            width: 150px;
            height: 85px;
            margin-left: 50px;
        }

        .logo-section {
            flex-shrink: 0;
        }

        .header-title {
            flex-grow: 1;
            text-align: center;
            font-size: 1.5rem;
        }

        /* Main Content Styles */
        .main-content {
            display: flex;
            flex: 1;
            overflow: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 20%;
            background-color: #ffcfd1;
            padding: 10px;
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
            padding: 10px;
            text-decoration: none;
            font-size: 1rem;
            display: flex;
            align-items: center;
            transition: background-color 0.3s;
        }

        .nav-link:hover {
            background-color: red;
            color: #fff;
        }

        .nav-icon {
            width: 18%;
            height: 18%;
            margin-right: 10px;
        }

        /* Main Content Styles */
        .content {
            width: 80%;
            padding: 10px;
            overflow-y: auto;
        }

        /* Form Section */
        .form-section {
            background-color: #e8e8ff;
            padding: 20px;
            flex: 1;
            overflow-y: auto;
        }

        /* Form Row Styles */
        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-row input {
            width: calc(50% - 10px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: 'Oxanium', sans-serif;
        }

        /* Upload Section Styles */
        .upload-section {
            border: 2px dashed #bbb;
            text-align: center;
            background-color: #f7f7f7;
            font-weight: bold;
            color: #666;
        }

        .upload-icon {
            width: 50px;
            height: 50px;
            margin-bottom: 0px;
            margin-top: 5px;
        }

        /* Checkbox Section Styles */
        .checkbox-section {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 20px;
        }

        .checkbox-section div {
            flex: 1 1 30%;
        }

        .checkbox-section input {
            margin-right: 5px;
        }

        /* Submit Button Styles */
        .submit-container {
            text-align: right;
            margin-top: 10px;
        }

        .btn-submit {
            padding: 10px 30px;
            background-color: #365C96;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-family: 'Oxanium', sans-serif;
        }

        .btn-submit:hover {
            background-color: #ff8c00;
        }

        /* Footer Styles */
        .footer {
            background-color: #ffa500;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: auto;
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
                            <input type="text" placeholder="Vehicle Name">
                            <input type="text" placeholder="Select Vehicle Type">
                        </div>
                        <div class="form-row">
                            <input type="text" placeholder="Select Fuel Type">
                            <input type="text" placeholder="Select Vehicle Model">
                        </div>
                        <div class="form-row">
                            <input type="text" placeholder="Vehicle Number">
                            <input type="text" placeholder="Engine Number">
                        </div>
                        <div class="form-row">
                            <input type="text" placeholder="Chassis Number">
                            <input type="text" placeholder="Rent per Day">
                        </div>

                        <!-- Upload Section -->
                        <div class="form-row upload-section">
                            <img src="upload.png" class="upload-icon" alt="Upload">
                            <p>Upload Vehicle Documents</p>
                            <input type="file">
                        </div>

                        <!-- Checkboxes Section -->
                        <div class="checkbox-section">
                            <div>
                                <input type="checkbox"> GPS
                            </div>
                            <div>
                                <input type="checkbox"> Sunroof
                            </div>
                            <div>
                                <input type="checkbox"> Heated Seats
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="submit-container">
                            <button type="submit" class="btn-submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; 2023 HBS Car Rental Management System
        </div>
    </div>
</body>
</html>
