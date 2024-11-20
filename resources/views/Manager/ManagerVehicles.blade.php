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
                        <a class="nav-link active"><img src="{{ asset('images/2.png') }}" alt="Vehicles" class="nav-icon">
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
            {{-- Search --}}
            <div class="content">
                <div class="card6-form-row">
                    <div class="form-section">
                        <form action="{{ url('manager/vehicles') }}" method="GET">
                            <div class="form-row">
                                <input type="text" name="search" placeholder="Search by V/NUMBER"
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

                <!-- Vehicles Table -->
                <div class="table-content">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>CAR IMAGE</th>
                                <th>MANUFACTURER</th>
                                <th>VEHICLE NAME</th>
                                <th>REGISTER NUMBER</th>
                                <th>CHASSIS NUMBER</th>
                                <th>FUEL TYPE</th>
                                <th>PRICE PER DAY</th>
                                <th>FREE KM/DAY</th>
                                <th>Extra KM Price</th>
                                {{-- <th>ENGINE NUMBER</th>
                        <th>MODEL YEAR</th>
                        <th>FEATURES</th> --}}
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicles as $vehicle)
                                <tr>
                                    <td>{{ $vehicle->id }}</td>
                                    <td>
                                        @if (!empty($vehicle->images) && isset($vehicle->images[0]))
                                            <img src="{{ asset('storage/' . $vehicle->images[0]) }}" alt="Car Image">
                                        @else
                                            No Image Available
                                        @endif
                                    </td>

                                    <td>{{ $vehicle->vehicle_model }}</td>
                                    <td>{{ $vehicle->vehicle_name }}</td>
                                    <td>{{ $vehicle->vehicle_number }}</td>
                                    <td>{{ $vehicle->chassis_number }}</td>
                                    <td>{{ $vehicle->fuel_type }}</td>
                                    <td>{{ $vehicle->price_per_day }}</td>
                                    <td>{{ $vehicle->free_km }}</td>
                                    <td>{{ $vehicle->extra_km_chg }}</td>
                                    {{-- <td>{{ $vehicle->engine_number }}</td>
                            <td>{{ $vehicle->model_year }}</td> --}}
                                    {{-- <td class="text-start">
                                @foreach ($vehicle->features as $feature => $value)
                                    @if ($value)
                                        {{ strtoupper(str_replace('_', ' ', $feature)) }}<br>
                                    @endif
                                @endforeach
                            </td> --}}
                                    <td class="button-cell">
                                        <a href="{{ route('vehicles.edit', $vehicle->id) }}"
                                            class="btn-edit">Edit</a>
                                        {{-- <a href="{{ route('vehicles.destroy',$vehicle->id)}}" class="btn_red-button">Delete</a> --}}
                                        <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete"
                                                onclick="return confirm('Are you sure you want to delete this vehicle?')">Delete</button>
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
</body>

</html>
