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
    <!-- Edit Vehicle Form -->
    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-section">
            <h1 class="title">Edit Vehicle</h1>

            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Message -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Vehicle Name -->
            <div class="form-row">
                <label for="vehicle_name">Vehicle Name</label>
                <input type="text" name="vehicle_name" value="{{ old('vehicle_name', $vehicle->vehicle_name) }}" readonly>
                <label for="vehicle_type">Vehicle Type</label>
                <input type="text" name="vehicle_type" value="{{ old('vehicle_type', $vehicle->vehicle_type) }}" readonly>
            </div>

            <!-- Vehicle Number -->
            <div class="form-row">
                <label for="vehicle_number">Vehicle Number</label>
                <input type="text" name="vehicle_number" value="{{ old('vehicle_number', $vehicle->vehicle_number) }}" readonly>
                <label for="vehicle_model">Vehicle Model</label>
                <input type="text" name="vehicle_model" value="{{ old('vehicle_model', $vehicle->vehicle_model) }}" readonly>
            </div>

            <!-- Engine Number -->
            <div class="form-row">
                <label for="engine_number">Engine Number</label>
                <input type="text" name="engine_number" value="{{ old('engine_number', $vehicle->engine_number) }}" readonly>
                <label for="fuel_type">Fuel Type</label>
                <input type="text" name="fuel_type" value="{{ old('fuel_type', $vehicle->fuel_type) }}" readonly>
            </div>

            <!-- Chassis Number -->
            <div class="form-row">
                <label for="chassis_number">Chassis Number</label>
                <input type="text" name="chassis_number" value="{{ old('chassis_number', $vehicle->chassis_number) }}" readonly>
                <label for="model_year">Model Year</label>
                <input type="number" name="model_year" value="{{ old('model_year', $vehicle->model_year) }}" readonly>
            </div>


            <div class="form-row">
                <label for="price_per_day">Price Per Day</label>
                <input type="text" name="price_per_day" value="{{ old('price_per_day', $vehicle->price_per_day) }}" required>
                <label for="free_km">Free KM</label>
                <input type="text" name="free_km" value="{{ old('free_km', $vehicle->free_km) }}" required>
                <label for="extra_km_chg">Extra 1KM Charge</label>
                <input type="text" name="extra_km_chg" value="{{ old('extra_km_chg', $vehicle->extra_km_chg) }}" required>
            </div>
            <!-- Current Images -->
            <div class="form-row">
                <label>Current Vehicle Images</label><br>
                @foreach($vehicle->images as $image)
                <div class="form-row_img">
                    <img src="{{ asset('storage/' . $image) }}" alt="Vehicle Image" width="100">
                </div>
                @endforeach
            </div>
            <div style="margin-bottom: 15px;">
                <label for="display_image" style="display: block; font-weight: bold; margin-bottom: 5px;">
                    Select Display Image:
                </label>
                <select name="display_image" id="display_image" 
                    style="width: 25%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                    @foreach ($vehicle->images as $image)
                        <option value="{{ $image }}" {{ $image == $vehicle->display_image ? 'selected' : '' }}>
                            {{ basename($image) }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            

            <!-- Upload New Images -->
            <div class="form-row">
                <label for="images">Upload New Images (optional)</label>
                <input type="file" name="images[]" multiple>
            </div>

            <div class="submit-container">
                <button type="submit" class="btn-submit">Update Vehicle</button>
                <a href="{{ url('manager/vehicles') }}" class="btn-submit">Cancel</a>
            </div>

        </div>
    </form>
</div>
</body>
</html>
