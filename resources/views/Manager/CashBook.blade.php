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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .report-container {
            background-color: #ddd;
            padding: 20px;
            border-radius: 10px;
            max-width: 900px;
            margin: 30px auto;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .filter-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .filter-section input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            width: 200px;
        }

        .filter-section .filter-btn {
            background-color: #34568B;
            color: white;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 5px;
            text-align: center;
            border: none;
            cursor: pointer;
        }

        .filter-section .filter-btn:hover {
            background-color: #2b3e63;
        }

        .section-title {
            background-color: #a8e6a3;
            padding: 10px;
            font-weight: bold;
            border-radius: 5px;
            margin-top: 10px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .table-container {
            background-color: white;
            padding: 10px;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #6ca0dc;
            font-weight: bold;
        }

        .cash-in-hand {
            margin-top: 10px;
            background-color: white;
            padding: 10px;
            border-radius: 5px;
        }

        .cash-in-hand th {
            background-color: #e5e5e5;
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
                        <a class="nav-link active" href="{{ url('manager/dashboard') }}">
                            <img src="{{ asset('images/1.png') }}" alt="Dashboard" class="nav-icon"> DASHBOARD
                        </a>
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
                        <a class="nav-link" href="#"><img src="{{ asset('images/8.png') }}" alt="Accounting"
                                class="nav-icon"> Finance</a>
                        <div class="dropdown-menu">
                            {{-- <a class="dropdown-link" href="{{ url('/customers/create') }}">Expences</a> --}}
                            <a class="dropdown-link" href="{{ url('customers') }}">P/L Report</a>
                            <a class="dropdown-link" href="{{ url('customers') }}">Cash Book</a>
                        </div>

                    </div>
                </nav>
            </div>
            <div class="report-container">

                <!-- Filter Section -->
                <div class="filter-section">
                    <button class="filter-btn">From</button>
                    <input type="text" placeholder="MM/DD/YYYY">
                    <button class="filter-btn">TO</button>
                    <input type="text" placeholder="MM/DD/YYYY">
                    <button class="filter-btn">Search</button>
                </div>

                <!-- Cash Inflow & Cash Outflow -->
                <div class="grid-container">
                    <div>
                        <div class="section-title">Cash Inflow</div>
                        <div class="table-container">
                            <table>
                                <tr>
                                    <th>Description</th>
                                    <th>Amount</th>
                                </tr>
                                <tr>
                                    <td>Sale</td>
                                    <td>0.00LKR</td>
                                </tr>
                                <tr>
                                    <td><b>Total</b></td>
                                    <td><b>0.00LKR</b></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div>
                        <div class="section-title">Cash Outflow</div>
                        <div class="table-container">
                            <table>
                                <tr>
                                    <th>Description</th>
                                    <th>Amount</th>
                                </tr>
                                <tr>
                                    <td>Purchasing</td>
                                    <td>0.00LKR</td>
                                </tr>
                                <tr>
                                    <td>Expenses</td>
                                    <td>0.00LKR</td>
                                </tr>
                                <tr>
                                    <td><b>Total</b></td>
                                    <td><b>0.00LKR</b></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Cash In Hand -->
                <div class="section-title">Cash In Hand</div>
                <div class="cash-in-hand">
                    <table>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                        <tr>
                            <td>Total Cash Inflow</td>
                            <td>0.00LKR</td>
                        </tr>
                        <tr>
                            <td>Total Cash Outflow</td>
                            <td>0.00LKR</td>
                        </tr>
                        <tr>
                            <td><b>Cash In Hand</b></td>
                            <td><b>0.00LKR</b></td>
                        </tr>
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
