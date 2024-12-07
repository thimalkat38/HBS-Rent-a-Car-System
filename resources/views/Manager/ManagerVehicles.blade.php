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
                        <a class="nav-link" href="{{ url('hr-management') }}"><img
                                src="{{ asset('images/5.png') }}" alt="HRM" class="nav-icon"> HRM</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ url('crms') }}"><img src="{{ asset('images/6.png') }}" alt="CRM"
                                class="nav-icon"> CRM</a>
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
            {{-- Search --}}
            <div class="content">
                <div class="card6-form-row">
                    <div class="form-section">
                        <form action="{{ route('vehicles.search') }}" method="GET">
                            <div class="form-row">
                                <input type="text" name="vehicle_number" placeholder="Search by V/NUMBER"
                                    value="{{ request('vehicle_number') }}">
                            
                                <input type="text" name="vehicle_name" placeholder="Search by VEHICLE NAME"
                                    value="{{ request('vehicle_name') }}">
                            
                                <select name="fuel_type">
                                    <option value="">Select Fuel Type</option>
                                    <option value="Petrol" {{ request('fuel_type') == 'Petrol' ? 'selected' : '' }}>Petrol</option>
                                    <option value="Diesel" {{ request('fuel_type') == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                                    <option value="Electric" {{ request('fuel_type') == 'Electric' ? 'selected' : '' }}>Electric</option>
                                </select>
                        
                                <!-- New ID Range Dropdown -->
                                <select name="id_range">
                                    <option value="">Select ID Range</option>
                                    <option value="1-10" {{ request('id_range') == '1-10' ? 'selected' : '' }}>1-10</option>
                                    <option value="11-20" {{ request('id_range') == '11-20' ? 'selected' : '' }}>11-20</option>
                                    <option value="21-30" {{ request('id_range') == '21-30' ? 'selected' : '' }}>21-30</option>
                                    <option value="31-40" {{ request('id_range') == '31-40' ? 'selected' : '' }}>31-40</option>
                                    <option value="41-50" {{ request('id_range') == '41-50' ? 'selected' : '' }}>41-50</option>
                                    <option value="50+" {{ request('id_range') == '50+' ? 'selected' : '' }}>50+</option>
                                </select>
                            
                                <button type="submit" class="btn-search">SEARCH</button>
                                <a href="{{ url('manager/vehicles') }}" class="btn-search">Clear</a>
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
                                <tr onclick="window.location='{{ route('vehicles.show', $vehicle->id) }}'" style="cursor: pointer;">
                                    <td>{{ $vehicle->id }}</td>
                                    <td>
                                        @if (!empty($vehicle->images) && isset($vehicle->images[0]))
                                            <img src="{{ asset('storage/' . $vehicle->images[0]) }}" alt="Car Image" style="width: 100px; height: auto;">
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
                                        <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn-edit">Edit</a>
                                        <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this vehicle?')">Delete</button>
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
