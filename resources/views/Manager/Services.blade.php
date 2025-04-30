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
        body {
            font-family: Arial, sans-serif;
            background-color: #eee;
        }
        
        /* Add Service Section */
        .section-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .form-container {
            background-color: #E6E0F8;
            padding: 20px;
            border-radius: 5px;
            max-width: 600px;
            margin: 0 auto 30px auto;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        input, select {
            width: 48%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            background-color: white;
        }

        /* Buttons */
        .button-group {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .btn {
            background-color: #34568B;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            border: none;
            cursor: pointer;
            margin: 5px;
        }

        .btn:hover {
            background-color: #2b3e63;
        }

        /* Service Table */
        .table-container {
            background-color: white;
            padding: 10px;
            border-radius: 5px;
            max-width: 900px;
            margin: 0 auto;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        th, td {
            padding: 8px;
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

        /* Add Service Button */
        .add-service-btn {
            background-color: #34568B;
            color: white;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            text-align: center;
            border: none;
            cursor: pointer;
            display: inline-block;
            margin-bottom: 20px;
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
                        <a class="nav-link" href="{{ url('manager/dashboard') }}">
                            <img src="{{ asset('images/1.png') }}" alt="Dashboard" class="nav-icon"> DASHBOARD
                        </a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link active"><img src="{{ asset('images/2.png') }}" alt="Vehicles" class="nav-icon">
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
                        <a class="nav-link" href="{{ url('crms') }}"><img src="{{ asset('images/6.png') }}"
                                alt="CRM" class="nav-icon"> CRM</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('inventory.index') }}">
                            <img src="{{ asset('images/7.png') }}" alt="Inventory" class="nav-icon"> INVENTORY
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
                <!-- Add Service Section -->

                <form action="{{ route('services.store') }}" method="POST">
                    @csrf
                    <div class="form-section">
                        <div class="section-title">Add Service</div>
                        
                        <div class="form-row">
                            <input type="text" name="vehicle_number" value="{{ $vehicle_number }}" readonly>
                            <input type="text" name="invoice_number" placeholder="Invoice Number">
                            <input type="text" name="amnt" placeholder="Amount">
                        </div>
                        
                        <div class="form-row">
                            <select name="type" id="serviceType" required>
                                <option value="">Service Type</option>
                                <option value="Oil Change">Oil Change</option>
                                <option value="Maintenance">Maintenance</option>
                                <option value="Repair">Repair</option>
                            </select>
                            <input type="text" name="current_mileage" placeholder="Current Mileage">
                            <input type="text" name="next_mileage" id="nextMileage" placeholder="Next Mileage" disabled>
                        </div>
                        
                        <div class="form-row">
                            <input type="text" name="station" placeholder="Service Station">
                            <input type="date" name="date">
                            <input type="date" name="next_date" id="nextDate" disabled>
                        </div>
                        
                        <div class="btn-container">
                            <button type="reset" class="btn-submit">Clear</button>
                            <button type="submit" class="btn-submit">SUBMIT</button>
                        </div>
                    
                            <!-- Service Details Table -->
                            <h2>Service Records for {{ $vehicle_number }}</h2>

                            <h2>Next Oil Change Mileage: 
                                {{ $latestService ? $latestService->next_mileage : 'N/A' }}
                            </h2>
                            
                            <h2>Next Oil Change Date: 
                                {{ $latestService ? $latestService->next_date : 'N/A' }}
                            </h2>
                            

                            <!-- Filters -->
                                <div class="form-row">
                                    <label for="startDate">Start Date:</label>
                                    <input type="date" id="startDate" class="form-control">
                                    <label for="endDate">End Date:</label>
                                    <input type="date" id="endDate" class="form-control">
                                </div>
                                <div class="form-row">
                                    <label for="typeFilter">Type:</label>
                                    <input type="text" id="typeFilter" class="form-control" placeholder="Filter by Type">
                                    <label for="invoiceFilter">Invoice No:</label>
                                    <input type="text" id="invoiceFilter" class="form-control" placeholder="Filter by Invoice No">
                                </div>

                                <!-- Clear Button -->
                                <div class="btn-container">
                                <button id="clearFilters" class="btn-submit">Clear Filters</button>
                                </div>
                        <!-- Table -->
                        <div class="table-content">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>TYPE</th>
                                        <th>Invoice No</th>
                                        <th>Price</th>
                                        <th>Service Station</th>
                                    </tr>
                                </thead>
                                <tbody id="serviceTable">
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{ $service->date }}</td>
                                            <td>{{ $service->type }}</td>
                                            <td>{{ $service->invoice_number }}</td>
                                            <td>RS {{ $service->amnt }}</td>
                                            <td>{{ $service->station }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
    document.addEventListener("DOMContentLoaded", function () {
        let startDate = document.getElementById("startDate");
        let endDate = document.getElementById("endDate");
        let typeFilter = document.getElementById("typeFilter");
        let invoiceFilter = document.getElementById("invoiceFilter");
        let clearButton = document.getElementById("clearFilters");
    
        function filterTable() {
            let startValue = startDate.value ? new Date(startDate.value) : null;
            let endValue = endDate.value ? new Date(endDate.value) : null;
            let typeValue = typeFilter.value.toLowerCase();
            let invoiceValue = invoiceFilter.value.toLowerCase();
    
            let rows = document.querySelectorAll("#serviceTable tr");
    
            rows.forEach(row => {
                let dateText = row.cells[0].textContent;
                let rowDate = dateText ? new Date(dateText) : null;
                let type = row.cells[1].textContent.toLowerCase();
                let invoice = row.cells[2].textContent.toLowerCase();
    
                let dateMatch = (!startValue || rowDate >= startValue) && (!endValue || rowDate <= endValue);
                let typeMatch = type.includes(typeValue) || typeValue === '';
                let invoiceMatch = invoice.includes(invoiceValue) || invoiceValue === '';
    
                if (dateMatch && typeMatch && invoiceMatch) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    
        // Event Listeners for Filters
        startDate.addEventListener("input", filterTable);
        endDate.addEventListener("input", filterTable);
        typeFilter.addEventListener("input", filterTable);
        invoiceFilter.addEventListener("input", filterTable);
    
        // Clear Filters
        clearButton.addEventListener("click", function () {
            startDate.value = "";
            endDate.value = "";
            typeFilter.value = "";
            invoiceFilter.value = "";
            filterTable();
        });
    });
    </script>
    <script>
        document.getElementById("serviceType").addEventListener("change", function() {
            let nextMileage = document.getElementById("nextMileage");
            let nextDate = document.getElementById("nextDate");
    
            if (this.value === "Oil Change") {
                nextMileage.removeAttribute("disabled");
                nextDate.removeAttribute("disabled");
            } else {
                nextMileage.setAttribute("disabled", "true");
                nextDate.setAttribute("disabled", "true");
            }
        });
    </script>
</html>
