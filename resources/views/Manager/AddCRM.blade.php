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
                <a class="nav-link" href="{{ url('manager/dashboard') }}"><img
                        src="{{ asset('images/1.png') }}" alt="Dashboard" class="nav-icon"> DASHBOARD</a>
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
                    <a class="nav-link" href="{{ url('hr-management') }}"><img
                            src="{{ asset('images/5.png') }}" alt="HRM" class="nav-icon"> HRM</a>
                </div>
            <div class="nav-item">
                <a class="nav-link active" href="{{ url('crm')}}"><img src="{{ asset('images/6.png') }}" alt="CRM"
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


            <!-- Content Area -->
        <div class="content">

<div class="form-container">
    <form class="leave-form" action="{{ route('crms.store') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label for="cus_name">Customer Name</label>
                <input type="text" id="full_name" name="full_name" placeholder="Enter Customer Name" required>
            </div>
            <div class="form-group">
                <label for="cus_name">Mobile Number</label>
                <input type="text" id="phone" name="phone" placeholder="Enter Mobile Number" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" placeholder="Enter Subject" required>
            </div>
        </div>
        <div class="form-group reason-group">
            <label for="reason">Note</label>
            <textarea id="reason" name="note" rows="4" placeholder="Enter any additional notes"></textarea>
        </div>
        <div class="submit-container">
            <button type="reset" class="btn-submit">BACK</button>
            <button type="reset" class="btn-submit">CLEAR</button>
            <button type="submit" class="btn-submit">SUBMIT</button>
        </div>
    </form>
    
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
