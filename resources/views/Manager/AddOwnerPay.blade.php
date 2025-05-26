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
                        <a class="nav-link active"><img src="{{ asset('images/2.png') }}" alt="Vehicles"
                                class="nav-icon">
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


            <!-- Form Section -->

            <div class="content">
                <form method="POST" action="{{ route('ownerpayments.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-section">
                        {{-- Error handling --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-row">
                            <select id="vehicle" name="vehicle" onchange="updateOwner()">
                                <option value="" disabled selected>Select Vehicle</option>
                                @foreach ($vehicleOwners as $owner)
                                    <option value="{{ $owner->vehicle_number }}"
                                        data-owner_id="{{ $owner->owner_id }}"
                                        data-full_name="{{ $owner->title }} {{ $owner->full_name }}"
                                        data-acc_no="{{ $owner->acc_no }}"
                                        data-bank_details="{{ $owner->bank_detais }}">
                                        {{ $owner->vehicle_number }}
                                    </option>
                                @endforeach
                            </select>

                            <input type="text" id="owner_id" name="owner_id" placeholder="Owner ID"
                                value="" readonly>
                            <input type="text" id="full_name" name="full_name" placeholder="Full Name" readonly>
                        </div>

                        <div class="form-row">
                            <input type="date" id="date" name="date" placeholder="Date">
                            <input type="text" id="paid_amnt" name="paid_amnt" placeholder="Paid Amount (Rs)" />

                        </div>

                        <div class="form-row">
                            <input type="text" id="bank_details" name="bank_details"
                                placeholder="Bank Details"readonly>
                            <input type="text" id="acc_no" name="acc_no" placeholder="Account Number"
                                readonly>
                        </div>
                        <div class="upload-section">
                            <p>Add Image of Receipt</p>
                            <input type="file" name="receipt[]" accept="image/*" multiple>
                            @error('receipt')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="submit-container">
                        <button type="button" class="btn-submit" onclick="window.history.back()">CANCEL</button>
                        <button type="submit" class="btn-submit">Submit</button>
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
    function updateOwner() {
        var select = document.getElementById("vehicle");
        var selectedOption = select.options[select.selectedIndex];

        // Get values from selected option
        var ownerId = selectedOption.getAttribute("data-owner_id");
        var fullName = selectedOption.getAttribute("data-full_name");
        var accNo = selectedOption.getAttribute("data-acc_no");
        var bankDetails = selectedOption.getAttribute("data-bank_details");

        // Update input fields
        document.getElementById("owner_id").value = ownerId ? ownerId : "";
        document.getElementById("full_name").value = fullName ? fullName : "";
        document.getElementById("acc_no").value = accNo ? accNo : "";
        document.getElementById("bank_details").value = bankDetails ? bankDetails : "";
    }
</script>

</html>
