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
                            <p><strong>Drived KM:</strong> <span id="drived">{{ $postBooking->drived }}
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
                            <p><strong>Agent</strong> <span id="commission">{{ $postBooking->commission }}</span></p>
                            <p><strong>Agreement Number:</strong> <span id="agn">{{ $postBooking->agn }}</span>
                            </p>
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
        /**
         * Print a well-organized, balanced A4 PDF for booking details.
         */
        async function printPDF() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF({
                orientation: "portrait",
                unit: "mm",
                format: "a4"
            });

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

        /**
         * Generate the PDF content, organized in two columns for compactness.
         */
        async function generatePDFContent(doc) {
            const logo = new Image();
            logo.src = businessData.logo ? "{{ asset('storage') }}/" + businessData.logo :
                "{{ asset('images/logo1.png') }}";

            return new Promise((resolve, reject) => {
                logo.onload = function() {
                    try {
                        // --- Layout Constants ---
                        const pageWidth = 210,
                            pageHeight = 297;
                        const margin = 12;
                        const colGap = 10;
                        const colWidth = (pageWidth - margin * 2 - colGap) / 2;
                        let y = margin + 30; // after header
                        const rowH = 7;
                        const sectionH = 9;
                        const labelFont = {
                            size: 10,
                            style: 'normal'
                        };
                        const valueFont = {
                            size: 10,
                            style: 'bold'
                        };

                        // --- Header ---
                        doc.setFillColor(255, 170, 0);
                        doc.rect(0, 0, pageWidth, 28, 'F');
                        doc.addImage(logo, 'PNG', margin, 6, 22, 16);

                        doc.setFont('helvetica', 'bold');
                        doc.setFontSize(15);
                        doc.setTextColor(0, 0, 0);
                        doc.text(businessData.b_name || 'Business Name', margin + 28, 13);

                        doc.setFont('helvetica', 'normal');
                        doc.setFontSize(9);
                        doc.text(businessData.address || 'No Address', margin + 28, 18);
                        doc.text(`Phone: ${businessData.b_phone || 'N/A'}`, margin + 28, 22);
                        doc.text(`Email: ${businessData.email || 'N/A'}`, margin + 28, 26);

                        doc.setDrawColor(180, 180, 180);
                        doc.line(margin, 30, pageWidth - margin, 30);

                        // --- Section Helper ---
                        function sectionTitle(title, yPos) {
                            doc.setFont('helvetica', 'bold');
                            doc.setFontSize(11);
                            doc.setTextColor(34, 34, 34);
                            doc.text(title, margin, yPos);
                            doc.setFont('helvetica', 'normal');
                            doc.setFontSize(10);
                            doc.setTextColor(0, 0, 0);
                        }

                        // --- Two-Column Row Helper ---
                        function addRow2Col(label1, id1, label2, id2, yPos) {
                            doc.setFont('helvetica', labelFont.style);
                            doc.setFontSize(labelFont.size);
                            doc.text(label1, margin, yPos);
                            doc.setFont('helvetica', valueFont.style);
                            doc.text(document.getElementById(id1)?.textContent || 'N/A', margin + 38, yPos);

                            doc.setFont('helvetica', labelFont.style);
                            doc.text(label2, margin + colWidth + colGap, yPos);
                            doc.setFont('helvetica', valueFont.style);
                            doc.text(document.getElementById(id2)?.textContent || 'N/A', margin + colWidth +
                                colGap + 38, yPos);
                        }

                        // --- Single-Column Row Helper ---
                        function addRow(label, id, yPos) {
                            doc.setFont('helvetica', labelFont.style);
                            doc.setFontSize(labelFont.size);
                            doc.text(label, margin, yPos);
                            doc.setFont('helvetica', valueFont.style);
                            doc.text(document.getElementById(id)?.textContent || 'N/A', margin + 38, yPos);
                        }

                        // --- Customer & Booking Info (2 columns) ---
                        sectionTitle('Customer & Booking Information', y);
                        y += sectionH;

                        addRow2Col('Full Name:', 'fullName', 'Mobile Number:', 'mobileNumber', y + 1);
                        y += rowH;
                        addRow2Col('NIC:', 'nic', 'Agreement No:', 'agn', y + 1);
                        y += rowH;
                        addRow2Col('Received Officer:', 'officer', 'Released Officer:', 'rel_officer', y +
                            1);
                        y += rowH;
                        addRow2Col('Vehicle:', 'vehicleModel', 'Reg Number:', 'vehicleNumber', y + 1);
                        y += rowH;
                        addRow2Col('From:', 'fromDate', 'Arrived Date:', 'toDate', y + 1);
                        y += rowH;
                        addRow2Col('Extra Days:', 'exDate', 'Price Per Day:', 'ppd', y + 1);
                        y += rowH;
                        addRow2Col('Started Mileage (KM):', 'strat', 'Free KM (KM):', 'free', y + 1);
                        y += rowH;
                        addRow2Col('Ended Mileage (KM):', 'end', 'Drived KM (KM):', 'drived', y + 1);
                        y += rowH;
                        addRow2Col('Over Drived KM (KM):', 'over', 'Charge Per Extra KM:', 'kmchg', y + 1);
                        y += rowH + 8;

                        // --- Billing Table (single column, compact) ---
                        sectionTitle('Billing Information', y + 4);
                        y += sectionH + 4;

                        // Table header
                        doc.setFont('helvetica', 'bold');
                        doc.setFillColor(240, 240, 240);
                        doc.rect(margin, y - 5, pageWidth - margin * 2, rowH + 2, 'F');
                        doc.text('Description', margin + 2, y);
                        doc.text('Amount (LKR)', margin + colWidth + 20, y);
                        doc.setFont('helvetica', 'normal');
                        y += rowH;

                        // Table rows
                        const billRows = [{
                                label: 'Base Price',
                                id: 'basePrice'
                            },
                            {
                                label: 'Extra KM Charges',
                                id: 'extraKm'
                            },
                            {
                                label: 'Extra Hours Charges',
                                id: 'extraHours'
                            },
                            {
                                label: 'Damage Fee',
                                id: 'damageFee'
                            },
                            {
                                label: 'Other Additional Charges',
                                id: 'afterAdditional'
                            },
                            {
                                label: 'Discount (-)',
                                id: 'afterDiscount'
                            },
                            {
                                label: 'Advanced Paid Amount',
                                id: 'paid'
                            },
                            {
                                label: 'Final Amount Due (paid)',
                                id: 'due'
                            },
                            {
                                label: 'Total Price',
                                id: 'totalIncome'
                            }
                        ];
                        billRows.forEach(row => {
                            doc.text(row.label, margin + 2, y + 2);
                            doc.text(document.getElementById(row.id)?.textContent || '0.00',
                                margin + colWidth + 20, y + 2);
                            y += rowH;
                        });
                        y += 2;

                        // --- Reason for Additional Charges ---
                        doc.setFont('helvetica', 'italic');
                        doc.setFontSize(10);
                        doc.text('Reason For Additional Charges:', margin, y + 2);
                        doc.setFont('helvetica', 'normal');
                        doc.text(document.getElementById('reason')?.textContent || 'N/A', margin + 60, y + 2);
                        y += rowH;
                        doc.setFont('helvetica', 'italic');
                        doc.setFontSize(10);
                        doc.text('Agent:', margin, y + 2);
                        doc.setFont('helvetica', 'normal');
                        doc.text(document.getElementById('commission')?.textContent || 'N/A', margin + 60, y + 2);
                        y += rowH + 2;

                        // // --- Additional Information (2 columns) ---
                        // sectionTitle('Additional Information', y);
                        // y += sectionH;
                        // addRow2Col('Deposit Refunded:', 'depositRefunded', 'Vehicle Checked:', 'vehicleChecked', y);
                        // y += rowH;
                        // addRow('Due Paid:', 'vehicleChecked', y);
                        // y += rowH;

                        // --- Signature Section (bottom right) ---
                        // Signatures in parallel (side by side)
                        const sigY = pageHeight - 30;
                        const sigX1 = margin + 10; // Left side for Customer
                        const sigX2 = pageWidth / 2 + 10; // Right side for HBS Rental Car

                        doc.setFont('helvetica', 'normal');
                        doc.setFontSize(11);

                        // Customer Signature (left)
                        doc.text('Customer Signature:', sigX1, sigY);
                        doc.line(sigX1 + 50, sigY + 1, sigX1 + 90, sigY + 1);

                        // HBS Rental Car Signature (right)
                        doc.text((businessData.b_name || 'Business Name') + ':', sigX2, sigY);
                        doc.line(sigX2 + 40, sigY + 1, sigX2 + 80, sigY + 1);

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
