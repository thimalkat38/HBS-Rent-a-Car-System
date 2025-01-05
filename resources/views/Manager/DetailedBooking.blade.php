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
            font-family: 'Oxanium', sans-serif;
            /* Font family */
            font-weight: bold;
            /* Make all text bold */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f9fa;
        }

        .container {
            max-height: 90vh;
            /* Adjusts max height to fit within the screen */
            overflow-y: auto;
            padding: 1rem;
        }

        .card-body {
            padding: 0.5rem;
            /* Reduces padding inside cards */
        }

        .text-center {
            margin: 0.5rem 0;
            /* Reduces top and bottom margins */
        }

        /* Font size adjustments */
        h1 {
            font-size: 1.5rem;
            /* Reduced main heading font size */
        }

        h5,
        h6 {
            font-size: 1rem;
            /* Reduced subheading font size */
        }

        p,
        button,
        .text-muted {
            font-size: 0.875rem;
            /* Reduced paragraph and button font size */
        }
    </style>
</head>

<body>

    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-3">Booking Details</h1>

                @if ($booking)
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-primary mb-3">Customer Information</h5>
                            <p><strong>Full Name:</strong> <span id="fullName">{{ $booking->full_name }}</span></p>
                            <p><strong>Mobile Number:</strong> <span
                                    id="mobileNumber">{{ $booking->mobile_number }}</span></p>

                            <!-- Display NIC and Address from the customer -->
                            @if ($customer)
                                <p><strong>NIC:</strong> <span id="nic">{{ $customer->nic }}</span></p>
                                <p><strong>Address:</strong> <span id="address">{{ $customer->address }}</span></p>
                            @else
                                <p class="text-muted">Customer information not available.</p>
                            @endif

                            <h5 class="card-title text-primary mt-3 mb-2">Booking Information</h5>
                            <p style="color: red"><strong>Booking ID:</strong> <span
                                    id="id">{{ $booking->id }}</span></p>
                            <p><strong>Vehicle Number:</strong> <span
                                    id="vehicleNumber">{{ $booking->vehicle_number }}</span></p>
                            <p><strong>Vehicle:</strong> <span id="vehicleModel">{{ $booking->vehicle_name }}</span></p>
                            <p><strong>From Date:</strong> <span id="fromDate">{{ $booking->from_date }}
                                    {{ $booking->booking_time }}</span></p>
                            <p><strong>To Date:</strong> <span id="toDate">{{ $booking->to_date }}
                                    {{ $booking->arrival_time }}</span></p>
                            <p><strong>Deposit:</strong> <span
                                    id="deposit">{{ $booking->deposit ?? 'No Deposit..' }}</span></p>
                            <p><strong>Released Officer:</strong> <span id="deposit">{{ $booking->officer }}</span>
                            </p>
                            <br>
                            <h6 style="color: red">Deposit Vehicle Images</h6>
                            <div class="row">
                                @if (!empty($booking->deposit_img))
                                    @foreach ($booking->deposit_img as $photo)
                                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                                            <img src="{{ asset('storage/' . $photo) }}" class="img-fluid img-thumbnail"
                                                alt="Driving Photo">
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-muted">No Deposit item Image Available.</p>
                                @endif
                            </div><br>


                            <!-- Updated Bill Information -->
                            <h5 class="card-title text-primary mt-3 mb-2">Bill Information</h5>
                            <p><strong>Based Price:</strong><span id="basedPrice"> LKR
                                    {{ number_format($booking->price_per_day * $booking->days, 2) }}</p>
                            <p><strong>Additional Charges:</strong><span id="addChg"> LKR
                                    {{ number_format($booking->additional_chagers, 2) }}</p>
                            <p><strong>Discount Price:</strong><span id="discountPrice"> LKR
                                    {{ number_format($booking->discount_price, 2) }}</p>
                            <p><strong>Paid Amount:</strong><span id="PaidAmunt"> LKR
                                    {{ number_format($booking->payed, 2) }}</p>
                            <p><strong>Payment Note: </strong>{{ $booking->method }}</p>
                            <p><strong>Amount Due:</strong><span id="due"> LKR
                                    {{ number_format($booking->price, 2) }}</p>
                            <p><strong>Reason For Additional Charges:</strong> <span
                                    id="reason">{{ $booking->reason }}</span></p>

                            <!-- Photos Section -->
                            <h5 class="card-title text-primary mt-3 mb-2">Photos</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Vehicle Images when Released</h6>
                                    <div class="row">
                                        @if (!empty($booking->driving_photos))
                                            @foreach ($booking->driving_photos as $photo)
                                                <div class="col-6 col-md-4 col-lg-3 mb-3">
                                                    <img src="{{ asset('storage/' . $photo) }}"
                                                        class="img-fluid img-thumbnail" alt="Driving Photo">
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="text-muted">No Images before vehicle release.</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h6>NIC Images</h6>
                                    <div class="row">
                                        @if (!empty($booking->nic_photos))
                                            @foreach ($booking->nic_photos as $photo)
                                                <div class="col-6 col-md-4 col-lg-3 mb-3">
                                                    <img src="{{ asset('storage/' . $photo) }}"
                                                        class="img-fluid img-thumbnail" alt="NIC Photo">
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="text-muted">No NIC Images available.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Edit and Delete Buttons -->
                            <div class="mt-3">
                                <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning">Edit
                                    Booking</a>

                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this booking?')">Delete
                                        Booking</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <p class="text-center text-danger mt-3">No booking found.</p>
                @endif
            </div>

            <!-- PDF Generation Buttons -->
            <div class="col-12 text-center mt-3">
                <button onclick="generatePDF();" class="btn btn-info">Download PDF</button>
                <button onclick="printPDF();" class="btn btn-secondary">Print PDF</button>
            </div>

        </div>
    </div>

    <!-- Custom Script to Generate PDF -->
    <script>
        async function generatePDF() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            try {
                // Add header with background and logo
                const logo = new Image();
                logo.src = '{{ asset('images/logo.png') }}';

                logo.onload = function() {
                    doc.setFillColor(255, 170, 0); // Header background color
                    doc.rect(0, 0, 210, 40, 'F');
                    doc.addImage(logo, 'PNG', 10, 10, 50, 20);

                    doc.setFontSize(10);
                    doc.setTextColor(255, 255, 255);
                    doc.text("Bulagala, Dambulla", 70, 20);
                    doc.text("Phone: +94 777425008 / +94 777425008 | Email: info@rentacarsrilankahbs.com", 70, 30);

                    // Reset text color and position for the main content
                    doc.setTextColor(0, 0, 0);
                    let currentY = 50; // Initial Y position for content
                    const lineSpacing = 10; // Space between lines

                    // Title
                    doc.setFontSize(18);
                    doc.setFont("helvetica", "bold");
                    doc.text("Booking Details", doc.internal.pageSize.getWidth() / 2, currentY, {
                        align: "center"
                    });
                    currentY += 20; // Add space after the title

                    // Customer Information
                    doc.setFontSize(12);
                    doc.setFont("helvetica", "normal");
                    doc.text('Customer Information:', 10, currentY);
                    currentY += lineSpacing;

                    doc.text('Full Name: ' + (document.getElementById('fullName')?.textContent || 'N/A'), 10,
                        currentY);
                    currentY += lineSpacing;
                    doc.text('Mobile Number: ' + (document.getElementById('mobileNumber')?.textContent || 'N/A'),
                        10, currentY);
                    currentY += lineSpacing;
                    doc.text('NIC: ' + (document.getElementById('nic')?.textContent || 'N/A'), 10, currentY);
                    currentY += lineSpacing;
                    doc.text('Address: ' + (document.getElementById('address')?.textContent || 'N/A'), 10,
                    currentY);
                    currentY += lineSpacing + 5; // Extra space before the next section

                    // Booking Information
                    doc.text('Booking Information:', 10, currentY);
                    currentY += lineSpacing;

                    doc.text('Booking ID: ' + (document.getElementById('id')?.textContent || 'N/A'), 13, currentY);
                    currentY += lineSpacing;
                    doc.text('Vehicle Number: ' + (document.getElementById('vehicleNumber')?.textContent || 'N/A'),
                        10, currentY);
                    currentY += lineSpacing;
                    doc.text('Vehicle Model: ' + (document.getElementById('vehicleModel')?.textContent || 'N/A'),
                        10, currentY);
                    currentY += lineSpacing;
                    doc.text('From: ' + (document.getElementById('fromDate')?.textContent || 'N/A'), 10, currentY);
                    currentY += lineSpacing;
                    doc.text('To: ' + (document.getElementById('toDate')?.textContent || 'N/A'), 10, currentY);
                    currentY += lineSpacing;
                    doc.text('Deposit: ' + (document.getElementById('deposit')?.textContent || 'N/A'), 10,
                    currentY);
                    currentY += lineSpacing + 5;

                    // Billing Information
                    doc.text('Billing Information:', 10, currentY);
                    currentY += lineSpacing;

                    const labelX = 10; // Left-side X coordinate for labels
                    const valueX = 190; // Right-side X coordinate for values

                    doc.setFont('courier', 'normal'); // Use monospaced font for better alignment
                    doc.text('Base Price:', labelX, currentY);
                    doc.text('LKR ' + (document.getElementById('basedPrice')?.textContent || 'N/A'), valueX,
                        currentY, {
                            align: 'right'
                        });
                    currentY += lineSpacing;

                    doc.text('Additional Charges (+):', labelX, currentY);
                    doc.text('LKR ' + (document.getElementById('addChg')?.textContent || 'N/A'), valueX, currentY, {
                        align: 'right'
                    });
                    currentY += lineSpacing;

                    doc.text('Discount Price (-):', labelX, currentY);
                    doc.text('LKR ' + (document.getElementById('discountPrice')?.textContent || 'N/A'), valueX,
                        currentY, {
                            align: 'right'
                        });
                    currentY += lineSpacing;

                    doc.text('Paid Amount (-):', labelX, currentY);
                    doc.text('LKR ' + (document.getElementById('PaidAmunt')?.textContent || 'N/A'), valueX,
                        currentY, {
                            align: 'right'
                        });
                    currentY += lineSpacing;

                    doc.text('Amount Due:', labelX, currentY);
                    doc.text('LKR ' + (document.getElementById('due')?.textContent || 'N/A'), valueX, currentY, {
                        align: 'right'
                    });

                    currentY += lineSpacing;
                    doc.text('Reason For Additional Charges: ' + (document.getElementById('reason')?.textContent ||
                        'N/A'), 10, currentY);

                    // Add space for signature fields
                    currentY += 10;

                    // Signature Fields
                    const pageWidth = doc.internal.pageSize.getWidth();
                    const lineWidth = 80; // Width for each signature line
                    const lineHeight = 0.5;

                    // HBS Rental Car Signature (Left)
                    const hbsX = 20; // Starting X for HBS
                    doc.setFontSize(12);
                    doc.text('HBS Rental Car:', hbsX, currentY);
                    doc.setLineWidth(lineHeight);
                    doc.line(hbsX, currentY + 15, hbsX + lineWidth, currentY + 15); // Draw a line

                    // Customer Signature (Right)
                    const customerX = pageWidth - lineWidth - 20; // Starting X for customer
                    const customerName = document.getElementById('fullName')?.textContent || 'N/A';
                    doc.text('Customer Signature (' + customerName + '):', customerX, currentY);
                    doc.line(customerX, currentY + 15, customerX + lineWidth, currentY + 15); // Draw a line

                    // Save the PDF
                    doc.save('Booking_Details.pdf');
                };

                logo.onerror = function() {
                    console.error('Logo could not be loaded. Check the path.');
                    alert('Failed to load logo. PDF generation will proceed without it.');
                    addContentWithoutLogo(doc); // Fallback in case logo fails
                };
            } catch (error) {
                console.error('PDF Generation Error:', error);
                alert('An error occurred while generating the PDF. Check the console for details.');
            }
        }

        function addContentWithoutLogo(doc) {
            doc.setFillColor(255, 170, 0);
            doc.rect(0, 0, 210, 40, 'F');
            doc.setTextColor(255, 255, 255);
            doc.setFontSize(10);
            doc.text('HBS Car Rental Management System', 70, 20);
            doc.text('Booking Details', 70, 30);

            doc.setTextColor(0, 0, 0);
            doc.text('Booking Details Content', 10, 50);
            doc.save('Booking_Details.pdf');
        }
    </script>



    <script>
        async function printPDF() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            try {
                // Generate the PDF content
                await generatePDFContent(doc);

                // Automatically open the print dialog
                doc.autoPrint();
                // This will open the PDF in a new tab for printing
                const pdfBlob = doc.output('blob');
                const pdfUrl = URL.createObjectURL(pdfBlob);
                window.open(pdfUrl, '_blank');
            } catch (error) {
                console.error('Print PDF Error:', error);
                alert('An error occurred while printing the PDF. Check the console for details.');
            }
        }

        async function generatePDFContent(doc) {
            const logo = new Image();
            logo.src = '{{ asset('images/logo.png') }}';

            return new Promise((resolve, reject) => {
                logo.onload = function() {
                    try {
                        // Add header background and logo
                        doc.setFillColor(255, 170, 0); // Orange background
                        doc.rect(0, 0, 210, 40, 'F'); // Fill rectangle for header
                        doc.addImage(logo, 'PNG', 10, 10, 50, 20); // Logo position and size

                        // Add header text
                        doc.setFontSize(10);
                        doc.setTextColor(255, 255, 255); // White text
                        doc.text('Bulagala, Dambulla', 70, 15);
                        doc.text(
                            'Phone: +94 777425008 / +94 777425008 | Email: info@rentacarsrilankahbs.com',
                            70,
                            25
                        );

                        // Reset text color and add main title
                        doc.setTextColor(0, 0, 0); // Black text
                        doc.setFontSize(16);
                        doc.setFont('helvetica', 'bold');
                        doc.text('Booking Details', 105, 50, {
                            align: 'center'
                        });

                        let currentY = 60; // Start Y position for content
                        const lineSpacing = 8; // Line spacing for sections

                        // Customer Information
                        doc.setFontSize(12);
                        doc.setFont('helvetica', 'normal');
                        doc.text('Customer Information:', 10, currentY);
                        currentY += lineSpacing;
                        doc.text('Full Name: ' + (document.getElementById('fullName')?.textContent ||
                            'N/A'), 10, currentY);
                        currentY += lineSpacing;
                        doc.text('Mobile Number: ' + (document.getElementById('mobileNumber')
                            ?.textContent || 'N/A'), 10, currentY);
                        currentY += lineSpacing;
                        doc.text('NIC: ' + (document.getElementById('nic')?.textContent || 'N/A'), 10,
                            currentY);
                        currentY += lineSpacing;
                        doc.text('Address: ' + (document.getElementById('address')?.textContent || 'N/A'),
                            10, currentY);
                        currentY += lineSpacing + 5;

                        // Booking Information
                        doc.text('Booking Information:', 10, currentY);
                        currentY += lineSpacing;
                        doc.text('Booking ID: ' + (document.getElementById('id')?.textContent || 'N/A'), 13,
                            currentY);
                        currentY += lineSpacing;
                        doc.text('Vehicle Number: ' + (document.getElementById('vehicleNumber')
                            ?.textContent || 'N/A'), 10, currentY);
                        currentY += lineSpacing;
                        doc.text('Vehicle Model: ' + (document.getElementById('vehicleModel')
                            ?.textContent || 'N/A'), 10, currentY);
                        currentY += lineSpacing;
                        doc.text('From: ' + (document.getElementById('fromDate')?.textContent || 'N/A'), 10,
                            currentY);
                        currentY += lineSpacing;
                        doc.text('To: ' + (document.getElementById('toDate')?.textContent || 'N/A'), 10,
                            currentY);
                        currentY += lineSpacing;
                        doc.text('Deposit: ' + (document.getElementById('deposit')?.textContent || 'N/A'),
                            10, currentY);
                        currentY += lineSpacing + 5;

                        // Billing Information
                        doc.text('Billing Information:', 10, currentY);
                        currentY += lineSpacing;

                        const labelX = 10; // X position for labels
                        const valueX = 200; // X position for values (aligned right)

                        doc.setFont('courier', 'normal'); // Monospaced font for alignment
                        doc.text('Base Price:', labelX, currentY);
                        doc.text('LKR ' + (document.getElementById('basedPrice')?.textContent || 'N/A'),
                            valueX, currentY, {
                                align: 'right'
                            });
                        currentY += lineSpacing;

                        doc.text('Additional Charges (+):', labelX, currentY);
                        doc.text('LKR ' + (document.getElementById('addChg')?.textContent || 'N/A'), valueX,
                            currentY, {
                                align: 'right'
                            });
                        currentY += lineSpacing;

                        doc.text('Discount Price (-):', labelX, currentY);
                        doc.text('LKR ' + (document.getElementById('discountPrice')?.textContent || 'N/A'),
                            valueX, currentY, {
                                align: 'right'
                            });
                        currentY += lineSpacing;

                        doc.text('Paid Amount (-):', labelX, currentY);
                        doc.text('LKR ' + (document.getElementById('PaidAmunt')?.textContent || 'N/A'),
                            valueX, currentY, {
                                align: 'right'
                            });
                        currentY += lineSpacing;

                        doc.text('Amount Due:', labelX, currentY);
                        doc.text('LKR ' + (document.getElementById('due')?.textContent || 'N/A'), valueX,
                            currentY, {
                                align: 'right'
                            });
                        currentY += lineSpacing;

                        doc.text('Reason For Additional Charges: ' + (document.getElementById('reason')
                            ?.textContent || 'N/A'), 10, currentY);


                        // Add space for signature fields
                        currentY += 10;

                        // Signature Fields
                        const pageWidth = doc.internal.pageSize.getWidth();
                        const lineWidth = 80; // Width for each signature line
                        const lineHeight = 0.5;

                        // HBS Rental Car Signature (Left)
                        const hbsX = 20; // Starting X for HBS
                        doc.setFontSize(12);
                        doc.text('HBS Rental Car:', hbsX, currentY);
                        doc.setLineWidth(lineHeight);
                        doc.line(hbsX, currentY + 15, hbsX + lineWidth, currentY + 15); // Draw a line

                        // Customer Signature (Right)
                        const customerX = pageWidth - lineWidth - 20; // Starting X for customer
                        const customerName = document.getElementById('fullName')?.textContent || 'N/A';
                        doc.text('Customer Signature (' + customerName + '):', customerX, currentY);
                        doc.line(customerX, currentY + 15, customerX + lineWidth, currentY +
                        15); // Draw a line

                        resolve();
                    } catch (error) {
                        reject(error);
                    }
                };

                logo.onerror = function() {
                    reject('Logo image failed to load.');
                };
            });
        }
    </script>

</body>

</html>
