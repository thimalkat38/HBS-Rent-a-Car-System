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

        .text-start {
            text-align: left;
        }

        a:-webkit-any-link {
            color: -webkit-link;
            cursor: pointer;
            color: white;
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

        /* Content Styles */
        .content {
            width: 80%;
            padding: 10px;
            overflow-y: auto;
        }

        /* Calendar Body Styles */
        .calendar {
            background-color: #4105DB1A;
            padding: 15px 15px;
            border-radius: 8px;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .month-nav {
            padding: 10px 10px;
            background-color: #FFAA00;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            width: 80px;
        }

        .calendar-days-header {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            text-align: center;
            font-weight: bold;
            padding-bottom: 40px;
            border-bottom: 1px solid black;
        }

        .calendar-day-name {
            height: 180%;
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10%;
            background-color: #fff;
            font-weight: bold;
            cursor: pointer;
        }

        .calendar-days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
            padding: 1% 1%;
        }

        .calendar-day {
            height: 90%;
            width: 30%;
            padding: 4% 4%;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: #e6e1f7;
            font-weight: bold;
            cursor: pointer;
        }

        .calendar-day:hover {
            background-color: #fff;
        }

        .available {
            background-color: #05FA004D;
            color: #fff;
        }

        .onsite {
            background-color: #FFAA004D;
            color: #fff;
        }

        .onhire {
            background-color: #FA000B4D;
            color: #fff;
        }

        /* Status Summary Styles */
        .status-summary {
            display: flex;
            gap: 20px;
            padding-top: 15px;
        }

        .status-box {
            flex: 1;
            padding: 15px 15px;
            border-radius: 8px;
            text-align: center;
            font-size: 1.2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .status-box img {
            width: 50px;
            height: 50px;
            border-radius: 15%;
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
            <div class="sign-out">
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

            <!-- Main Content Section -->
            <div class="content">
                <!-- Calendar Section -->
                <div class="calendar">
                    <div class="calendar-header">
                        <button class="month-nav">&lt; Prev</button>
                        <div class="month-year">October 2024</div>
                        <button class="month-nav">Next &gt;</button>
                    </div>
                    <div class="calendar-days-header">
                        <div class="calendar-day-name">Sun</div>
                        <div class="calendar-day-name">Mon</div>
                        <div class="calendar-day-name">Tue</div>
                        <div class="calendar-day-name">Wed</div>
                        <div class="calendar-day-name">Thu</div>
                        <div class="calendar-day-name">Fri</div>
                        <div class="calendar-day-name">Sat</div>
                    </div>
                    <div class="calendar-days">
                        <div class="calendar-day available">1</div>
                        <div class="calendar-day onsite">2</div>
                        <div class="calendar-day onhire">3</div>
                        <div class="calendar-day available">4</div>
                        <div class="calendar-day onsite">5</div>
                        <div class="calendar-day onhire">6</div>
                        <div class="calendar-day available">7</div>
                        <!-- Add more days as needed -->
                    </div>
                </div>

                <!-- Status Summary Section -->
                <div class="status-summary">
                    <div class="status-box available">
                        <img src="{{ asset('images/a.png') }}" alt="Available Icon">
                        Available: 12
                    </div>
                    <div class="status-box onsite">
                        <img src="{{ asset('images/b.png') }}" alt="Onsite Icon">
                        Onsite: 5
                    </div>
                    <div class="status-box onhire">
                        <img src="{{ asset('images/c.png') }}" alt="Onhire Icon">
                        On Hire: 8
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; 2024 HBS Car Rental Management System
        </div>
    </div>
</body>
</html>
