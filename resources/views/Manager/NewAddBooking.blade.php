<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Car Rental Management System</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<div class="min-h-screen bg-white flex">
    <!-- Sidebar -->
    <!-- Google Material Icons CDN for sidebar icons -->


    <aside class="w-64 bg-slate-900 flex flex-col">
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
                    <div class="flex items-center px-6 py-3  text-white font-semibold rounded-l-full cursor-default">
                        <span class="material-icons mr-3">assignment</span>
                        Bookings
                    </div>
                    <ul class="ml-8 space-y-1">
                        <li>
                            <a href="{{ url('addbooking') }}"
                                class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
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

    <div class="flex-1 flex flex-col min-h-screen">
        <!-- Header -->
        <header class="w-full bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <span class="material-icons text-gray-400">assignment</span>
                <span class="text-xl font-semibold text-gray-900">Bookings</span>
                <span class="material-icons text-gray-400">chevron_right</span>
                <span class="text-xl font-normal text-gray-700">Book Hire</span>
            </div>
            <div class="flex items-center gap-8">
                <div class="flex gap-2">
                    <button type="button" id="lang-en"
                        class="text-lg font-normal text-neutral-700 transition focus:outline-none underline"
                        onclick="setLanguage('en')">EN</button>
                    <button type="button" id="lang-si"
                        class="text-lg font-normal text-neutral-700 opacity-50 transition focus:outline-none"
                        onclick="setLanguage('si')">SIN</button>
                    <script>
                        // Dictionary for all translatable text on the page
                        const translations = {
                            en: {
                                'Bookings': 'Bookings',
                                'Book Hire': 'Book Hire',
                                'Booking History': 'Booking History',
                                'Completed Businesses': 'Completed Businesses',
                                'Vehicles': 'Vehicles',
                                'Customers': 'Customers',
                                'HRM': 'HRM',
                                'CRM': 'CRM',
                                'Inventory': 'Inventory',
                                'Finance': 'Finance',
                                'Logout': 'Logout',
                                'Customer Information': 'Customer Information',
                                'Full Name': 'Full Name',
                                'NIC': 'NIC',
                                'Contact No': 'Contact No',
                                '+ Add Customer': '+ Add Customer',
                                'Date & Time Details': 'Date & Time Details',
                                'Starting Date': 'Starting Date',
                                'Starting Time': 'Starting Time',
                                'End Date': 'End Date',
                                'End Time': 'End Time',
                                'Total Days': 'Total Days',
                                'Vehicle Information': 'Vehicle Information',
                                'Vehicle': 'Vehicle',
                                'Vehicle No': 'Vehicle No',
                                'Driver': 'Driver',
                                'Driver Contact': 'Driver Contact',
                                'Add Driver': 'Add Driver',
                                'Payment & Charges': 'Payment & Charges',
                                'Free (KM)': 'Free (KM)',
                                'Free Tour (KM)': 'Free Tour (KM)',
                                'Before Additional Charges (LKR)': 'Before Additional Charges (LKR)',
                                'Reason for Additional Charges': 'Reason for Additional Charges',
                                'Paid': 'Paid',
                                'Paid Method (Note)': 'Paid Method (Note)',
                                'Deposit': 'Deposit',
                                'Discount Price (LKR)': 'Discount Price (LKR)',
                                'Total Price (LKR)': 'Total Price (LKR)',
                                'Vehicle Photos Before Release': 'Vehicle Photos Before Release',
                                'Drag & drop an image or': 'Drag & drop an image or',
                                'Browse': 'Browse',
                                'Deposited Vehicle Images (If any)': 'Deposited Vehicle Images (If any)',
                                'Driving License and NIC': 'Driving License and NIC',
                                "Guarantor's NIC (if any)": "Guarantor's NIC (if any)",
                                'Cancel': 'Cancel',
                                'Confirm Book': 'Confirm Book',
                                'Expense': 'Expense',
                                'P/L Report': 'P/L Report',
                                'LogOut': 'LogOut',
                                'Customer Information': 'Customer Information',
                                'Full Name': 'Full Name',
                                'NIC': 'NIC',
                                'Contact No': 'Contact No',
                            },
                            si: {
                                'Bookings': 'වෙන්කිරීම්',
                                'Book Hire': 'බුක් කිරීම',
                                'Booking History': 'වෙන්කිරීම් ඉතිහාසය',
                                'Completed Businesses': 'සම්පූර්ණ කළ ව්‍යාපාර',
                                'Vehicles': 'වාහන',
                                'Customers': 'පාරිභෝගිකයින්',
                                'HRM': 'HRM',
                                'CRM': 'CRM',
                                'Inventory': 'ඉන්වෙන්ටරි',
                                'Finance': 'මූල්‍යය',
                                'Logout': 'පිටවීම',
                                'Customer Information': 'පාරිභෝගික තොරතුරු',
                                'Full Name': 'සම්පූර්ණ නම',
                                'NIC': 'ජා.හැ.අංකය',
                                'Contact No': 'දුරකථන අංකය',
                                '+ Add Customer': '+ පාරිභෝගිකයා එක් කරන්න',
                                'Date & Time Details': 'දිනය සහ වේලාව',
                                'Starting Date': 'ආරම්භක දිනය',
                                'Starting Time': 'ආරම්භක වේලාව',
                                'End Date': 'අවසන් දිනය',
                                'End Time': 'අවසන් වේලාව',
                                'Total Days': 'මුළු දින ගණන',
                                'Vehicle Information': 'වාහන තොරතුරු',
                                'Vehicle': 'වාහනය',
                                'Vehicle No': 'වාහන අංකය',
                                'Driver': 'රියදුරු',
                                'Driver Contact': 'රියදුරු දුරකථන අංකය',
                                'Add Driver': 'රියදුරු එක් කරන්න',
                                'Payment & Charges': 'ගෙවීම් සහ ගාස්තු',
                                'Free (KM)': 'නොමිලේ (කි.මී.)',
                                'Free Tour (KM)': 'නොමිලේ සංචාරය (කි.මී.)',
                                'Before Additional Charges (LKR)': 'අමතර ගාස්තු පෙර (රු.)',
                                'Reason for Additional Charges': 'අමතර ගාස්තු හේතුව',
                                'Paid': 'ගෙවූ මුදල',
                                'Paid Method (Note)': 'ගෙවූ ක්‍රමය (සටහන)',
                                'Deposit': 'තැන්පතු',
                                'Discount Price (LKR)': 'වට්ටම් මුදල (රු.)',
                                'Total Price (LKR)': 'මුළු මුදල (රු.)',
                                'Vehicle Photos Before Release': 'වාහනය මුදා හැරීමට පෙර ඡායාරූප',
                                'Drag & drop an image or': 'ඡායාරූපයක් ඇද දමන්න හෝ',
                                'Browse': 'බ්‍රවුස් කරන්න',
                                'Deposited Vehicle Images (If any)': 'තැන්පත් කළ වාහන ඡායාරූප (ඇත්නම්)',
                                'Driving License and NIC': 'රියදුරු බලපත්‍රය සහ ජා.හැ.අංකය',
                                "Guarantor's NIC (if any)": "උපකාරකයාගේ ජා.හැ.අංකය (ඇත්නම්)",
                                'Cancel': 'අවලංගු කරන්න',
                                'Confirm Book': 'වෙන්කිරීම තහවුරු කරන්න',
                                'Expense': 'අභිප්‍රේතය',
                                'P/L Report': 'P/L ඉතිහාසය',
                                'LogOut': 'පිටවීම',
                                'Customer Information': 'පාරිභෝගික තොරතුරු',
                                'Full Name': 'සම්පූර්ණ නම',
                                'NIC': 'ජා.හැ.අංකය',
                                'Contact No': 'දුරකථන අංකය',
                            }
                        };

                        // Helper: Replace text in all elements matching a translation key
                        function translatePage(lang) {
                            // For each key in English, replace all matching text nodes
                            Object.keys(translations.en).forEach(function(key) {
                                const enText = translations.en[key];
                                const siText = translations.si[key];

                                // Find all elements containing this text (exact match)
                                document.querySelectorAll('body *:not(script):not(style)').forEach(function(el) {
                                    // Only replace if the element has a single text node child
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
                            // Update button styles
                            document.getElementById('lang-en').classList.toggle('underline', lang === 'en');
                            document.getElementById('lang-en').classList.toggle('opacity-50', lang !== 'en');
                            document.getElementById('lang-si').classList.toggle('underline', lang === 'si');
                            document.getElementById('lang-si').classList.toggle('opacity-50', lang !== 'si');

                            // Translate the page
                            translatePage(lang);

                            // Optionally, store language in localStorage
                            localStorage.setItem('lang', lang);
                        }

                        // On page load, set language from localStorage or default to English
                        document.addEventListener('DOMContentLoaded', function() {
                            const lang = localStorage.getItem('lang') || 'en';
                            setLanguage(lang);
                        });
                    </script>
                </div>
                <div class="card1-content" style="margin-top: 16.5px;">
                    <form method="POST" class="btn1-submit" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('LogOut') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 p-8 bg-gray-50 overflow-y-auto">
            <form method="POST" class="max-w-6xl mx-auto space-y-8" autocomplete="off"
                action="{{ route('bookings.store') }}" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-red-100 border border-red-400 text-red-700">
                        <strong>There were some problems with your input:</strong>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Customer Information -->
                <section class="bg-white rounded-2xl shadow p-6 space-y-4 border border-gray-200">
                    <h2 class="text-xl font-medium text-gray-900 mb-2">Customer Informations</h2>
                    <div class="flex flex-col md:flex-row md:items-end md:gap-8 gap-4">
                        <div class="flex-1 relative">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="full_name">Full
                                Name</label>
                            <input id="full_name" name="full_name" type="text"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter full name" autocomplete="off" value="{{ old('full_name') }}" />
                            <!-- Dropdown for customer suggestions -->
                            <ul id="customer-list"
                                class="absolute z-10 w-full bg-white border border-gray-300 rounded-xl mt-1 shadow-lg hidden max-h-48 overflow-y-auto">
                            </ul>
                        </div>
                        <div class="flex flex-col gap-2 flex-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="nic">NIC</label>
                            <input id="nic" name="nic" type="text"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter NIC" value="{{ old('nic') }}" />
                        </div>
                        <div class="flex flex-col gap-2 flex-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="mobile_number">Contact
                                No</label>
                            <input id="mobile_number" name="mobile_number" type="text"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter contact number" value="{{ old('mobile_number') }}"
                                pattern="^(\+?\d{1,3}[- ]?)?\d{10}$"
                                title="Please enter a valid 10-digit phone number. You may include country code."
                                required />
                        </div>
                        <div class="flex flex-col gap-2 flex-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="address">Address</label>
                            <input id="address" name="address" type="text"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter address" value="{{ old('address') }}" required />
                        </div>
                        <!-- Import the customer dropdown script from ManagerAddBooking -->

                        <script>
                            $(document).ready(function() {
                                // When typing in the full name field
                                $('#full_name').on('input', function() {
                                    var query = $(this).val();

                                    if (query.length >= 1) {
                                        // Fetch matching customer names from the server, filtered by business_id
                                        $.ajax({
                                            url: '/customers/searchb', // Route to get customer names
                                            method: 'GET',
                                            data: {
                                                query: query,
                                                business_id: '{{ auth()->user()->business_id }}'
                                            },
                                            success: function(data) {
                                                $('#customer-list').empty().show(); // Show the list
                                                if (data.length > 0) {
                                                    $.each(data, function(index, customer) {
                                                        // Determine dot color based on status
                                                        var dotColor = (customer.status && customer.status
                                                                .toLowerCase() === 'active') ?
                                                            'bg-green-500' :
                                                            'bg-red-500';
                                                        var dotHtml =
                                                            '<span class="inline-block w-3 h-3 rounded-full mr-2 align-middle ' +
                                                            dotColor + '"></span>';
                                                        $('#customer-list').append(
                                                            '<li class="list-group-item customer-item px-4 py-2 cursor-pointer hover:bg-teal-100 flex items-center" data-id="' +
                                                            customer.id + '" data-name="' + customer
                                                            .full_name + '">' +
                                                            dotHtml +
                                                            '<span>' + customer.full_name + '</span>' +
                                                            '</li>'
                                                        );
                                                    });
                                                } else {
                                                    $('#customer-list').hide();
                                                }
                                            }
                                        });
                                    } else {
                                        $('#customer-list').hide();
                                    }
                                });

                                // When a customer name is selected from the dropdown
                                $(document).on('click', '.customer-item', function() {
                                    var selectedName = $(this).data('name');
                                    var customerId = $(this).data('id');

                                    $('#full_name').val(selectedName); // Set the input field with the selected name
                                    $('#customer-list').hide(); // Hide the list

                                    // Fetch the selected customer's details
                                    $.ajax({
                                        url: '/customers/get-details/' +
                                            customerId, // Route to get customer details by ID
                                        method: 'GET',
                                        success: function(data) {
                                            if (data) {
                                                if (data.phone) {
                                                    $('input[name="mobile_number"]').val(data
                                                        .phone); // Autofill mobile number
                                                } else {
                                                    $('input[name="mobile_number"]').val(
                                                        ''); // Clear the field if phone not found
                                                }

                                                if (data.nic) {
                                                    $('input[name="nic"]').val(data.nic); // Autofill NIC
                                                } else {
                                                    $('input[name="nic"]').val(
                                                        ''); // Clear the field if NIC not found
                                                }

                                                if (data.address) {
                                                    $('input[name="address"]').val(data
                                                        .address); // Autofill Address
                                                } else {
                                                    $('input[name="address"]').val(
                                                        ''); // Clear the field if Address not found
                                                }
                                            } else {
                                                $('input[name="mobile_number"], input[name="nic"],input[name="address"]')
                                                    .val('');
                                                alert('Customer details not found');
                                            }
                                        },
                                        error: function() {
                                            console.error('Error fetching customer details');
                                        }
                                    });
                                });

                                // Hide the dropdown if clicking outside of it
                                $(document).click(function(e) {
                                    if (!$(e.target).closest('#full_name, #customer-list').length) {
                                        $('#customer-list').hide();
                                    }
                                });

                                // Add Customer button click handler
                                $('#add-customer-btn').on('click', function() {
                                    var fullName = $('#full_name').val();
                                    var nic = $('#nic').val();
                                    var phone = $('#mobile_number').val();
                                    var address = $('input[name="address"]').val();

                                    // Check if NIC is provided
                                    if (!nic) {
                                        alert('Please enter NIC before adding a new customer.');
                                        return;
                                    }

                                    if (confirm('Are you sure you want to add this customer into the system?')) {
                                        // Save the customer via AJAX POST
                                        $.ajax({
                                            url: '/customers', // Standard resource route for storing customer
                                            method: 'POST',
                                            data: {
                                                _token: '{{ csrf_token() }}',
                                                full_name: fullName,
                                                nic: nic,
                                                phone: phone,
                                                address: address,
                                                business_id: '{{ auth()->user()->business_id }}'
                                            },
                                            success: function(response) {
                                                // After save, reload the page with the same data in fields
                                                // We'll use query params to persist the data
                                                let params = new URLSearchParams({
                                                    full_name: fullName,
                                                    nic: nic,
                                                    mobile_number: phone,
                                                    address: address
                                                });
                                                window.location.href = window.location.pathname + '?' + params
                                                    .toString();
                                            },
                                            error: function(xhr) {
                                                let msg = 'Failed to save customer.';
                                                if (xhr.responseJSON && xhr.responseJSON.errors) {
                                                    msg += '\n' + Object.values(xhr.responseJSON.errors).join('\n');
                                                }
                                                alert(msg);
                                            }
                                        });
                                    }
                                });

                                // On page load, if query params exist, fill the fields
                                $(function() {
                                    const urlParams = new URLSearchParams(window.location.search);
                                    if (urlParams.has('full_name')) $('#full_name').val(urlParams.get('full_name'));
                                    if (urlParams.has('nic')) $('#nic').val(urlParams.get('nic'));
                                    if (urlParams.has('mobile_number')) $('#mobile_number').val(urlParams.get('mobile_number'));
                                    if (urlParams.has('address')) {
                                        if ($('input[name="address"]').length) {
                                            $('input[name="address"]').val(urlParams.get('address'));
                                        }
                                    }
                                });
                            });
                        </script>
                        <button type="button" id="add-customer-btn"
                            class="h-12 px-6 bg-green-600 text-white rounded-3xl font-semibold hover:bg-green-700 transition">
                            + Add Customer
                        </button>
                    </div>
                </section>

                <!-- Date & Time Details -->
                <section class="bg-white rounded-2xl shadow p-6 space-y-4 border border-gray-200">
                    <h2 class="text-xl font-medium text-gray-900 mb-2">Date & Time Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="from_date">Starting
                                Date</label>
                            <input id="from_date" name="from_date" type="date"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                oninput="if(this.value < this.min) { this.value = this.min; alert('Starting date cannot be a previous date.'); }" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="booking_time">Starting
                                Time</label>
                            <input id="booking_time" name="booking_time" type="time"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="to_date">End
                                Date</label>
                            <input id="to_date" name="to_date" type="date"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                min=""
                                onfocus="
                                    var from = document.getElementById('from_date').value;
                                    if(from) this.min = from;
                                "
                                oninput="
                                    var from = document.getElementById('from_date').value;
                                    if(from) this.min = from;
                                " />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="arrival_time">End
                                Time</label>
                            <input id="arrival_time" name="arrival_time" type="time"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="days">Total
                                Days</label>
                            <input id="days" name="days" type="number" min="1"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="0" readonly />
                        </div>
                        <script>
                            function calculateDays() {
                                const fromDate = document.getElementById('from_date').value;
                                const toDate = document.getElementById('to_date').value;
                                const daysInput = document.getElementById('days');
                                if (fromDate && toDate) {
                                    const start = new Date(fromDate);
                                    const end = new Date(toDate);
                                    // Calculate difference in milliseconds
                                    const diffTime = end - start;
                                    // Convert to days (difference only, not inclusive)
                                    const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
                                    if (diffDays > 0) {
                                        daysInput.value = diffDays;
                                    } else {
                                        daysInput.value = '';
                                    }
                                } else {
                                    daysInput.value = '';
                                }
                            }
                            document.getElementById('from_date').addEventListener('change', calculateDays);
                            document.getElementById('to_date').addEventListener('change', calculateDays);
                        </script>
                    </div>
                </section>

                <!-- Vehicle Information -->
                <section class="bg-white rounded-2xl shadow p-6 space-y-4 border border-gray-200">
                    <h2 class="text-xl font-medium text-gray-900 mb-2">Vehicle Informations</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="vehicle_number">Vehicle
                                Number</label>
                            <div class="flex items-center">
                                <select id="vehicle_number" name="vehicle_number"
                                    class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    autocomplete="off">
                                    <option value="">Select vehicle number</option>
                                    <optgroup label="Available Vehicles" id="available-vehicles-group"></optgroup>
                                    <optgroup label="Unavailable Vehicles" id="unavailable-vehicles-group"></optgroup>
                                </select>
                                <button type="button" id="clear_vehicle"
                                    class="ml-2 px-2 py-1 text-gray-500 hover:text-red-600"
                                    style="display: none;">✖</button>
                            </div>
                        </div>
                        <script>
                            // Helper to fetch and show available/unavailable vehicles based on selected dates
                            function updateVehicleDropdown() {
                                const fromDate = document.getElementById('from_date').value;
                                const toDate = document.getElementById('to_date').value;
                                const businessId = @json(auth()->user()->business_id);
                                const availableGroup = document.getElementById('available-vehicles-group');
                                const unavailableGroup = document.getElementById('unavailable-vehicles-group');
                                const select = document.getElementById('vehicle_number');

                                // Clear previous options
                                availableGroup.innerHTML = '';
                                unavailableGroup.innerHTML = '';

                                if (!fromDate || !toDate) {
                                    select.value = '';
                                    return;
                                }

                                fetch(
                                        `/vehicle-availability?business_id=${businessId}&from_date=${encodeURIComponent(fromDate)}&to_date=${encodeURIComponent(toDate)}`
                                    )
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('Failed to fetch vehicle availability. Please check your input and try again.');
                                        }
                                        return response.json();
                                    })
                                    .then(data => {
                                        // Available
                                        if (Array.isArray(data.available) && data.available.length > 0) {
                                            data.available.forEach(v => {
                                                const option = document.createElement('option');
                                                option.value = v.number;
                                                option.textContent = v.number + (v.model ? ' (' + v.model + ')' : '');
                                                availableGroup.appendChild(option);
                                            });
                                        }

                                        // Unavailable (Booked or In Service)
                                        if (Array.isArray(data.unavailable) && data.unavailable.length > 0) {
                                            data.unavailable.forEach(v => {
                                                const option = document.createElement('option');
                                                option.value = v.number;

                                                let label = v.number + (v.model ? ' (' + v.model + ')' : '');
                                                if (v.reason === 'in_service') {
                                                    label += ' (In Service)';
                                                } else {
                                                    // default to booked if reason not provided
                                                    label += ' (Booked)';
                                                }

                                                option.textContent = label;
                                                // option.disabled = true; // enable if you want to prevent selecting unavailable
                                                unavailableGroup.appendChild(option);
                                            });
                                        }
                                    })
                                    .catch(error => {
                                        alert(error.message || 'An error occurred while loading vehicle availability.');
                                    });
                            }

                            document.getElementById('from_date').addEventListener('change', updateVehicleDropdown);
                            document.getElementById('to_date').addEventListener('change', updateVehicleDropdown);
                        </script>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="vehicle_name">Vehicle
                                Model</label>
                            <input id="vehicle_name" name="vehicle_name" type="text"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Vehicle Model" readonly />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="start_km">Starting
                                Mileage (KM)</label>
                            <input id="start_km" name="start_km" type="number" min="0"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="0" />
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Get business_id from backend (Blade)
                            var businessId = @json(auth()->user()->business_id);

                            // Vehicle number input and datalist
                            const vehicleInput = document.getElementById('vehicle_number');
                            const datalist = document.getElementById('vehicle_number_list');
                            const clearBtn = document.getElementById('clear_vehicle');
                            const freeKmdInput = document.getElementById('free_kmd');
                            const daysInput = document.getElementById('days');
                            const freeKmInput = document.getElementById('free_km');

                            // Helper to fetch and populate datalist
                            vehicleInput.addEventListener('input', function() {
                                const term = this.value;
                                if (term.length < 1) {
                                    datalist.innerHTML = '';
                                    return;
                                }
                                fetch(
                                        `/autocomplete-vehicle-numbers?term=${encodeURIComponent(term)}&business_id=${businessId}`
                                    )
                                    .then(response => response.json())
                                    .then(data => {
                                        datalist.innerHTML = '';
                                        if (Array.isArray(data)) {
                                            data.forEach(function(item) {
                                                const option = document.createElement('option');
                                                option.value = item;
                                                datalist.appendChild(option);
                                            });
                                        }
                                    });
                            });

                            // Helper to update free_km field
                            function updateFreeKm() {
                                const freeKmd = parseFloat(freeKmdInput.value) || 0;
                                const days = parseInt(daysInput.value) || 0;
                                if (freeKmInput) {
                                    freeKmInput.value = (freeKmd * days) > 0 ? (freeKmd * days) : '';
                                }
                            }

                            // When a vehicle number is selected, fetch details
                            vehicleInput.addEventListener('change', function() {
                                const vehicleNumber = this.value;
                                if (vehicleNumber) {
                                    fetch(`/vehicles/get-details/${vehicleNumber}?business_id=${businessId}`)
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.vehicle_name && data.vehicle_model && data.price_per_day && data
                                                .extra_km_chg && data.free_km) {
                                                document.getElementById('vehicle_name').value =
                                                    `${data.vehicle_model} ${data.vehicle_name}`;
                                                document.getElementById('price_per_day').value = data.price_per_day;
                                                document.getElementById('extra_km_chg').value = data.extra_km_chg;
                                                freeKmdInput.value = data.free_km;
                                                // Populate starting mileage with current mileage
                                                if (data.current_mileage) {
                                                    document.getElementById('start_km').value = data.current_mileage;
                                                }
                                                vehicleInput.readOnly = true;
                                                clearBtn.style.display = '';
                                                updateFreeKm(); // recalculate free_km on vehicle select
                                            } else {
                                                alert(data.message || "Vehicle details not found");
                                                document.getElementById('vehicle_name').value = '';
                                                document.getElementById('price_per_day').value = '';
                                                document.getElementById('extra_km_chg').value = '';
                                                document.getElementById('start_km').value = '';
                                                freeKmdInput.value = '';
                                                if (freeKmInput) freeKmInput.value = '';
                                            }
                                        })
                                        .catch(error => {
                                            document.getElementById('vehicle_name').value = '';
                                            document.getElementById('price_per_day').value = '';
                                            document.getElementById('extra_km_chg').value = '';
                                            document.getElementById('start_km').value = '';
                                            freeKmdInput.value = '';
                                            if (freeKmInput) freeKmInput.value = '';
                                        });
                                }
                            });

                            // Update free_km when days or free_kmd changes
                            if (daysInput) {
                                daysInput.addEventListener('input', updateFreeKm);
                            }
                            if (freeKmdInput) {
                                freeKmdInput.addEventListener('input', updateFreeKm);
                            }

                            // Clear vehicle selection and unlock input
                            clearBtn.addEventListener('click', function() {
                                vehicleInput.value = '';
                                vehicleInput.readOnly = false;
                                document.getElementById('vehicle_name').value = '';
                                document.getElementById('price_per_day').value = '';
                                document.getElementById('extra_km_chg').value = '';
                                document.getElementById('start_km').value = '';
                                freeKmdInput.value = '';
                                if (freeKmInput) freeKmInput.value = '';
                                this.style.display = 'none';
                                vehicleInput.focus();
                            });
                        });
                    </script>
                </section>
                <section class="bg-white rounded-2xl shadow p-6 space-y-4 border border-gray-200">
                    <h2 class="text-xl font-medium text-gray-900 mb-2">Guarantor & Deposit</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="guarantor">Guarantor
                                Name</label>
                            <input id="guarantor" name="guarantor" type="text"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter guarantor name" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="deposit">Deposit</label>
                            <input id="deposit" name="deposit" type="text" min="0"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="0" />
                        </div>
                    </div>
                </section>

                <section class="bg-white rounded-2xl shadow p-6 space-y-4 border border-gray-200">
                    <h2 class="text-xl font-medium text-gray-900 mb-2">Officer's Informations</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div style="position: relative;">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="officer">Released
                                Officer</label>
                            <input id="officer" name="officer" type="text"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter officer name" autocomplete="off" />
                            <ul id="officer-list" class="list-group"
                                style="position: absolute; z-index: 10; width: 100%; display: none; background: white; border: 1px solid #ccc; border-radius: 0 0 0.75rem 0.75rem; max-height: 180px; overflow-y: auto;">
                            </ul>
                        </div>
                        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
                        <link rel="stylesheet"
                            href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
                        <script>
                            $(document).ready(function() {
                                $("#officer").on("input", function() {
                                    const query = $(this).val();
                                    if (query.length > 0) {
                                        $.ajax({
                                            url: "/autocomplete-employees",
                                            type: "GET",
                                            data: {
                                                term: query
                                            },
                                            dataType: "json",
                                            success: function(data) {
                                                let list = $("#officer-list");
                                                list.empty();
                                                if (data.length > 0) {
                                                    data.forEach(function(item) {
                                                        list.append(
                                                            '<li class="list-group-item" style="padding: 8px; cursor: pointer;">' +
                                                            item + '</li>');
                                                    });
                                                    list.show();
                                                } else {
                                                    list.hide();
                                                }
                                            }
                                        });
                                    } else {
                                        $("#officer-list").hide();
                                    }
                                });

                                // Handle click on suggestion
                                $(document).on("click", "#officer-list li", function() {
                                    $("#officer").val($(this).text());
                                    $("#officer-list").hide();
                                });

                                // Hide dropdown if clicking outside
                                $(document).on("click", function(e) {
                                    if (!$(e.target).closest("#officer").length && !$(e.target).closest("#officer-list")
                                        .length) {
                                        $("#officer-list").hide();
                                    }
                                });
                            });
                        </script>
                        <div style="position: relative;">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="commission">1st
                                Commission
                                Officer</label>
                            <input id="commission" name="commission" type="text"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter commission name" autocomplete="off" />
                            <ul id="commission-list" class="list-group"
                                style="position: absolute; z-index: 10; width: 100%; display: none; background: white; border: 1px solid #ccc; border-radius: 0 0 0.75rem 0.75rem; max-height: 180px; overflow-y: auto;">
                            </ul>
                        </div>
                        <div style="position: relative;">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="commission_amt">1st
                                Commission
                                Officer's Amount</label>
                            <input id="commission_amt" name="commission_amt" type="number" min="0"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter commission amount" />
                            <span id="commission_amt_error" style="display:none;color:red;font-size:0.9em;">Amount
                                required!</span>
                        </div>
                        <div style="position: relative;">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="commission2">2nd
                                Commission
                                Officer</label>
                            <input id="commission2" name="commission2" type="text"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter commission name" autocomplete="off" />
                            <ul id="commission2-list" class="list-group"
                                style="position: absolute; z-index: 10; width: 100%; display: none; background: white; border: 1px solid #ccc; border-radius: 0 0 0.75rem 0.75rem; max-height: 180px; overflow-y: auto;">
                            </ul>
                        </div>
                        <div style="position: relative;">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="commission_amt2">2nd
                                Commission
                                Officer's Amount</label>
                            <input id="commission_amt2" name="commission_amt2" type="number" min="0"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter commission amount" />
                            <span id="commission_amt2_error" style="display:none;color:red;font-size:0.9em;">Amount
                                required!</span>
                        </div>

                        <script>
                            // Dynamic required validation for commission amount fields
                            $(function() {
                                function toggleRequiredCommissionAmt() {
                                    // 1st
                                    if ($('#commission').val().trim() !== '') {
                                        $('#commission_amt').attr('required', 'required');
                                    } else {
                                        $('#commission_amt').removeAttr('required');
                                        $('#commission_amt_error').hide();
                                    }
                                    // 2nd
                                    if ($('#commission2').val().trim() !== '') {
                                        $('#commission_amt2').attr('required', 'required');
                                    } else {
                                        $('#commission_amt2').removeAttr('required');
                                        $('#commission_amt2_error').hide();
                                    }
                                }

                                $('#commission, #commission2').on('input', function() {
                                    toggleRequiredCommissionAmt();
                                });

                                // On form submit, show error message if needed
                                $('form').on('submit', function(e) {
                                    let error = false;
                                    // 1st commission logic
                                    if ($('#commission').val().trim() !== '') {
                                        if ($('#commission_amt').val().trim() === '') {
                                            $('#commission_amt_error').show();
                                            $('#commission_amt').focus();
                                            error = true;
                                        } else {
                                            $('#commission_amt_error').hide();
                                        }
                                    } else {
                                        $('#commission_amt_error').hide();
                                    }
                                    // 2nd commission logic
                                    if ($('#commission2').val().trim() !== '') {
                                        if ($('#commission_amt2').val().trim() === '') {
                                            $('#commission_amt2_error').show();
                                            if (!error) $('#commission_amt2').focus();
                                            error = true;
                                        } else {
                                            $('#commission_amt2_error').hide();
                                        }
                                    } else {
                                        $('#commission_amt2_error').hide();
                                    }
                                    if (error) {
                                        e.preventDefault();
                                    }
                                });
                            });
                        </script>
                        <script>
                            (function($) {
                                function applyLockStyles($input) {
                                    if (!$input.length) {
                                        return;
                                    }
                                    $input.css({
                                        'background-color': '#f8f8f8',
                                        'cursor': 'not-allowed'
                                    });
                                }

                                function clearLockStyles($input) {
                                    if (!$input.length) {
                                        return;
                                    }
                                    $input.css({
                                        'background-color': '',
                                        'cursor': ''
                                    });
                                }

                                function lockInput($input) {
                                    if (!$input.length) {
                                        return;
                                    }
                                    $input.prop('readonly', true);
                                    applyLockStyles($input);
                                }

                                function unlockInput($input) {
                                    if (!$input.length) {
                                        return;
                                    }
                                    $input.prop('readonly', false);
                                    clearLockStyles($input);
                                }

                                function attachBlurLock(selector) {
                                    const $input = $(selector);
                                    if (!$input.length) {
                                        return;
                                    }

                                    $input.on('blur.lockable', function() {
                                        if ($input.val().trim().length > 0) {
                                            lockInput($input);
                                        } else {
                                            unlockInput($input);
                                        }
                                    });

                                    if ($input.val().trim().length > 0 || $input.prop('readonly')) {
                                        lockInput($input);
                                    } else {
                                        unlockInput($input);
                                    }
                                }

                                window.lockEmployeeField = lockInput;
                                window.unlockEmployeeField = unlockInput;

                                $(function() {
                                    ['#commission', '#commission2', '#driver_name'].forEach(attachBlurLock);
                                });
                            })(jQuery);
                        </script>
                        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
                        <link rel="stylesheet"
                            href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
                        <script>
                            $(document).ready(function() {
                                $("#commission").on("input", function() {
                                    const $this = $(this);
                                    if ($this.prop('readonly')) {
                                        $("#commission-list").hide();
                                        return;
                                    }
                                    const query = $this.val();
                                    if (query.length > 0) {
                                        $.ajax({
                                            url: "/autocomplete-employees",
                                            type: "GET",
                                            data: {
                                                term: query
                                            },
                                            dataType: "json",
                                            success: function(data) {
                                                let list = $("#commission-list");
                                                list.empty();
                                                if (data.length > 0) {
                                                    data.forEach(function(item) {
                                                        list.append(
                                                            '<li class="list-group-item" style="padding: 8px; cursor: pointer;">' +
                                                            item + '</li>');
                                                    });
                                                    list.show();
                                                } else {
                                                    list.hide();
                                                }
                                            }
                                        });
                                    } else {
                                        $("#commission-list").hide();
                                    }
                                });

                                // Handle click on suggestion
                                $(document).on("click", "#commission-list li", function() {
                                    $("#commission").val($(this).text());
                                    $("#commission-list").hide();
                                });

                                // Hide dropdown if clicking outside
                                $(document).on("click", function(e) {
                                    if (!$(e.target).closest("#commission").length && !$(e.target).closest(
                                            "#commission-list")
                                        .length) {
                                        $("#commission-list").hide();
                                    }
                                });
                            });
                        </script>
                    </div>
                    <div class="flex items-center gap-2 mt-4">
                        <input type="hidden" name="hand_over_booking" value="0">
                        <input type="checkbox" id="hand_over_booking" name="hand_over_booking" value="1"
                            class="h-5 w-5 text-teal-600 border-gray-300 rounded focus:ring-teal-500">
                        <label for="hand_over_booking" class="text-sm font-medium text-gray-700">Hand Over
                            Booking</label>
                    </div>
                    <div id="driver_fields" class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4"
                        style="display: none;">
                        <div style="position: relative;">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="driver_name">Driver
                                Name</label>
                            <input id="driver_name" name="driver_name" type="text"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter driver name" />
                            <ul id="driver-name-list" class="list-group"
                                style="position: absolute; z-index: 10; width: 100%; display: none; background: white; border: 1px solid #ccc; border-radius: 0 0 0.75rem 0.75rem; max-height: 180px; overflow-y: auto; top: 100%; left: 0; margin-top: 4px;">
                            </ul>
                        </div>
                        <div style="position: relative;">
                            <label class="block text-sm font-medium text-gray-700 mb-1"
                                for="driver_commission_amt">Driver's Commission Amount (LKR)</label>
                            <input id="driver_commission_amt" name="driver_commission_amt" type="number"
                                min="0" step="any"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter commission amount" autocomplete="off" />
                        </div>
                        <div style="position: relative;">
                            <label class="block text-sm font-medium text-gray-700 mb-1"
                                for="location">Location</label>
                            <input id="location" name="location" type="text"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter location" />
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#hand_over_booking').change(function() {
                                if (this.checked) {
                                    $('#driver_fields').slideDown();
                                    $('#driver_name').prop('required', true);
                                    $('#driver_commission_amt').prop('required', true);
                                    $('#location').prop('required', true);
                                } else {
                                    $('#driver_fields').slideUp();
                                    $('#driver_name').prop('required', false);
                                    $('#driver_commission_amt').prop('required', false);
                                    $('#location').prop('required', false);
                                }
                            });
                            // On page load, ensure field "required" matches checkbox (in case of form repopulation)
                            if ($('#hand_over_booking').is(':checked')) {
                                $('#driver_fields').show();
                                $('#driver_name').prop('required', true);
                                $('#driver_commission_amt').prop('required', true);
                                $('#location').prop('required', true);
                            } else {
                                $('#driver_fields').hide();
                                $('#driver_name').prop('required', false);
                                $('#driver_commission_amt').prop('required', false);
                                $('#location').prop('required', false);
                            }
                        });
                    </script>

                    <script>
                        $(document).ready(function() {
                            $('#hand_over_booking').change(function() {
                                if (this.checked) {
                                    $('#driver_fields').slideDown();
                                    $('#driver_name').prop('required', true);
                                    $('#driver_commission_amt').prop('required', true);
                                } else {
                                    $('#driver_fields').slideUp();
                                    $('#driver_name').prop('required', false);
                                    $('#driver_commission_amt').prop('required', false);
                                }
                            });
                        });
                    </script>
                    <script>
                        // Autocomplete for 2nd Commission Officer (commission2)
                        $(document).ready(function() {
                            $("#commission2").on("input", function() {
                                const $this = $(this);
                                if ($this.prop('readonly')) {
                                    $("#commission2-list").hide();
                                    return;
                                }
                                const query = $this.val();
                                if (query.length > 0) {
                                    $.ajax({
                                        url: "/autocomplete-employees",
                                        type: "GET",
                                        data: {
                                            term: query
                                        },
                                        dataType: "json",
                                        success: function(data) {
                                            let list = $("#commission2-list");
                                            list.empty();
                                            if (data.length > 0) {
                                                data.forEach(function(item) {
                                                    list.append(
                                                        '<li class="list-group-item" style="padding: 8px; cursor: pointer;">' +
                                                        item + '</li>');
                                                });
                                                list.show();
                                            } else {
                                                list.hide();
                                            }
                                        }
                                    });
                                } else {
                                    $("#commission2-list").hide();
                                }
                            });

                            // Handle click on suggestion for commission2
                            $(document).on("click", "#commission2-list li", function() {
                                $("#commission2").val($(this).text());
                                $("#commission2-list").hide();
                            });

                            // Hide dropdown if clicking outside commission2
                            $(document).on("click", function(e) {
                                if (!$(e.target).closest("#commission2").length && !$(e.target).closest("#commission2-list")
                                    .length) {
                                    $("#commission2-list").hide();
                                }
                            });
                        });
                    </script>
                    <script>
                        // Autocomplete for Driver Name
                        $(document).ready(function() {
                            $("#driver_name").on("input", function() {
                                const $this = $(this);
                                if ($this.prop('readonly')) {
                                    $("#driver-name-list").hide();
                                    return;
                                }
                                const query = $this.val();
                                if (query.length > 0) {
                                    $.ajax({
                                        url: "/autocomplete-employees",
                                        type: "GET",
                                        data: {
                                            term: query
                                        },
                                        dataType: "json",
                                        success: function(data) {
                                            let list = $("#driver-name-list");
                                            list.empty();
                                            if (data.length > 0) {
                                                data.forEach(function(item) {
                                                    list.append(
                                                        '<li class="list-group-item" style="padding: 8px; cursor: pointer;">' +
                                                        item + '</li>');
                                                });
                                                list.show();
                                            } else {
                                                list.hide();
                                            }
                                        }
                                    });
                                } else {
                                    $("#driver-name-list").hide();
                                }
                            });

                            // Handle click on suggestion for driver name
                            $(document).on("click", "#driver-name-list li", function() {
                                $("#driver_name").val($(this).text());
                                $("#driver-name-list").hide();
                            });

                            // Hide dropdown if clicking outside driver name
                            $(document).on("click", function(e) {
                                if (!$(e.target).closest("#driver_name").length && !$(e.target).closest("#driver-name-list")
                                    .length) {
                                    $("#driver-name-list").hide();
                                }
                            });
                        });
                    </script>
                </section>

                <!-- Pricing Details -->
                <section class="bg-white rounded-2xl shadow p-6 space-y-4 border border-gray-200">
                    <h2 class="text-xl font-medium text-gray-900 mb-2">Pricing Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="price_per_day">Price Per
                                Day (LKR)</label>
                            <input id="price_per_day" name="price_per_day" type="number" min="0"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="0" readonly />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="extra_km_chg">Price for 1
                                Ex KM</label>
                            <input id="extra_km_chg" name="extra_km_chg" type="number" min="0"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="0" readonly />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="free_kmd">Free Tour Per
                                Day (KM)</label>
                            <input id="free_kmd" name="free_kmd" type="number" min="0"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="0" readonly />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="free_km">Free
                                (KM)</label>
                            <input id="free_km" name="free_km" type="number" min="0"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="0" readonly />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1"
                                for="additional_chagers">Additional Charges (LKR)</label>
                            <input id="additional_chagers" name="additional_chagers" type="number" min="0"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="0" />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="reason">Reason for
                                Additional Charges</label>
                            <input id="reason" name="reason" type="text"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter reason" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="discount_price">Discount
                                Price (LKR)</label>
                            <input id="discount_price" name="discount_price" type="number" min="0"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="0" />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="method">Paid Method
                                (Note)</label>
                            <input id="method" name="method" type="text"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Enter method" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="payed">Paid</label>
                            <input id="payed" name="payed" type="number" min="0"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="0" required />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-6 mt-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="price">Total Price
                                (LKR)</label>
                            <input id="price" name="price" type="number" min="0"
                                class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="0" readonly required />
                        </div>
                    </div>
                    <script>
                        // Calculation: price = ((price_per_day * days)+additional_chagers) - (discount_price + payed)
                        function calculateTotalPrice() {
                            const pricePerDay = parseFloat(document.getElementById('price_per_day').value) || 0;
                            const days = parseInt(document.getElementById('days') ? document.getElementById('days').value : 0) || 0;
                            const additionalChagers = parseFloat(document.getElementById('additional_chagers').value) || 0;
                            const discountPrice = parseFloat(document.getElementById('discount_price').value) || 0;
                            const payed = parseFloat(document.getElementById('payed').value) || 0;

                            const total = ((pricePerDay * days) + additionalChagers) - (discountPrice + payed);
                            document.getElementById('price').value = total > 0 ? total : 0;
                        }

                        document.addEventListener('DOMContentLoaded', function() {
                            // recalculate when any relevant field changes
                            const fields = [
                                'price_per_day',
                                'days',
                                'additional_chagers',
                                'discount_price',
                                'payed'
                            ];
                            fields.forEach(function(id) {
                                const el = document.getElementById(id);
                                if (el) {
                                    el.addEventListener('input', calculateTotalPrice);
                                    el.addEventListener('change', calculateTotalPrice);
                                }
                            });

                            // recalculate on load in case values are prefilled
                            calculateTotalPrice();
                        });
                    </script>
                </section>

                <!-- Vehicle Photos Before Release -->
                <section class="bg-white rounded-2xl shadow p-6 space-y-4 border border-gray-200">
                    <h2 class="text-xl font-medium text-gray-900 mb-2">Vehicle Photos Before Release</h2>
                    <div class="flex flex-wrap gap-6">
                        <label
                            class="w-80 h-48 bg-white rounded-2xl border-2 border-gray-200 flex flex-col items-center justify-center cursor-pointer relative overflow-hidden">
                            <span class="text-gray-500 text-sm font-light">Drag & drop an image or <span
                                    class="text-blue-600">Browse</span></span>
                            <input type="file" name="driving_photos[]" class="hidden driving-photos-input"
                                accept="image/*" multiple />
                            <span class="absolute top-2 right-3 text-xs text-gray-600 bg-gray-100 px-2 py-1 rounded"
                                id="driving-photos-count">0 images</span>
                            <div id="driving-photos-preview"
                                class="absolute bottom-2 left-2 w-16 h-12 rounded shadow overflow-hidden bg-gray-50 flex items-center justify-center"
                                style="display:none;">
                                <img src="" alt="Preview" class="object-contain w-full h-full" />
                            </div>
                        </label>
                    </div>
                </section>

                <!-- Deposited Vehicle Images (If any) -->
                <section class="bg-white rounded-2xl shadow p-6 space-y-4 border border-gray-200">
                    <h2 class="text-xl font-medium text-gray-900 mb-2">Deposited Vehicle Images (If any)</h2>
                    <div class="flex flex-wrap gap-6">
                        <label
                            class="w-80 h-48 bg-white rounded-2xl border-2 border-gray-200 flex flex-col items-center justify-center cursor-pointer relative overflow-hidden">
                            <span class="text-gray-500 text-sm font-light">Drag & drop an image or <span
                                    class="text-blue-600">Browse</span></span>
                            <input type="file" name="deposit_img[]" class="hidden deposit-img-input"
                                accept="image/*" multiple />
                            <span class="absolute top-2 right-3 text-xs text-gray-600 bg-gray-100 px-2 py-1 rounded"
                                id="deposit-img-count">0 images</span>
                            <div id="deposit-img-preview"
                                class="absolute bottom-2 left-2 w-16 h-12 rounded shadow overflow-hidden bg-gray-50 flex items-center justify-center"
                                style="display:none;">
                                <img src="" alt="Preview" class="object-contain w-full h-full" />
                            </div>
                        </label>
                    </div>
                </section>

                <!-- Driving License and NIC -->
                <section class="bg-white rounded-2xl shadow p-6 space-y-4 border border-gray-200">
                    <h2 class="text-xl font-medium text-gray-900 mb-2">Driving License and NIC</h2>
                    <div class="flex flex-wrap gap-6">
                        <label
                            class="w-80 h-48 bg-white rounded-2xl border-2 border-gray-200 flex flex-col items-center justify-center cursor-pointer relative overflow-hidden">
                            <span class="text-gray-500 text-sm font-light">Drag & drop an image or <span
                                    class="text-blue-600">Browse</span></span>
                            <input type="file" name="nic_photos[]" class="hidden nic-photos-input"
                                accept="image/*" multiple />
                            <span class="absolute top-2 right-3 text-xs text-gray-600 bg-gray-100 px-2 py-1 rounded"
                                id="nic-photos-count">0 images</span>
                            <div id="nic-photos-preview"
                                class="absolute bottom-2 left-2 w-16 h-12 rounded shadow overflow-hidden bg-gray-50 flex items-center justify-center"
                                style="display:none;">
                                <img src="" alt="Preview" class="object-contain w-full h-full" />
                            </div>
                        </label>
                    </div>
                </section>

                <!-- Guarantor's NIC (if any) -->
                <section class="bg-white rounded-2xl shadow p-6 space-y-4 border border-gray-200">
                    <h2 class="text-xl font-medium text-gray-900 mb-2">Guarantor's NIC (if any)</h2>
                    <div class="flex flex-wrap gap-6">
                        <label
                            class="w-80 h-48 bg-white rounded-2xl border-2 border-gray-200 flex flex-col items-center justify-center cursor-pointer relative overflow-hidden">
                            <span class="text-gray-500 text-sm font-light">Drag & drop an image or <span
                                    class="text-blue-600">Browse</span></span>
                            <input type="file" name="grnt_nic[]" class="hidden grnt-nic-input" accept="image/*"
                                multiple />
                            <span class="absolute top-2 right-3 text-xs text-gray-600 bg-gray-100 px-2 py-1 rounded"
                                id="grnt-nic-count">0 images</span>
                            <div id="grnt-nic-preview"
                                class="absolute bottom-2 left-2 w-16 h-12 rounded shadow overflow-hidden bg-gray-50 flex items-center justify-center"
                                style="display:none;">
                                <img src="" alt="Preview" class="object-contain w-full h-full" />
                            </div>
                        </label>
                    </div>
                </section>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        function updateImageCountAndPreview(inputSelector, countSelector, previewSelector) {
                            const input = document.querySelector(inputSelector);
                            const countSpan = document.getElementById(countSelector);
                            const previewDiv = document.getElementById(previewSelector);
                            const previewImg = previewDiv ? previewDiv.querySelector('img') : null;
                            if (input && countSpan) {
                                input.addEventListener('change', function() {
                                    const count = input.files ? input.files.length : 0;
                                    countSpan.textContent = count + (count === 1 ? ' image' : ' images');
                                    if (previewDiv && previewImg) {
                                        if (count > 0 && input.files[0].type.startsWith('image/')) {
                                            const reader = new FileReader();
                                            reader.onload = function(e) {
                                                previewImg.src = e.target.result;
                                                previewDiv.style.display = '';
                                            };
                                            reader.readAsDataURL(input.files[0]);
                                        } else {
                                            previewImg.src = '';
                                            previewDiv.style.display = 'none';
                                        }
                                    }
                                });
                            }
                        }
                        updateImageCountAndPreview('.driving-photos-input', 'driving-photos-count', 'driving-photos-preview');
                        updateImageCountAndPreview('.deposit-img-input', 'deposit-img-count', 'deposit-img-preview');
                        updateImageCountAndPreview('.nic-photos-input', 'nic-photos-count', 'nic-photos-preview');
                        updateImageCountAndPreview('.grnt-nic-input', 'grnt-nic-count', 'grnt-nic-preview');
                    });
                </script>

                <!-- Actions -->
                <div class="flex justify-end gap-4 mt-8">
                    <button type="button"
                        class="px-7 py-2.5 rounded-3xl border border-red-400 text-red-400 font-semibold hover:bg-red-50 transition">Cancel</button>
                    <button type="submit"
                        class="px-7 py-2.5 rounded-3xl border border-green-500 text-green-500 font-semibold hover:bg-green-50 transition">Confirm
                        Book</button>
                </div>
            </form>
        </main>
    </div>
</div>
