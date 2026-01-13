<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Car Rental Management System</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="bg-white min-h-screen overflow-x-hidden">
    <div class="flex min-h-screen overflow-x-hidden">
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
        <div class="flex-1 flex flex-col min-h-screen bg-gray-50 overflow-x-hidden">
            <!-- Header -->
            <header class="w-full h-20 bg-white border-b border-gray-200 flex items-center px-8">
                <div class="w-full flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <span class="material-icons text-gray-400">assignment</span>
                        <span class="text-xl font-semibold font-poppins text-gray-900">Bookings</span>
                        <span class="material-icons text-gray-400">chevron_right</span>
                        <span class="text-xl font-normal font-poppins text-gray-900">Booking History</span>
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
                            // Full translation dictionary for all visible UI text
                            const translations = {
                                en: {
                                    // Sidebar & Navigation
                                    'Dashboard': 'Dashboard',
                                    'Vehicles': 'Vehicles',
                                    'Add Vehicle': 'Add Vehicle',
                                    'All Vehicles': 'All Vehicles',
                                    'Book Vehicle': 'Book Vehicle',
                                    'Bookings': 'Bookings',
                                    'Booking History': 'Booking History',
                                    'Completed Businesses': 'Completed Businesses',
                                    'Add Customer': 'Add Customer',
                                    'List Customer': 'List Customer',
                                    'Vehicle Owner Management': 'Vehicle Owner Management',
                                    'Expences': 'Expenses',
                                    'Expenses': 'Expenses',
                                    'P/L Report': 'P/L Report',
                                    'Finance': 'Finance',
                                    'Inventory': 'Inventory',
                                    'CRM': 'CRM',
                                    'HRM': 'HRM',
                                    'Service': 'Service',
                                    'Insurance': 'Insurance',
                                    'LogOut': 'LogOut',
                                    // Header
                                    'Vehicles Details': 'Vehicles Details',
                                    // Search/Filter Bar
                                    'Search by reg no or name': 'Search by reg no or name',
                                    'All': 'All',
                                    'Available': 'Available',
                                    'In Tour': 'In Tour',
                                    'Filter': 'Filter',
                                    'Reset': 'Reset',
                                    // Table Headers
                                    'Vehicle Model': 'Vehicle Model',
                                    'Vehicle Number': 'Vehicle Number',
                                    'Owner': 'Owner',
                                    'Owner Contact': 'Owner Contact',
                                    'Price Per Day (LKR)': 'Price Per Day (LKR)',
                                    'Status': 'Status',
                                    'Actions': 'Actions',
                                    // Table Actions
                                    'View': 'View',
                                    'Edit': 'Edit',
                                    'Delete': 'Delete',
                                    // Vehicle Details Modal
                                    'Vehicle Details': 'Vehicle Details',
                                    'Close': 'Close',
                                    'Save': 'Save',
                                    // Booking Modal
                                    'Booking Information': 'Booking Information',
                                    'Customer Information': 'Customer Information',
                                    'Full Name': 'Full Name',
                                    'NIC': 'NIC',
                                    'Contact Number': 'Contact Number',
                                    'Contact No': 'Contact No',
                                    'Start Date': 'Start Date',
                                    'End Date': 'End Date',
                                    'Start Time': 'Start Time',
                                    'End Time': 'End Time',
                                    'Total Days': 'Total Days',
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
                                    'Remove': 'Remove',
                                    'Submit': 'Submit',
                                    // Misc
                                    'No vehicles found.': 'No vehicles found.',
                                    'Are you sure you want to delete this vehicle?': 'Are you sure you want to delete this vehicle?',
                                    'Yes, Delete': 'Yes, Delete',
                                    'Cancel': 'Cancel',
                                    'Language': 'Language',
                                    'English': 'English',
                                    'Sinhala': 'Sinhala',
                                    // Add more keys as needed for the full UI
                                },
                                si: {
                                    // Sidebar & Navigation
                                    'Dashboard': 'උපකරණ පුවරුව',
                                    'Vehicles': 'වාහන',
                                    'Add Vehicle': 'වාහනයක් එක් කරන්න',
                                    'All Vehicles': 'සියලු වාහන',
                                    'Book Vehicle': 'වාහනය වෙන්කරන්න',
                                    'Bookings': 'වෙන්කිරීම්',
                                    'Booking History': 'වෙන්කිරීම් ඉතිහාසය',
                                    'Completed Businesses': 'සම්පූර්ණ කළ ව්‍යාපාර',
                                    'Add Customer': 'පාරිභෝගිකයෙකු එක් කරන්න',
                                    'List Customer': 'පාරිභෝගික ලැයිස්තුව',
                                    'Vehicle Owner Management': 'වාහන හිමිකරු කළමනාකරණය',
                                    'Expences': 'වියදම්',
                                    'Expenses': 'වියදම්',
                                    'P/L Report': 'ලාභ/අලාභ වාර්තාව',
                                    'Finance': 'මුදල් කළමනාකරණය',
                                    'Inventory': 'ඉන්වෙන්ටරි',
                                    'CRM': 'පාරිභෝගික කළමනාකරණය',
                                    'HRM': 'මානව සම්පත් කළමනාකරණය',
                                    'Service': 'සේවාව',
                                    'Insurance': 'රක්ෂණය',
                                    'LogOut': 'පිටවීම',
                                    // Header
                                    'Vehicles Details': 'වාහන විස්තර',
                                    // Search/Filter Bar
                                    'Search by reg no or name': 'අංකය හෝ නමක් සොයන්න',
                                    'All': 'සියලු',
                                    'Available': 'පවතින',
                                    'In Tour': 'සංචාරයේ',
                                    'Filter': 'පෙරහන් කරන්න',
                                    'Reset': 'යළි සකසන්න',
                                    // Table Headers
                                    'Vehicle Model': 'වාහන ආකෘතිය',
                                    'Vehicle Number': 'වාහන අංකය',
                                    'Owner': 'හිමිකරු',
                                    'Owner Contact': 'හිමිකරුගේ දුරකථන අංකය',
                                    'Price Per Day (LKR)': 'දිනකට මිල (රු.)',
                                    'Status': 'තත්ත්වය',
                                    'Actions': 'ක්‍රියාමාර්ග',
                                    // Table Actions
                                    'View': 'බලන්න',
                                    'Edit': 'සංස්කරණය',
                                    'Delete': 'මකන්න',
                                    // Vehicle Details Modal
                                    'Vehicle Details': 'වාහන විස්තර',
                                    'Close': 'වසන්න',
                                    'Save': 'සුරකින්න',
                                    // Booking Modal
                                    'Booking Information': 'වෙන්කිරීම් තොරතුරු',
                                    'Customer Information': 'පාරිභෝගික තොරතුරු',
                                    'Full Name': 'සම්පූර්ණ නම',
                                    'NIC': 'ජා.හැ.අංකය',
                                    'Contact Number': 'දුරකථන අංකය',
                                    'Contact No': 'දුරකථන අංකය',
                                    'Start Date': 'ආරම්භක දිනය',
                                    'End Date': 'අවසන් දිනය',
                                    'Start Time': 'ආරම්භක වේලාව',
                                    'End Time': 'අවසන් වේලාව',
                                    'Total Days': 'මුළු දින ගණන',
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
                                    'Remove': 'ඉවත් කරන්න',
                                    'Submit': 'ඉදිරිපත් කරන්න',
                                    // Misc
                                    'No vehicles found.': 'වාහන හමු නොවීය.',
                                    'Are you sure you want to delete this vehicle?': 'ඔබට මෙම වාහනය මකන්න අවශ්‍යද?',
                                    'Yes, Delete': 'ඔව්, මකන්න',
                                    'Cancel': 'අවලංගු කරන්න',
                                    'Language': 'භාෂාව',
                                    'English': 'ඉංග්‍රීසි',
                                    'Sinhala': 'සිංහල',
                                    // Add more keys as needed for the full UI
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
                        <div class="card1-content">
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
                </div>
            </header>
            <main class="flex-1 w-full px-6 py-6 overflow-x-hidden max-w-full">
                <div class="w-full max-w-full">
                    <div class="mb-6">
                        <div class="bg-white rounded-lg shadow p-6">
                            {{-- Search --}}
                            <form action="{{ url('bookings') }}" method="GET" id="searchForm">
                                <div class="flex flex-wrap gap-4 items-center max-w-full">
                                    <!-- Mobile Number Input (Auto-Search on Typing) -->
                                    <input type="text" name="mobile_number" placeholder="Search by Mobile Number"
                                        value="{{ request('mobile_number') }}"
                                        class="px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-teal-500 transition w-48"
                                    >

                                    <!-- Full Name Input (Auto-Search on Typing) -->
                                    <input type="text" name="full_name" placeholder="Search by Full Name"
                                        value="{{ request('full_name') }}"
                                        class="px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-teal-500 transition w-48"
                                    >

                                    <!-- Vehicle Number Input (Auto-Search on Typing) -->
                                    <input type="text" id="vehicle_number" name="vehicle_number"
                                        list="vehicle_numbers"
                                        placeholder="Search by vehicle number" maxlength="8"
                                        value="{{ request('vehicle_number') }}"
                                        class="px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-teal-500 transition w-48"
                                    >

                                    <!-- ID Input (Auto-Search on Typing) -->
                                    <input type="text" name="id" placeholder="Search by ID"
                                        value="{{ request('id') }}"
                                        class="px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-teal-500 transition w-32"
                                    >

                                    <!-- Quick Date Filters -->
                                    <div class="flex gap-2 items-center">
                                        <button type="button" onclick="setDateFilter('today')"
                                            class="px-3 py-2 text-sm {{ request('date_filter') === 'today' ? 'bg-teal-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} rounded transition font-medium">
                                            Today
                                        </button>
                                        <button type="button" onclick="setDateFilter('this_week')"
                                            class="px-3 py-2 text-sm {{ request('date_filter') === 'this_week' ? 'bg-teal-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} rounded transition font-medium">
                                            This Week
                                        </button>
                                        <button type="button" onclick="setDateFilter('upcoming')"
                                            class="px-3 py-2 text-sm {{ request('date_filter') === 'upcoming' ? 'bg-teal-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} rounded transition font-medium">
                                            Upcoming (7 days)
                                        </button>
                                        <button type="button" onclick="setDateFilter('all')"
                                            class="px-3 py-2 text-sm {{ !request('date_filter') || request('date_filter') === 'all' ? 'bg-teal-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} rounded transition font-medium">
                                            All
                                        </button>
                                    </div>

                                    <!-- Date Range Fields (Auto-Search on Change) -->
                                    <input type="date" name="from_date" value="{{ request('from_date') }}"
                                        placeholder="From Date"
                                        class="px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-teal-500 transition w-40"
                                    >

                                    <input type="date" name="to_date" value="{{ request('to_date') }}"
                                        placeholder="To Date"
                                        class="px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-teal-500 transition w-40"
                                    >

                                    <!-- Hidden fields to preserve sort parameters -->
                                    <input type="hidden" name="sort_by" value="{{ request('sort_by', 'from_date') }}">
                                    <input type="hidden" name="sort_order" value="{{ request('sort_order', 'desc') }}">
                                    <input type="hidden" name="date_filter" id="date_filter" value="{{ request('date_filter') }}">

                                    <button type="submit"
                                        class="px-4 py-2 bg-teal-500 text-white rounded hover:bg-teal-600 transition font-semibold"
                                    >Search</button>

                                    <a href="{{ url('/bookings') }}"
                                        class="ml-2 px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition font-semibold"
                                    >Clear</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="overflow-x-auto w-full max-w-full">
                        <div class="inline-block min-w-full align-middle">
                            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                            <thead>
                                <tr>
                                    @php
                                        $currentSortBy = request('sort_by', 'from_date');
                                        $currentSortOrder = request('sort_order', 'desc');
                                        
                                        function getSortUrl($column, $currentSortBy, $currentSortOrder) {
                                            $params = request()->except(['sort_by', 'sort_order']);
                                            $newOrder = ($currentSortBy === $column && $currentSortOrder === 'asc') ? 'desc' : 'asc';
                                            $params['sort_by'] = $column;
                                            $params['sort_order'] = $newOrder;
                                            return url('bookings') . '?' . http_build_query($params);
                                        }
                                        
                                        function getSortIcon($column, $currentSortBy, $currentSortOrder) {
                                            if ($currentSortBy !== $column) {
                                                return '<span class="material-icons text-gray-400 text-sm">unfold_more</span>';
                                            }
                                            return $currentSortOrder === 'asc' 
                                                ? '<span class="material-icons text-teal-500 text-sm">arrow_upward</span>'
                                                : '<span class="material-icons text-teal-500 text-sm">arrow_downward</span>';
                                        }
                                    @endphp
                                    <th class="px-4 py-2 border-b text-left text-sm font-semibold text-gray-700">
                                        <a href="{{ getSortUrl('id', $currentSortBy, $currentSortOrder) }}" 
                                           class="flex items-center gap-1 hover:text-teal-600 transition"
                                           onclick="event.stopPropagation()">
                                            ID
                                            {!! getSortIcon('id', $currentSortBy, $currentSortOrder) !!}
                                        </a>
                                    </th>
                                    <th class="px-4 py-2 border-b text-left text-sm font-semibold text-gray-700">
                                        <a href="{{ getSortUrl('full_name', $currentSortBy, $currentSortOrder) }}" 
                                           class="flex items-center gap-1 hover:text-teal-600 transition"
                                           onclick="event.stopPropagation()">
                                            Full Name
                                            {!! getSortIcon('full_name', $currentSortBy, $currentSortOrder) !!}
                                        </a>
                                    </th>
                                    <th class="px-4 py-2 border-b text-left text-sm font-semibold text-gray-700">
                                        <a href="{{ getSortUrl('from_date', $currentSortBy, $currentSortOrder) }}" 
                                           class="flex items-center gap-1 hover:text-teal-600 transition"
                                           onclick="event.stopPropagation()">
                                            From
                                            {!! getSortIcon('from_date', $currentSortBy, $currentSortOrder) !!}
                                        </a>
                                    </th>
                                    <th class="px-4 py-2 border-b text-left text-sm font-semibold text-gray-700">
                                        <a href="{{ getSortUrl('to_date', $currentSortBy, $currentSortOrder) }}" 
                                           class="flex items-center gap-1 hover:text-teal-600 transition"
                                           onclick="event.stopPropagation()">
                                            To
                                            {!! getSortIcon('to_date', $currentSortBy, $currentSortOrder) !!}
                                        </a>
                                    </th>
                                    <th class="px-4 py-2 border-b text-left text-sm font-semibold text-gray-700">
                                        <a href="{{ getSortUrl('vehicle_name', $currentSortBy, $currentSortOrder) }}" 
                                           class="flex items-center gap-1 hover:text-teal-600 transition"
                                           onclick="event.stopPropagation()">
                                            Vehicle
                                            {!! getSortIcon('vehicle_name', $currentSortBy, $currentSortOrder) !!}
                                        </a>
                                    </th>
                                    <th class="px-4 py-2 border-b text-left text-sm font-semibold text-gray-700">
                                        <a href="{{ getSortUrl('vehicle_number', $currentSortBy, $currentSortOrder) }}" 
                                           class="flex items-center gap-1 hover:text-teal-600 transition"
                                           onclick="event.stopPropagation()">
                                            Vehicle Number
                                            {!! getSortIcon('vehicle_number', $currentSortBy, $currentSortOrder) !!}
                                        </a>
                                    </th>
                                    <th class="px-4 py-2 border-b text-left text-sm font-semibold text-gray-700">
                                        <a href="{{ getSortUrl('mobile_number', $currentSortBy, $currentSortOrder) }}" 
                                           class="flex items-center gap-1 hover:text-teal-600 transition"
                                           onclick="event.stopPropagation()">
                                            Mobile Number
                                            {!! getSortIcon('mobile_number', $currentSortBy, $currentSortOrder) !!}
                                        </a>
                                    </th>
                                    <th class="px-4 py-2 border-b text-left text-sm font-semibold text-gray-700">
                                        <a href="{{ getSortUrl('additional_chagers', $currentSortBy, $currentSortOrder) }}" 
                                           class="flex items-center gap-1 hover:text-teal-600 transition"
                                           onclick="event.stopPropagation()">
                                            Additional Price
                                            {!! getSortIcon('additional_chagers', $currentSortBy, $currentSortOrder) !!}
                                        </a>
                                    </th>
                                    <th class="px-4 py-2 border-b text-left text-sm font-semibold text-gray-700">
                                        <a href="{{ getSortUrl('discount_price', $currentSortBy, $currentSortOrder) }}" 
                                           class="flex items-center gap-1 hover:text-teal-600 transition"
                                           onclick="event.stopPropagation()">
                                            Discount Price
                                            {!! getSortIcon('discount_price', $currentSortBy, $currentSortOrder) !!}
                                        </a>
                                    </th>
                                    <th class="px-4 py-2 border-b text-left text-sm font-semibold text-gray-700">
                                        <a href="{{ getSortUrl('payed', $currentSortBy, $currentSortOrder) }}" 
                                           class="flex items-center gap-1 hover:text-teal-600 transition"
                                           onclick="event.stopPropagation()">
                                            Payed
                                            {!! getSortIcon('payed', $currentSortBy, $currentSortOrder) !!}
                                        </a>
                                    </th>
                                    <th class="px-4 py-2 border-b text-left text-sm font-semibold text-gray-700">
                                        <a href="{{ getSortUrl('price', $currentSortBy, $currentSortOrder) }}" 
                                           class="flex items-center gap-1 hover:text-teal-600 transition"
                                           onclick="event.stopPropagation()">
                                            Balance
                                            {!! getSortIcon('price', $currentSortBy, $currentSortOrder) !!}
                                        </a>
                                    </th>
                                    <th class="px-4 py-2 border-b text-left text-sm font-semibold text-gray-700" style="width: 310px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr onclick="window.location='{{ route('bookings.show', $booking->id) }}'"
                                        class="hover:bg-teal-50 cursor-pointer transition">
                                        <td class="px-4 py-2 border-b">{{ $booking->id }}</td>
                                        <td class="px-4 py-2 border-b">{{ $booking->full_name }}</td>
                                        <td class="px-4 py-2 border-b">{{ $booking->from_date }} [{{ $booking->booking_time }}]</td>
                                        <td class="px-4 py-2 border-b">{{ $booking->to_date }} [{{ $booking->arrival_time }}]</td>
                                        <td class="px-4 py-2 border-b">{{ $booking->vehicle_name }}</td>
                                        <td class="px-4 py-2 border-b">{{ $booking->vehicle_number }}</td>
                                        <td class="px-4 py-2 border-b">{{ $booking->mobile_number }}</td>
                                        <td class="px-4 py-2 border-b">{{ $booking->additional_chagers }}</td>
                                        <td class="px-4 py-2 border-b">{{ $booking->discount_price }}</td>
                                        <td class="px-4 py-2 border-b">{{ $booking->payed }}</td>
                                        <td class="px-4 py-2 border-b">{{ $booking->price }}</td>
                                        <td class="px-4 py-2 border-b">
                                            <div class="flex flex-wrap gap-2">
                                                @if ($booking->status !== 'Completed')
                                                    <a href="{{ route('bookings.postbooking', $booking->id) }}"
                                                        class="px-3 py-1 bg-teal-500 text-white rounded hover:bg-teal-600 transition text-sm font-medium"
                                                    >View PostBooking</a>
                                                @else
                                                    <button class="px-3 py-1 bg-gray-300 text-gray-600 rounded cursor-not-allowed text-sm font-medium" disabled>Completed</button>
                                                @endif
                                                <a href="{{ route('bookings.edit', $booking->id) }}"
                                                    class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition text-sm font-medium"
                                                >Edit</a>
                                                {{-- <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm font-medium"
                                                        onclick="return confirm('Are you sure you want to delete this booking?')"
                                                    >Delete</button>
                                                </form> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
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

    function setDateFilter(filter) {
        document.getElementById('date_filter').value = filter;
        // Clear manual date inputs when using quick filters (except 'all')
        if (filter !== 'all') {
            document.querySelector('input[name="from_date"]').value = '';
            document.querySelector('input[name="to_date"]').value = '';
        }
        document.getElementById('searchForm').submit();
    }
</script>
</html>
