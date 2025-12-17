<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Car Rental Management System</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- jsPDF core -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <!-- jsPDF AutoPrint plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autoprint/2.0.0/jspdf.plugin.autoprint.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="bg-white min-h-screen">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-slate-900 flex flex-col min-h-screen">
            <div class="flex items-center justify-center h-20">
                <span class="text-white text-4xl font-semibold font-poppins">R</span>
                <span class="text-teal-500 text-4xl font-semibold font-poppins">E</span>
                <span class="text-white text-4xl font-semibold font-poppins">NT CAR</span>
            </div>
            <nav class="flex-1 mt-6">
                <ul class="space-y-1">
                    <li>
                        <a href="{{ url('manager/dashboard') }}"
                            class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                            <span class="material-icons mr-3">dashboard</span>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center px-6 py-3 text-white font-semibold rounded-l-full cursor-default">
                            <span class="material-icons mr-3">directions_car</span>
                            Vehicles
                        </div>
                        <ul class="ml-8 space-y-1">
                            <li>
                                <a href="{{ url('addvehicle') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">add_circle_outline</span>
                                    Add Vehicle
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('allvehicles') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">list_alt</span>
                                    All Vehicles
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="flex items-center px-6 py-3 text-white font-semibold rounded-l-full cursor-default">
                            <span class="material-icons mr-3">assignment</span>
                            Bookings
                        </div>
                        <ul class="ml-8 space-y-1">
                            <li>
                                <a href="{{ url('addbooking') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">add_circle_outline</span>
                                    Book Hire
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('bookings') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">history</span>
                                    Booking History
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('postbookings') }}"
                                    class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
                                    <span class="material-icons mr-3">check_circle_outline</span>
                                    Completed Businesses
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="flex items-center px-6 py-3 text-white font-semibold rounded-l-full cursor-default">
                            <span class="material-icons mr-3">people</span>
                            Customers
                        </div>
                        <ul class="ml-8 space-y-1">
                            <li>
                                <a href="{{ route('customers.create') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">person_add</span>
                                    Add Customer
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('customers.index') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">list</span>
                                    All Customers
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="flex items-center px-6 py-3 text-white font-semibold rounded-l-full cursor-default">
                            <span class="material-icons mr-3">badge</span>
                            HRM
                        </div>
                        <ul class="ml-8 space-y-1">
                            <li>
                                <a href="{{ url('employees') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">people</span>
                                    Staff Management
                                </a>
                            </li>
                            {{-- <li>
                                <a href="{{ url('employees') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">people</span>
                                    Leave Management
                                </a>
                            </li> --}}
                            <li>
                                <a href="{{ url('payrolls') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">people</span>
                                    Payroll Management
                                </a>
                            </li>
                            {{-- <li>
                                <a href="{{ url('employees') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">people</span>
                                    Staff Attendance
                                </a>
                            </li> --}}

                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('crms') }}"
                            class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                            <span class="material-icons mr-3">support_agent</span>
                            CRM
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center px-6 py-3 text-white font-semibold rounded-l-full cursor-default">
                            <span class="material-icons mr-3">inventory_2</span>
                            <span data-translate="Inventory">Inventory</span>
                        </div>
                        <ul class="ml-8 space-y-1">
                            <li>
                                <a href="{{ route('inventory.index') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">list</span>
                                    <span data-translate="All Items">All Items</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('inventory.create') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">add_circle_outline</span>
                                    <span data-translate="Add Item">Add Item</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('inventory.grn') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">input</span>
                                    <span data-translate="Add Stock">Add Stock</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('inventory.issue') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">output</span>
                                    <span data-translate="Issue Items">Issue Items</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('inventory.issued-items') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">assignment_turned_in</span>
                                    <span data-translate="Issued Items">Issued Items</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="flex items-center px-6 py-3 text-white font-semibold rounded-l-full cursor-default">
                            <span class="material-icons mr-3">account_balance_wallet</span>
                            Finance
                        </div>
                        <ul class="ml-8 space-y-1">
                            <li>
                                <a href="{{ url('expenses') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">receipt_long</span>
                                    Expenses
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('profit-loss-report') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">bar_chart</span>
                                    P/L Report
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('commission') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">bar_chart</span>
                                    Commission
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>
        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-h-screen bg-gray-50">
            <!-- Header -->
            <header class="w-full h-20 bg-white border-b border-gray-200 flex items-center px-8">
                <div class="w-full flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <span class="material-icons text-gray-400">assignment</span>
                        <span class="text-xl font-semibold font-poppins text-gray-900">Bookings</span>
                        <span class="material-icons text-gray-400">chevron_right</span>
                        <span class="text-xl font-normal text-gray-700">Completed Bookings</span>
                    </div>
                    <div class="flex items-center space-x-6">
                        <div class="flex items-center space-x-2">
                            <button id="lang-en"
                                class="text-lg font-poppins underline text-gray-700 focus:outline-none"
                                onclick="setLanguage('en')">EN</button>
                            <button id="lang-si" class="text-lg font-poppins text-gray-400 focus:outline-none"
                                onclick="setLanguage('si')">SIN</button>
                        </div>
                        <script>
                            // ... (translation script unchanged)
                            const translations = {
                                // ... (translation dictionary unchanged)
                                en: {
                                    // ... (keys)
                                },
                                si: {
                                    // ... (keys)
                                }
                            };

                            function translatePage(lang) {
                                Object.keys(translations.en).forEach(function(key) {
                                    const enText = translations.en[key];
                                    const siText = translations.si[key];

                                    document.querySelectorAll('body *:not(script):not(style)').forEach(function(el) {
                                        if (el.childNodes.length === 1 && el.childNodes[0].nodeType === 3) {
                                            let current = el.textContent.trim();
                                            if (current === enText || current === siText) {
                                                el.textContent = translations[lang][key];
                                            }
                                        }
                                    });
                                });
                            }

                            function setLanguage(lang) {
                                document.getElementById('lang-en').classList.toggle('underline', lang === 'en');
                                document.getElementById('lang-en').classList.toggle('opacity-50', lang !== 'en');
                                document.getElementById('lang-si').classList.toggle('underline', lang === 'si');
                                document.getElementById('lang-si').classList.toggle('opacity-50', lang !== 'si');
                                translatePage(lang);
                                localStorage.setItem('lang', lang);
                            }

                            document.addEventListener('DOMContentLoaded', function() {
                                const lang = localStorage.getItem('lang') || 'en';
                                setLanguage(lang);
                            });
                        </script>
                        <div class="w-px h-8 bg-gray-200"></div>
                        <div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('LogOut') }}
                                </x-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                </div>
            </header>
            <main class="flex-1 w-full px-0 py-0 flex flex-col h-[calc(100vh-5rem)]">
                <div class="max-w-3xl mx-auto my-6 p-6 rounded-lg bg-white shadow-lg">
                    <h1 class="text-2xl md:text-3xl font-extrabold text-center mb-5 text-orange-600 tracking-tight">Post
                        Booking Details</h1>

                    @if ($postBooking)
                        <div class="bg-gray-50 rounded-lg shadow p-4 space-y-8">

                            <div>
                                <h2 class="text-lg font-semibold text-blue-700 mb-2">Customer Information</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-2">
                                    <div><strong>Full Name:</strong> <span
                                            id="fullName">{{ $postBooking->full_name }}</span></div>
                                    <div><strong>NIC:</strong> <span id="nic">{{ $postBooking->nic }}</span>
                                    </div>
                                    <div><strong>Mobile Number:</strong> <span
                                            id="mobileNumber">{{ $postBooking->mobile_number }}</span></div>
                                </div>
                            </div>

                            <div>
                                <h2 class="text-lg font-semibold text-blue-700 mb-2 mt-3">Booking Information</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-2">
                                    <div><strong>Vehicle:</strong> <span
                                            id="vehicleModel">{{ $postBooking->vehicle }}</span></div>
                                    <div><strong>Register Number:</strong> <span
                                            id="vehicleNumber">{{ $postBooking->vehicle_number }}</span></div>
                                    <div><strong>From Date:</strong> <span
                                            id="fromDate">{{ $postBooking->from_date }}</span></div>
                                    <div><strong>Arrived Date:</strong> <span
                                            id="toDate">{{ $postBooking->ar_date }}</span></div>
                                    <div><strong>Extra Days:</strong> <span
                                            id="exDate">{{ $postBooking->ex_date }}</span></div>
                                    <div><strong>Price Per Day:</strong> <span
                                            id="ppd">{{ $postBooking->price_per_day }}</span></div>
                                    <div><strong>Started Mileage:</strong> <span
                                            id="strat">{{ $postBooking->start_km }}</span></div>
                                    <div><strong>Free KM:</strong> <span
                                            id="free">{{ $postBooking->free_km }}</span></div>
                                    <div><strong>Ended Mileage:</strong> <span
                                            id="end">{{ $postBooking->end_km }}</span></div>
                                    <div><strong>Drived KM:</strong> <span
                                            id="drived">{{ $postBooking->drived }}</span></div>
                                    <div><strong>Over Drived KM:</strong> <span
                                            id="over">{{ $postBooking->over }}</span></div>
                                    <div><strong>Extra 1KM Charges:</strong> <span
                                            id="kmchg">{{ $postBooking->extra_km_chg }}</span></div>
                                </div>
                            </div>

                            <div>
                                <h2 class="text-lg font-semibold text-blue-700 mb-2 mt-3">Payment Details</h2>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full text-sm text-left">
                                        <tbody>
                                            <tr class="border-b">
                                                <td class="py-2 font-semibold">Base Price (LKR):</td>
                                                <td class="py-2" id="basePrice">{{ $postBooking->base_price }}</td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="py-2 font-semibold">Extra KM Charges (LKR):</td>
                                                <td class="py-2" id="extraKm">{{ $postBooking->extra_km }}</td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="py-2 font-semibold">Extra Hours Charges (LKR):</td>
                                                <td class="py-2" id="extraHours">{{ $postBooking->extra_hours }}
                                                </td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="py-2 font-semibold">Damage Fee (LKR):</td>
                                                <td class="py-2" id="damageFee">{{ $postBooking->damage_fee }}</td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="py-2 font-semibold">After Additional Charges (LKR):</td>
                                                <td class="py-2" id="afterAdditional">
                                                    {{ $postBooking->after_additional }}</td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="py-2 font-semibold">Discount Applied (LKR):</td>
                                                <td class="py-2" id="afterDiscount">
                                                    {{ $postBooking->after_discount }}</td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="py-2 font-semibold">Advanced Paid Amount (LKR):</td>
                                                <td class="py-2" id="paid">{{ $postBooking->paid }}</td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="py-2 font-semibold">Final Amount Due (paid) (LKR):</td>
                                                <td class="py-2" id="due">{{ $postBooking->due }}</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 font-semibold">Total (LKR):</td>
                                                <td class="py-2" id="totalIncome">{{ $postBooking->total_income }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 font-semibold">Reason for Additional Charges:</td>
                                                <td class="py-2" id="reason">{{ $postBooking->reason }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div>
                                <h2 class="text-lg font-semibold text-blue-700 mb-2 mt-3">Additional Information</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-2">
                                    <div><strong>Deposit Refunded:</strong> <span
                                            id="depositRefunded">{{ $postBooking->deposit_refunded ? 'Yes' : 'No' }}</span>
                                    </div>
                                    <div><strong>Vehicle Checked:</strong> <span
                                            id="vehicleChecked">{{ $postBooking->vehicle_checked ? 'Yes' : 'No' }}</span>
                                    </div>
                                    <div><strong>Due Paid:</strong> <span
                                            id="vehicleChecked">{{ $postBooking->due_paid ? 'Yes' : 'No' }}</span>
                                    </div>
                                    <div><strong>Received Officer:</strong> <span
                                            id="officer">{{ $postBooking->officer }}</span></div>
                                    <div><strong>Released Officer:</strong> <span
                                            id="rel_officer">{{ $postBooking->rel_officer }}</span></div>
                                    <div><strong>1st Commission Officer:</strong> <span
                                            id="commission">{{ $postBooking->commission ?: 'No 1st Commission Officer Assign' }}</span>
                                    </div>
                                    <div><strong>2nd Commission Officer:</strong> <span
                                            id="commission2">{{ $postBooking->commission2 ?: 'No 1st Commission Officer Assign' }}</span>
                                    </div>
                                    <div>
                                        <strong>Hand Over Booking:</strong>
                                        <span id="hod">
                                            @if (is_bool($postBooking->hand_over_booking))
                                                {{ $postBooking->hand_over_booking ? 'Yes' : 'No' }}
                                            @elseif(in_array($postBooking->hand_over_booking, [1, '1', 'true', true]))
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </span>
                                    </div>
                                    <div><strong>Driver's Name:</strong> <span
                                            id="driver">{{ $postBooking->driver_name ?: 'No Driver Assign' }}</span>
                                    </div>
                                    <div><strong>Location:</strong> <span
                                            id="location">{{ $postBooking->location ?: 'Location Not Assign' }}</span>
                                    </div>
                                    <div><strong>Agreement Number:</strong> <span
                                            id="agn">{{ $postBooking->agn }}</span></div>
                                </div>
                            </div>
                        </div>
                    @else
                        <p class="text-center text-red-500 font-semibold mt-6">No postBooking found.</p>
                    @endif

                    <!-- PDF Generation Buttons -->
                    <div class="flex flex-col sm:flex-row justify-center gap-3 mt-8">
                        <button onclick="printPDF();"
                            class="inline-block px-5 py-2 rounded-lg bg-indigo-600 text-white font-semibold shadow hover:bg-indigo-700 transition">Print
                            PDF</button>
                        <a href="{{ route('bookings.index') }}"
                            class="inline-block px-5 py-2 rounded-lg bg-gray-700 text-white font-semibold shadow hover:bg-gray-800 transition">Back</a>
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
                                    y += rowH;
                                    addRow2Col('Driver Name:', 'driver', 'Location:', 'location', y + 1);
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
                                    doc.text(document.getElementById('reason')?.textContent || 'N/A', margin + 60, y +
                                        2);
                                    y += rowH;
                                    doc.setFont('helvetica', 'italic');
                                    doc.setFontSize(10);
                                    doc.text('Agent:', margin, y + 2);
                                    doc.setFont('helvetica', 'normal');
                                    doc.text(document.getElementById('commission')?.textContent || 'N/A', margin + 60,
                                        y + 2);
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

            </main>
        </div>
    </div>
</body>

</html>
