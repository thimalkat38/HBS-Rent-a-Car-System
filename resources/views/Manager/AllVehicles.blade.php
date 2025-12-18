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
                                    class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
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
                                <a href="{{ url('commission') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
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
                        <span class="material-icons text-gray-400">directions_car</span>
                        <span class="text-xl font-semibold font-poppins text-gray-900">Vehicles</span>
                        <span class="material-icons text-gray-400">chevron_right</span>
                        <span class="text-xl font-normal font-poppins text-gray-900">Vehicles Details</span>
                    </div>
                    <div class="flex items-center space-x-6">
                        <div class="flex items-center space-x-2">
                            <button id="lang-en" class="text-lg font-poppins underline text-gray-700 focus:outline-none" onclick="setLanguage('en')">EN</button>
                            <button id="lang-si" class="text-lg font-poppins text-gray-400 focus:outline-none" onclick="setLanguage('si')">SIN</button>
                        </div>
                        <script>
                            // Full translation dictionary for all visible UI text
                            const translations = {
                                en: {
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
                                    'Vehicles Details': 'Vehicles Details',
                                    'Search by reg no or name': 'Search by reg no or name',
                                    'All': 'All',
                                    'Available': 'Available',
                                    'In Tour': 'In Tour',
                                    'Filter': 'Filter',
                                    'Reset': 'Reset',
                                    'Vehicle Model': 'Vehicle Model',
                                    'Vehicle Number': 'Vehicle Number',
                                    'Owner': 'Owner',
                                    'Owner Contact': 'Owner Contact',
                                    'Price Per Day (LKR)': 'Price Per Day (LKR)',
                                    'Status': 'Status',
                                    'Actions': 'Actions',
                                    'View': 'View',
                                    'Edit': 'Edit',
                                    'Delete': 'Delete',
                                    'Vehicle Details': 'Vehicle Details',
                                    'Close': 'Close',
                                    'Save': 'Save',
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
                                    'No vehicles found.': 'No vehicles found.',
                                    'Are you sure you want to delete this vehicle?': 'Are you sure you want to delete this vehicle?',
                                    'Yes, Delete': 'Yes, Delete',
                                    'Cancel': 'Cancel',
                                    'Language': 'Language',
                                    'English': 'English',
                                    'Sinhala': 'Sinhala',
                                },
                                si: {
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
                                    'Vehicles Details': 'වාහන විස්තර',
                                    'Search by reg no or name': 'අංකය හෝ නමක් සොයන්න',
                                    'All': 'සියලු',
                                    'Available': 'පවතින',
                                    'In Tour': 'සංචාරයේ',
                                    'Filter': 'පෙරහන් කරන්න',
                                    'Reset': 'යළි සකසන්න',
                                    'Vehicle Model': 'වාහන ආකෘතිය',
                                    'Vehicle Number': 'වාහන අංකය',
                                    'Owner': 'හිමිකරු',
                                    'Owner Contact': 'හිමිකරුගේ දුරකථන අංකය',
                                    'Price Per Day (LKR)': 'දිනකට මිල (රු.)',
                                    'Status': 'තත්ත්වය',
                                    'Actions': 'ක්‍රියාමාර්ග',
                                    'View': 'බලන්න',
                                    'Edit': 'සංස්කරණය',
                                    'Delete': 'මකන්න',
                                    'Vehicle Details': 'වාහන විස්තර',
                                    'Close': 'වසන්න',
                                    'Save': 'සුරකින්න',
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
                                    'No vehicles found.': 'වාහන හමු නොවීය.',
                                    'Are you sure you want to delete this vehicle?': 'ඔබට මෙම වාහනය මකන්න අවශ්‍යද?',
                                    'Yes, Delete': 'ඔව්, මකන්න',
                                    'Cancel': 'අවලංගු කරන්න',
                                    'Language': 'භාෂාව',
                                    'English': 'ඉංග්‍රීසි',
                                    'Sinhala': 'සිංහල',
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
            <!-- Search/Filter Bar -->
            <section class="w-full px-8 mt-6">
                <form method="GET" action="{{ url('allvehicles') }}">
                    <div class="w-full p-4 bg-gray-900 rounded-2xl border border-gray-700 flex flex-col gap-4">
                        <div class="flex flex-wrap items-center gap-4">
                            <div class="flex items-center px-4 py-1.5 rounded-lg border border-gray-500 bg-white min-w-[250px]">
                                <input
                                    type="text"
                                    name="search"
                                    value="{{ request('search') }}"
                                    placeholder="Search by reg no or name"
                                    class="bg-transparent outline-none border-none text-zinc-700 text-sm font-normal font-poppins flex-1"
                                    id="vehicle-search-input"
                                    autocomplete="off"
                                />
                                <button type="submit" class="ml-1" tabindex="-1">
                                    <span class="material-icons text-white">search</span>
                                </button>
                            </div>
                            <script>
                                // Debounce function
                                function debounce(func, wait) {
                                    let timeout;
                                    return function(...args) {
                                        clearTimeout(timeout);
                                        timeout = setTimeout(() => func.apply(this, args), wait);
                                    };
                                }

                                // Attach debounced submit to the search input
                                document.addEventListener('DOMContentLoaded', function() {
                                    const input = document.getElementById('vehicle-search-input');
                                    if (input) {
                                        const form = input.form;
                                        const debouncedSubmit = debounce(function() {
                                            form.submit();
                                        }, 600);

                                        input.addEventListener('input', function(e) {
                                            debouncedSubmit();
                                        });
                                    }
                                });
                            </script>
                            <div class="flex items-center px-4 py-1.5 rounded-lg border border-gray-500 bg-white min-w-[180px]">
                                <select
                                    name="availability"
                                    class="bg-transparent outline-none border-none text-base font-normal font-poppins text-gray-700 flex-1"
                                    onchange="this.form.submit()"
                                >
                                    <option value="">All</option>
                                    <option value="available" {{ request('availability') == 'available' ? 'selected' : '' }}>Available</option>
                                    <option value="in_tour" {{ request('availability') == 'in_tour' ? 'selected' : '' }}>In Tour</option>
                                </select>
                            </div>
                            <div class="flex items-center px-4 py-1.5 rounded-lg border border-gray-500 bg-white min-w-[200px]">
                                <select
                                    name="service_status"
                                    class="bg-transparent outline-none border-none text-base font-normal font-poppins text-gray-700 flex-1"
                                    onchange="this.form.submit()"
                                >
                                    <option value="">All</option>
                                    <option value="active" {{ request('service_status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="in_service" {{ request('service_status') == 'in_service' ? 'selected' : '' }}>In Service</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
            <!-- Vehicles Grid -->
            <main class="flex-1 w-full px-8 py-6">
                <div class="flex flex-wrap gap-6 justify-center">
                    @foreach ($vehicles as $vehicle)
                        @php
                            $todayStr = now()->toDateString();
                            $isInTourToday = \App\Models\Booking::where('vehicle_number', $vehicle->vehicle_number)
                                ->whereDate('from_date', '<=', $todayStr)
                                ->whereDate('to_date', '>=', $todayStr)
                                ->exists();
                            $isInService = (int)($vehicle->status ?? 0) === 1;
                        @endphp

                        <div class="relative w-96 h-72 mb-4 flex-shrink-0 cursor-pointer"
                             onclick="window.location='{{ route('vehicles.show', $vehicle->id) }}'">
                            @if ($vehicle->display_image)
                                <img class="absolute w-96 h-72 rounded-2xl object-cover"
                                    src="{{ asset('storage/' . $vehicle->display_image) }}"
                                    alt="Car Image" style="width: 100%; height: 100%; object-fit: cover;" />
                            @else
                                <img class="absolute w-96 h-72 rounded-2xl object-cover"
                                    src="https://placehold.co/380x280"
                                    alt="{{ $vehicle->vehicle_model }}" style="width: 100%; height: 100%; object-fit: cover;" />
                            @endif

                            <div class="absolute left-0 bottom-0 w-full h-24">
                                <div class="absolute w-full h-full bg-black/40 rounded-b-2xl backdrop-blur"></div>

                                <!-- Top row: model/name + availability + status badge -->
                                <div class="absolute left-4 top-3 right-4 flex justify-between items-center">
                                    <div class="flex flex-col">
                                        <span class="text-white text-base font-medium font-poppins">
                                            {{ $vehicle->vehicle_model }} {{ $vehicle->vehicle_name }}
                                        </span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        {{-- Availability badge (as before) --}}
                                        @if (!$isInTourToday)
                                            <span
                                                class="h-5 px-2 py-0.5 bg-green-100 rounded-full border border-green-400 flex items-center gap-1">
                                                <span class="w-2 h-2 flex items-center justify-center">
                                                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full block"></span>
                                                </span>
                                                <span class="text-green-700 text-xs font-medium font-sans">Available</span>
                                            </span>
                                        @else
                                            <span
                                                class="h-5 px-2 py-0.5 bg-yellow-100 rounded-full border border-yellow-400 flex items-center gap-1">
                                                <span class="w-2 h-2 flex items-center justify-center">
                                                    <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full block"></span>
                                                </span>
                                                <span class="text-yellow-700 text-xs font-medium font-sans">In Tour</span>
                                            </span>
                                        @endif

                                        {{-- NEW: Vehicle status badge (Active / In Service) --}}
                                        @if ($isInService)
                                            <span
                                                class="h-5 px-2 py-0.5 bg-amber-100 rounded-full border border-amber-400 flex items-center gap-1">
                                                <span class="w-2 h-2 flex items-center justify-center">
                                                    <span class="w-1.5 h-1.5 bg-amber-500 rounded-full block"></span>
                                                </span>
                                                <span class="text-amber-700 text-xs font-medium font-sans">In Service</span>
                                            </span>
                                        @else
                                            <span
                                                class="h-5 px-2 py-0.5 bg-blue-100 rounded-full border border-blue-400 flex items-center gap-1">
                                                <span class="w-2 h-2 flex items-center justify-center">
                                                    <span class="w-1.5 h-1.5 bg-blue-500 rounded-full block"></span>
                                                </span>
                                                <span class="text-blue-700 text-xs font-medium font-sans">Active</span>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Second row: number + alerts -->
                                <div class="absolute left-4 top-[43px] right-4 flex justify-between items-center">
                                    <span
                                        class="text-white text-2xl font-medium font-poppins">{{ $vehicle->vehicle_number }}</span>

                                    @php
                                        $today = now();
                                        $insuranceExpiring = false;
                                        $serviceDueSoon = false;

                                        if (!empty($vehicle->insurance_exp_date)) {
                                            $insuranceDate = \Carbon\Carbon::parse($vehicle->insurance_exp_date);
                                            $insuranceExpiring = $insuranceDate->isBetween(
                                                $today,
                                                $today->copy()->addDays(30),
                                            );
                                        }

                                        $latestService = \App\Models\Service::where('vehicle_number', $vehicle->vehicle_number)
                                            ->orderByDesc('date')
                                            ->orderByDesc('created_at')
                                            ->first();

                                        if ($latestService && !is_null($latestService->next_mileage) && !is_null($vehicle->current_mileage)) {
                                            $diffToNextService = (int) $latestService->next_mileage - (int) $vehicle->current_mileage;
                                            $serviceDueSoon = $diffToNextService >= 0 && $diffToNextService <= 500;
                                        }
                                    @endphp

                                    {{-- Alert badges (unchanged) --}}
                                    <div class="flex items-center gap-2">
                                        @if ($serviceDueSoon)
                                            <span
                                                class="h-5 px-2 py-0.5 rounded-full border border-red-400 flex items-center gap-1">
                                                <span class="w-2 h-2 flex items-center justify-center">
                                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full block"></span>
                                                </span>
                                                <span class="text-red-700 text-xs font-medium font-sans">Service</span>
                                            </span>
                                        @endif

                                        @if ($insuranceExpiring)
                                            <span
                                                class="h-5 px-2 py-0.5 rounded-full border border-red-400 flex items-center gap-1">
                                                <span class="w-2 h-2 flex items-center justify-center">
                                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full block"></span>
                                                </span>
                                                <span class="text-red-700 text-xs font-medium font-sans">Insurance</span>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="w-full flex flex-col items-center mt-5">
                    {{ $vehicles->links() }}
                </div>
            </main>
        </div>
    </div>
</body>

</html>
