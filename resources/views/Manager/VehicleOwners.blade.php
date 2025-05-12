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
        /* Custom CSS to reduce the row size */
        .table td,
        .table th {
            padding: 5px;
            /* Reduce padding to make rows smaller */
            vertical-align: middle;
            /* Center content vertically */
        }

        /* Styling for action buttons */
        .action-buttons a {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            border-radius: 4px;
        }

        .edit-button {
            background-color: #4CAF50;
            /* Green */
        }

        .delete-button {
            background-color: #f44336;
            /* Red */
        }

        .action-buttons a:hover {
            opacity: 0.8;
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

            <div class="content">
                <div class="card6-form-row">
                    <div class="form-section">
                        {{-- Search --}}
                        <form action="{{ url('vehicle_owners') }}" method="GET">
                            <div class="form-row">
                                <!-- Full Name Search Field -->
                                <input type="text" name="full_name" placeholder="Search by Full Name"
                                    value="{{ request('full_name') }}">

                                <!-- Vehicle Number Search Field -->
                                <input type="text" name="vehicle_number" placeholder="Search by Vehicle Number"
                                    value="{{ request('vehicle_number') }}">

                                <div class="card1">
                                    <div class="card1-content">
                                        <button type="submit" class="btn-search">SEARCH</button>||
                                        <a href="{{ url('/vehicle_owners') }}" class="btn-search">Clear</a>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="card1-content">
                            <div class="card1-submit-container">
                                <a class="nav-link" href="{{ route('ownerpayments.create') }}"
                                    class="card1-btn-submit">Add Payment</a>
                            </div>
                            <div class="card1-submit-container">
                                <a class="nav-link" href="{{ route('vehicle_owners.create') }}"
                                    class="card1-btn-submit">Add Vehicle Owner</a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Table Content -->
                <div class="table-content">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                {{-- <th>CUS ID</th> --}}
                                <th>Owner Name</th>
                                <th>Vehicle</th>
                                <th>M/NUMBER</th>
                                <th>Address</th>
                                <th>Monthly Rental</th>
                                <th>Paid Amount</th>
                                <th>Due Payments</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicleOwners as $vehicleOwner)
                                <tr onclick="window.location='{{ route('vehicle_owners.show', $vehicleOwner->id) }}'"
                                    style="cursor: pointer;">
                                    <td>{{ $vehicleOwner->title }}. {{ $vehicleOwner->full_name }}</td>
                                    <td>{{ $vehicleOwner->vehicle_name }}[{{ $vehicleOwner->vehicle_number }}]</td>
                                    <td>{{ $vehicleOwner->phone }}</td>
                                    <td>{{ $vehicleOwner->address }}</td>
                                    <td>{{ $vehicleOwner->rental_amnt }}.00</td>
                                    <td>{{ $vehicleOwner->rental_amnt - $vehicleOwner->rem_rental }}.00</td>
                                    <td>{{ $vehicleOwner->rem_rental }}.00</td>                                    
                                    <td>{{ $vehicleOwner->start_date }}</td>
                                    <td>{{ $vehicleOwner->end_date ?? 'No End Date Exists' }}</td>
                                    <td class="button-cell">
                                        <a href="{{ route('ownerpayments.index', ['owner_id' => $vehicleOwner->owner_id]) }}"
                                            class="btn-blue">Payments</a>
                                        <a href="{{ route('vehicle_owners.edit', $vehicleOwner->id) }}"
                                            class="btn-edit">Edit</a>
                                        <form action="{{ route('vehicle_owners.destroy', $vehicleOwner->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete"
                                                onclick="return confirm('Are you sure you want to delete this vehicleowner?')">Delete</button>
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
