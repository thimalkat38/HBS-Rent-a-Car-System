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
                        <a class="nav-link" href="{{ url('hr-management') }}"><img src="{{ asset('images/5.png') }}"
                                alt="HRM" class="nav-icon"> HRM</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ url('crms') }}"><img src="{{ asset('images/6.png') }}"
                                alt="CRM" class="nav-icon"> CRM</a>
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

            <!-- Main Content -->
            <div class="content">
                <div class="card6-form-row">
                    <div class="form-section">
                        {{-- Search --}}
                        <form action="{{ url('postbookings') }}" method="GET">
                            <div class="form-row">
                                <!-- Vehicle Number Field -->
                                <input type="text" id="vehicle_number" name="vehicle_number" list="vehicle_numbers"
                                    class="block w-full mt-1" placeholder="Filter by vehicle number" maxlength="8"
                                    oninput="formatVehicleNumber(this)" value="{{ request('vehicle_number') }}">
                        
                                <!-- From Date Field -->
                                <input type="date" name="from_date" placeholder="Filter by From Date"
                                    value="{{ request('from_date') }}">
                        
                                <!-- Order Dropdown -->
                                <select name="order">
                                    <option value="">Select Range</option>
                                    <option value="1-20" {{ request('order') == '1-20' ? 'selected' : '' }}>1-20</option>
                                    <option value="21-40" {{ request('order') == '21-40' ? 'selected' : '' }}>21-40</option>
                                    <option value="41-60" {{ request('order') == '41-60' ? 'selected' : '' }}>41-60</option>
                                    <option value="61-80" {{ request('order') == '61-80' ? 'selected' : '' }}>61-80</option>
                                    <option value="81-100" {{ request('order') == '81-100' ? 'selected' : '' }}>81-100</option>
                                    <option value="101-120" {{ request('order') == '101-120' ? 'selected' : '' }}>101-120</option>
                                    <option value="121-140" {{ request('order') == '121-140' ? 'selected' : '' }}>121-140</option>
                                    <option value="141-160" {{ request('order') == '141-160' ? 'selected' : '' }}>141-160</option>
                                </select>
                        
                                <!-- Search Button -->
                                <div class="card1">
                                    <div class="card1-content">
                                        <button type="submit" class="btn-search">SEARCH</button> ||
                                        <a href="{{ url('/postbookings') }}" class="btn-search">Clear</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        


                    </div>
                </div>
                <div class="table-content">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th style="width: 150px;">Vehicle</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Released Price</th>
                                <th>Additional Charges(after)</th>
                                <th>Reason for Add chg</th>
                                <th>Discount Price(after)</th>
                                <th>Total Income</th>
                                <th>Due Paid</th>
                                <th>Deposit Refunded</th>
                                <th>Vehicle Checked</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($postBookings as $postBooking)
                            <tr>
                                    <td>{{ $postBooking->full_name }}</td>
                                    <td>{{ $postBooking->vehicle }} <br> [{{ $postBooking->vehicle_number }}]</td>
                                    <td>{{ $postBooking->from_date }}</td>
                                    <td>{{ $postBooking->to_date }}</td>
                                    <td>{{ $postBooking->base_price }}</td>
                                    <td>{{ $postBooking->after_additional }}</td>
                                    <td>{{ $postBooking->reason }}</td>
                                    <td>{{ $postBooking->after_discount }}</td>
                                    <td>{{ $postBooking->total_income }}</td>
                                    <td>{{ $postBooking->due_paid ? 'Yes' : 'No' }}</td>
                                    <td>{{ $postBooking->deposit_refunded ? 'Yes' : 'No' }}</td>
                                    <td>{{ $postBooking->vehicle_checked ? 'Yes' : 'No' }}</td>
                                    <td><a href="{{ route('postbookings.show', $postBooking->id) }}" class="btn-edit">Details</a></td>
                                </tr>
                            @endforeach
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
