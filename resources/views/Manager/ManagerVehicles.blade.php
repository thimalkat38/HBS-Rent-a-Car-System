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
                        <a class="nav-link active"><img src="{{ asset('images/2.png') }}" alt="Vehicles"
                                class="nav-icon">
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
                            <img src="{{ asset('images/7.png') }}" alt="Inventory" class="nav-icon">
                            INVENTORY
                        </a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ asset('images/8.png') }}" alt="Accounting"
                                class="nav-icon"> Finance</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-link" href="{{ url('expenses') }}">Expences</a>
                                    <a class="dropdown-link" href="{{ url('profit-loss-report') }}">P/L Report</a>
                                    {{-- <a class="dropdown-link" href="{{ url('customers') }}">Cash Book</a> --}}
                                </div>
                    </div>
                </nav>
            </div>
            {{-- Search --}}
            <div class="content">
                <div class="card6-form-row">
                    <div class="form-section">
                        <form action="{{ route('vehicles.search') }}" method="GET" id="searchForm">
                            <div class="form-row">
                                <!-- Vehicle Number Input (Auto-Search on Typing) -->
                                <input type="text" name="vehicle_number" placeholder="Search by Vehicle Number"
                                    value="{{ request('vehicle_number') }}" oninput="autoSubmitForm()">

                                <!-- Vehicle Name Input (Auto-Search on Typing) -->
                                <input type="text" name="vehicle_name" placeholder="Search by Vehicle Name"
                                    value="{{ request('vehicle_name') }}" oninput="autoSubmitForm()">

                                <!-- Fuel Type Dropdown (Hardcoded Options, Search on Selection) -->
                                <select name="fuel_type" onchange="document.getElementById('searchForm').submit();">
                                    <option value="">Select Fuel Type</option>
                                    <option value="Petrol" {{ request('fuel_type') == 'Petrol' ? 'selected' : '' }}>
                                        Petrol</option>
                                    <option value="Diesel" {{ request('fuel_type') == 'Diesel' ? 'selected' : '' }}>
                                        Diesel</option>
                                    <option value="Electric"
                                        {{ request('fuel_type') == 'Electric' ? 'selected' : '' }}>Electric</option>
                                </select>

                                <!-- ID Range Dropdown (Search on Selection) -->
                                <select name="id_range" onchange="document.getElementById('searchForm').submit();">
                                    <option value="">Select ID Range</option>
                                    <option value="1-10" {{ request('id_range') == '1-10' ? 'selected' : '' }}>1-10
                                    </option>
                                    <option value="11-20" {{ request('id_range') == '11-20' ? 'selected' : '' }}>
                                        11-20</option>
                                    <option value="21-30" {{ request('id_range') == '21-30' ? 'selected' : '' }}>
                                        21-30</option>
                                    <option value="31-40" {{ request('id_range') == '31-40' ? 'selected' : '' }}>
                                        31-40</option>
                                    <option value="41-50" {{ request('id_range') == '41-50' ? 'selected' : '' }}>
                                        41-50</option>
                                    <option value="50+" {{ request('id_range') == '50+' ? 'selected' : '' }}>50+
                                    </option>
                                </select>

                                <!-- Remove Search Button -->
                                <a href="{{ url('manager/vehicles') }}" class="btn-search">Clear</a>
                            </div>

                            <div class="flex justify-center items-center bg-gray-100 p-4 rounded-lg shadow-md">
                                <div class="text-center">
                                    <h2 class="text-lg font-semibold text-gray-700">Total Vehicles =
                                        {{ \App\Models\Vehicle::count() }}</h2>
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
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicles as $vehicle)
                                <tr onclick="window.location='{{ route('vehicles.show', $vehicle->id) }}'"
                                    style="cursor: pointer;">
                                    <td>{{ $vehicle->id }}</td>
                                    <td>
                                        @if ($vehicle->display_image)
                                            <img src="{{ asset('storage/' . $vehicle->display_image) }}"
                                                alt="Car Image" style="width: 100px; height: auto;">
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
                                    <td class="button-cell">
                                        <a href="{{ route('services.index', ['vehicle_number' => $vehicle->vehicle_number]) }}" class="btn-blue">
                                            Services
                                        </a>                                        
                                            <a href="{{ route('vehicles.edit', $vehicle->id) }}"
                                                class="btn-edit">Edit</a>
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
<script>
    let typingTimer;

    // Auto-submit form when typing (with delay)
    function autoSubmitForm() {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(() => {
            document.getElementById('searchForm').submit();
        }, 500); // 0.5-second delay to prevent excessive requests
    }
</script>



</html>
