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
            <div class="card1">
                    <div class="card1-content">
                    <a href="{{ route('hrmanagement') }}" class="btn-submit">Back</a>
                    </div>
                </div>

                <div class="form-section">
                    <form method="GET" action="{{ url('payrolls') }}">
                        <div class="form-row">
                            <!-- Employee ID Filter -->
                            <input type="text" id="emp-id" name="emp_id" placeholder="EMP ID" value="{{ request('emp_id') }}">
                            <input type="hidden" id="emp-name" name="emp_name" value="{{ request('emp_name') }}">
                            <div id="emp-id-list" class="dropdown-list"></div>
                
                            <!-- Month Filter -->
                            <select name="month" class="selection-list">
                                <option value="" disabled selected>Select Month</option>
                                <option value="01" {{ request('month') == '01' ? 'selected' : '' }}>JAN</option>
                                <option value="02" {{ request('month') == '02' ? 'selected' : '' }}>FEB</option>
                                <option value="03" {{ request('month') == '03' ? 'selected' : '' }}>MARCH</option>
                                <option value="04" {{ request('month') == '04' ? 'selected' : '' }}>APRIL</option>
                                <option value="05" {{ request('month') == '05' ? 'selected' : '' }}>MAY</option>
                                <option value="06" {{ request('month') == '06' ? 'selected' : '' }}>JUNE</option>
                                <option value="07" {{ request('month') == '07' ? 'selected' : '' }}>JULY</option>
                                <option value="08" {{ request('month') == '08' ? 'selected' : '' }}>AUG</option>
                                <option value="09" {{ request('month') == '09' ? 'selected' : '' }}>SEP</option>
                                <option value="10" {{ request('month') == '10' ? 'selected' : '' }}>OCT</option>
                                <option value="11" {{ request('month') == '11' ? 'selected' : '' }}>NOV</option>
                                <option value="12" {{ request('month') == '12' ? 'selected' : '' }}>DEC</option>
                            </select>
                
                            <!-- Filter Button -->
                            <button class="btn-submit" type="submit">Filter</button>
                            
                        </div>
         
                                    <!-- Add Payment Button -->
                                    <div class="card1">
                        <div class="card1-content">
                            <div class="card1-submit-container">
                                <a class="nav-link" href="{{ url('payrolls/create') }}">Add Payment</a>
                            </div>
                        </div>
                        <div class="card1-content">
                            <div class="card1-submit-container">
                                <button class="nav-link" id="salaryPaidBtn">Salary Paid</button>
                            </div>
                        </div>                        
                    </div>
                <div class="table-content">
                
                <!-- Table Section -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Account Number</th>
                            <th>Paid Reason</th>
                            <th>Paid Date</th>
                            <th>Paid Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($payrolls as $payroll)
                            <tr>
                                <td>{{ $payroll->emp_id }}</td>
                                <td>{{ $payroll->emp_name }}</td>
                                <td>{{ $payroll->acc_num }}</td>
                                <td>{{ $payroll->note }}</td>
                                <td>{{ $payroll->paid_date }}</td>
                                <td>{{ $payroll->paid_amnt }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No results found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                </div>
                </form>
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

    <style>
        .dropdown-list {
    border: 0px solid black;
    max-height: 150px;
    overflow-y: auto;
    background: white;
    position: absolute;
    z-index: 1000;
    width: 20%;
    margin-top: 3%
}

.dropdown-item {
    padding: 10px;
    cursor: pointer;
}

.dropdown-item:hover {
    background: #f0f0f0;
}
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: white;
    padding: 20px;
    margin: 15% auto;
    width: 30%;
    text-align: center;
    border-radius: 10px;
}

.close {
    color: red;
    font-size: 25px;
    float: right;
    cursor: pointer;
}

.confirm-btn {
    background-color: green;
    color: white;
    padding: 10px;
    margin-top: 10px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

    </style>
    <!-- Salary Paid Confirmation Modal -->
<div id="salaryPaidModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Confirm Salary Payment</h2>
        <form id="salaryPaidForm" method="POST" action="{{ route('salary.store') }}">
            @csrf
            <label for="month">Select Month:</label>
            <select name="month" id="month" required>
                <option value="" disabled selected>Select Month</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>
            <button type="submit" class="confirm-btn">Confirm</button>
        </form>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("salaryPaidModal");
        const btn = document.getElementById("salaryPaidBtn");
        const closeBtn = document.querySelector(".close");

        btn.addEventListener("click", function (event) {
            event.preventDefault();
            modal.style.display = "block";
        });

        closeBtn.addEventListener("click", function () {
            modal.style.display = "none";
        });

        window.addEventListener("click", function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    });
</script>

</body>
</html>
