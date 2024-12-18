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
                                class="nav-icon"> ACCOUNTING (under development...)</a>
                    </div> --}}
                </nav>
            </div>


            <div class="content">
                <a class="btn-link" href="{{ url('employees/create') }}"> Add New Employee</a>
                <div class="cards-container no-scroll">
                    <!-- Registered Staff -->
                    <div class="card shadow-sm bg-dark-custom text-white">
                        <a class="link" href="{{ 'employees' }}">
                            <div class="card-body">
                                <div class="image-wrapper">
                                    <img src="{{ asset('images/H1.png') }}" alt="regstaff" class="card-image">
                                </div>
                                <h5 class="card-title">Registered Staff</h5>
                                <p class="card-text">{{ \App\Models\Employee::count() }}</p>
                            </div>
                        </a>
                    </div>

                    <!-- Leaves Requested -->
                    <div class="card shadow-sm bg-warning-custom text-white">
                        <a class="link" href="{{ 'leaves' }}">
                            <div class="card-body">
                                <div class="image-wrapper">
                                    <img src="{{ asset('images/H2.png') }}" alt="leavereq" class="card-image">
                                </div>
                                <h5 class="card-title">Requested Leaves</h5>
                                <p class="card-text">{{ \App\Models\Leave::count() }}</p>
                            </div>
                        </a>
                    </div>

                    <!-- Approved Leaves -->
                    <div class="card shadow-sm bg-azure text-white">
                        <a class="link" href="{{ 'approved' }}">
                            <div class="card-body">
                                <div class="image-wrapper">
                                    <img src="{{ asset('images/H3.png') }}"alt="apprvdleave" class="card-image">
                                </div>
                                <h5 class="card-title">Approved Leaves</h5>
                                <p class="card-text">{{ \App\Models\Leave::where('status', 'Accepted')->count() }}</p>
                            </div>
                        </a>
                    </div>

                    <!-- Rejected Leaves -->
                    <div class="card shadow-sm bg-danger-custom text-white">
                        <a class="link" href="{{ 'rejected' }}">
                            <div class="card-body">
                                <div class="image-wrapper">
                                    <img src="{{ asset('images/H4.png') }}" alt="rejleave" class="card-image">
                                </div>
                                <h5 class="card-title">Rejected Leaves</h5>
                                <p class="card-text">{{ \App\Models\Leave::where('status', 'rejected')->count() }}</p>
                            </div>
                        </a>
                    </div>

                    <!-- Staff Attendance -->
                    <div class="card shadow-sm bg-purple-custom text-white">
                        <a class="link" href="{{ 'payrolls' }}">
                            <div class="card-body">
                                <div class="image-wrapper">
                                    <img src="{{ asset('images/H5.png') }}" alt="payroll"class="card-image">
                                </div>
                                <h5 class="card-title">Pay Roll</h5>
                            </div>
                        </a>
                    </div>

                    <!-- Payroll -->
                    <div class="card shadow-sm bg-magenta text-white">
                        <a class="link" href="{{ 'attendances' }}">
                            <div class="card-body">
                                <div class="image-wrapper">
                                    <img src="{{ asset('images/H4.png') }}" alt="attendance" class="card-image">
                                </div>
                                <h5 class="card-title">Staff Attendance</h5>
                            </div>
                        </a>
                    </div>
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
