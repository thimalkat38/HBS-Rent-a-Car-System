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
                        <div class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
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
                        <span class="material-icons text-gray-400">build</span>
                        <span class="text-xl font-semibold font-poppins text-gray-900">
                            Service Management
                            <span class="ml-3 text-base font-normal text-teal-700">
                                {{ isset($vehicle_number) ? '— ' . $vehicle_number : '' }}
                            </span>
                        </span>
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
            <main class="flex-1 w-full px-6 py-6 overflow-y-auto">
                <form action="{{ route('services.store') }}" method="POST" class="w-full bg-white rounded-lg shadow-lg">
                    @csrf
                    <div class="p-6 space-y-6">
                        <div class="text-2xl font-semibold mb-2 text-gray-700">Add Service</div>

                        <div class="flex flex-col md:flex-row gap-4">
                            <input type="text" name="vehicle_number" value="{{ $vehicle_number }}" readonly
                                class="flex-1 px-4 py-2 border rounded bg-gray-100 text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                placeholder="Vehicle Number">
                            <input type="text" name="invoice_number" placeholder="Invoice Number"
                                class="flex-1 px-4 py-2 border rounded text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500">
                            {{-- <input type="text" name="amnt" placeholder="Amount"
                                class="flex-1 px-4 py-2 border rounded text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500"> --}}
                        </div>

                        <div class="flex flex-col md:flex-row gap-4">
                            <select name="type" id="serviceType" required
                                class="flex-1 px-4 py-2 border rounded bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500">
                                <option value="">Service Type</option>
                                <option value="Oil Change">Oil Change</option>
                                <option value="Maintenance">Maintenance</option>
                                <option value="Repair">Repair</option>
                            </select>
                            <input type="text" name="current_mileage" placeholder="Current Mileage"
                                class="flex-1 px-4 py-2 border rounded text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500">
                                <input type="text" name="next_mileage" placeholder="Next Service Mileage"
                                class="flex-1 px-4 py-2 border rounded text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500">
                        </div>

                        <div class="flex flex-col md:flex-row gap-4">
                            <input type="text" name="station" placeholder="Service Station"
                                class="flex-1 px-4 py-2 border rounded text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500">
                            <input type="date" name="date"
                                class="flex-1 px-4 py-2 border rounded text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500">
                        </div>

                        <!-- Service Features Dropdown -->
                        <div class="flex flex-col">
                            <label class="text-gray-700 mb-2 font-medium">Service Features:</label>
                            <div class="relative">
                                <button type="button" id="featuresDropdownBtn" 
                                    class="w-full px-4 py-2 border rounded text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-teal-500 text-left flex justify-between items-center">
                                    <span id="featuresSelectedText">Select Features</span>
                                    <span class="material-icons text-gray-400">keyboard_arrow_down</span>
                                </button>
                                <div id="featuresDropdown" class="hidden absolute z-10 w-full mt-1 bg-white border rounded shadow-lg max-h-60 overflow-y-auto">
                                    <div class="p-2 space-y-2">
                                        <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
                                            <input type="checkbox" name="features[]" value="engine oil" class="rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                                            <span class="text-gray-700">Engine Oil</span>
                                        </label>
                                        <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
                                            <input type="checkbox" name="features[]" value="clutch oil" class="rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                                            <span class="text-gray-700">Clutch Oil</span>
                                        </label>
                                        <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
                                            <input type="checkbox" name="features[]" value="differential oil" class="rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                                            <span class="text-gray-700">Differential Oil</span>
                                        </label>
                                        <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
                                            <input type="checkbox" name="features[]" value="gear oil" class="rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                                            <span class="text-gray-700">Gear Oil</span>
                                        </label>
                                        <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
                                            <input type="checkbox" name="features[]" value="gear oil(auto)" class="rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                                            <span class="text-gray-700">Gear Oil (Auto)</span>
                                        </label>
                                        <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
                                            <input type="checkbox" name="features[]" value="radiator coolant" class="rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                                            <span class="text-gray-700">Radiator Coolant</span>
                                        </label>
                                        <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
                                            <input type="checkbox" name="features[]" value="inverter coolant" class="rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                                            <span class="text-gray-700">Inverter Coolant</span>
                                        </label>
                                        <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
                                            <input type="checkbox" name="features[]" value="battery water" class="rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                                            <span class="text-gray-700">Battery Water</span>
                                        </label>
                                        <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
                                            <input type="checkbox" name="features[]" value="oil filter" class="rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                                            <span class="text-gray-700">Oil Filter</span>
                                        </label>
                                        <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
                                            <input type="checkbox" name="features[]" value="diesel filter" class="rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                                            <span class="text-gray-700">Diesel Filter</span>
                                        </label>
                                        <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
                                            <input type="checkbox" name="features[]" value="air filter" class="rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                                            <span class="text-gray-700">Air Filter</span>
                                        </label>
                                        <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
                                            <input type="checkbox" name="features[]" value="a/c filter" class="rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                                            <span class="text-gray-700">A/C Filter</span>
                                        </label>
                                        <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
                                            <input type="checkbox" name="features[]" value="FR LH/RH caliper lubricant" class="rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                                            <span class="text-gray-700">FR LH/RH Caliper Lubricant</span>
                                        </label>
                                        <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
                                            <input type="checkbox" name="features[]" value="RR LH/RH caliper lubricant" class="rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                                            <span class="text-gray-700">RR LH/RH Caliper Lubricant</span>
                                        </label>
                                        <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
                                            <input type="checkbox" name="features[]" value="HV Battery blower" class="rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                                            <span class="text-gray-700">HV Battery Blower</span>
                                        </label>
                                        <div class="p-2 border-b border-gray-200">
                                            <div class="flex items-center justify-between mb-2">
                                              <span class="text-gray-700 font-medium">Front Brake (KM)</span>
                                              <input
                                                type="number"
                                                name="front_brake_km"
                                                min="0"
                                                step="1"
                                                class="w-28 px-2 py-1 border rounded text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                                placeholder="0"
                                              >
                                            </div>
                                          
                                            <div class="flex items-center justify-between">
                                              <span class="text-gray-700 font-medium">Rear Brake (KM)</span>
                                              <input
                                                type="number"
                                                name="rear_brake_km"
                                                min="0"
                                                step="1"
                                                class="w-28 px-2 py-1 border rounded text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                                placeholder="0"
                                              >
                                            </div>
                                          </div>
                                          
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-4 mt-2">
                            <button type="reset" class="px-6 py-2 rounded bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold">Clear</button>
                            <button type="submit" class="px-6 py-2 rounded bg-teal-600 hover:bg-teal-700 text-white font-semibold">SUBMIT</button>
                        </div>

                        <!-- Service Details Table -->
                        <div>
                            <h2 class="text-xl font-bold mt-6 mb-2 text-gray-800">Service Records for <span class="text-teal-600">{{ $vehicle_number }}</span></h2>
                            <h2 class="mt-1 text-base text-gray-600">Next Oil Change Mileage:
                                <span class="font-medium text-gray-800">{{ $latestService ? $latestService->next_mileage : 'N/A' }}</span>
                            </h2>
                            {{-- <h2 class="mt-1 text-base text-gray-600">Next Oil Change Date:
                                <span class="font-medium text-gray-800">{{ $latestService ? $latestService->next_date : 'N/A' }}</span>
                            </h2> --}}
                        </div>

                        <!-- Filters -->
                        <div class="flex flex-col md:flex-row gap-4 items-end">
                            <div class="flex flex-col flex-1">
                                <label for="startDate" class="text-gray-700 mb-1">Start Date:</label>
                                <input type="date" id="startDate" class="form-control px-4 py-2 border rounded text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500">
                            </div>
                            <div class="flex flex-col flex-1">
                                <label for="endDate" class="text-gray-700 mb-1">End Date:</label>
                                <input type="date" id="endDate" class="form-control px-4 py-2 border rounded text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500">
                            </div>
                            <div class="flex flex-col flex-1">
                                <label for="typeFilter" class="text-gray-700 mb-1">Type:</label>
                                <input type="text" id="typeFilter" class="form-control px-4 py-2 border rounded text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="Filter by Type">
                            </div>
                            <div class="flex flex-col flex-1">
                                <label for="invoiceFilter" class="text-gray-700 mb-1">Invoice No:</label>
                                <input type="text" id="invoiceFilter" class="form-control px-4 py-2 border rounded text-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="Filter by Invoice No">
                            </div>
                        </div>

                        <!-- Clear Button -->
                        <div class="flex mt-4">
                            <button id="clearFilters" type="button"
                                class="px-6 py-2 rounded bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold">Clear Filters</button>
                        </div>

                        <!-- Table -->
                        <div class="overflow-x-auto mt-6 w-full">
                            <table class="w-full divide-y divide-gray-200 border rounded">
                                <thead class="bg-slate-900 text-white">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Date</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">TYPE</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Invoice No</th>
                                        {{-- <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Price</th> --}}
                                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Service Station</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Features</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="serviceTable" class="bg-white divide-y divide-gray-100">
                                    @foreach ($services as $service)
                                        <tr>
                                            <td class="px-4 py-2">{{ $service->date }}</td>
                                            <td class="px-4 py-2">{{ $service->type }}</td>
                                            <td class="px-4 py-2">{{ $service->invoice_number }}</td>
                                            {{-- <td class="px-4 py-2">RS {{ $service->amnt }}</td> --}}
                                            <td class="px-4 py-2">{{ $service->station }}</td>
                                            <td class="px-4 py-2">
                                                @if($service->features && is_array($service->features))
                                                    <div class="flex flex-wrap gap-1">
                                                        @foreach($service->features as $feature)
                                                            <span class="inline-block bg-teal-100 text-teal-800 text-xs px-2 py-1 rounded">{{ $feature }}</span>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <span class="text-gray-400">-</span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-2">
                                                <a href="{{ route('services.download-excel', $service->id) }}" 
                                                   class="inline-flex items-center px-3 py-1 bg-green-600 hover:bg-green-700 text-white text-xs font-medium rounded transition-colors">
                                                    <span class="material-icons text-sm mr-1">download</span>
                                                    Excel
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
      // ====== Basic filters (ensure your HTML has these IDs) ======
      const startDate = document.getElementById("startDate");
      const endDate = document.getElementById("endDate");
      const typeFilter = document.getElementById("typeFilter");
      const invoiceFilter = document.getElementById("invoiceFilter");
      const clearButton = document.getElementById("clearFilters");
  
      // ====== Features dropdown (ensure your HTML has these IDs) ======
      const featuresDropdownBtn = document.getElementById("featuresDropdownBtn");
      const featuresDropdown = document.getElementById("featuresDropdown");
      const featuresSelectedText = document.getElementById("featuresSelectedText");
      const featureCheckboxes = document.querySelectorAll('input[name="features[]"]');
  
      // ====== Brake KM inputs (replace old % inputs in your HTML) ======
      const frontBrakeKmInput = document.querySelector('input[name="front_brake_km"]');
      const rearBrakeKmInput  = document.querySelector('input[name="rear_brake_km"]');
  
      // ---------- Dropdown toggle ----------
      if (featuresDropdownBtn && featuresDropdown) {
        featuresDropdownBtn.addEventListener("click", function (e) {
          e.stopPropagation();
          featuresDropdown.classList.toggle("hidden");
        });
  
        // Close dropdown when clicking outside
        document.addEventListener("click", function (event) {
          const clickInsideBtn = featuresDropdownBtn.contains(event.target);
          const clickInsideMenu = featuresDropdown.contains(event.target);
          if (!clickInsideBtn && !clickInsideMenu) {
            featuresDropdown.classList.add("hidden");
          }
        });
  
        // Close on ESC
        document.addEventListener("keydown", function (e) {
          if (e.key === "Escape") {
            featuresDropdown.classList.add("hidden");
          }
        });
      }
  
      // ---------- Update selected-features pill text ----------
      function updateSelectedFeaturesText() {
        if (!featuresSelectedText) return;
  
        const selectedFeatures = Array.from(featureCheckboxes || [])
          .filter(checkbox => checkbox.checked)
          .map(checkbox => {
            // Assumes the label text is the next sibling of the checkbox
            return checkbox.nextElementSibling ? checkbox.nextElementSibling.textContent.trim() : "";
          })
          .filter(Boolean);
  
        // Add Brake KM if provided
        const frontKm = (document.querySelector('input[name="front_brake_km"]') || {}).value;
        const rearKm  = (document.querySelector('input[name="rear_brake_km"]')  || {}).value;
  
        if (frontKm && Number(frontKm) > 0) selectedFeatures.push(`Front Brake: ${frontKm} km`);
        if (rearKm  && Number(rearKm)  > 0) selectedFeatures.push(`Rear Brake: ${rearKm} km`);
  
        if (selectedFeatures.length === 0) {
          featuresSelectedText.textContent = "Select Features";
        } else if (selectedFeatures.length === 1) {
          featuresSelectedText.textContent = selectedFeatures[0];
        } else {
          featuresSelectedText.textContent = `${selectedFeatures.length} features selected`;
        }
      }
  
      // Bind changes on feature checkboxes
      (featureCheckboxes || []).forEach(function (cb) {
        cb.addEventListener("change", updateSelectedFeaturesText);
      });
  
      // Bind changes on Brake KM inputs
      if (frontBrakeKmInput) frontBrakeKmInput.addEventListener("input", updateSelectedFeaturesText);
      if (rearBrakeKmInput)  rearBrakeKmInput.addEventListener("input",  updateSelectedFeaturesText);
  
      // Initialize selected text once on load
      updateSelectedFeaturesText();
  
      // ---------- Table filtering (by date, type, invoice) ----------
      function safeParseDate(yyyy_mm_dd_or_text) {
        // Try native Date first (works for YYYY-MM-DD)
        const d = new Date(yyyy_mm_dd_or_text);
        return isNaN(d.getTime()) ? null : d;
      }
  
      function filterTable() {
        const startValue = startDate && startDate.value ? safeParseDate(startDate.value) : null;
        const endValue   = endDate   && endDate.value   ? safeParseDate(endDate.value)   : null;
        const typeValue = (typeFilter && typeFilter.value ? typeFilter.value : "").toLowerCase();
        const invoiceValue = (invoiceFilter && invoiceFilter.value ? invoiceFilter.value : "").toLowerCase();
  
        const rows = document.querySelectorAll("#serviceTable tr");
        rows.forEach(row => {
          // Assumes columns: [0]=Date, [1]=Type, [2]=Invoice
          const dateText = row.cells && row.cells[0] ? row.cells[0].textContent.trim() : "";
          const rowDate = dateText ? safeParseDate(dateText) : null;
          const type = row.cells && row.cells[1] ? row.cells[1].textContent.toLowerCase() : "";
          const invoice = row.cells && row.cells[2] ? row.cells[2].textContent.toLowerCase() : "";
  
          // Date range match
          let dateMatch = true;
          if (startValue && rowDate) dateMatch = dateMatch && (rowDate >= startValue);
          if (endValue   && rowDate) dateMatch = dateMatch && (rowDate <= endValue);
          // If row has no date but filters are set, hide it
          if ((startValue || endValue) && !rowDate) dateMatch = false;
  
          const typeMatch = !typeValue || type.includes(typeValue);
          const invoiceMatch = !invoiceValue || invoice.includes(invoiceValue);
  
          row.style.display = (dateMatch && typeMatch && invoiceMatch) ? "" : "none";
        });
      }
  
      // Event listeners for filters
      if (startDate)     startDate.addEventListener("input", filterTable);
      if (endDate)       endDate.addEventListener("input", filterTable);
      if (typeFilter)    typeFilter.addEventListener("input", filterTable);
      if (invoiceFilter) invoiceFilter.addEventListener("input", filterTable);
  
      // Clear Filters
      if (clearButton) {
        clearButton.addEventListener("click", function () {
          if (startDate) startDate.value = "";
          if (endDate) endDate.value = "";
          if (typeFilter) typeFilter.value = "";
          if (invoiceFilter) invoiceFilter.value = "";
          filterTable();
        });
      }
  
      // Initial table filter pass (optional)
      filterTable();
    });
  </script>
  
</html>
