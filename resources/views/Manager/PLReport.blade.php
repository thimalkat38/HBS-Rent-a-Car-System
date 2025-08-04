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
        /* General Styles */
        body {
            font-family: 'Oxanium', Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        /* Report Container */
        .report-container {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 12px;
            max-width: 900px;
            margin: 30px auto;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            border-left: 5px solid #34568B;
        }

        /* Report Header */
        .report-header {
            text-align: center;
            font-weight: bold;
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #34568B;
        }

        /* Filters */

        form label {
            font-weight: bold;
            color: #333;
        }

        form select,
        form input {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
            margin-bottom: 10px;
        }

        /* Clear Button */
        .btn.btn-secondary {
            background-color: #ff4d4d;
            color: white;
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn.btn-secondary:hover {
            background-color: #d93636;
        }

        /* Grid Layout for Report */
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .section {
            display: flex;
            flex-direction: column;
        }

        /* Expense and Income Items */
        .expense-item,
        .income-item {
            display: flex;
            justify-content: space-between;
            padding: 12px;
            font-weight: bold;
            border-radius: 5px;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .expense-item {
            background-color: #f8d7da;
            color: #721c24;
        }

        .income-item {
            background-color: #d4edda;
            color: #155724;
        }

        /* Summary */
        .summary {
            font-weight: bold;
            padding: 12px;
            background-color: #ffc107;
            text-align: center;
            border-radius: 8px;
            color: #212529;
            margin-top: 15px;
        }

        /* Export Button */
        .export-btn {
            background-color: #34568B;
            color: white;
            font-weight: bold;
            padding: 10px 18px;
            border-radius: 6px;
            text-align: center;
            display: block;
            text-decoration: none;
            width: fit-content;
            margin: 20px auto;
            transition: background 0.3s;
        }

        .export-btn:hover {
            background-color: #2b3e63;
        }
    </style>

</head>

<body>
    @php
        $bName = \App\Models\Business::where('id', auth()->user()->business_id)->value('b_name');
        $bLogo = \App\Models\Business::where('id', auth()->user()->business_id)->value('logo');
    @endphp
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo-section">
                <img src="{{ $bLogo ? asset('storage/' . $bLogo) : asset('images/logo.png') }}" class="logo-icon"
                    alt="HBS Car Rental Logo">

            </div>

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
                        <a class="nav-link" href="{{ url('manager/dashboard') }}">
                            <img src="{{ asset('images/1.png') }}" alt="Dashboard" class="nav-icon"> DASHBOARD
                        </a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link"><img src="{{ asset('images/2.png') }}" alt="Vehicles" class="nav-icon">
                            VEHICLES</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('addvehicle') }}">Add Vehicle</a>
                            <a class="dropdown-link" href="{{ url('allvehicles') }}">All Vehicles</a>
                            <a class="dropdown-link" href="{{ url('vehicle_owners') }}">Vehicle Owner Management</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link"><img src="{{ asset('images/3.png') }}" alt="Bookings" class="nav-icon">
                            BOOKINGS</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('addbooking') }}">Book Vehicle</a>
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
                        <a class="nav-link active" href="#"><img src="{{ asset('images/8.png') }}"
                                alt="Accounting" class="nav-icon"> Finance</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('expenses') }}">Expences</a>
                            <a class="dropdown-link" href="{{ url('profit-loss-report') }}">P/L Report</a>
                            {{-- <a class="dropdown-link" href="{{ url('customers') }}">Cash Book</a> --}}
                        </div>
                    </div>
                </nav>
            </div>
            {{-- <div class="table-content"> --}}
            <div class="form-section">
                <div class="report-header">Profit / Loss Report</div>
                <form method="GET" action="{{ route('profit.loss') }}" id="filterForm">
                    <label for="filterType">Filter Type:</label>
                    <select id="filterType" name="filterType" class="form-control" onchange="changeFilter()">
                        <option value="today" {{ request('filterType') == 'today' ? 'selected' : '' }}>Today</option>
                        <option value="this_month" {{ request('filterType') == 'this_month' ? 'selected' : '' }}>This
                            Month</option>
                        <option value="last_month" {{ request('filterType') == 'last_month' ? 'selected' : '' }}>Last
                            Month</option>
                        <option value="total" {{ request('filterType') == 'total' ? 'selected' : '' }}>Total</option>
                    </select>

                    <label for="startDate">Start Date:</label>
                    <input type="date" id="startDate" name="startDate" value="{{ request('startDate') }}"
                        class="form-control" onchange="clearDropdownAndSubmit()">

                    <label for="endDate">End Date:</label>
                    <input type="date" id="endDate" name="endDate" value="{{ request('endDate') }}"
                        class="form-control" onchange="clearDropdownAndSubmit()">

                    <a href="{{ route('profit.loss') }}" class="btn-submit">Clear</a><br><br>

                    <div class="grid-container">
                        <div class="section">
                            <div class="expense-item">Salary <span>RS {{ number_format($data['salary'], 2) }}</span>
                            </div>
                            <div class="expense-item">Advanced Salary <span>RS
                                    {{ number_format($data['advanced_salary'], 2) }}</span></div>
                            <div class="expense-item">Vehicle Services <span>RS
                                    {{ number_format($data['vehicle_services'], 2) }}</span></div>
                            <div class="expense-item">Vehicle Repair <span>RS
                                    {{ number_format($data['vehicle_repair'], 2) }}</span></div>
                            <div class="expense-item">Vehicle Maintains <span>RS
                                    {{ number_format($data['vehicle_maintenance'], 2) }}</span></div>
                            <div class="expense-item">Vehicle Owner Payment <span>RS
                                    {{ number_format($data['vehicle_owner_payment'], 2) }}</span></div>
                            <div class="expense-item">Fuel Chargers <span>RS
                                    {{ number_format($data['fuel_chargers'], 2) }}</span></div>
                            <div class="expense-item">Utility Bills <span>RS
                                    {{ number_format($data['utility_bills'], 2) }}</span></div>
                            <div class="expense-item">Stock In <span>RS
                                    {{ number_format($data['stock_in'], 2) }}</span></div>
                            <div class="expense-item">Travel fees <span>RS
                                    {{ number_format($data['travel_fees'], 2) }}</span></div>
                            <div class="expense-item">Office supplies <span>RS
                                    {{ number_format($data['office_supplies'], 2) }}</span></div>
                            <div class="expense-item">Other <span>RS
                                    {{ number_format($data['other_income'], 2) }}</span></div>
                        </div>
                        <div class="section">
                            <div class="income-item">Total Income By Rent <span>RS
                                    {{ number_format($data['total_income_by_rent'], 2) }}</span></div>
                            <div class="income-item">Other Income <span>RS 00000</span></div>
                        </div>
                    </div>


                    <div class="btn-container">
                        {{-- <div class="summary">Gross Profit: RS {{ number_format($data['gross_profit'], 2) }}</div> --}}
                        <div class="summary">Net Profit: RS {{ number_format($data['net_profit'], 2) }}</div>

                        {{-- <a href="#" class="export-btn">Export Excel</a> --}}
                    </div>

                </form>
            </div>
            {{-- </div> --}}
        </div>
        <!-- Footer -->
        <div class="footer">
            <p>© 2024. All rights reserved. Designed by Ezone IT Solutions.</p>
        </div>
</body>
<script>
    function changeFilter() {
        // Prevent accidental logout by ensuring correct form submission
        let form = document.getElementById('filterForm');
        if (form.action.includes('logout')) {
            event.preventDefault();
            console.warn("Logout prevented!"); // Debugging line
        }
        document.getElementById('startDate').value = '';
        document.getElementById('endDate').value = '';
        form.submit();
    }

    function clearDropdownAndSubmit() {
        document.getElementById('filterType').value = '';
        document.getElementById('filterForm').submit();
    }
</script>


</html>
