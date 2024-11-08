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
            display: flex; /* Use flexbox for centering */
            justify-content: flex-end; /* Align content to the right */
            overflow-y: auto; /* Enable vertical scrolling for content only */
            padding: 15px 15px;
        }

        table {
            margin-top: 0px; /* Add some space above the table */
            width: 100%; /* Make the table take full width of the content area */
            border-collapse: collapse; /* Collapse borders */
        }

        th {
            background-color: #FA000B; /* Set header background color to red */
            color: white; /* Change text color to white for better contrast */
            height: 30px; /* Set a fixed height for header cells */
        }

        tr {
            height: 30px; /* Set a fixed height for table rows */
        }

        tr:nth-child(odd) {
            background-color: #FFAA0066; /* Light gray background for odd rows */
        }

        tr:nth-child(even) {
            background-color: #B4FEB3; /* Light green background for even rows */
        }

        td {
            text-align: center; /* Center-align text in table cells */
            border: none; /* Remove cell borders */
            padding: 0; /* Remove padding for uniform height */
        }



/* Footer Styles */
.footer {
    background-color: #ffa500;
    color: white;
    text-align: center;
    padding: 10px 0; /* Padding for footer */
    margin-top: auto; /* Push footer to the bottom */
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

                <div class="content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>B/N</th>
                            <th>C/NAME</th>
                            <th>FROM</th>
                            <th>TO</th>
                            <th>TIME</th>
                            <th>V/TYPE</th>
                            <th>V/NO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>0001</td>
                            <td>Mohamed sahan</td>
                            <td>2024-09-29</td>
                            <td>2024-09-30</td>
                            <td>09:30 AM</td>
                            <td>CAR</td>
                            <td>DAD-4141</td>
                        </tr>
                        <tr>
                            <td>0002</td>
                            <td>Mohamed sahan</td>
                            <td>2024-09-29</td>
                            <td>2024-09-30</td>
                            <td>09:30 AM</td>
                            <td>CAR</td>
                            <td>DAD-4141</td>
                        </tr>
                        <tr>
                            <td>0003</td>
                            <td>Mohamed sahan</td>
                            <td>2024-09-29</td>
                            <td>2024-09-30</td>
                            <td>09:30 AM</td>
                            <td>CAR</td>
                            <td>DAD-4141</td>
                        </tr>
                        <tr>
                            <td>0004</td>
                            <td>Mohamed sahan</td>
                            <td>2024-09-29</td>
                            <td>2024-09-30</td>
                            <td>09:30 AM</td>
                            <td>CAR</td>
                            <td>DAD-4141</td>
                        </tr>
                        <tr>
                            <td>0005</td>
                            <td>Mohamed sahan</td>
                            <td>2024-09-29</td>
                            <td>2024-09-30</td>
                            <td>09:30 AM</td>
                            <td>CAR</td>
                            <td>DAD-4141</td>
                        </tr>
                        <tr>
                            <td>0006</td>
                            <td>Mohamed sahan</td>
                            <td>2024-09-29</td>
                            <td>2024-09-30</td>
                            <td>09:30 AM</td>
                            <td>CAR</td>
                            <td>DAD-4141</td>
                        </tr>
                        <tr>
                            <td>0007</td>
                            <td>Mohamed sahan</td>
                            <td>2024-09-29</td>
                            <td>2024-09-30</td>
                            <td>09:30 AM</td>
                            <td>CAR</td>
                            <td>DAD-4141</td>
                        </tr>
                        <tr>
                            <td>0008</td>
                            <td>Mohamed sahan</td>
                            <td>2024-09-29</td>
                            <td>2024-09-30</td>
                            <td>09:30 AM</td>
                            <td>CAR</td>
                            <td>DAD-4141</td>
                        </tr>
                        <tr>
                            <td>0009</td>
                            <td>Mohamed sahan</td>
                            <td>2024-09-29</td>
                            <td>2024-09-30</td>
                            <td>09:30 AM</td>
                            <td>CAR</td>
                            <td>DAD-4141</td>
                        </tr>
                        <tr>
                            <td>00010</td>
                            <td>Mohamed sahan</td>
                            <td>2024-09-29</td>
                            <td>2024-09-30</td>
                            <td>09:30 AM</td>
                            <td>CAR</td>
                            <td>DAD-4141</td>
                        </tr>
                        <tr>
                            <td>00011</td>
                            <td>Mohamed sahan</td>
                            <td>2024-09-29</td>
                            <td>2024-09-30</td>
                            <td>09:30 AM</td>
                            <td>CAR</td>
                            <td>DAD-4141</td>
                        </tr>
                        <tr>
                            <td>00012</td>
                            <td>Mohamed sahan</td>
                            <td>2024-09-29</td>
                            <td>2024-09-30</td>
                            <td>09:30 AM</td>
                            <td>CAR</td>
                            <td>DAD-4141</td>
                        </tr>
                        <tr>
                            <td>00013</td>
                            <td>Mohamed sahan</td>
                            <td>2024-09-29</td>
                            <td>2024-09-30</td>
                            <td>09:30 AM</td>
                            <td>CAR</td>
                            <td>DAD-4141</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Copyright © 2022 Golden Ray. All Rights Reserved. Designed By Ezone IT SOLUTION</p>
        </div>
    </div>
</body>
</html>
