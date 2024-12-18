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
                        <a class="nav-link active" href="{{ url('hr-management') }}"><img
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
            <div class="table content">
                <div class="card1">
                    <div class="card1-content">
                    <a href="{{ route('hrmanagement') }}" class="btn-submit">Back</a>
                        <div class="card1-submit-container">
                            <a class="link" href="{{ url('leaves/create') }}">
                                <button type="submit" class="btn-search">Leave Request</button></a>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>EMP ID</th>
                            <th>Name</th>
                            <th>Leave Type</th>
                            <th>Reason</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leaves as $leave)
                            <tr>
                                <td>{{ $leave->emp_id }}</td>
                                <td>{{ $leave->emp_name }}</td>
                                <td>{{ $leave->type == 0 ? 'Normal Leave' : ($leave->type == 1 ? 'Urgent Leave' : 'Half Day Leave') }}
                                </td>
                                <td>{{ $leave->reason }}</td>
                                <td>{{ $leave->from_date }}</td>
                                <td>{{ $leave->to_date }}</td>
                                <td>{{ ucfirst($leave->status) }}</td>
                                <td>
                                    <form
                                        action="{{ route('leaves.updateStatus', ['id' => $leave->id, 'status' => 'accepted']) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn-edit" id="accept-btn"
                                            onclick="disableOtherButton('reject-btn')">Accept</button>
                                    </form>

                                    <form
                                        action="{{ route('leaves.updateStatus', ['id' => $leave->id, 'status' => 'rejected']) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn-delete" id="reject-btn"
                                            onclick="disableOtherButton('accept-btn')">Reject</button>
                                    </form>

                                    <form action="{{ route('leaves.destroy', $leave->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete1"
                                            onclick="return confirm('Are you sure you want to delete this leave?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© 2024. All rights reserved. Designed by Ezone IT Solutions.</p>
        </div>
    </div>
</body>
<script>
    function disableOtherButton(buttonId) {
        document.getElementById(buttonId).disabled = true;
    }
</script>

</html>
