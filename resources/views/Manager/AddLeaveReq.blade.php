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
                        <a class="nav-link"><img src="{{ asset('images/3.png') }}" alt="Bookings" class="nav-icon">
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
                        <a class="nav-link active" href="{{ url('hr-management') }}"><img
                                src="{{ asset('images/5.png') }}" alt="HRM" class="nav-icon"> HRM</a>
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
                <div class="form-container">
                    <form class="leave-form" action="{{ route('leaves.store') }}" method="POST">
                        @csrf <!-- Laravel CSRF token for security -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="emp-id">EMP ID</label>
                                <input type="text" id="emp-id" name="emp_id" placeholder="Enter EMP ID"
                                    required autocomplete="off">
                                <div id="emp-id-list" class="dropdown-list"></div>
                                @error('emp_id')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror

                                <label for="emp-name">Full Name</label>
                                <input type="text" id="emp-name" name="emp_name"
                                    placeholder="Auto-filled EMP Name" readonly>
                                @error('emp_name')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="from-date">FROM</label>
                                <input type="date" id="from_date" name="from_date"
                                    value="{{ old('from_date') }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                    required>
                                @error('from_date')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror

                                <label for="to-date">TO</label>
                                <input type="date" id="to_date" name="to_date" value="{{ old('to_date') }}"
                                    min="{{ date('Y-m-d', strtotime('+2 days')) }}" required>
                                @error('to_date')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror

                                <!-- New Field to Show Number of Days -->
                                <label for="leave-days">Number of Leave Days</label>
                                <input type="text" id="leave_days" name="leave_days" placeholder="Number of days"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label for="type">Leave Type</label>
                                <select id="type" name="type" class="selection-list" required>
                                    <option value="" disabled {{ old('type') === null ? 'selected' : '' }}>
                                        Select Leave Type</option>
                                    <option value="0" {{ old('type') == '0' ? 'selected' : '' }}>Normal Leave
                                    </option>
                                    <option value="1" {{ old('type') == '1' ? 'selected' : '' }}>Urgent Leave
                                    </option>
                                    <option value="2" {{ old('type') == '2' ? 'selected' : '' }}>Half Day Leave
                                    </option>
                                </select>
                                @error('type')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group reason-group">
                            <label for="reason">Reason for Leave</label>
                            <textarea id="reason" name="reason" rows="4" placeholder="Enter reason for leave" required>{{ old('reason') }}</textarea>
                            @error('reason')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
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
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const empIdInput = document.getElementById('emp-id');
            const empIdList = document.getElementById('emp-id-list');
            const empNameInput = document.getElementById('emp-name');

            empIdInput.addEventListener('input', function() {
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
                                empIdList.innerHTML =
                                    '<div class="dropdown-item">No results found</div>';
                            }
                        });
                } else {
                    empIdList.innerHTML = '';
                }
            });

            empIdList.addEventListener('click', function(e) {
                if (e.target.classList.contains('dropdown-item')) {
                    const empId = e.target.dataset.empId;
                    const empName = e.target.dataset.empName;

                    empIdInput.value = empId;
                    empNameInput.value = empName;

                    empIdList.innerHTML = ''; // Hide the dropdown
                }
            });

            // Hide dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!empIdList.contains(e.target) && e.target !== empIdInput) {
                    empIdList.innerHTML = '';
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const fromDateInput = document.getElementById('from_date');
            const toDateInput = document.getElementById('to_date');
            const leaveDaysInput = document.getElementById('leave_days');

            function calculateLeaveDays() {
                const fromDate = new Date(fromDateInput.value);
                const toDate = new Date(toDateInput.value);

                if (fromDate && toDate && fromDate < toDate) {
                    // Subtract 1 day from the "TO" date to exclude the last day
                    const adjustedToDate = new Date(toDate);
                    adjustedToDate.setDate(adjustedToDate.getDate() - 1);

                    const timeDiff = adjustedToDate.getTime() - fromDate.getTime();
                    const daysDiff = Math.ceil(timeDiff / (1000 * 60 * 60 * 24)) + 1; // Include the FROM day
                    leaveDaysInput.value = daysDiff;
                } else {
                    leaveDaysInput.value = ''; // Clear if dates are invalid or FROM >= TO
                }
            }

            fromDateInput.addEventListener('change', calculateLeaveDays);
            toDateInput.addEventListener('change', calculateLeaveDays);
        });
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
