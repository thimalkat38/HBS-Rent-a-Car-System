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
                                    class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
                                    <span class="material-icons mr-3">list</span>
                                    All Customers
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('hr-management') }}"
                            class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                            <span class="material-icons mr-3">badge</span>
                            HRM
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('crms') }}"
                            class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                            <span class="material-icons mr-3">support_agent</span>
                            CRM
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('inventory.index') }}"
                            class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                            <span class="material-icons mr-3">inventory_2</span>
                            Inventory
                        </a>
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
                        <span class="material-icons text-gray-400">people</span>
                        <span class="text-xl font-semibold font-poppins text-gray-900">Customers</span>
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
            <main class="flex-1 w-full px-6 py-6">
                <div class="w-full max-w-5xl mx-auto mb-8">
                    <div class="bg-white shadow rounded-lg p-6">
                        {{-- Search --}}
                        <form action="{{ url('customers') }}" method="GET" id="searchForm" class="flex flex-col md:flex-row gap-4 items-center">
                            <!-- NIC Search Field (Auto-Search on Typing) -->
                            <input 
                                type="text" 
                                name="nic" 
                                placeholder="Search by NIC"
                                value="{{ request('nic') }}" 
                                oninput="autoSubmitForm()"
                                class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500 w-full md:w-1/3"
                            />

                            <!-- Full Name Search Field (Auto-Search on Typing) -->
                            <input 
                                type="text" 
                                name="full_name" 
                                placeholder="Search by Name"
                                value="{{ request('full_name') }}" 
                                oninput="autoSubmitForm()"
                                class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500 w-full md:w-1/3"
                            />

                            <button 
                                type="submit" 
                                class="bg-teal-600 text-white px-6 py-2 rounded hover:bg-teal-700 transition w-full md:w-auto"
                            >
                                Search
                            </button>
                            <a href="{{ url('customers') }}" class="ml-2 text-gray-600 hover:text-teal-600 underline text-sm">Clear</a>
                        </form>
                        <script>
                            let typingTimer;
                            function autoSubmitForm() {
                                clearTimeout(typingTimer);
                                typingTimer = setTimeout(() => {
                                    document.getElementById('searchForm').submit();
                                }, 500);
                            }
                        </script>
                    </div>
                </div>

                <!-- Table Content -->
                <div class="overflow-x-auto w-full max-w-5xl mx-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                        <thead>
                            <tr class="bg-slate-900 text-white">
                                {{-- <th class="py-2 px-4">CUS ID</th> --}}
                                <th class="py-2 px-4 text-left">Customer Name</th>
                                <th class="py-2 px-4 text-left">M/NUMBER</th>
                                <th class="py-2 px-4 text-left">NIC</th>
                                {{-- <th class="py-2 px-4 text-left">EMAIL</th> --}}
                                <th class="py-2 px-4 text-left">Address</th>
                                <th class="py-2 px-4 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($customers as $customer)
                                <tr 
                                    onclick="window.location='{{ route('Customer.show', $customer->id) }}'"
                                    class="hover:bg-gray-100 cursor-pointer border-b border-gray-100"
                                >
                                    {{-- <td class="py-2 px-4">{{ $customer->id }}</td> --}}
                                    <td class="py-2 px-4">{{ $customer->full_name }}</td>
                                    <td class="py-2 px-4">{{ $customer->phone }}</td>
                                    <td class="py-2 px-4">{{ $customer->nic }}</td>
                                    {{-- <td class="py-2 px-4">{{ $customer->email ?? 'No email exists' }}</td> --}}
                                    <td class="py-2 px-4">{{ $customer->address }}</td>
                                    <td class="py-2 px-4 flex gap-2">
                                        <a 
                                            href="{{ route('customers.edit', $customer->id) }}"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs font-semibold transition"
                                            onclick="event.stopPropagation();"
                                        >Edit</a>
                                        <form 
                                            action="{{ route('customers.destroy', $customer->id) }}" 
                                            method="POST" 
                                            style="display:inline;"
                                            onsubmit="event.stopPropagation(); return confirm('Are you sure you want to delete this customer?');"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" 
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs font-semibold transition"
                                            >Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-4 px-4 text-center text-gray-500">No customers found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
