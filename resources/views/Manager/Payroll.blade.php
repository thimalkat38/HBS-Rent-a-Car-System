<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HBS Car Rental Management System</title>
    <!-- Google Fonts for Oxanium -->
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;700&display=swap" rel="stylesheet">
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
                        <a class="nav-link" href="{{ url('manager/dashboard') }}"><img
                                src="{{ asset('images/1.png') }}" alt="Dashboard" class="nav-icon"> DASHBOARD</a>
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
                            <a class="nav-link active" href="{{ url('hr-management') }}"><img
                                    src="{{ asset('images/5.png') }}" alt="HRM" class="nav-icon"> HRM</a>
                        </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ asset('images/6.png') }}" alt="CRM"
                                class="nav-icon"> CRM (under development...)</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('inventory.index') }}">
                            <img src="{{ asset('images/7.png') }}" alt="Inventory" class="nav-icon">
                            INVENTORY (under development...)
                        </a>
                    </div>                    
                    <div class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ asset('images/8.png') }}" alt="Accounting"
                                class="nav-icon"> ACCOUNTING (under development...)</a>
                    </div>
                </nav>
            </div>

            <!-- Form Section -->
            <div class="table-content">
                <div class="form-section">
                    <form>
                        <div class="form-row">
                            <select class="selection-list">
                                <option value="Year" disabled selected>Select Year</option>
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
                            </select>
                            <select class="selection-list">
                                <option value="Month" disabled selected>Select Month</option>
                                <option>Month 1</option>
                                <option>Month 2</option>
                                <option>Month 3</option>
                            </select>
                            <div class="card1">
		                    <div class="card1-content">
		                        <div class="card1-submit-container">
		                            <a class="nav-link" href="{{url('addpayroll')}}"> Add Payment</a>
		                        </div>
		                    </div>
		                    </div>
                        </div>
                    </form>
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>EMP ID</th>
                            <th>EMPLOYEE NAME</th>
                            <th>ACCOUNT NUMBER</th>
                            <th>PAID DATE</th>
                            <th>PAID AMMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>E001</td>
                            <td>Mohamed sahan</td>
                            <td>8524894656788</td>
                            <td>2024-10-10</td>
                            <td>RS 59000</td>
                        </tr>
                        <tr>
                            <td>E001</td>
                            <td>Mohamed sahan</td>
                            <td>8524894656788</td>
                            <td>2024-10-10</td>
                            <td>RS 59000</td>
                        </tr>
                        <tr>
                            <td>E001</td>
                            <td>Mohamed sahan</td>
                            <td>8524894656788</td>
                            <td>2024-10-10</td>
                            <td>RS 59000</td>
                        </tr>
                        <tr>
                            <td>E001</td>
                            <td>Mohamed sahan</td>
                            <td>8524894656788</td>
                            <td>2024-10-10</td>
                            <td>RS 59000</td>
                        </tr>
                        <tr>
                            <td>E001</td>
                            <td>Mohamed sahan</td>
                            <td>8524894656788</td>
                            <td>2024-10-10</td>
                            <td>RS 59000</td>
                        </tr>
                        <tr>
                            <td>E001</td>
                            <td>Mohamed sahan</td>
                            <td>8524894656788</td>
                            <td>2024-10-10</td>
                            <td>RS 59000</td>
                        </tr>
                        <tr>
                            <td>E001</td>
                            <td>Mohamed sahan</td>
                            <td>8524894656788</td>
                            <td>2024-10-10</td>
                            <td>RS 59000</td>
                        </tr>
                        <tr>
                            <td>E001</td>
                            <td>Mohamed sahan</td>
                            <td>8524894656788</td>
                            <td>2024-10-10</td>
                            <td>RS 59000</td>
                        </tr>
                        <tr>
                            <td>E001</td>
                            <td>Mohamed sahan</td>
                            <td>8524894656788</td>
                            <td>2024-10-10</td>
                            <td>RS 59000</td>
                        </tr>
                        <tr>
                            <td>E001</td>
                            <td>Mohamed sahan</td>
                            <td>8524894656788</td>
                            <td>2024-10-10</td>
                            <td>RS 59000</td>
                        </tr>
                        <tr>
                            <td>E001</td>
                            <td>Mohamed sahan</td>
                            <td>8524894656788</td>
                            <td>2024-10-10</td>
                            <td>RS 59000</td>
                        </tr>
                    </tbody>
                </table>
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
