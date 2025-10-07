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
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">list</span>
                                    All Customers
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('hr-management') }}"
                            class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
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
                        <span class="material-icons text-gray-400">badge</span>
                        <span class="text-xl font-semibold font-poppins text-gray-900">HRM</span>
                        <span class="material-icons text-gray-400">chevron_right</span>
                        <span class="text-xl font-normal font-poppins text-gray-900">Payrolls</span>
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
                <form action="{{ route('payrolls.store') }}" method="POST"
                    class=" mx-auto bg-white p-8 rounded-lg shadow-md space-y-6">
                    @csrf
                    <div class="flex flex-col md:flex-row md:space-x-4 space-y-6 md:space-y-0">
                        <div class="flex-1">
                            <label for="emp-id" class="block text-gray-700 font-medium mb-1">Employee</label>
                            <div class="relative">
                                <select name="emp_id" id="emp-id" required onchange="autoFillName()"
                                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500 bg-white text-gray-700 appearance-none">
                                    <option value="" class="text-gray-400">-- Select Employee --</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->emp_id }}"
                                            data-name="{{ $employee->emp_name }}"
                                            class="text-gray-700 hover:bg-teal-100">
                                            {{ $employee->emp_id }} - {{ $employee->emp_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="emp_name" id="emp-name">
                                <script>
                                    function autoFillName() {
                                        let select = document.getElementById("emp-id");
                                        let empName = select.options[select.selectedIndex].getAttribute("data-name");
                                        document.getElementById("emp-name").value = empName;
                                    }
                                </script>
                                
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </span>
                            </div>
                            @error('emp_id')
                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0">
                        <div class="flex-1">
                            <label for="month" class="block text-gray-700 font-medium mb-1">Month</label>
                            <select name="month" id="month" required
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500 bg-white text-gray-700 appearance-none">
                                <option value="" class="text-gray-400">-- Select Month --</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                            @error('month')
                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <label for="leaves" class="block text-gray-700 font-medium mb-1">Number of
                                leaves</label>
                            <input type="text" name="leaves" id="leaves" placeholder="Number of leaves"
                                readonly
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
                            @error('leaves')
                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                            @enderror

                        </div>
                        <script>
                            function fetchLeaves() {
                                const empId = document.getElementById('emp-id').value;
                                const month = document.getElementById('month').value;

                                if (empId && month) {
                                    fetch(`/get-leaves-count?emp_id=${empId}&month=${month}`)
                                        .then(response => response.json())
                                        .then(data => {
                                            document.getElementById('leaves').value = data.leaves;
                                        });
                                } else {
                                    document.getElementById('leaves').value = '';
                                }
                            }

                            document.getElementById('emp-id').addEventListener('change', fetchLeaves);
                            document.getElementById('month').addEventListener('change', fetchLeaves);
                        </script>

                    </div>
                    <div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0">
                        <div class="flex-1">
                            <label for="basic" class="block text-gray-700 font-medium mb-1">Basic Salary</label>
                            <input type="text" name="basic" id="basic" placeholder="Basic Salary" required
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
                            @error('basic')
                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                            <script>
                                function fetchLeaves() {
                                    const empId = document.getElementById('emp-id').value;
                                    const month = document.getElementById('month').value;

                                    if (empId && month) {
                                        fetch(`/get-leaves-count?emp_id=${empId}&month=${month}`)
                                            .then(response => response.json())
                                            .then(data => {
                                                document.getElementById('leaves').value = data.leaves;
                                            });
                                    } else {
                                        document.getElementById('leaves').value = '';
                                    }
                                }

                                function fetchSalary() {
                                    const empId = document.getElementById('emp-id').value;

                                    if (empId) {
                                        fetch(`/get-employee-salary?emp_id=${empId}`)
                                            .then(response => response.json())
                                            .then(data => {
                                                document.getElementById('basic').value = data.salary ?? '';
                                            });
                                    } else {
                                        document.getElementById('basic').value = '';
                                    }
                                }

                                document.getElementById('emp-id').addEventListener('change', function() {
                                    fetchLeaves();
                                    fetchSalary();
                                });

                                document.getElementById('month').addEventListener('change', fetchLeaves);
                            </script>

                        </div>
                        <div class="flex-1">
                            <label for="paid_date" class="block text-gray-700 font-medium mb-1">Paid Date</label>
                            <input type="date" name="paid_date" id="paid_date" required
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
                            @error('paid_date')
                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0">
                        <!-- Earnings Section -->
                        <div class="flex-1 border border-green-300 rounded p-4 bg-green-50">
                            <div class="flex items-center justify-between mb-2">
                                <span class="font-semibold text-green-700">Earnings</span>
                                <button type="button" id="add-earning"
                                    class="text-green-600 hover:text-green-800 text-xl font-bold focus:outline-none"
                                    title="Add Earning">
                                    +
                                </button>
                            </div>
                            <div id="earnings-list">
                                <div class="flex space-x-2 mb-2 earning-row">
                                    <input type="text" name="earnings[0][name]" placeholder="Earning Type"
                                        class="flex-1 border border-gray-300 rounded px-2 py-1" >
                                    <input type="number" name="earnings[0][amount]" placeholder="Amount"
                                        class="flex-1 border border-gray-300 rounded px-2 py-1" >
                                    <button type="button"
                                        class="remove-earning text-red-500 hover:text-red-700 text-lg font-bold focus:outline-none"
                                        title="Remove" style="display:none;">−</button>
                                </div>
                                <div class="flex space-x-2 mb-2 earning-row">
                                    <input type="text" name="earnings[1][name]" placeholder="Earning Type"
                                        class="flex-1 border border-gray-300 rounded px-2 py-1" >
                                    <input type="number" name="earnings[1][amount]" placeholder="Amount"
                                        class="flex-1 border border-gray-300 rounded px-2 py-1" >
                                    <button type="button"
                                        class="remove-earning text-red-500 hover:text-red-700 text-lg font-bold focus:outline-none"
                                        title="Remove" style="display:none;">−</button>
                                </div>
                            </div>
                        </div>
                        <!-- Deductions Section -->
                        <div class="flex-1 border border-red-300 rounded p-4 bg-red-50">
                            <div class="flex items-center justify-between mb-2">
                                <span class="font-semibold text-red-700">Deductions</span>
                                <button type="button" id="add-deduction"
                                    class="text-red-600 hover:text-red-800 text-xl font-bold focus:outline-none"
                                    title="Add Deduction">
                                    +
                                </button>
                            </div>
                            <div id="deductions-list">
                                <div class="flex space-x-2 mb-2 deduction-row">
                                    <input type="text" name="deductions[0][name]" placeholder="Deduction Type"
                                        class="flex-1 border border-gray-300 rounded px-2 py-1" >
                                    <input type="number" name="deductions[0][amount]" placeholder="Amount"
                                        class="flex-1 border border-gray-300 rounded px-2 py-1" >
                                    <button type="button"
                                        class="remove-deduction text-red-500 hover:text-red-700 text-lg font-bold focus:outline-none"
                                        title="Remove" style="display:none;">−</button>
                                </div>
                                <div class="flex space-x-2 mb-2 deduction-row">
                                    <input type="text" name="deductions[1][name]" placeholder="Deduction Type"
                                        class="flex-1 border border-gray-300 rounded px-2 py-1" >
                                    <input type="number" name="deductions[1][amount]" placeholder="Amount"
                                        class="flex-1 border border-gray-300 rounded px-2 py-1" >
                                    <button type="button"
                                        class="remove-deduction text-red-500 hover:text-red-700 text-lg font-bold focus:outline-none"
                                        title="Remove" style="display:none;">−</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        // Earnings dynamic fields
                        let earningIndex = 2;
                        document.getElementById('add-earning').addEventListener('click', function() {
                            const earningsList = document.getElementById('earnings-list');
                            const div = document.createElement('div');
                            div.className = 'flex space-x-2 mb-2 earning-row';
                            div.innerHTML = `
                                <input type="text" name="earnings[${earningIndex}][name]" placeholder="Earning Type" class="flex-1 border border-gray-300 rounded px-2 py-1" required>
                                <input type="number" name="earnings[${earningIndex}][amount]" placeholder="Amount" class="flex-1 border border-gray-300 rounded px-2 py-1" required>
                                <button type="button" class="remove-earning text-red-500 hover:text-red-700 text-lg font-bold focus:outline-none" title="Remove">−</button>
                            `;
                            earningsList.appendChild(div);
                            updateEarningRemoveButtons();
                            earningIndex++;
                        });

                        function updateEarningRemoveButtons() {
                            const earningRows = document.querySelectorAll('#earnings-list .earning-row');
                            earningRows.forEach((row, idx) => {
                                const btn = row.querySelector('.remove-earning');
                                btn.style.display = earningRows.length > 2 ? '' : 'none';
                                btn.onclick = function() {
                                    row.remove();
                                    updateEarningRemoveButtons();
                                };
                            });
                        }
                        updateEarningRemoveButtons();

                        // Deductions dynamic fields
                        let deductionIndex = 2;
                        document.getElementById('add-deduction').addEventListener('click', function() {
                            const deductionsList = document.getElementById('deductions-list');
                            const div = document.createElement('div');
                            div.className = 'flex space-x-2 mb-2 deduction-row';
                            div.innerHTML = `
                                <input type="text" name="deductions[${deductionIndex}][name]" placeholder="Deduction Type" class="flex-1 border border-gray-300 rounded px-2 py-1" required>
                                <input type="number" name="deductions[${deductionIndex}][amount]" placeholder="Amount" class="flex-1 border border-gray-300 rounded px-2 py-1" required>
                                <button type="button" class="remove-deduction text-red-500 hover:text-red-700 text-lg font-bold focus:outline-none" title="Remove">−</button>
                            `;
                            deductionsList.appendChild(div);
                            updateDeductionRemoveButtons();
                            deductionIndex++;
                        });

                        function updateDeductionRemoveButtons() {
                            const deductionRows = document.querySelectorAll('#deductions-list .deduction-row');
                            deductionRows.forEach((row, idx) => {
                                const btn = row.querySelector('.remove-deduction');
                                btn.style.display = deductionRows.length > 2 ? '' : 'none';
                                btn.onclick = function() {
                                    row.remove();
                                    updateDeductionRemoveButtons();
                                };
                            });
                        }
                        updateDeductionRemoveButtons();
                    </script>
                    <div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0">
                        <div class="flex-1">
                            <label for="gross" class="block text-gray-700 font-medium mb-1">Gross Amount<br>
                                {{-- <span class="text-xs text-gray-500 font-normal">(Calculated as: (Basic + Earnings) - Deductions)</span> --}}
                            </label>
                            <input type="text" name="gross" id="gross" placeholder="Gross Amount" required
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500 bg-gray-100"
                                readonly>
                            @error('gross')
                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <script>
                            // Calculate gross amount: (basic + earnings) - deductions
                            function calculateGross() {
                                let basic = parseFloat(document.getElementById('basic').value) || 0;
                                let earnings = 0;
                                document.querySelectorAll('#earnings-list input[name^="earnings"][name$="[amount]"]').forEach(function(input) {
                                    earnings += parseFloat(input.value) || 0;
                                });
                                let deductions = 0;
                                document.querySelectorAll('#deductions-list input[name^="deductions"][name$="[amount]"]').forEach(function(input) {
                                    deductions += parseFloat(input.value) || 0;
                                });
                                let gross = (basic + earnings) - deductions;
                                document.getElementById('gross').value = gross.toFixed(2);
                            }

                            // Attach event listeners
                            document.addEventListener('input', function(e) {
                                if (
                                    e.target.matches('#basic') ||
                                    e.target.closest('#earnings-list') && e.target.matches('input[name^="earnings"][name$="[amount]"]') ||
                                    e.target.closest('#deductions-list') && e.target.matches('input[name^="deductions"][name$="[amount]"]')
                                ) {
                                    calculateGross();
                                }
                            });

                            // Initial calculation on page load
                            document.addEventListener('DOMContentLoaded', calculateGross);
                        </script>
                    </div>
                    <div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0">

                        <div class="flex-1">
                        </div>
                        <div class="flex justify-between space-x-2 pt-4">
                            <button type="reset"
                                class="w-1/3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded transition">BACK</button>
                            <button type="reset"
                                class="w-1/3 bg-yellow-200 hover:bg-yellow-300 text-yellow-800 font-semibold py-2 px-4 rounded transition">CLEAR</button>
                            <button type="submit"
                                class="w-1/3 bg-teal-600 hover:bg-teal-700 text-white font-semibold py-2 px-4 rounded transition">SUBMIT</button>
                        </div>
                </form>
                {{-- <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        const empIdInput = document.getElementById('emp-id');
                        const empIdList = document.getElementById('emp-id-list');
                        const empNameInput = document.getElementById('emp-name');
            
                        empIdInput.addEventListener('input', function() {
                            const query = this.value;
            
                            if (query.length > 1) {
                                fetch(`/employees/search?query=${query}`)
                                    .then(response => response.json())
                                    .then(data => {
                                        empIdList.innerHTML = ''; // Clear the list
            
                                        if (data.length) {
                                            data.forEach(emp => {
                                                const option = document.createElement('div');
                                                option.textContent = `${emp.emp_id} - ${emp.emp_name}`;
                                                option.className = 'dropdown-item';
                                                option.dataset.empId = emp.emp_id;
                                                option.dataset.empName = emp.emp_name;
            
                                                empIdList.appendChild(option);
                                            });
                                        } else {
                                            empIdList.innerHTML =
                                                '<div class="dropdown-item">No results found</div>';
                                        }
                                    });
                            } else {
                                empIdList.innerHTML = '';
                            }
                        });
            
                        empIdList.addEventListener('click', function(e) {
                            if (e.target.classList.contains('dropdown-item')) {
                                const empId = e.target.dataset.empId;
                                const empName = e.target.dataset.empName;
            
                                empIdInput.value = empId;
                                empNameInput.value = empName;
            
                                empIdList.innerHTML = ''; // Hide the dropdown
                            }
                        });
            
                        // Hide dropdown when clicking outside
                        document.addEventListener('click', function(e) {
                            if (!empIdList.contains(e.target) && e.target !== empIdInput) {
                                empIdList.innerHTML = '';
                            }
                        });
                    });
                </script> --}}
            </main>
        </div>
    </div>
</body>

</html>
