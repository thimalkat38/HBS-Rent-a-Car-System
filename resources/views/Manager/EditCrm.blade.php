<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HBS Car Rental Management System</title>
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
            <div class="header-title">Edit Reminder</div>
        </div>

            <div class="form-section">
                <form action="{{ route('crms.update', $crm->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-row">
                        <label for="full_name">Name:</label>
                        <input type="text" id="full_name" name="full_name" value="{{ old('title', $crm->full_name) }}" required>
                    </div>
                    <div class="form-row">
                        <label for="phone">Phone:</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $crm->phone) }}" required>
                    </div>
                    
                    <div class="form-row">
                        <label for="date">Date:</label>
                        <input type="Date" id="date" name="date" value="{{ old('date', $crm->date) }}" required>
                    </div>
                    <div class="form-row">
                        <label for="subject">Subject:</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject', $crm->subject) }}" required>
                    </div>

                    <div class="form-row">
                        <label for="note">Note:</label>
                        <input type="text" id="note" name="note" value="{{ old('note', $crm->note) }}" required>
                    </div>

                    <div class="submit-container">
                        <button type="submit" class="btn-submit">Update crm</button>
                        <a href="{{ route('crms.upcoming') }}" class="btn-submit">Cancel</a>
                    </div>
                </form>
            </div>
            <!-- Footer -->
        <div class="footer">
            <p>Copyright © 2022 Golden Ray. All Rights Reserved. Designed By Ezone IT SOLUTION</p>
        </div>
</body>
</html>
