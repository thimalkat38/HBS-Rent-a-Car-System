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
                            <li>
                                <a href="{{ url('vehicle_owners') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">supervisor_account</span>
                                    Vehicle Owner's Managment
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
                                    class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
                                    <span class="material-icons mr-3">history</span>
                                    Booking History
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('postbookings') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
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
                        <span class="text-xl font-normal text-gray-700">ID: {{ $booking->id }}</span>
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
                <div class="min-h-screen bg-gray-100 py-8 px-4">
                    <div class="max-w-5xl mx-auto">
                        <h1 class="text-2xl md:text-3xl font-bold text-center text-gray-800 mb-6 tracking-wide">
                            Booking Details
                        </h1>

                        @if ($booking)
                            <div class="bg-white shadow-lg rounded-xl border border-gray-200 overflow-hidden mb-6">
                                <div class="px-6 py-5 space-y-6">
                                    <!-- Customer Information -->
                                    <section>
                                        <h2
                                            class="text-lg font-semibold text-indigo-600 mb-3 border-b border-gray-200 pb-2">
                                            Customer Information
                                        </h2>
                                        <div
                                            class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-2 text-sm text-gray-800">
                                            <p><span class="font-semibold text-gray-600">Full Name:</span>
                                                <span id="fullName" class="ml-1">{{ $booking->full_name }}</span>
                                            </p>
                                            <p><span class="font-semibold text-gray-600">Mobile Number:</span>
                                                <span id="mobileNumber"
                                                    class="ml-1">{{ $booking->mobile_number }}</span>
                                            </p>

                                            @if ($customer)
                                                <p><span class="font-semibold text-gray-600">NIC:</span>
                                                    <span id="nic" class="ml-1">{{ $customer->nic }}</span>
                                                </p>
                                                <p class="md:col-span-2"><span
                                                        class="font-semibold text-gray-600">Address:</span>
                                                    <span id="address"
                                                        class="ml-1">{{ $customer->address }}</span>
                                                </p>
                                            @else
                                                <p class="text-xs text-gray-500 md:col-span-2 mt-1">
                                                    Customer information not available.
                                                </p>
                                            @endif
                                        </div>
                                    </section>

                                    <!-- Booking Information -->
                                    <section>
                                        <h2
                                            class="text-lg font-semibold text-indigo-600 mb-3 border-b border-gray-200 pb-2">
                                            Booking Information
                                        </h2>
                                        <div
                                            class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-2 text-sm text-gray-800">
                                            <p class="text-red-600 font-semibold"><span>Booking ID:</span>
                                                <span id="id" class="ml-1">{{ $booking->id }}</span>
                                            </p>
                                            <p><span class="font-semibold text-gray-600">Vehicle Number:</span>
                                                <span id="vehicleNumber"
                                                    class="ml-1">{{ $booking->vehicle_number }}</span>
                                            </p>
                                            <p><span class="font-semibold text-gray-600">Vehicle:</span>
                                                <span id="vehicleModel"
                                                    class="ml-1">{{ $booking->vehicle_name }}</span>
                                            </p>
                                            <p><span class="font-semibold text-gray-600">From Date:</span>
                                                <span id="fromDate" class="ml-1">{{ $booking->from_date }}</span>
                                            </p>
                                            <p><span class="font-semibold text-gray-600">From Time:</span>
                                                <span id="from"
                                                    class="ml-1">{{ $booking->booking_time }}</span>
                                            </p>
                                            <p><span class="font-semibold text-gray-600">To Date:</span>
                                                <span id="toDate" class="ml-1">{{ $booking->to_date }}</span>
                                            </p>
                                            <p><span class="font-semibold text-gray-600">To Time:</span>
                                                <span id="to"
                                                    class="ml-1">{{ $booking->arrival_time }}</span>
                                            </p>
                                            <p><span class="font-semibold text-gray-600">Deposit:</span>
                                                <span id="deposit"
                                                    class="ml-1">{{ $booking->deposit ?? 'No Deposit..' }}</span>
                                            </p>
                                            <p><span class="font-semibold text-gray-600">Guarantor:</span>
                                                <span id="grnter"
                                                    class="ml-1">{{ $booking->guarantor ?? 'No Guarantor..' }}</span>
                                            </p>
                                            <p><span class="font-semibold text-gray-600">Released Officer:</span>
                                                <span id="ofiicer" class="ml-1">{{ $booking->officer }}</span>
                                            </p>
                                            <p><span class="font-semibold text-gray-600">1st Commission Officer:</span>
                                                <span id="commissioner"
                                                    class="ml-1">{{ $booking->commission }}</span>
                                            </p>
                                            <p><span class="font-semibold text-gray-600">2nd Commission Officer:</span>
                                                <span id="commissioner2"
                                                    class="ml-1">{{ $booking->commission2 }}</span>
                                            </p>
                                            <p><span class="font-semibold text-gray-600">Driver Name:</span>
                                                <span id="driverName"
                                                    class="ml-1">{{ $booking->driver_name }}</span>
                                            </p>
                                            <p><span class="font-semibold text-gray-600">Location:</span>
                                                <span id="location" class="ml-1">{{ $booking->location }}</span>
                                            </p>
                                            <p><span class="font-semibold text-gray-600">Hand Over Booking:</span>
                                                <span id="handOverBooking" class="ml-1">
                                                    @if ($booking->hand_over_booking == 1)
                                                        Yes
                                                    @elseif ($booking->hand_over_booking == 0)
                                                        No
                                                    @else
                                                        {{ $booking->hand_over_booking }}
                                                    @endif
                                                </span>
                                            </p>
                                            <p><span class="font-semibold text-gray-600">Start KM:</span>
                                                <span id="stratKm" class="ml-1">{{ $booking->start_km }}</span>
                                            </p>
                                        </div>
                                    </section>

                                    <!-- Guarantee Images -->
                                    <section>
                                        <h2
                                            class="text-lg font-semibold text-red-500 mb-3 border-b border-gray-200 pb-2">
                                            Guarantee Images
                                        </h2>
                                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                                            @if (!empty($booking->deposit_img))
                                                @foreach ($booking->deposit_img as $photo)
                                                    <div
                                                        class="overflow-hidden rounded-lg border border-gray-200 bg-gray-50 flex items-center justify-center">
                                                        <img src="{{ asset('storage/' . $photo) }}"
                                                            class="w-full h-28 object-cover" alt="Deposit Image">
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="text-xs text-gray-500 col-span-full">
                                                    No Deposit item Image Available.
                                                </p>
                                            @endif

                                            @if (!empty($booking->grnt_nic))
                                                @foreach ($booking->grnt_nic as $photo)
                                                    <div
                                                        class="overflow-hidden rounded-lg border border-gray-200 bg-gray-50 flex items-center justify-center">
                                                        <img src="{{ asset('storage/' . $photo) }}"
                                                            class="w-full h-28 object-cover"
                                                            alt="Guarantor NIC Image">
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="text-xs text-gray-500 col-span-full">
                                                    No Guarantee Image Available.
                                                </p>
                                            @endif
                                        </div>
                                    </section>

                                    <!-- Bill Information -->
                                    <section>
                                        <h2
                                            class="text-lg font-semibold text-indigo-600 mb-3 border-b border-gray-200 pb-2">
                                            Bill Information
                                        </h2>
                                        <div class="space-y-1 text-sm text-gray-800 max-w-md">
                                            <p class="flex justify-between">
                                                <span class="font-semibold text-gray-600">Based Price:</span>
                                                <span id="basedPrice"
                                                    class="ml-2">{{ $booking->price_per_day * $booking->days }}.00</span>
                                            </p>
                                            <p class="flex justify-between">
                                                <span class="font-semibold text-gray-600">Additional Charges:</span>
                                                <span id="addChg"
                                                    class="ml-2">{{ $booking->additional_chagers }}</span>
                                            </p>
                                            <p class="flex justify-between">
                                                <span class="font-semibold text-gray-600">Discount Price:</span>
                                                <span id="discountPrice"
                                                    class="ml-2">{{ $booking->discount_price }}</span>
                                            </p>
                                            <p class="flex justify-between">
                                                <span class="font-semibold text-gray-600">Paid Amount:</span>
                                                <span id="PaidAmunt" class="ml-2">{{ $booking->payed }}</span>
                                            </p>
                                            <p>
                                                <span class="font-semibold text-gray-600">Payment Note:</span>
                                                <span class="ml-1">{{ $booking->method }}</span>
                                            </p>
                                            <p
                                                class="flex justify-between text-base font-semibold text-gray-800 pt-2 border-t border-dashed border-gray-300 mt-2">
                                                <span>Amount Due:</span>
                                                <span id="due"
                                                    class="ml-2 text-red-600">{{ $booking->price }}</span>
                                            </p>
                                        </div>
                                    </section>

                                    <!-- Photos Section -->
                                    <section>
                                        <h2
                                            class="text-lg font-semibold text-indigo-600 mb-3 border-b border-gray-200 pb-2">
                                            Photos
                                        </h2>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <!-- Vehicle Images when Released -->
                                            <div>
                                                <h3 class="text-sm font-semibold text-gray-700 mb-2">
                                                    Vehicle Images when Released
                                                </h3>
                                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                                                    @if (!empty($booking->driving_photos))
                                                        @foreach ($booking->driving_photos as $photo)
                                                            <div
                                                                class="overflow-hidden rounded-lg border border-gray-200 bg-gray-50 flex items-center justify-center">
                                                                <img src="{{ asset('storage/' . $photo) }}"
                                                                    class="w-full h-28 object-cover"
                                                                    alt="Driving Photo">
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <p class="text-xs text-gray-500 col-span-full">
                                                            No Images before vehicle release.
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- NIC Images -->
                                            <div>
                                                <h3 class="text-sm font-semibold text-gray-700 mb-2">
                                                    NIC Images
                                                </h3>
                                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                                                    @if (!empty($booking->nic_photos))
                                                        @foreach ($booking->nic_photos as $photo)
                                                            <div
                                                                class="overflow-hidden rounded-lg border border-gray-200 bg-gray-50 flex items-center justify-center">
                                                                <img src="{{ asset('storage/' . $photo) }}"
                                                                    class="w-full h-28 object-cover" alt="NIC Photo">
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <p class="text-xs text-gray-500 col-span-full">
                                                            No NIC Images available.
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <!-- Action Buttons -->
                                    <section>
                                        <div
                                            class="flex flex-wrap items-center gap-3 pt-2 border-top border-gray-100 mt-2">
                                            <a href="{{ route('bookings.edit', $booking->id) }}"
                                                class="inline-flex items-center px-4 py-2 text-sm font-semibold rounded-md bg-yellow-400 hover:bg-yellow-500 text-gray-900 shadow-sm transition">
                                                Edit Booking
                                            </a>

                                            <form action="{{ route('bookings.destroy', $booking->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center px-4 py-2 text-sm font-semibold rounded-md bg-red-500 hover:bg-red-600 text-white shadow-sm transition">
                                                    Delete Booking
                                                </button>
                                            </form>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        @else
                            <p class="text-center text-sm text-red-600 mt-6">
                                No booking found.
                            </p>
                        @endif

                        <!-- PDF Generation Buttons -->
                        <div class="flex justify-center mt-4">
                            {{-- <button onclick="generatePDF();" class="inline-flex items-center px-4 py-2 text-sm font-semibold rounded-md bg-blue-500 hover:bg-blue-600 text-white shadow-sm transition mr-2">Download PDF</button> --}}
                            <button onclick="printPDF();"
                                class="inline-flex items-center px-5 py-2.5 text-sm font-semibold rounded-md bg-gray-800 hover:bg-gray-900 text-white shadow-sm transition">
                                Print PDF
                            </button>
                        </div>
                    </div>
                </div>
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
                        logo.src = businessData.logo ? "{{ asset('storage') }}/" + businessData.logo :
                            "{{ asset('images/logo1.png') }}";

                        return new Promise((resolve, reject) => {
                            logo.onload = function() {
                                try {
                                    // Add header background and logo
                                    doc.setFillColor(255, 170, 0); // Orange background
                                    doc.rect(0, 0, 210, 40, 'F'); // Fill rectangle for header
                                    doc.addImage(logo, 'PNG', 10, 13, 45, 22);

                                    // Add header text
                                    doc.setFontSize(10);
                                    doc.setTextColor(0, 0, 0); // Black text
                                    doc.text(businessData.address || 'No Address', 70, 15);
                                    doc.text(`Phone: ${businessData.b_phone || 'N/A'}`, 70, 25);
                                    doc.text(`Email: ${businessData.email || 'N/A'}`, 70, 35);



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
                                    doc.setFont('helvetica', 'bold');
                                    doc.text('Customer Informations', 10, currentY);
                                    doc.setFont('helvetica', 'normal');
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
                                    doc.setFont('helvetica', 'bold');
                                    doc.text('Booking Informations', 10, currentY);
                                    doc.setFont('helvetica', 'normal');
                                    currentY += lineSpacing;
                                    doc.text('Booking ID: ' + (document.getElementById('id')?.textContent || 'N/A'), 10,
                                        currentY);
                                    currentY += lineSpacing;
                                    doc.text('Vehicle Number: ' + (document.getElementById('vehicleNumber')
                                        ?.textContent || 'N/A'), 10, currentY);
                                    currentY += lineSpacing;
                                    doc.text('Vehicle Model: ' + (document.getElementById('vehicleModel')
                                        ?.textContent || 'N/A'), 10, currentY);
                                    currentY += lineSpacing;
                                    doc.text('Start Date: ' + (document.getElementById('fromDate')?.textContent ||
                                            'N/A'), 10,
                                        currentY);
                                    currentY += lineSpacing;
                                    doc.text('Start Time: ' + (document.getElementById('from')?.textContent || 'N/A'),
                                        10,
                                        currentY);
                                    currentY += lineSpacing;
                                    doc.text('End Date: ' + (document.getElementById('toDate')?.textContent || 'N/A'),
                                        10,
                                        currentY);
                                    currentY += lineSpacing;
                                    doc.text('End Time: ' + (document.getElementById('to')?.textContent || 'N/A'), 10,
                                        currentY);
                                    currentY += lineSpacing;
                                    doc.text('Start KM: ' + (document.getElementById('stratKm')?.textContent || 'N/A'),
                                        10,
                                        currentY);
                                    currentY += lineSpacing;
                                    doc.text('Agent: ' + (document.getElementById('commissioner')?.textContent ||
                                            'N/A'),
                                        10,
                                        currentY);
                                    currentY += lineSpacing;
                                    doc.text('Deposit: ' + (document.getElementById('deposit')?.textContent || 'N/A'),
                                        10, currentY);
                                    currentY += lineSpacing + 5;

                                    // Billing Information
                                    doc.setFont('helvetica', 'bold');
                                    doc.text('Billing Informations', 10, currentY);
                                    doc.setFont('helvetica', 'normal');
                                    currentY += lineSpacing;

                                    const labelX = 10; // X position for labels
                                    const valueX = 193; // X position for values (aligned right)

                                    doc.setFont('courier', 'normal'); // Monospaced font for alignment
                                    doc.text('Base Price(LKR):', labelX, currentY);
                                    doc.text((document.getElementById('basedPrice')?.textContent || 'N/A'),
                                        valueX, currentY, {
                                            align: 'right'
                                        });
                                    currentY += lineSpacing;

                                    doc.text('Additional Charges(LKR) (+):', labelX, currentY);
                                    doc.text((document.getElementById('addChg')?.textContent || 'N/A'), valueX,
                                        currentY, {
                                            align: 'right'
                                        });
                                    currentY += lineSpacing;

                                    doc.text('Discount Price(LKR) (-):', labelX, currentY);
                                    doc.text((document.getElementById('discountPrice')?.textContent || 'N/A'),
                                        valueX, currentY, {
                                            align: 'right'
                                        });
                                    currentY += lineSpacing;

                                    doc.text('Paid Amount(LKR) (-):', labelX, currentY);
                                    doc.text((document.getElementById('PaidAmunt')?.textContent || 'N/A'),
                                        valueX, currentY, {
                                            align: 'right'
                                        });
                                    currentY += lineSpacing;

                                    doc.text('Amount Due(LKR):', labelX, currentY);
                                    doc.text((document.getElementById('due')?.textContent || 'N/A'), valueX,
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
                                    doc.text((businessData.b_name || 'Business Name'), hbsX, currentY);
                                    doc.setLineWidth(lineHeight);
                                    doc.line(hbsX, currentY + 15, hbsX + lineWidth, currentY + 15); // Draw a line

                                    // Customer Signature (Right)
                                    const customerX = pageWidth - lineWidth - 20; // Starting X for customer
                                    const customerName = document.getElementById('fullName')?.textContent || 'N/A';

                                    // Save the current font size
                                    const originalFontSize = doc.getFontSize();

                                    // Set a smaller font size for the customer name
                                    doc.setFontSize(10); // Change 10 to your desired font size
                                    doc.text('Customer Signature (' + customerName + '):', customerX, currentY);

                                    // Restore the original font size
                                    doc.setFontSize(originalFontSize);

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
                <script>
                    const businessData = @json($business);
                </script>

            </main>
        </div>
    </div>
</body>

</html>
