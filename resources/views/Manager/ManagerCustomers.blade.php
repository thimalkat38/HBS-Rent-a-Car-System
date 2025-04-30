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
                        <a class="nav-link active"><img src="{{ asset('images/4.png') }}" alt="Customers"
                                class="nav-icon">
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
                        <form action="{{ url('customers') }}" method="GET" id="searchForm">
                            <div class="form-row">
                                <!-- NIC Search Field (Auto-Search on Typing) -->
                                <input type="text" name="nic" placeholder="Search by NIC"
                                    value="{{ request('nic') }}" oninput="autoSubmitForm()">

                                <!-- Full Name Search Field (Auto-Search on Typing) -->
                                <input type="text" name="full_name" placeholder="Search by Name"
                                    value="{{ request('full_name') }}" oninput="autoSubmitForm()">
                            </div>
                        </form>


                    </div>
                </div>

                <!-- Table Content -->
                <div class="table-content">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>CUS ID</th>
                                <th>Customer Name</th>
                                <th>M/NUMBER</th>
                                <th>NIC</th>
                                <th>EMAIL</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr onclick="window.location='{{ route('Customer.show', $customer->id) }}'"
                                    style="cursor: pointer;">
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->full_name }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->nic }}</td>
                                    <td>{{ $customer->email ?? 'No email exists' }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td class="button-cell">
                                        <a href="{{ route('customers.edit', $customer->id) }}"
                                            class="btn-edit">Edit</a>
                                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete"
                                                onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
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
<script>
    let typingTimer;

    // Auto-submit form when typing (with delay)
    function autoSubmitForm() {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(() => {
            document.getElementById('searchForm').submit();
        }, 500); // 0.5-second delay
    }
</script>

</html>
