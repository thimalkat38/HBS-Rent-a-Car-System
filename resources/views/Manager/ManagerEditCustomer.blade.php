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
            <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $customer->title) }}"
                        required>
                </div>

                <div class="form-row">
                    <label for="full_name">Full Name:</label>
                    <input type="text" id="full_name" name="full_name"
                        value="{{ old('full_name', $customer->full_name) }}" required>
                </div>

                <div class="form-row">
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $customer->phone) }}"
                        required>
                </div>
                <div class="form-row">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $customer->email) }}"
                        required>
                </div>

                <div class="form-row">
                    <label for="nic">NIC:</label>
                    <input type="text" id="nic" name="nic" value="{{ old('nic', $customer->nic) }}"
                        required>
                </div>

                <div class="form-row">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" required>{{ old('address', $customer->address) }}</textarea>
                </div>

                <div class="submit-container">
                    <button type="submit" class="btn-submit">Update Customer</button>
                    <a href="{{ route('customers.index') }}" class="btn-submit">Cancel</a>
                </div>
            </form>
        </div>
        <!-- Footer -->
        <div class="footer">
            <p>Copyright © 2022 Golden Ray. All Rights Reserved. Designed By Ezone IT SOLUTION</p>
        </div>
</body>

</html>
