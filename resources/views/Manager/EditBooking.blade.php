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
        <form action="{{ route('bookings.update', $booking->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-section">
                <h1 class="title">Edit Booking</h1>

                <!-- Show Success or Error Messages -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-row">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="text" name="full_name" id="full_name" class="form-control"
                        value="{{ old('full_name', $booking->full_name) }}" required>
                    @error('full_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for="mobile_number" class="form-label">Mobile Number</label>
                    <input type="text" name="mobile_number" id="mobile_number" class="form-control"
                        value="{{ old('mobile_number', $booking->mobile_number) }}" required>
                    @error('mobile_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for="nic" class="form-label">NIC</label>
                    <input type="text" name="nic" id="nic" class="form-control"
                        value="{{ old('nic', $booking->nic) }}">
                    @error('nic')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control"
                        value="{{ old('address', $booking->address) }}">
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <input type="hidden" id="daily_free_km"
                        value="{{ $booking->free_kmd / max(\Carbon\Carbon::parse($booking->to_date)->diffInDays($booking->from_date), 1) }}">


                    <label for="from_date" class="form-label">From Date</label>
                    <input type="date" name="from_date" id="from_date" class="form-control"
                        value="{{ old('from_date', $booking->from_date) }}" required>
                    @error('from_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror


                    <label for="booking_time" class="form-label">Booking Time</label>
                    <input type="time" name="booking_time" id="booking_time" class="form-control"
                        value="{{ old('booking_time', $booking->booking_time) }}" required>
                    @error('booking_time')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <label for="start_km" class="form-label">Starting Milage</label>
                    <input type="text" name="start_km" id="start_km" class="form-control"
                        value="{{ old('start_km', $booking->start_km) }}" required>
                    @error('start_km')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <label for="to_date" class="form-label">To Date</label>
                    <input type="date" name="to_date" id="to_date" class="form-control"
                        value="{{ old('to_date', $booking->to_date) }}" required>
                    @error('to_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for="arrival_time" class="form-label">Arrival Time</label>
                    <input type="time" name="arrival_time" id="arrival_time" class="form-control"
                        value="{{ old('arrival_time', $booking->arrival_time) }}" required>
                    @error('arrival_time')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <label for="free_km" class="form-label">Free KM</label>
                    <input type="text" name="free_km" id="free_km" class="form-control"
                        value="{{ old('free_km', $booking->free_km) }}" required>
                    @error('free_km')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <label for="vehicle_number" class="form-label">Vehicle Number</label>
                    <input type="text" id="vehicle_number" name="vehicle_number" list="vehicle_numbers"
                        class="block w-full mt-1" placeholder="Enter vehicle number"
                        value="{{ old('vehicle_name', $booking->vehicle_number) }}" maxlength="8"
                        oninput="formatVehicleNumber(this)">
                    @error('vehicle_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for="vehicle_name" class="form-label">Vehicle Name</label>
                    <input type="text" name="vehicle_name" id="vehicle_name" class="form-control"
                        value="{{ old('vehicle_name', $booking->vehicle_name) }}">
                    @error('vehicle_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <label for="start_km" class="form-label">Start Km</label>
                    <input type="text" name="start_km" class="form-control"
                        value="{{ old('start_km', $booking->start_km) }}">
                    @error('start_km')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <label for="deposit" class="form-label">Deposit</label>
                    <input type="text" name="deposit" id="deposit" class="form-control"
                        value="{{ old('deposit', $booking->deposit) }}">
                    @error('deposit')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <label for="guarantor" class="form-label">Guarantor</label>
                    <input type="text" name="guarantor" id="guarantor" class="form-control"
                        value="{{ old('guarantor', $booking->guarantor) }}">
                    @error('guarantor')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <label for="officer" class="form-label">Released Officer</label>
                    <input type="text" name="officer" id="officer" class="form-control"
                        value="{{ old('officer', $booking->officer) }}">
                    @error('officer')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class ="form-row">
                    <label for="additional_chagers" class="form-label">Additional Chagers</label>
                    <input type="text" name="additional_chagers" class="form-control" id="additional_chagers"
                        value="{{ old('additional_chagers', $booking->additional_chagers ?? '0.00') }}">
                    @error('additional_chagers')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for="reason" class="form-label">Reason For Add chg</label>
                    <input type="text" name="reason" class="form-control"
                        value="{{ old('reason', $booking->reason) }}">
                    @error('reason')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <label for="discount_price" class="form-label">Discount Price</label>
                    <input type="text" name="discount_price" class="form-control" id="discount_price"
                        value="{{ old('discount_price', $booking->discount_price) }}">
                    @error('discount_price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <label for="payed" class="form-label">Paid</label>
                    <input type="text" name="payed" class="form-control" id="payed"
                        value="{{ old('payed', $booking->payed) }}">
                    @error('payed')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <label for="method" class="form-label">Payment Note</label>
                    <input type="text" name="method" class="form-control"
                        value="{{ old('method', $booking->method) }}">
                    @error('method')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="hidden" id="price_per_day" value="{{ $booking->price_per_day }}">
                    <label for="price" class="form-label">Total Price</label>
                    <input type="text" name="price" class="form-control" id="price"
                        value="{{ old('price', $booking->price) }}" data-original-price="{{ $booking->price }}"
                        data-original-to-date="{{ $booking->to_date }}">

                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-row">
                    <label for="driving_photos" class="form-label">Update Driving Photos</label>
                    <input type="file" name="driving_photos[]" id="driving_photos" class="form-control" multiple>
                    @error('driving_photos')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <label for="nic_photos" class="form-label">Update NIC Photos</label>
                    <input type="file" name="nic_photos[]" id="nic_photos" class="form-control" multiple>
                    @error('nic_photos')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="submit-container">
                    <button type="submit" class="btn-submit">Update Booking</button>
                    <a href="{{ route('bookings.index') }}" class="btn-submit">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const additionalChagers = document.getElementById('additional_chagers');
        const discountPrice = document.getElementById('discount_price');
        const payed = document.getElementById('payed');
        const price = document.getElementById('price');

        // Store the initial values
        let initialAdditionalChagers = parseFloat(additionalChagers.value) || 0;
        let initialDiscountPrice = parseFloat(discountPrice.value) || 0;
        let initialPayed = parseFloat(payed.value) || 0;
        let initialPrice = parseFloat(price.value) || 0;

        function calculateTotalPrice() {
            // Get the current values
            const currentAdditionalChagers = parseFloat(additionalChagers.value) || 0;
            const currentDiscountPrice = parseFloat(discountPrice.value) || 0;
            const currentPayed = parseFloat(payed.value) || 0;

            // Calculate the differences
            const additionalDiff = currentAdditionalChagers - initialAdditionalChagers;
            const discountDiff = currentDiscountPrice - initialDiscountPrice;
            const payedDiff = currentPayed - initialPayed;

            // Update the initial values to the current ones
            initialAdditionalChagers = currentAdditionalChagers;
            initialDiscountPrice = currentDiscountPrice;
            initialPayed = currentPayed;

            // Update the price based on the differences
            let totalPrice = initialPrice + additionalDiff - discountDiff - payedDiff;

            // Update the price field
            price.value = totalPrice.toFixed(2); // Keep two decimal places

            // Update the initial price to reflect the new total
            initialPrice = totalPrice;
        }

        // Attach the calculate function to the input events of the fields
        additionalChagers.addEventListener('input', calculateTotalPrice);
        discountPrice.addEventListener('input', calculateTotalPrice);
        payed.addEventListener('input', calculateTotalPrice);
    });
</script>
<script>
    document.getElementById('vehicle_number').addEventListener('change', function() {
        const vehicleNumber = this.value;

        fetch(`/vehicles/get-details/${vehicleNumber}`)
            .then(response => response.json())
            .then(data => {
                if (data.vehicle_name) {
                    document.getElementById('vehicle_name').value =
                        `${data.vehicle_model} ${data.vehicle_name}`;
                } else {
                    alert(data.message || 'Vehicle details not found');
                    document.getElementById('vehicle_name').value = '';
                }
            })
            .catch(error => console.error('Error fetching vehicle details:', error));
    });
</script>
<script>
    function formatVehicleNumber(input) {
        // Remove all characters that are not uppercase letters, digits, or "-"
        input.value = input.value.toUpperCase().replace(/[^A-Z0-9-]/g, '');

        // Ensure it follows the pattern "AAA-1234"
        const match = input.value.match(/^([A-Z]{0,3})(-?)([0-9]{0,4})$/);
        if (match) {
            input.value = (match[1] || '') + (match[3] ? '-' + match[3] : '');
        }
    }
</script>
<script>
    function updateFreeKMandPrice() {
        const toDateInput = document.getElementById('to_date').value;
        const dailyFreeKm = parseFloat(document.getElementById('daily_free_km').value);
        const freeKmField = document.getElementById('free_km');

        const priceField = document.getElementById('price');
        const pricePerDay = parseFloat(document.getElementById('price_per_day').value);
        const originalPrice = parseFloat(priceField.dataset.originalPrice);
        const originalToDate = new Date(priceField.dataset.originalToDate + 'T00:00:00');
        const newToDate = new Date(toDateInput + 'T00:00:00');

        if (isNaN(originalToDate.getTime()) || isNaN(newToDate.getTime())) return;

        // ✅ Day difference between NEW to_date and ORIGINAL to_date
        let dayDifference = Math.ceil((newToDate - originalToDate) / (1000 * 60 * 60 * 24));

        // ✅ Calculate and update price only if date is extended
        if (dayDifference > 0 && !isNaN(pricePerDay)) {
            const additionalPrice = dayDifference * pricePerDay;
            priceField.value = (originalPrice + additionalPrice).toFixed(2);
        } else {
            // Reset to original price if date was shortened or unchanged
            priceField.value = originalPrice.toFixed(2);
        }

        // ✅ Optional: still update Free KM from from_date to to_date
        const fromDateInput = document.getElementById('from_date').value;
        const fromDate = new Date(fromDateInput + 'T00:00:00');

        if (!isNaN(fromDate.getTime()) && !isNaN(newToDate.getTime()) && !isNaN(dailyFreeKm)) {
            let freeKmDays = Math.ceil((newToDate - fromDate) / (1000 * 60 * 60 * 24));
            if (freeKmDays < 1) freeKmDays = 1;
            freeKmField.value = (freeKmDays * dailyFreeKm).toFixed(2);
        }
    }

    document.getElementById('from_date').addEventListener('change', updateFreeKMandPrice);
    document.getElementById('to_date').addEventListener('change', updateFreeKMandPrice);
</script>

</html>
