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
    <style>
        /* Custom styling to fit content within viewport */
        body {
            font-family: 'Oxanium', sans-serif; /* Font family */
            font-weight: bold; /* Make all text bold */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f9fa;
        }
        .container {
            max-height: 90vh; /* Adjusts max height to fit within the screen */
            overflow-y: auto;
            padding: 1rem;
        }
        .card-body {
            padding: 0.5rem; /* Reduces padding inside cards */
        }
        .text-center {
            margin: 0.5rem 0; /* Reduces top and bottom margins */
        }
        /* Font size adjustments */
        h1 {
            font-size: 1.5rem; /* Reduced main heading font size */
        }
        h5, h6 {
            font-size: 1rem; /* Reduced subheading font size */
        }
        p, button, .text-muted {
            font-size: 0.875rem; /* Reduced paragraph and button font size */
        }
    </style>
</head>
<body>

    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-3">vehicle's Details</h1>

                @if($vehicle)
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-primary mb-3">Vehicle Informations</h5>
                        <p><strong>Vehcile:</strong> <span id="fullName">{{ $vehicle->vehicle_model }} {{ $vehicle->vehicle_name }} [{{ $vehicle->vehicle_type }}]</span></p>
                        <p><strong>Register Number:</strong> <span id="mobileNumber">{{ $vehicle->vehicle_number }}</span></p>
                        <p><strong>Engine Number:</strong> <span id="mobileNumber">{{ $vehicle->engine_number }}</span></p>
                        <p><strong>Chassis Number:</strong> <span id="nic">{{ $vehicle->chassis_number }}</span></p>
                        <p><strong>Manufactured Year:</strong> <span id="nic">{{ $vehicle->model_year }}</span></p>

                        <h5 class="card-title text-primary mb-3">Price Informations</h5>
                        <p><strong>Price Per Day:</strong> <span id="nic">{{ $vehicle->price_per_day }}</span></p>
                        <p><strong>Free KM Range:</strong> <span id="nic">{{ $vehicle->free_km }}</span></p>
                        <p><strong>Price For Additional 1KM:</strong> <span id="nic">{{ $vehicle->extra_km_chg }}</span></p>

                        <!-- Photos Section -->
                        <h5 class="card-title text-primary mt-3 mb-2">Photos</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    @if(!empty($vehicle->images))
                                        @foreach($vehicle->images as $photo)
                                            <div class="col-6 col-md-4 col-lg-3 mb-3">
                                                <img src="{{ asset('storage/' . $photo) }}" class="img-fluid img-thumbnail" alt="NIC Photo">
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="text-muted">No Images for this vehicle.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Edit and Delete Buttons -->
                        <div class="mt-3">
                            <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-warning">Edit vehicle</a>

                            <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this vehicle?')">Delete vehicle</button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <p class="text-center text-danger mt-3">No vehicle found.</p>
                @endif
            </div>
        </div>
    </div>  
</body>
</html>
