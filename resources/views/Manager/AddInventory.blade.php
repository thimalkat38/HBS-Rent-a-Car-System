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
                <img src="logo.png" class="logo-icon" alt="HBS Car Rental Logo">
            </div>
            <div class="header-title">HBS Car Rental Management System</div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Sidebar -->
            <div class="sidebar">
                <nav class="nav">
                    <!-- Sidebar Navigation -->
                    <div class="nav-item">
                        <a class="nav-link" href="Dashboard.html"><img src="1.png" alt="Dashboard" class="nav-icon"> DASHBOARD</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link active" href="#"><img src="7.png" alt="Inventory" class="nav-icon"> INVENTORY</a>
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
                            <input type="text" name="Itm_id" placeholder="Item ID" value="{{ old('Itm_id') }}" required>
                            <input type="text" name="it_name" placeholder="Item Name" value="{{ old('it_name') }}" required>
                        </div>
                        <div class="form-row">
                            <input type="number" name="quantity" placeholder="Stock" value="{{ old('quantity') }}" required>
                        </div>
                        <div class="upload-section">
                            <label for="it_images" class="upload-label">
                                <img src="Icon.jpg" alt="Upload Icon" class="upload-icon">
                                <p>ADD IMAGES</p>
                                <p>Drag and Drop Files Here</p>
                            </label>
                            <input type="file" name="it_images[]" id="it_images" multiple accept="image/*" class="upload-input">
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
            <p>Copyright © 2022 Golden Ray. All Rights Reserved. Designed By Ezone IT SOLUTION</p>
        </div>
    </div>
</body>
</html>
