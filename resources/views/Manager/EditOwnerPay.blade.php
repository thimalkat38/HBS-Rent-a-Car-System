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
            <form action="{{ route('ownerpayments.update', $ownerpayment->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <label for="full_name">Owner Name:</label>
                    <input type="text" id="full_name" name="full_name"
                        value="{{ old('full_name', $ownerpayment->full_name) }}" required>
                </div>
                <div class="form-row">
                    <label for="vehicle">Vehicle:</label>
                    <input type="text" id="vehicle" name="vehicle"
                        value="{{ old('vehicle', $ownerpayment->vehicle) }}" required>
                </div>
                <div class="form-row">
                    <label for="date">Payment Date:</label>
                    <input type="date" id="date" name="date" value="{{ old('date', $ownerpayment->date) }}"
                        required>
                </div>
                <div class="form-row">
                    <label for="paid_amnt">Paid Amount:</label>
                    <input type="text" step="0.01" id="paid_amnt" name="paid_amnt"
                        value="{{ old('paid_amnt', $ownerpayment->paid_amnt) }}" readonly>
                </div>
                <div class="form-row">
                    <label for="bank_details">Bank Details:</label>
                    <input type="text" id="bank_details" name="bank_details"
                        value="{{ old('bank_details', $ownerpayment->bank_details) }}" required>
                </div>
                <div class="form-row">
                    <label for="acc_no">Account Number:</label>
                    <input type="text" id="acc_no" name="acc_no"
                        value="{{ old('acc_no', $ownerpayment->acc_no) }}" required>
                </div>

                <div class="submit-container">
                    <button type="submit" class="btn-submit">Update Payment</button>
                    <a href="{{ route('ownerpayments.index') }}" class="btn-submit">Cancel</a>
                </div>
            </form>

        </div>
        <!-- Footer -->
        <div class="footer">
            <p>Copyright © 2022 Golden Ray. All Rights Reserved. Designed By Ezone IT SOLUTION</p>
        </div>
</body>

</html>
