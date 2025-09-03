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
        body {
            font-family: Arial, sans-serif;
            background-color: #E6E0F8;
        }

        /* Search Bar */
        .search-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .search-bar {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            background-color: #cfcfcf;
            width: 250px;
        }

        /* Add Expenses Button */
        .add-expenses-btn {
            background-color: #34568B;
            color: white;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 20px;
            text-align: center;
            border: none;
            cursor: pointer;
        }

        .add-expenses-btn:hover {
            background-color: #2b3e63;
        }

        /* Expenses Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: red;
            color: white;
            font-weight: bold;
        }

        /* Alternating Row Colors */
        tr:nth-child(odd) {
            background-color: #e8b77e;
        }

        tr:nth-child(even) {
            background-color: #a8e6a3;
        }
    </style>

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
                        <a class="nav-link" href="{{ url('manager/dashboard') }}">
                            <img src="{{ asset('images/1.png') }}" alt="Dashboard" class="nav-icon"> DASHBOARD
                        </a>
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
                        <a class="nav-link" href="{{ url('hr-management') }}"><img src="{{ asset('images/5.png') }}"
                                alt="HRM" class="nav-icon"> HRM</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ url('crms') }}"><img src="{{ asset('images/6.png') }}"
                                alt="CRM" class="nav-icon"> CRM</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('inventory.index') }}">
                            <img src="{{ asset('images/7.png') }}" alt="Inventory" class="nav-icon"> INVENTORY
                        </a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link active" href="#"><img src="{{ asset('images/8.png') }}"
                                alt="Accounting" class="nav-icon"> Finance</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('expenses') }}">Expences</a>
                            <a class="dropdown-link" href="{{ url('profit-loss-report') }}">P/L Report</a>
                            <a class="dropdown-link" href="{{ url('commission') }}">Commission</a>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="content">
                <form>
                    <!-- Expenses Table -->
                    <div class="form-section">
                        <div class="form-row">
                            <label for="startDate">Start Date:</label>
                            <input type="date" id="startDate" class="form-control">
                            <label for="endDate">End Date:</label>
                            <input type="date" id="endDate" class="form-control">
                        </div>
                        <div class="form-row">
                            <label for="refNoFilter">Reference No:</label>
                            <input type="text" id="refNoFilter" class="form-control"
                                placeholder="Filter by Ref No(REF****)">
                            <label for="expenseForFilter">Expenses For:</label>
                            <input type="text" id="expenseForFilter" class="form-control"
                                placeholder="Filter by Employee/Customer">
                        </div>
                        <div class="form-row">
                            <label for="minAmount">Min Amount:</label>
                            <input type="number" id="minAmount" class="form-control" placeholder="Min RS">
                            <label for="maxAmount">Max Amount:</label>
                            <input type="number" id="maxAmount" class="form-control" placeholder="Max RS">
                        </div>
                        <div class="form-row">
                            <button id="clearFilters" class="btn-submit">Clear Filters</button>
                            <a href="{{ url('expenses/create') }}" class="btn-submit">Add Expences</a>
                        </div>
                    </div>

                    <!-- Clear Button -->

                    <!-- Expenses Table -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Expenses For</th>
                                <th>Note</th>
                                <th>Paid Amount</th>
                                <th>Document</th>
                            </tr>
                        </thead>
                        <tbody id="expensesTable">
                            @foreach ($expenses as $expense)
                                <tr data-ref="{{ $expense->ref_no }}">
                                    <td>{{ $expense->date }}</td>
                                    <td>{{ $expense->cat }}</td>
                                    <td>
                                        @if ($expense->for_emp)
                                            Employee: {{ $expense->for_emp }}
                                        @elseif($expense->for_cus)
                                            Customer: {{ $expense->for_cus }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $expense->note }}</td>
                                    <td>{{ number_format($expense->amnt, 2) }}</td>
                                    <td>
                                        @if ($expense->docs)
                                            {{-- <a href="{{ asset('storage/expenses/' . $expense->docs) }}" target="_blank">
                                            {{ $expense->docs }}
                                        </a> --}}
                                            <br>
                                            <a href="{{ route('expenses.download', $expense->id) }}"
                                                class="btn-blue">
                                                Export
                                            </a>
                                        @else
                                            No File
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>

            </div>
        </div>



        <!-- Footer -->
        <div class="footer">
            <p>© 2024. All rights reserved. Designed by Ezone IT Solutions.</p>
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let startDate = document.getElementById("startDate");
        let endDate = document.getElementById("endDate");
        let refNoFilter = document.getElementById("refNoFilter");
        let expenseForFilter = document.getElementById("expenseForFilter");
        let minAmount = document.getElementById("minAmount");
        let maxAmount = document.getElementById("maxAmount");
        let clearButton = document.getElementById("clearFilters");

        function filterTable() {
            let startValue = startDate.value ? new Date(startDate.value) : null;
            let endValue = endDate.value ? new Date(endDate.value) : null;
            let refNoValue = refNoFilter.value.toLowerCase();
            let expenseForValue = expenseForFilter.value.toLowerCase();
            let minAmountValue = minAmount.value ? parseFloat(minAmount.value) : null;
            let maxAmountValue = maxAmount.value ? parseFloat(maxAmount.value) : null;

            let rows = document.querySelectorAll("#expensesTable tr");

            rows.forEach(row => {
                let dateText = row.cells[0].textContent;
                let rowDate = dateText ? new Date(dateText) : null;
                let refNo = row.getAttribute('data-ref') ? row.getAttribute('data-ref').toLowerCase() :
                    '';
                let expenseFor = row.cells[2].textContent.toLowerCase();
                let amount = parseFloat(row.cells[4].textContent.replace(/[^0-9.]/g, ''));

                let dateMatch = (!startValue || rowDate >= startValue) && (!endValue || rowDate <=
                    endValue);
                let refNoMatch = refNo.includes(refNoValue) || refNoValue === '';
                let expenseForMatch = expenseFor.includes(expenseForValue) || expenseForValue === '';
                let amountMatch = (!minAmountValue || amount >= minAmountValue) && (!maxAmountValue ||
                    amount <= maxAmountValue);

                if (dateMatch && refNoMatch && expenseForMatch && amountMatch) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }

        // Event Listeners for Filters
        startDate.addEventListener("input", filterTable);
        endDate.addEventListener("input", filterTable);
        refNoFilter.addEventListener("input", filterTable);
        expenseForFilter.addEventListener("input", filterTable);
        minAmount.addEventListener("input", filterTable);
        maxAmount.addEventListener("input", filterTable);

        // Clear Filters
        clearButton.addEventListener("click", function() {
            startDate.value = "";
            endDate.value = "";
            refNoFilter.value = "";
            expenseForFilter.value = "";
            minAmount.value = "";
            maxAmount.value = "";
            filterTable();
        });
    });
</script>

</html>
