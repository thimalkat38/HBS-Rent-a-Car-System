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
                <h1 class="text-center mb-3">Booking Details</h1>

                @if($booking)
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-primary mb-3">Customer Information</h5>
                        <p><strong>Full Name:</strong> <span id="fullName">{{ $booking->full_name }}</span></p>
                        <p><strong>Mobile Number:</strong> <span id="mobileNumber">{{ $booking->mobile_number }}</span></p>

                        <!-- Display NIC and Address from the customer -->
                        @if($customer)
                            <p><strong>NIC:</strong> <span id="nic">{{ $customer->nic }}</span></p>
                            <p><strong>Address:</strong> <span id="address">{{ $customer->address }}</span></p>
                        @else
                            <p class="text-muted">Customer information not available.</p>
                        @endif

                        <h5 class="card-title text-primary mt-3 mb-2">Booking Information</h5>
                        <p><strong>Vehicle Number:</strong> <span id="vehicleNumber">{{ $booking->vehicle_number }}</span></p>
                        <p><strong>Vehicle:</strong> <span id="vehicleModel">{{ $booking->vehicle_name }}</span></p>
                        <p><strong>Booking Time:</strong> <span id="bookingTime">{{ $booking->booking_time }}</span></p>
                        <p><strong>From Date:</strong> <span id="fromDate">{{ $booking->from_date }}</span></p>
                        <p><strong>To Date:</strong> <span id="toDate">{{ $booking->to_date }}</span></p>
                        <p><strong>Price:</strong> <span id="price">LKR {{ $booking->price }}</span></p>

                        <!-- Photos Section -->
                        <h5 class="card-title text-primary mt-3 mb-2">Photos</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Vehicle Photos when Released</h6>
                                <div class="row">
                                    @if(!empty($booking->driving_photos))
                                        @foreach($booking->driving_photos as $photo)
                                            <div class="col-6 col-md-4 col-lg-3 mb-3">
                                                <img src="{{ asset('storage/' . $photo) }}" class="img-fluid img-thumbnail" alt="Driving Photo">
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="text-muted">No driving photos for this vehicle.</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6>NIC Photos</h6>
                                <div class="row">
                                    @if(!empty($booking->nic_photos))
                                        @foreach($booking->nic_photos as $photo)
                                            <div class="col-6 col-md-4 col-lg-3 mb-3">
                                                <img src="{{ asset('storage/' . $photo) }}" class="img-fluid img-thumbnail" alt="NIC Photo">
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="text-muted">No NIC photos available.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Edit and Delete Buttons -->
                        <div class="mt-3">
                            <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning">Edit Booking</a>

                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this booking?')">Delete Booking</button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <p class="text-center text-danger mt-3">No booking found.</p>
                @endif
            </div>

            <!-- PDF Generation Button -->
            <div class="col-12 text-center mt-3">
                <button onclick="generatePDF();" class="btn btn-info">Download PDF</button>
            </div>
        </div>
    </div>

    <!-- Custom Script to Generate PDF -->
    <script>
        async function generatePDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            const logo = new Image();
            logo.src = '{{ asset("images/logo.png") }}';

            logo.onload = function () {
                doc.setFillColor(255, 170, 0);
                doc.rect(0, 0, 210, 40, 'F');
                doc.addImage(logo, 'PNG', 10, 10, 50, 20);

                doc.setFontSize(10);
                doc.setTextColor(255, 255, 255);
                doc.text("Bulagala, Dambulla", 70, 20);
                doc.text("Phone: +94 777425008 / +94 777425008 | Email: info@rentacarsrilankahbs.com", 70, 30);

                doc.setTextColor(0, 0, 0);
                doc.setFontSize(18);
                doc.setFont("helvetica", "bold");
                doc.text("Booking Details", doc.internal.pageSize.getWidth() / 2, 50, { align: "center" });

                doc.setFontSize(12);
                doc.text("Customer Information", 10, 60);
                doc.text("Full Name: " + document.getElementById("fullName").textContent, 10, 70);
                doc.text("Mobile Number: " + document.getElementById("mobileNumber").textContent, 10, 80);

                var nic = document.getElementById("nic") ? document.getElementById("nic").textContent : "N/A";
                var address = document.getElementById("address") ? document.getElementById("address").textContent : "N/A";
                doc.text("NIC: " + nic, 10, 90);
                doc.text("Address: " + address, 10, 100);

                doc.setFontSize(12);
                doc.text("Booking Information", 10, 110);
                doc.text("Vehicle Number: " + document.getElementById("vehicleNumber").textContent, 10, 120);
                doc.text("Vehicle Model: " + document.getElementById("vehicleModel").textContent, 10, 130);
                doc.text("Booking Time: " + document.getElementById("bookingTime").textContent, 10, 140);
                doc.text("From: " + document.getElementById("fromDate").textContent + " to " + document.getElementById("toDate").textContent, 10, 150);

                doc.setFontSize(17);
                doc.text("Price: " + document.getElementById("price").textContent, 150, 170);

                doc.save("booking_details.pdf");
            }
        }
    </script>

    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
