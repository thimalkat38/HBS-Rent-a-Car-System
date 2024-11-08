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
                <input type="text" name="vehicle_name" value="{{ old('vehicle_name', $vehicle->vehicle_name) }}" required>
                <label for="vehicle_type">Vehicle Type</label>
                <input type="text" name="vehicle_type" value="{{ old('vehicle_type', $vehicle->vehicle_type) }}" required>
            </div>

            <!-- Vehicle Number -->
            <div class="form-row">
                <label for="vehicle_number">Vehicle Number</label>
                <input type="text" name="vehicle_number" value="{{ old('vehicle_number', $vehicle->vehicle_number) }}" required>
                <label for="vehicle_model">Vehicle Model</label>
                <input type="text" name="vehicle_model" value="{{ old('vehicle_model', $vehicle->vehicle_model) }}" required>
            </div>

            <!-- Engine Number -->
            <div class="form-row">
                <label for="engine_number">Engine Number</label>
                <input type="text" name="engine_number" value="{{ old('engine_number', $vehicle->engine_number) }}" required>
                <label for="fuel_type">Fuel Type</label>
                <input type="text" name="fuel_type" value="{{ old('fuel_type', $vehicle->fuel_type) }}" required>
            </div>

            <!-- Chassis Number -->
            <div class="form-row">
                <label for="chassis_number">Chassis Number</label>
                <input type="text" name="chassis_number" value="{{ old('chassis_number', $vehicle->chassis_number) }}" required>
                <label for="model_year">Model Year</label>
                <input type="number" name="model_year" value="{{ old('model_year', $vehicle->model_year) }}" required>
            </div>


            <div class="form-row">
                <label for="chassis_number">Price Per Day</label>
                <input type="text" name="price_per_day" value="{{ old('price_per_day', $vehicle->price_per_day) }}" required>
                <label for="model_year">Free KM</label>
                <input type="text" name="free_km" value="{{ old('free_km', $vehicle->free_km) }}" required>
            </div>

            <!-- Vehicle Features -->
            <div class="form-row">
                <label>Vehicle Features</label><br>
                <input type="checkbox" name="features[chassy_number]" {{ old('features[chassy_number]', $vehicle->features['chassy_number'] ?? false) ? 'checked' : '' }}> Chassis Number<br>
                <input type="checkbox" name="features[leather_seats]" {{ old('features[leather_seats]', $vehicle->features['leather_seats'] ?? false) ? 'checked' : '' }}> Leather Seats<br>
                <input type="checkbox" name="features[air_conditioner]" {{ old('features[air_conditioner]', $vehicle->features['air_conditioner'] ?? false) ? 'checked' : '' }}> Air Conditioner<br>
                <input type="checkbox" name="features[power_steering]" {{ old('features[power_steering]', $vehicle->features['power_steering'] ?? false) ? 'checked' : '' }}> Power Steering<br>
                <input type="checkbox" name="features[cd_player]" {{ old('features[cd_player]', $vehicle->features['cd_player'] ?? false) ? 'checked' : '' }}> CD Player<br>
                <input type="checkbox" name="features[power_door]" {{ old('features[power_door]', $vehicle->features['power_door'] ?? false) ? 'checked' : '' }}> Power Door<br>
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

            <!-- Upload New Images -->
            <div class="form-row">
                <label for="images">Upload New Images (optional)</label>
                <input type="file" name="images[]" multiple>
            </div>

            <div class="submit-container">
                <button type="submit" class="btn-submit">Update Vehicle</button>
                <a href="{{ route('vehicles.index') }}" class="btn-submit">Cancel</a>
            </div>

        </div>
    </form>
</div>
</body>
</html>
