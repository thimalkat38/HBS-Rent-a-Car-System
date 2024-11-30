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
        <div class="header-title">Edit Inventory</div>
    </div>

    <!-- Form Section -->
    <div class="form-section">
        <form action="{{ route('inventory.update', $inventory->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Item ID -->
            <div class="form-row">
                <label for="Itm_id">Item ID:</label>
                <input type="text" id="Itm_id" name="Itm_id" value="{{ old('Itm_id', $inventory->Itm_id) }}" required>
            </div>

            <!-- Item Name -->
            <div class="form-row">
                <label for="it_name">Item Name:</label>
                <input type="text" id="it_name" name="it_name" value="{{ old('it_name', $inventory->it_name) }}" required>
            </div>

            <!-- Quantity -->
            <div class="form-row">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $inventory->quantity) }}" required>
            </div>

            <!-- Image Upload -->
            <div class="form-row">
                <label for="it_images">Upload New Images:</label>
                <input type="file" id="it_images" name="it_images[]" multiple accept="image/*">
                <!-- Show Existing Images -->
                <div>
                    @if (!empty($inventory->it_images))
                        @php
                            // Decode JSON into an array if necessary
                            $images = is_array($inventory->it_images) ? $inventory->it_images : json_decode($inventory->it_images, true);
                        @endphp
                
                        @if (!empty($images))
                            @foreach ($images as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="Item Image" style="width: 100px; height: auto; margin-right: 10px;">
                            @endforeach
                        @else
                            <p>No images available.</p>
                        @endif
                    @else
                        <p>No images available.</p>
                    @endif
                </div>
                
            </div>

            <!-- Submit Buttons -->
            <div class="submit-container">
                <button type="submit" class="btn-submit">Update Inventory</button>
                <a href="{{ route('inventory.index') }}" class="btn-submit">Cancel</a>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Copyright © 2022 Golden Ray. All Rights Reserved. Designed By Ezone IT SOLUTION</p>
    </div>
</div>

</body>
</html>
