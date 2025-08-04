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
                        <a class="nav-link" href="{{ url('manager/dashboard') }}"><img src="{{ asset('images/1.png') }}"
                                alt="Dashboard" class="nav-icon"> DASHBOARD</a>
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
                        <a class="nav-link active"><img src="{{ asset('images/3.png') }}" alt="Bookings"
                                class="nav-icon">
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

            <!-- Main Content -->
            <div class="content">
                <div class="card6-form-row">
                    <div class="form-section">
                        {{-- Search --}}
                        <form action="{{ url('bookings') }}" method="GET" id="searchForm">
                            <div class="form-row">
                                <!-- Mobile Number Input (Auto-Search on Typing) -->
                                <input type="text" name="mobile_number" placeholder="Search by Mobile Number"
                                    value="{{ request('mobile_number') }}" oninput="autoSubmitForm()">

                                <!-- Full Name Input (Auto-Search on Typing) -->
                                <input type="text" name="full_name" placeholder="Search by Full Name"
                                    value="{{ request('full_name') }}" oninput="autoSubmitForm()">

                                <!-- Vehicle Number Input (Auto-Search on Typing) -->
                                <input type="text" id="vehicle_number" name="vehicle_number"
                                    list="vehicle_numbers" class="block w-full mt-1"
                                    placeholder="Search by vehicle number" maxlength="8"
                                    value="{{ request('vehicle_number') }}" oninput="autoSubmitForm()">

                                <!-- ID Input (Auto-Search on Typing) -->
                                <input type="text" name="id" placeholder="Search by ID"
                                    value="{{ request('id') }}" oninput="autoSubmitForm()">

                                <!-- Status Dropdown (Auto-Search on Selection) -->


                                <!-- Date Range Fields (Auto-Search on Change) -->
                                <input type="date" name="from_date" value="{{ request('from_date') }}"
                                    onchange="document.getElementById('searchForm').submit();"
                                    placeholder="From Date">

                                <input type="date" name="to_date" value="{{ request('to_date') }}"
                                    onchange="document.getElementById('searchForm').submit();" placeholder="To Date">

                                {{-- <select name="status" onchange="document.getElementById('searchForm').submit();">
                                        <option value="">Select Status</option>
                                        <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="Ongoing" {{ request('status') == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                                    </select> --}}

                                <!-- Remove Search Button (Auto-Submit Works) -->
                                <a href="{{ url('/bookings') }}" class="btn-search">Clear</a>
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
                                <th>From</th>
                                <th>To</th>
                                <th>Vehicle</th>
                                <th>Vehicle Number</th>
                                <th>Mobile Number</th>
                                <th>Additional Price</th>
                                <th>Discount Price</th>
                                <th>Payed</th>
                                <th>Balance</th>
                                <th style="width: 300px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr onclick="window.location='{{ route('bookings.show', $booking->id) }}'">
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->full_name }}</td>
                                    <td>{{ $booking->from_date }} [{{ $booking->booking_time }}]</td>
                                    <td>{{ $booking->to_date }} [{{ $booking->arrival_time }}]</td>
                                    <td>{{ $booking->vehicle_name }}</td>
                                    <td>{{ $booking->vehicle_number }}</td>
                                    <td>{{ $booking->mobile_number }}</td>
                                    <td>{{ $booking->additional_chagers }}</td>
                                    <td>{{ $booking->discount_price }}</td>
                                    <td>{{ $booking->payed }}</td>
                                    <td>{{ $booking->price }}</td>
                                    <td class="button-cell">
                                        @if ($booking->status !== 'Completed')
                                            <a href="{{ route('bookings.postbooking', $booking->id) }}"
                                                class="btn-edit">View PostBooking</a>
                                        @else
                                            <button class="btn-edit" disabled
                                                style="cursor: not-allowed; background: #ccc;">Completed</button>
                                        @endif
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
<style>
    .btn-edit[disabled] {
        background-color: #ccc;
        color: #666;
        cursor: not-allowed;
    }
</style>

<script>
    function formatVehicleNumber(input) {
        // Remove all characters that are not uppercase letters, digits, or "-"
        input.value = input.value.toUpperCase().replace(/[^A-Z0-9-]/g, '');

        // Ensure it follows the pattern "AAA-1234"
        const match = input.value.match(/^([A-Z]{0,3})(-?)([0-9]{0,4})$/);
        if (match) {
            input.value = (match[1] || '') + (match[3] ? '-' + match[3] : '');
        }
    }
</script>
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


<style>
    .btn-edit:disabled {
        background-color: #ccc;
        color: #666;
        cursor: not-allowed;
        pointer-events: none;
    }
</style>

</html>
