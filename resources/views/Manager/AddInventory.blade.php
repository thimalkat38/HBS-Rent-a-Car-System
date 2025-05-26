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
                        <a class="nav-link active" href="{{ route('inventory.index') }}">
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

            <!-- Content Area -->
            <div class="content">
                <div class="form-section">
                    <!-- Form for Adding Inventory -->
                    <form action="{{ route('inventory.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <input type="text" name="it_name" placeholder="Item Name"
                                value="{{ old('it_name') }}" required>
                            <input type="date" name="date" placeholder="Date" value="{{ old('date') }}"
                                required>
                        </div>
                        <div class="form-row">
                            <input type="number" name="quantity" id="quantity" placeholder="Quantity"
                                value="{{ old('quantity') }}" required>
                            <input type="text" name="price_per_unit" id="price_per_unit"
                                placeholder="Price Per Unit" value="{{ old('price_per_unit') }}" required>
                            <input type="text" name="total_price" id="total_price" placeholder="Total Price"
                                value="{{ old('total_price') }}" required>
                        </div>
                        <div class="upload-section">
                            <label for="it_images" class="upload-label">
                                <img src="Icon.jpg" alt="Upload Icon" class="upload-icon">
                                <p>ADD IMAGES</p>
                                <p>Drag and Drop Files Here</p>
                            </label>
                            <input type="file" name="it_images[]" id="it_images" multiple accept="image/*"
                                class="upload-input">
                        </div>

                        <div class="submit-container">
                            <button type="reset" class="btn-submit">CLEAR</button>
                            <a href="{{ route('inventory.index') }}" class="btn-submit">BACK</a>
                            <button type="submit" class="btn-submit">SUBMIT</button>
                        </div>
                    </form>

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="error-messages">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© 2024. All rights reserved. Designed by Ezone IT Solutions.</p>
        </div>
    </div>

    <!-- JavaScript for Auto Calculation -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const quantityInput = document.getElementById("quantity");
            const pricePerUnitInput = document.getElementById("price_per_unit");
            const totalPriceInput = document.getElementById("total_price");

            function calculateValues() {
                let quantity = parseFloat(quantityInput.value);
                let pricePerUnit = parseFloat(pricePerUnitInput.value);
                let totalPrice = parseFloat(totalPriceInput.value);

                if (!isNaN(quantity) && !isNaN(pricePerUnit)) {
                    totalPriceInput.value = (quantity * pricePerUnit).toFixed(2);
                } else if (!isNaN(totalPrice) && !isNaN(quantity)) {
                    pricePerUnitInput.value = (totalPrice / quantity).toFixed(2);
                } else if (!isNaN(totalPrice) && !isNaN(pricePerUnit)) {
                    quantityInput.value = (totalPrice / pricePerUnit).toFixed(2);
                }
            }

            quantityInput.addEventListener("input", calculateValues);
            pricePerUnitInput.addEventListener("input", calculateValues);
            totalPriceInput.addEventListener("input", calculateValues);
        });
    </script>
</body>

</html>
