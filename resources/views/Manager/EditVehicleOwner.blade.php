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

    <div class="container">

        <!-- Header -->
        <div class="header">
            <div class="logo-section">
                <img src="{{ asset('images/logo.png') }}" class="logo-icon" alt="HBS Car Rental Logo">
            </div>
            <div class="header-title">Edit Customer</div>
        </div>

        <div class="form-section">
            <form action="{{ route('vehicle_owners.update', $vehicleOwner->id) }}" method="POST">
                @csrf
                @method('PUT')


                <div class="form-row">
                    <label for="full_name">Full Name:</label>
                    <input type="text" id="full_name" name="full_name"
                        value="{{ old('full_name', $vehicleOwner->full_name) }}" required>
                </div>
                <div class="form-row">
                    <label for="vehicle_name">Vehicle Name:</label>
                    <input type="text" id="vehicle_name" name="vehicle_name"
                        value="{{ old('vehicle_name', $vehicleOwner->vehicle_name) }}" required>
                </div>
                <div class="form-row">
                    <label for="vehicle_number">Register Number:</label>
                    <input type="text" id="vehicle_number" name="vehicle_number"
                        value="{{ old('vehicle_number', $vehicleOwner->vehicle_number) }}" required>
                </div>
                <div class="form-row">
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $vehicleOwner->phone) }}"
                        required>
                </div>
                <div class="form-row">
                    <label for="start_date">Start Date:</label>
                    <input type="date" id="start_date" name="start_date"
                        value="{{ old('start_date', $vehicleOwner->start_date) }}" required>
                </div>
                <div class="form-row">
                    <label for="end_date">End Date:</label>
                    <input type="date" id="end_date" name="end_date"
                        value="{{ old('end_date', $vehicleOwner->end_date) }}" required>
                </div>
                <div class="form-row">
                    <label for="rental_amnt">Rental Amount:</label>
                    <input type="text" id="rental_amnt" name="rental_amnt"
                        value="{{ old('rental_amnt', $vehicleOwner->rental_amnt) }}" required>
                </div>

                <div class="form-row">
                    <label for="monthly_km">Monthly KM:</label>
                    <input type="text" id="monthly_km" name="monthly_km"
                        value="{{ old('monthly_km', $vehicleOwner->monthly_km) }}" required>
                </div>
                <div class="form-row">
                    <label for="extra_km_chg">Extra KM Charge:</label>
                    <input type="text" id="extra_km_chg" name="extra_km_chg"
                        value="{{ old('extra_km_chg', $vehicleOwner->extra_km_chg) }}" required>
                </div>
                <div class="form-row">
                    <label for="acc_no">Bank Acoount Number:</label>
                    <input type="text" id="acc_no" name="acc_no"
                        value="{{ old('acc_no', $vehicleOwner->acc_no) }}" required>
                </div>
                <div class="form-row">
                    <label for="bank_detais">Banking Details:</label>
                    <input type="text" id="bank_detais" name="bank_detais"
                        value="{{ old('bank_detais', $vehicleOwner->bank_detais) }}" required>
                </div>

                <div class="form-row">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" required>{{ old('address', $vehicleOwner->address) }}</textarea>
                </div>

                <div class="submit-container">
                    <button type="submit" class="btn-submit">Update vehicleOwner</button>
                    <a href="{{ route('vehicle_owners.index') }}" class="btn-submit">Cancel</a>
                </div>
            </form>
        </div>
        <!-- Footer -->
        <div class="footer">
            <p>Copyright © 2022 Golden Ray. All Rights Reserved. Designed By Ezone IT SOLUTION</p>
        </div>
</body>

</html>
