<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Management System</title>
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
                <h1 class="text-center mb-3">Post Booking Details</h1>

                @if ($postBooking)
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-primary mb-3">Customer Information</h5>
                            <p><strong>Full Name:</strong> <span id="fullName">{{ $postBooking->full_name }}</span></p>
                            <p><strong>NIC:</strong> <span id="nic">{{ $postBooking->nic }}</span></p>
                            <p><strong>Mobile Number:</strong> <span
                                    id="mobileNumber">{{ $postBooking->mobile_number }}</span></p>

                            <h5 class="card-title text-primary mt-3 mb-2">Booking Information</h5>
                            <p><strong>Vehicle:</strong> <span id="vehicleModel">{{ $postBooking->vehicle }}</span></p>
                            <p><strong>Register Number:</strong> <span
                                    id="vehicleNumber">{{ $postBooking->vehicle_number }}</span></p>
                            <p><strong>From Date:</strong> <span id="fromDate">{{ $postBooking->from_date }}</span></p>
                            <p><strong>Arrived Date:</strong> <span id="toDate">{{ $postBooking->ar_date }}</span>
                            </p>
                            <p><strong>Extra Days:</strong> <span id="exDate">{{ $postBooking->ex_date }}</span></p>
                            <p><strong>Price Per Day:</strong> <span
                                    id="ppd">{{ $postBooking->price_per_day }}</span></p>
                            <p><strong>Started Mileage:</strong> <span id="strat">{{ $postBooking->start_km }}
                                    </span></p>
                            <p><strong>Free KM:</strong> <span id="free">{{ $postBooking->free_km }}</span></p>
                            <p><strong>Ended Mileage:</strong> <span id="end">{{ $postBooking->end_km }}
                                    </span></p>
                            <p><strong>Over Drived KM:</strong> <span id="over">{{ $postBooking->over }} </span>
                            </p>
                            <p><strong>Extra 1KM Charges:</strong> <span
                                    id="kmchg">{{ $postBooking->extra_km_chg }}</span></p>

                            <h5 class="card-title text-primary mt-3 mb-2">Payment Details</h5>
                            <p><strong>Base Price(LKR):</strong> <span
                                    id="basePrice">{{ $postBooking->base_price }}</span></p>
                            <p><strong>Extra KM Charges(LKR)::</strong> <span
                                    id="extraKm">{{ $postBooking->extra_km }}</span></p>
                            <p><strong>Extra Hours Charges(LKR):</strong> <span
                                    id="extraHours">{{ $postBooking->extra_hours }}</span></p>
                            <p><strong>Damage Fee(LKR):</strong> <span
                                    id="damageFee">{{ $postBooking->damage_fee }}</span></p>
                            <p><strong>After Additional Charges(LKR):</strong> <span
                                    id="afterAdditional">{{ $postBooking->after_additional }}</span></p>
                            <p><strong>Discount Applied(LKR):</strong> <span
                                    id="afterDiscount">{{ $postBooking->after_discount }}</span></p>
                            <p><strong>Advanced Paid Amount(LKR):</strong> <span
                                    id="paid">{{ $postBooking->paid }}</span></p>
                            <p><strong>Final Amount Due(paid)(LKR):</strong> <span
                                    id="due">{{ $postBooking->due }}</span></p>
                            <p><strong>Total(LKR):</strong> <span
                                    id="totalIncome">{{ $postBooking->total_income }}</span></p>
                            <p><strong>Reason for Additional Charges:</strong> <span
                                    id="reason">{{ $postBooking->reason }}</span></p>

                            <h5 class="card-title text-primary mt-3 mb-2">Additional Information</h5>
                            <p><strong>Deposit Refunded:</strong> <span
                                    id="depositRefunded">{{ $postBooking->deposit_refunded ? 'Yes' : 'No' }}</span></p>
                            <p><strong>Vehicle Checked:</strong> <span
                                    id="vehicleChecked">{{ $postBooking->vehicle_checked ? 'Yes' : 'No' }}</span></p>
                            <p><strong>Due Paid:</strong> <span
                                    id="vehicleChecked">{{ $postBooking->due_paid ? 'Yes' : 'No' }}</span></p>
                            <p><strong>Recived Officer:</strong> <span
                                    id="officer">{{ $postBooking->officer }}</span></p>
                            <p><strong>Released Officer:</strong> <span
                                    id="rel_officer">{{ $postBooking->rel_officer }}</span></p>
                            <p><strong>Agreement Number:</strong> <span
                                        id="agn">{{ $postBooking->agn }}</span></p>
                        </div>
                    </div>
                @else
                    <p class="text-center text-danger mt-3">No postBooking found.</p>
                @endif
            </div>
        </div>
    </div>


    <!-- PDF Generation Buttons -->
    <div class="col-12 text-center mt-3">
        {{-- <button onclick="generatePDF();" class="btn btn-info">Download PDF</button> --}}
        <button onclick="printPDF();" class="btn btn-secondary">Print PDF</button>
        <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Back</a>

    </div>

    </div>
    </div>
    <script>
        async function printPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            try {
                await generatePDFContent(doc);
                doc.autoPrint();
                const pdfBlob = doc.output('blob');
                const pdfUrl = URL.createObjectURL(pdfBlob);
                window.open(pdfUrl, '_blank');
            } catch (error) {
                console.error('Print PDF Error:', error);
                alert('An error occurred while printing the PDF.');
            }
        }

        async function generatePDFContent(doc) {
            const logo = new Image();
            logo.src = businessData.logo ? "{{ asset('storage') }}/" + businessData.logo : "{{ asset('images/logo1.png') }}";

            return new Promise((resolve, reject) => {
                logo.onload = function() {
                    try {
                        // Header Section
                        doc.setFillColor(255, 170, 0); // Orange
                        doc.rect(0, 0, 210, 40, 'F');
                        doc.addImage(logo, 'PNG', 10, 10, 30, 20);

                        doc.setFontSize(16);
                        doc.setFont('helvetica', 'bold');
                        doc.setTextColor(0, 0, 0);
                        doc.text(businessData.b_name || 'Business Name', 45, 18);

                        doc.setFontSize(10);
                        doc.setFont('helvetica', 'normal');
                        doc.text(businessData.address || 'No Address', 45, 25);
                        doc.text(`Phone: ${businessData.b_phone || 'N/A'}`, 45, 30);
                        doc.text(`Email: ${businessData.email || 'N/A'}`, 45, 35);

                        // Draw a line under header
                        doc.setDrawColor(180, 180, 180);
                        doc.line(10, 42, 200, 42);

                        let currentY = 48;
                        const sectionSpacing = 8;
                        const rowSpacing = 7;
                        const labelX = 15;
                        const valueX = 70;

                        // Section Title Helper
                        function sectionTitle(title) {
                            doc.setFontSize(12);
                            doc.setFont('helvetica', 'bold');
                            doc.setTextColor(34, 34, 34);
                            doc.text(title, 10, currentY);
                            currentY += sectionSpacing;
                            doc.setFont('helvetica', 'normal');
                            doc.setFontSize(10);
                            doc.setTextColor(0, 0, 0);
                        }

                        // Row Helper
                        function addRow(label, elementId, valueOverride = null) {
                            const value = valueOverride !== null ? valueOverride : (document.getElementById(elementId)?.textContent || 'N/A');
                            doc.text(label, labelX, currentY);
                            doc.text(value, valueX, currentY);
                            currentY += rowSpacing;
                        }

                        // Table Helper for Billing
                        function addBillTable(rows) {
                            const tableStartY = currentY;
                            const col1X = 15, col2X = 80, col3X = 150;
                            const col1W = 60, col2W = 60, col3W = 40;
                            doc.setFont('helvetica', 'bold');
                            doc.setFillColor(240, 240, 240);
                            doc.rect(col1X - 2, tableStartY - 5, col1W + col2W + col3W + 4, rowSpacing + 2, 'F');
                            doc.text('Description', col1X, tableStartY);
                            doc.text('Amount (LKR)', col2X, tableStartY);
                            doc.text(' ', col3X, tableStartY);
                            doc.setFont('helvetica', 'normal');
                            let y = tableStartY + rowSpacing;
                            rows.forEach(row => {
                                doc.text(row.label, col1X, y);
                                doc.text(row.value, col2X, y);
                                y += rowSpacing;
                            });
                            currentY = y + 2;
                        }

                        // Customer Information
                        sectionTitle('Customer Information');
                        addRow('Full Name:', 'fullName');
                        addRow('Mobile Number:', 'mobileNumber');
                        addRow('NIC:', 'nic');
                        addRow('Agreement Number:', 'agn');
                        addRow('Received Officer:', 'officer');
                        addRow('Released Officer:', 'rel_officer');

                        currentY += 2;
                        // Booking Information
                        sectionTitle('Booking Information');
                        addRow('Vehicle:', 'vehicleModel');
                        addRow('Reg Number:', 'vehicleNumber');
                        addRow('From:', 'fromDate');
                        addRow('Arrived Date:', 'toDate');
                        addRow('Extra Days:', 'exDate');
                        addRow('Price Per Day:', 'ppd');
                        addRow('Started Mileage (KM):', 'strat');
                        addRow('Free KM (KM):', 'free');
                        addRow('Ended Mileage (KM):', 'end');
                        addRow('Over Drived KM (KM):', 'over');
                        addRow('Charge Per Extra KM:', 'kmchg');

                        currentY += 2;
                        // Billing Information Table
                        sectionTitle('Billing Information');
                        const billRows = [
                            { label: 'Base Price', value: document.getElementById('basePrice')?.textContent || '0.00' },
                            { label: 'Extra KM Charges', value: document.getElementById('extraKm')?.textContent || '0.00' },
                            { label: 'Extra Hours Charges', value: document.getElementById('extraHours')?.textContent || '0.00' },
                            { label: 'Damage Fee', value: document.getElementById('damageFee')?.textContent || '0.00' },
                            { label: 'Other Additional Charges', value: document.getElementById('afterAdditional')?.textContent || '0.00' },
                            { label: 'Discount (-)', value: document.getElementById('afterDiscount')?.textContent || '0.00' },
                            { label: 'Advanced Paid Amount', value: document.getElementById('paid')?.textContent || '0.00' },
                            { label: 'Final Amount Due (paid)', value: document.getElementById('due')?.textContent || '0.00' },
                            { label: 'Total Price', value: document.getElementById('totalIncome')?.textContent || '0.00' }
                        ];
                        addBillTable(billRows);

                        // Reason for Additional Charges
                        doc.setFont('helvetica', 'italic');
                        doc.setFontSize(10);
                        doc.text('Reason For Additional Charges:', 15, currentY);
                        doc.setFont('helvetica', 'normal');
                        doc.text(document.getElementById('reason')?.textContent || 'N/A', 70, currentY);
                        currentY += rowSpacing + 2;

                        // Additional Information Section
                        // sectionTitle('Additional Information');
                        // addRow('Deposit Refunded:', 'depositRefunded');
                        // addRow('Vehicle Checked:', 'vehicleChecked');
                        // addRow('Due Paid:', 'vehicleChecked'); // If you have a separate id for due_paid, change here

                        // Signature Section - Two signature lines in right bottom corner
                        // We'll use the bottom margin of the page (A4: 297mm, but jsPDF default units are mm, page height is 297)
                        // We'll place two signature lines at the bottom right, one above the other, with labels

                        const pageHeight = doc.internal.pageSize.getHeight();
                        const marginRight = 20;
                        const lineLength = 60;
                        const lineSpacing = 18;

                        // First signature line (e.g., "Customer Signature")
                        const sig1Y = pageHeight - 20;
                        const sigX = doc.internal.pageSize.getWidth() - marginRight - lineLength;

                        doc.setFont('helvetica', 'normal');
                        doc.setFontSize(11);
                        doc.text('Customer Signature:', sigX, sig1Y - 3);
                        // doc.line(sigX, sig1Y, sigX + lineLength, sig1Y);

                        // Second signature line (e.g., "HBS Rental Car")
                        const sig2Y = sig1Y + lineSpacing;
                        doc.text('HBS Rental Car:', sigX, sig2Y - 3);
                        // doc.line(sigX, sig2Y, sigX + lineLength, sig2Y);

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

        const businessData = @json($business);
    </script>



</body>

</html>
