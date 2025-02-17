<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HBS Car Rental Management System</title>
    <!-- Google Fonts for Oxanium -->
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jsPDF CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
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
                <h1 class="text-center mb-3">Vehicle OWner's Details</h1>

                @if($vehicleOwner)
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-primary mb-3">Informations</h5>
                        <p><strong>Full Name:</strong> <span id="fullName">{{ $vehicleOwner->title }} {{ $vehicleOwner->full_name }}</span></p>
                        <p><strong>Vehicle:</strong> <span id="vehicle">{{ $vehicleOwner->vehicle_name }} [{{ $vehicleOwner->vehicle_number }}]</span></p>
                        <p><strong>Mobile Number:</strong> <span id="mobileNumber">{{ $vehicleOwner->phone }}</span></p>
                        <p><strong>Address:</strong> <span id="address">{{ $vehicleOwner->address}}</span></p>
                        <p><strong>Start Date:</strong> <span id="start_date">{{ $vehicleOwner->start_date}}</span></p>
                        <p><strong>End Date:</strong> <span id="end_date">{{ $vehicleOwner->end_date ?? 'No end_date exists'}}</span></p>
                        <p><strong>Rental Amount:</strong> <span id="rental_amnt">{{ $vehicleOwner->rental_amnt }}</span></p>
                        <p><strong>Monthly KM:</strong> <span id="monthly_km">{{ $vehicleOwner->monthly_km }}</span></p>
                        <p><strong>Extra KM Charge:</strong> <span id="extra_km_chg">{{ $vehicleOwner->extra_km_chg }}</span></p>
                        <p><strong>Bank Account Number:</strong> <span id="acc_no">{{ $vehicleOwner->acc_no }}</span></p>
                        <p><strong>Banking Details:</strong> <span id="bank_detais">{{ $vehicleOwner->bank_detais }}</span></p>

                        <!-- Edit and Delete Buttons -->
                        <div class="mt-3">
                            <a href="{{ route('vehicle_owners.edit', $vehicleOwner->id) }}" class="btn btn-warning">Edit vehicleOwner</a>

                            <form action="{{ route('vehicle_owners.destroy', $vehicleOwner->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this vehicleOwner?')">Delete vehicleOwner</button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <p class="text-center text-danger mt-3">No vehicleOwner found.</p>
                @endif
            </div>
        </div>
    </div>  
</body>
</html>
