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
            <!-- Form Section -->
            <div class="form-section">
                <form action="{{ route('attendances.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <input type="text" id="emp-id" name="emp_id" placeholder="Enter EMP ID" required autocomplete="off">
                        <div id="emp-id-list" class="dropdown-list"></div>
                        <input type="text" id="emp-name" name="emp_name" placeholder="Auto-filled EMP Name" readonly>
                    </div>
                    <div class="form-row">
                        <input type="date" id="date" name="date" required>
                        <select name="type" class="selection-list" required>
                            <option value="" disabled selected>Type</option>
                            <option value="normal">Normal Working Day</option>
                            <option value="Half Day">Half Day</option>
                            <option value="Leave">Leave</option>
                        </select>
                    </div>
                    <div class="submit-container">
                        <a href="Card6.html"><button type="button" class="btn-submit">BACK</button></a>
                        <button type="reset" class="btn-submit">CLEAR</button>
                        <button type="submit" class="btn-submit">SUBMIT</button>
                    </div>
                </form>
            </div>
            
        </div>
        

        <!-- Footer -->
        <div class="footer">
            <p>© 2024. All rights reserved. Designed by Ezone IT Solutions.</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const empIdInput = document.getElementById('emp-id');
            const empIdList = document.getElementById('emp-id-list');
            const empNameInput = document.getElementById('emp-name');
        
            empIdInput.addEventListener('input', function () {
                const query = this.value;
        
                if (query.length > 1) {
                    fetch(`/employees/search?query=${query}`)
                        .then(response => response.json())
                        .then(data => {
                            empIdList.innerHTML = ''; // Clear the list
        
                            if (data.length) {
                                data.forEach(emp => {
                                    const option = document.createElement('div');
                                    option.textContent = `${emp.emp_id} - ${emp.emp_name}`;
                                    option.className = 'dropdown-item';
                                    option.dataset.empId = emp.emp_id;
                                    option.dataset.empName = emp.emp_name;
        
                                    empIdList.appendChild(option);
                                });
                            } else {
                                empIdList.innerHTML = '<div class="dropdown-item">No results found</div>';
                            }
                        });
                } else {
                    empIdList.innerHTML = '';
                }
            });
        
            empIdList.addEventListener('click', function (e) {
                if (e.target.classList.contains('dropdown-item')) {
                    const empId = e.target.dataset.empId;
                    const empName = e.target.dataset.empName;
        
                    empIdInput.value = empId;
                    empNameInput.value = empName;
        
                    empIdList.innerHTML = ''; // Hide the dropdown
                }
            });
        
            // Hide dropdown when clicking outside
            document.addEventListener('click', function (e) {
                if (!empIdList.contains(e.target) && e.target !== empIdInput) {
                    empIdList.innerHTML = '';
                }
            });
        });
    </script>
    <script>
        // Set today's date in the format 'YYYY-MM-DD'
        const today = new Date().toISOString().split('T')[0];
        const dateInput = document.getElementById('date');
        dateInput.value = today; // Set default value to today
        dateInput.min = today;   // Prevent selecting earlier dates
        dateInput.max = today;   // Prevent selecting future dates
    </script>
<style>
    .dropdown-list {
        border: 0px solid #ccc;
        max-height: 150px;
        overflow-y: auto;
        background: white;
        position: absolute;
        z-index: 1000;
        width: 20%;
        margin-top: 4%;
    }
    
    .dropdown-item {
        padding: 10px;
        cursor: pointer;
    }
    
    .dropdown-item:hover {
        background: #f0f0f0;
    }
    </style>
</body>
</html>
