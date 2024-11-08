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
                        <a class="nav-link active"><img src="{{ asset('images/3.png') }}" alt="Bookings" class="nav-icon">
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
                        <a class="nav-link"><img src="{{ asset('images/5.png') }}" alt="HRM" class="nav-icon"> HRM
                            (under development...)</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('manager/addemp') }}">Add Employee</a>
                            <a class="dropdown-link" href="{{ url('manager/emp') }}">List Employee</a>
                            <a class="dropdown-link" href="{{ url('hrm/details') }}">Employee Details</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ asset('images/6.png') }}" alt="CRM"
                                class="nav-icon"> CRM (under development...)</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ asset('images/7.png') }}" alt="Inventory"
                                class="nav-icon"> INVENTORY (under development...)</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ asset('images/8.png') }}" alt="Accounting"
                                class="nav-icon"> ACCOUNTING (under development...)</a>
                    </div>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="content">
                <div class="card6-form-row">
                    <div class="form-section">
                        {{-- Search --}}
                        <form action="{{ url('bookings') }}" method="GET">
                            <div class="form-row">
                                <input type="text" name="search" placeholder="Search by Mobile Number"
                                    value="{{ request('search') }}">

                                <div class="card1">
                                    <div class="card1-content">
                                        <form action="#" method="post" style="display:inline;">
                                            <button type="submit" class="btn-search">SEARCH</button>
                                        </form>
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
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Vehicle Number</th>
                                <th>Mobile Number</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr onclick="window.location='{{ route('bookings.show', $booking->id) }}'">
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->full_name }}</td>
                                    <td>{{ $booking->from_date }}</td>
                                    <td>{{ $booking->to_date }}</td>
                                    <td>{{ $booking->vehicle_number }}</td>
                                    <td>{{ $booking->mobile_number }}</td>
                                    <td>{{ $booking->price }}</td>
                                    <td class="button-cell">
                                        <a href="{{ route('bookings.edit', $booking->id) }}"
                                            class="btn-edit">Edit</a>
                                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete"
                                                onclick="return confirm('Are you sure you want to delete this booking?')">Delete</button>
                                        </form>
                                    </td>
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
