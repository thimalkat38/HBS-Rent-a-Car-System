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
        .row {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 1%;
        }

        .input {
            padding: 17px 50px;
            font-size: 14px;
            border: 1px solid black;
            border-radius: 10px;
            flex: 1;
        }

        .btn {
            padding: 25px 40px;
            font-size: 14px;
            background-color: #365C96;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .btn-clear{
            padding: 16px 30px;
            font-size: 14px;
            background-color: #365C96;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .cards-row {
            justify-content: space-between;
        }

        .card {
            flex: 1;
            height: 50%;
            padding: 10px;
            font-size: 16px;
            text-align: center;
            border: none;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            margin: 0 10px;
            transition: transform 0.1s;
            margin-bottom: 5px;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card h3 {
            margin: 0 0 10px;
        }

        .card-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        .btn-edit {
            background-color: #28a745;
            padding: 6px 30px;
            display: flex;
        }

        .btn-edit:hover {
            background-color: #218838;
        }

        .btn-delete {
            background-color: #dc3545;
            padding: 18px 40px;
            display: flex;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .card-green {
            background-color: #8AC289;
        }

        .card-orange {
            background-color: #FD754E;
        }

        .card-pink {
            background-color: #F37383;
        }

        .card-purple {
            background-color: #AE85ED;
        }

        .details {
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid black;
            border-radius: 8px;
            height: 35%;
            margin-top: 10px;
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
                        <a class="nav-link active" href="{{ url('crms') }}"><img src="{{ asset('images/6.png') }}"
                                alt="CRM" class="nav-icon"> CRM</a>
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

                <div class="row">
                    <a class="btn-submit" href="{{ url('crms/create') }}"> Add Reminder</a>
                </div>

    <!-- Filter Section -->
    <form method="GET" action="{{ route('crms.upcoming') }}">
        <div class="row">
            <!-- Full Name Filter -->
            <input 
                type="text" 
                name="full_name" 
                value="{{ request('full_name') }}" 
                placeholder="Customer Name" 
                class="input"
            >
            <button type="submit" class="btn">Search</button>
    
            <!-- Date Filter -->
            <input 
                type="date" 
                name="date" 
                value="{{ request('date') }}" 
                class="input"
            >
            <button type="submit" class="btn">Filter</button>
    
            <!-- Clear Button -->
            <a href="{{ route('crms.upcoming') }}" class="btn-clear">Clear</a>
        </div>
    </form>
    
                <!-- Row 2 -->
                
                
                <h3>UPCOMING SCHEDULE</h3>
                <div class="row cards-row">
                    @forelse ($crms as $crm)
                        <div 
                            class="card {{ $loop->index % 4 == 0 ? 'card-green' : ($loop->index % 4 == 1 ? 'card-orange' : ($loop->index % 4 == 2 ? 'card-pink' : 'card-purple')) }}" 
                            data-full_name="{{ $crm->full_name }}"
                            data-phone="{{ $crm->phone }}"
                            data-date="{{ \Carbon\Carbon::parse($crm->date)->format('F j, Y') }}"
                            data-subject="{{ $crm->subject }}"
                            data-note="{{ $crm->note }}"
                            onclick="showDetails(this)"
                        >
                            <h3>{{ $crm->subject }}</h3>
                            <p>{{ \Carbon\Carbon::parse($crm->date)->format('F j, Y') }}</p>
                            <div class="card-buttons">
                                <a href="{{ route('crms.edit', $crm->id) }}" class="btn btn-edit">Edit</a>
                                <form action="{{ route('crms.destroy', $crm->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete" 
                                    onclick="return confirm('Are you sure you want to delete this leave?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p>No upcoming schedules available.</p>
                    @endforelse
                </div>
            
                <div class="details">
                    <div id="details-content" style="display: none;">
                        <p><strong>Customer Name:</strong> <span id="details-full_name"></span></p>
                        <p><strong>Mobile Number:</strong> <span id="phone"></span></p>
                        <p><strong>Date:</strong> <span id="details-date"></span></p>
                        <p><strong>Subject:</strong> <span id="details-subject"></span></p>
                        <p><strong>Note:</strong> <span id="details-note"></span></p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© 2024. All rights reserved. Designed by Ezone IT Solutions.</p>
        </div>
    </div>
    <script>
function showDetails(card) {
    // Extract data attributes from the clicked card
    const fullName = card.getAttribute('data-full_name');
    const phone = card.getAttribute('data-phone'); // Correct variable name
    const date = card.getAttribute('data-date');
    const subject = card.getAttribute('data-subject');
    const note = card.getAttribute('data-note');

    // Update the details section
    document.getElementById('details-full_name').innerText = fullName;
    document.getElementById('phone').innerText = phone; // Update correct ID
    document.getElementById('details-date').innerText = date;
    document.getElementById('details-subject').innerText = subject;
    document.getElementById('details-note').innerText = note;

    // Show the details content
    document.getElementById('details-content').style.display = 'block';
}

    </script>
    <script>
    function disableOtherButton(buttonId) {
        document.getElementById(buttonId).disabled = true;
    }
</script>
</body>

</html>
