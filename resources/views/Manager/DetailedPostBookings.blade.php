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
                <h1 class="text-center mb-3">Post Booking Details</h1>
    
                @if($postBooking)
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-primary mb-3">Customer Information</h5>
                        <p><strong>Full Name:</strong> <span id="fullName">{{ $postBooking->full_name }}</span></p>
                        <p><strong>NIC:</strong> <span id="nic">{{ $postBooking->nic }}</span></p>
                        <p><strong>Mobile Number:</strong> <span id="mobileNumber">{{ $postBooking->mobile_number }}</span></p>
                        
                        <h5 class="card-title text-primary mt-3 mb-2">Booking Information</h5>
                        {{-- <p style="color: red"><strong>postBooking ID:</strong> <span id="id">{{ $postBooking->id }}</span></p> --}}
                        {{-- <p><strong>Vehicle Number:</strong> <span id="vehicleNumber">{{ $postBooking->vehicle_number }}</span></p> --}}
                        <p><strong>Vehicle:</strong> <span id="vehicleModel">{{ $postBooking->vehicle }} [{{ $postBooking->vehicle_number }}]</span></p>
                        <p><strong>From Date:</strong> <span id="fromDate">{{ $postBooking->from_date }}</span></p>
                        <p><strong>To Date:</strong> <span id="toDate">{{ $postBooking->to_date }}</span></p>
    
                        <h5 class="card-title text-primary mt-3 mb-2">Payment Details</h5>
                        <p><strong>Base Price:</strong> <span id="basePrice">LKR {{ number_format($postBooking->base_price, 2) }}</span></p>
                        <p><strong>Extra KM Charges:</strong> <span id="extraKm">LKR {{ number_format($postBooking->extra_km, 2) }}</span></p>
                        <p><strong>Extra Hours Charges:</strong> <span id="extraHours">LKR {{ number_format($postBooking->extra_hours, 2) }}</span></p>
                        <p><strong>Damage Fee:</strong> <span id="damageFee">LKR {{ number_format($postBooking->damage_fee, 2) }}</span></p>
                        <p><strong>After Additional Charges:</strong> <span id="afterAdditional">LKR {{ number_format($postBooking->after_additional, 2) }}</span></p>
                        <p><strong>Discount Applied:</strong> <span id="afterDiscount">LKR {{ number_format($postBooking->after_discount, 2) }}</span></p>
                        <p><strong>Advanced Paid Amount:</strong> <span id="paid">LKR {{ number_format($postBooking->paid, 2) }}</span></p>
                        <p><strong>Final Amount Due(paid):</strong> <span id="due">LKR {{ number_format($postBooking->due, 2) }}</span></p>
                        <p><strong>Reason for Additional Charges:</strong> <span id="reason">{{ $postBooking->reason }}</span></p>
    
                        <h5 class="card-title text-primary mt-3 mb-2">Additional Information</h5>
                        <p><strong>Deposit Refunded:</strong> <span id="depositRefunded">{{ $postBooking->deposit_refunded ? 'Yes' : 'No' }}</span></p>
                        <p><strong>Vehicle Checked:</strong> <span id="vehicleChecked">{{ $postBooking->vehicle_checked ? 'Yes' : 'No' }}</span></p>
                        <p><strong>Due Paid:</strong> <span id="vehicleChecked">{{ $postBooking->due_paid ? 'Yes' : 'No' }}</span></p>
                        <p><strong>Officer:</strong> <span id="officer">{{ $postBooking->officer }}</span></p>
                        <p><strong>Total Income:</strong> <span id="totalIncome">LKR {{ number_format($postBooking->total_income, 2) }}</span></p>

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
                <button onclick="generatePDF();" class="btn btn-info">Download PDF</button>
                <button onclick="printPDF();" class="btn btn-secondary">Print PDF</button>
            </div>
            
        </div>
    </div>

    <!-- Custom Script to Generate PDF -->
    <script>
        async function generatePDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
    
            try {
                // Add header with background and logo
                const logo = new Image();
                logo.src = '{{ asset("images/logo.png") }}';
    
                logo.onload = function () {
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
                    doc.text("Bill", doc.internal.pageSize.getWidth() / 2, currentY, { align: "center" });
                    currentY += 20; // Add space after the title
    

                // Customer Information
                doc.setFontSize(12);
                doc.setFont('helvetica', 'normal');
                doc.text('Customer Information:', 10, currentY);
                currentY += lineSpacing;
                doc.text('Full Name: ' + (document.getElementById('fullName')?.textContent || 'N/A'), 10, currentY);
                currentY += lineSpacing;
                doc.text('Mobile Number: ' + (document.getElementById('mobileNumber')?.textContent || 'N/A'), 10, currentY);
                currentY += lineSpacing;
                doc.text('NIC: ' + (document.getElementById('nic')?.textContent || 'N/A'), 10, currentY);
                currentY += lineSpacing;

                // Booking Information
                doc.text('Booking Information:', 10, currentY);
                currentY += lineSpacing;
                doc.text('Vehicle: ' + (document.getElementById('vehicleModel')?.textContent || 'N/A'), 10, currentY);
                currentY += lineSpacing;
                doc.text('From: ' + (document.getElementById('fromDate')?.textContent || 'N/A'), 10, currentY);
                currentY += lineSpacing;
                doc.text('To: ' + (document.getElementById('toDate')?.textContent || 'N/A'), 10, currentY);
                currentY += lineSpacing;

                // Billing Information
                doc.text('Billing Information:', 10, currentY);
                currentY += lineSpacing;

                const labelX = 10; // X position for labels
                const valueX = 200; // X position for values (aligned right)

                doc.setFont('courier', 'normal'); // Monospaced font for alignment
                doc.text('Base Price:', labelX, currentY);
                doc.text('LKR ' + (document.getElementById('basePrice')?.textContent || 'N/A'), valueX, currentY, { align: 'right' });
                currentY += lineSpacing;

                doc.text('Additional Charges For Extra KM (+):', labelX, currentY);
                doc.text('LKR ' + (document.getElementById('extrakm')?.textContent || '0.00'), valueX, currentY, { align: 'right' });
                currentY += lineSpacing;

                doc.text('Additional Charges For Extra Hours (+):', labelX, currentY);
                doc.text('LKR ' + (document.getElementById('extraHours')?.textContent || 'N/A'), valueX, currentY, { align: 'right' });
                currentY += lineSpacing;

                doc.text('Damage Fee(+):', labelX, currentY);
                doc.text('LKR ' + (document.getElementById('damageFee')?.textContent || 'N/A'), valueX, currentY, { align: 'right' });
                currentY += lineSpacing;

                doc.text('Other Additional Charges (+):', labelX, currentY);
                doc.text('LKR ' + (document.getElementById('afterAdditional')?.textContent || 'N/A'), valueX, currentY, { align: 'right' });
                currentY += lineSpacing;

                doc.text('Discount Price (-):', labelX, currentY);
                doc.text('LKR ' + (document.getElementById('afterDiscount')?.textContent || 'N/A'), valueX, currentY, { align: 'right' });
                currentY += lineSpacing;

                doc.text('Paid Amount (-):', labelX, currentY);
                doc.text('LKR ' + (document.getElementById('paid')?.textContent || 'N/A'), valueX, currentY, { align: 'right' });
                currentY += lineSpacing;

                doc.text('Amount Due:', labelX, currentY);
                doc.text('LKR ' + (document.getElementById('due')?.textContent || 'N/A'), valueX, currentY, { align: 'right' });
                currentY += lineSpacing;

                doc.text('Reason For Other Additional Charges: ' + (document.getElementById('reason')?.textContent || 'N/A'), 10, currentY);
    
                    // Save the PDF
                    doc.save('Booking_Details.pdf');
                };
    
                logo.onerror = function () {
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
    const { jsPDF } = window.jspdf;
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
    logo.src = '{{ asset("images/logo.png") }}';

    return new Promise((resolve, reject) => {
        logo.onload = function () {
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
                doc.text('Bill', 105, 50, { align: 'center' });

                let currentY = 60; // Start Y position for content
                const lineSpacing = 8; // Line spacing for sections

                // Customer Information
                doc.setFontSize(12);
                doc.setFont('helvetica', 'normal');
                doc.text('Customer Information:', 10, currentY);
                currentY += lineSpacing;
                doc.text('Full Name: ' + (document.getElementById('fullName')?.textContent || 'N/A'), 10, currentY);
                currentY += lineSpacing;
                doc.text('Mobile Number: ' + (document.getElementById('mobileNumber')?.textContent || 'N/A'), 10, currentY);
                currentY += lineSpacing;
                doc.text('NIC: ' + (document.getElementById('nic')?.textContent || 'N/A'), 10, currentY);
                currentY += lineSpacing;

                // Booking Information
                doc.text('Booking Information:', 10, currentY);
                currentY += lineSpacing;
                doc.text('Vehicle: ' + (document.getElementById('vehicleModel')?.textContent || 'N/A'), 10, currentY);
                currentY += lineSpacing;
                doc.text('From: ' + (document.getElementById('fromDate')?.textContent || 'N/A'), 10, currentY);
                currentY += lineSpacing;
                doc.text('To: ' + (document.getElementById('toDate')?.textContent || 'N/A'), 10, currentY);
                currentY += lineSpacing;

                // Billing Information
                doc.text('Billing Information:', 10, currentY);
                currentY += lineSpacing;

                const labelX = 10; // X position for labels
                const valueX = 200; // X position for values (aligned right)

                doc.setFont('courier', 'normal'); // Monospaced font for alignment
                doc.text('Base Price:', labelX, currentY);
                doc.text('LKR ' + (document.getElementById('basePrice')?.textContent || 'N/A'), valueX, currentY, { align: 'right' });
                currentY += lineSpacing;

                doc.text('Additional Charges For Extra KM (+):', labelX, currentY);
                doc.text('LKR ' + (document.getElementById('extrakm')?.textContent || '0.00'), valueX, currentY, { align: 'right' });
                currentY += lineSpacing;

                doc.text('Additional Charges For Extra Hours (+):', labelX, currentY);
                doc.text('LKR ' + (document.getElementById('extraHours')?.textContent || 'N/A'), valueX, currentY, { align: 'right' });
                currentY += lineSpacing;

                doc.text('Damage Fee(+):', labelX, currentY);
                doc.text('LKR ' + (document.getElementById('damageFee')?.textContent || 'N/A'), valueX, currentY, { align: 'right' });
                currentY += lineSpacing;

                doc.text('Other Additional Charges (+):', labelX, currentY);
                doc.text('LKR ' + (document.getElementById('afterAdditional')?.textContent || 'N/A'), valueX, currentY, { align: 'right' });
                currentY += lineSpacing;

                doc.text('Discount Price (-):', labelX, currentY);
                doc.text('LKR ' + (document.getElementById('afterDiscount')?.textContent || 'N/A'), valueX, currentY, { align: 'right' });
                currentY += lineSpacing;

                doc.text('Paid Amount (-):', labelX, currentY);
                doc.text('LKR ' + (document.getElementById('paid')?.textContent || 'N/A'), valueX, currentY, { align: 'right' });
                currentY += lineSpacing;

                doc.text('Amount Due:', labelX, currentY);
                doc.text('LKR ' + (document.getElementById('due')?.textContent || 'N/A'), valueX, currentY, { align: 'right' });
                currentY += lineSpacing;

                doc.text('Reason For Other Additional Charges: ' + (document.getElementById('reason')?.textContent || 'N/A'), 10, currentY);
                resolve();
            } catch (error) {
                reject(error);
            }
        };

        logo.onerror = function () {
            reject('Logo image failed to load.');
        };
    });
}


    </script>
    
</body>
</html>
