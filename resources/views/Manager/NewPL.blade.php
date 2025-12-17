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
                                    class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
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
                        <span class="material-icons text-gray-400">bar_chart</span>
                        <span class="text-xl font-semibold font-poppins text-gray-900">Finance</span>
                        <span class="material-icons text-gray-400">chevron_right</span>
                        <span class="text-xl font-normal text-gray-700">P/L Report</span>
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
            <main class="flex-1 w-full px-8 py-8 overflow-y-auto">
                <div class="max-w-7xl mx-auto space-y-6">
                    <!-- Filter Section -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-bold mb-4 text-gray-800">Filter Options</h2>
                        <form method="GET" action="{{ route('profit.loss') }}" id="filterForm">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                                <div>
                                    <label for="filterType" class="block text-gray-700 mb-2 font-semibold">Filter
                                        Type</label>
                                    <select id="filterType" name="filterType"
                                        class="w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 py-2 px-3 transition"
                                        onchange="changeFilter()">
                                        <option value="today"
                                            {{ request('filterType') == 'today' ? 'selected' : '' }}>Today</option>
                                        <option value="this_month"
                                            {{ request('filterType') == 'this_month' ? 'selected' : '' }}>This Month
                                        </option>
                                        <option value="last_month"
                                            {{ request('filterType') == 'last_month' ? 'selected' : '' }}>Last Month
                                        </option>
                                        <option value="total"
                                            {{ request('filterType') == 'total' ? 'selected' : '' }}>Total</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="startDate" class="block text-gray-700 mb-2 font-semibold">Start
                                        Date</label>
                                    <input type="date" id="startDate" name="startDate"
                                        value="{{ request('startDate') }}"
                                        class="w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 py-2 px-3 transition"
                                        onchange="clearDropdownAndSubmit()">
                                </div>
                                <div>
                                    <label for="endDate" class="block text-gray-700 mb-2 font-semibold">End
                                        Date</label>
                                    <input type="date" id="endDate" name="endDate"
                                        value="{{ request('endDate') }}"
                                        class="w-full border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 py-2 px-3 transition"
                                        onchange="clearDropdownAndSubmit()">
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <a href="{{ route('profit.loss') }}"
                                    class="inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                                    Clear Filters
                                </a>
                            </div>
                        </form>
                    </div>

                    <!-- Report Section -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                            <!-- Expenses Section -->
                            <div class="bg-gray-50 rounded-lg p-6">
                                <h2 class="text-xl font-bold mb-4 text-gray-800 border-b-2 border-gray-300 pb-2">
                                    Expenses</h2>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center border-b border-gray-200 py-2">
                                        <span class="text-gray-700">Salary</span>
                                        <span class="font-semibold text-gray-900">RS
                                            {{ number_format($data['advanced_salary'], 2) }}</span>
                                    </div>
                                    <div class="flex justify-between items-center border-b border-gray-200 py-2">
                                        <span class="text-gray-700">Advanced Salary</span>
                                        <span class="font-semibold text-gray-900">RS
                                            {{ number_format($data['salary'], 2) }}</span>
                                    </div>
                                    <div class="flex justify-between items-center border-b border-gray-200 py-2">
                                        <span class="text-gray-700">Vehicle Services</span>
                                        <span class="font-semibold text-gray-900">RS
                                            {{ number_format($data['vehicle_services'], 2) }}</span>
                                    </div>
                                    <div class="flex justify-between items-center border-b border-gray-200 py-2">
                                        <span class="text-gray-700">Vehicle Repair</span>
                                        <span class="font-semibold text-gray-900">RS
                                            {{ number_format($data['vehicle_repair'], 2) }}</span>
                                    </div>
                                    {{-- <div class="flex justify-between items-center border-b border-gray-200 py-2">
                                        <span class="text-gray-700">Vehicle Maintenance</span>
                                        <span class="font-semibold text-gray-900">RS
                                            {{ number_format($data['vehicle_maintenance'], 2) }}</span>
                                    </div> --}}
                                    <div class="flex justify-between items-center border-b border-gray-200 py-2">
                                        <span class="text-gray-700">Vehicle Owner Payment</span>
                                        <span class="font-semibold text-gray-900">RS
                                            {{ number_format($data['vehicle_owner_payment'], 2) }}</span>
                                    </div>
                                    {{-- <div class="flex justify-between items-center border-b border-gray-200 py-2">
                                        <span class="text-gray-700">Fuel Charges</span>
                                        <span class="font-semibold text-gray-900">RS
                                            {{ number_format($data['fuel_chargers'], 2) }}</span>
                                    </div> --}}
                                    <div class="flex justify-between items-center border-b border-gray-200 py-2">
                                        <span class="text-gray-700">Utility Bills</span>
                                        <span class="font-semibold text-gray-900">RS
                                            {{ number_format($data['utility_bills'], 2) }}</span>
                                    </div>
                                    <div class="flex justify-between items-center border-b border-gray-200 py-2">
                                        <span class="text-gray-700">Travel Fees</span>
                                        <span class="font-semibold text-gray-900">RS
                                            {{ number_format($data['travel_fees'], 2) }}</span>
                                    </div>
                                    <div class="flex justify-between items-center border-b border-gray-200 py-2">
                                        <span class="text-gray-700">Office Supplies</span>
                                        <span class="font-semibold text-gray-900">RS
                                            {{ number_format($data['office_supplies'], 2) }}</span>
                                    </div>
                                    <div class="flex justify-between items-center border-b border-gray-200 py-2">
                                        <span class="text-gray-700">Other</span>
                                        <span class="font-semibold text-gray-900">RS
                                            {{ number_format($data['other_income'], 2) }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Income Section -->
                            <div class="bg-gray-50 rounded-lg p-6">
                                <h2 class="text-xl font-bold mb-4 text-gray-800 border-b-2 border-gray-300 pb-2">Income
                                </h2>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center border-b border-gray-200 py-2">
                                        <span class="text-gray-700">Total Income By Rent</span>
                                        <span class="font-semibold text-gray-900">RS
                                            {{ number_format($data['total_income_by_rent'], 2) }}</span>
                                    </div>
                                    <div class="flex justify-between items-center border-b border-gray-200 py-2">
                                        <span class="text-gray-700">Other Income</span>
                                        <span class="font-semibold text-gray-900">RS 0.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Summary Section -->
                        <div class="mt-8 pt-6 border-t-2 border-gray-300">
                            <div class="flex flex-col items-center">
                                <div
                                    class="bg-green-500 text-white px-8 py-4 rounded-lg text-xl font-semibold shadow-lg">
                                    Net Profit: RS {{ number_format($data['net_profit'], 2) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function changeFilter() {
            let form = document.getElementById('filterForm');
            if (form && form.action.includes('logout')) {
                event.preventDefault();
                console.warn("Logout prevented!");
                return;
            }
            document.getElementById('startDate').value = '';
            document.getElementById('endDate').value = '';
            if (form) {
                form.submit();
            }
        }

        function clearDropdownAndSubmit() {
            document.getElementById('filterType').value = '';
            const form = document.getElementById('filterForm');
            if (form) {
                form.submit();
            }
        }
    </script>
</body>

</html>
