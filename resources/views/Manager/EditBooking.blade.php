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
        <form action="{{ route('bookings.update', $booking->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="form-section">
                <h1 class="title">Edit Booking</h1>
                
                    <div class="form-row">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" name="full_name" id="full_name" class="form-control" value="{{ old('full_name', $booking->full_name) }}" required>
                        <label for="mobile_number" class="form-label">Mobile Number</label>
                        <input type="text" name="mobile_number" id="mobile_number" class="form-control" value="{{ old('mobile_number', $booking->mobile_number) }}" required>
                    </div>


                    <div class="form-row">
                        <label for="booking_time" class="form-label">Booking Time</label>
                        <input type="time" name="booking_time" id="booking_time" class="form-control" value="{{ old('booking_time', $booking->booking_time) }}" required>
                        <label for="price" class="form-label">Price</label>
                        <input type="text" name="price" id="price" class="form-control" value="{{ old('price', $booking->price) }}" required>
                    </div>


                    {{-- <div class="form-row">
                        <label for="fuel_type" class="form-label">Fuel Type</label>
                        <input type="text" name="fuel_type" id="fuel_type" class="form-control" value="{{ old('fuel_type', $booking->fuel_type) }}" required>
                        <label for="vehicle_name" class="form-label">Vehicle name</label>
                        <input type="text" name="vehicle_name" id="vehicle_name" class="form-control" value="{{ old('vehicle_name', $booking->vehicle_name) }}" required>
                    </div> --}}

                    <div class="form-row">
                        <label for="from_date" class="form-label">From Date</label>
                        <input type="date" name="from_date" id="from_date" class="form-control" value="{{ old('from_date', $booking->from_date) }}" required>
                        <label for="to_date" class="form-label">To Date</label>
                        <input type="date" name="to_date" id="to_date" class="form-control" value="{{ old('to_date', $booking->to_date) }}" required>
                    </div>

                    <!-- Driving Photos -->
                    <div class="form-row">
                        <label for="driving_photos" class="form-label">Update Driving Photos</label>
                        <input type="file" name="driving_photos[]" id="driving_photos" class="form-control" multiple>
                        <div class="mt-2">
                            @if(!empty($booking->driving_photos))
                                @foreach($booking->driving_photos as $photo)
                                    <img src="{{ asset('storage/' . $photo) }}" class="img-thumbnail" width="100" alt="Driving Photo">
                                @endforeach
                            @else
                                <p class="text-muted">No driving photos available.</p>
                            @endif
                        </div>
                    <!-- NIC Photos -->
                        <label for="nic_photos" class="form-label">Update NIC Photos</label>
                        <input type="file" name="nic_photos[]" id="nic_photos" class="form-control" multiple>
                        <div class="mt-2">
                            @if(!empty($booking->nic_photos))
                                @foreach($booking->nic_photos as $photo)
                                    <img src="{{ asset('storage/' . $photo) }}" class="img-thumbnail" width="100" alt="NIC Photo">
                                @endforeach
                            @else
                                <p class="text-muted">No NIC photos available.</p>
                            @endif
                        </div>
                    </div>
                    <div class="submit-container">
                        <button type="submit" class="btn-submit">Update Booking</button>
                        <a href="{{ route('bookings.index') }}" class="btn-submit">Cancel</a>
                    </div>
                </form>
        
    </div>
</body>
</html>
