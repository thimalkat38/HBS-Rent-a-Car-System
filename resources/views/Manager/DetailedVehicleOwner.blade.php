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
                                    class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
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
                        <span class="material-icons text-gray-400">directions_car</span>
                        <span class="text-xl font-semibold font-poppins text-gray-900">Vehicle Owners</span>
                        <span class="material-icons text-gray-400">chevron_right</span>
                        <span class="text-xl font-normal text-gray-700">ID: {{ $vehicleOwner->full_name }}</span>
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
            <main class="flex-1 w-full px-6 py-6 flex flex-col h-[calc(100vh-5rem)] overflow-y-auto">
                <div class="w-full max-w-4xl mx-auto">
                    <h1 class="text-2xl font-semibold text-gray-900 text-center mb-6">
                        Vehicle Owner's Details
                    </h1>

                    @if ($vehicleOwner)
                        <section class="bg-white shadow-sm border border-gray-200 rounded-xl p-6 sm:p-8">
                            <h2 class="text-lg font-semibold text-gray-800 mb-6">
                                Information
                            </h2>

                            <dl class="space-y-4">
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                                    <dt class="text-sm font-medium text-gray-500">Full Name</dt>
                                    <dd class="text-sm sm:text-base font-semibold text-gray-900" id="fullName">
                                        {{ $vehicleOwner->title }} {{ $vehicleOwner->full_name }}
                                    </dd>
                                </div>

                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                                    <dt class="text-sm font-medium text-gray-500">Vehicle</dt>
                                    <dd class="text-sm sm:text-base font-semibold text-gray-900" id="vehicle">
                                        {{ $vehicleOwner->vehicle_name }} [{{ $vehicleOwner->vehicle_number }}]
                                    </dd>
                                </div>

                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                                    <dt class="text-sm font-medium text-gray-500">Mobile Number</dt>
                                    <dd class="text-sm sm:text-base text-gray-900" id="mobileNumber">
                                        {{ $vehicleOwner->phone }}
                                    </dd>
                                </div>

                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                                    <dt class="text-sm font-medium text-gray-500">Address</dt>
                                    <dd class="text-sm sm:text-base text-gray-900" id="address">
                                        {{ $vehicleOwner->address }}
                                    </dd>
                                </div>

                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                                    <dt class="text-sm font-medium text-gray-500">Start Date</dt>
                                    <dd class="text-sm sm:text-base text-gray-900" id="start_date">
                                        {{ $vehicleOwner->start_date }}
                                    </dd>
                                </div>

                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                                    <dt class="text-sm font-medium text-gray-500">End Date</dt>
                                    <dd class="text-sm sm:text-base text-gray-900" id="end_date">
                                        {{ $vehicleOwner->end_date ?? 'No end_date exists' }}
                                    </dd>
                                </div>

                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                                    <dt class="text-sm font-medium text-gray-500">Rental Amount</dt>
                                    <dd class="text-sm sm:text-base text-gray-900" id="rental_amnt">
                                        {{ $vehicleOwner->rental_amnt }}
                                    </dd>
                                </div>

                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                                    <dt class="text-sm font-medium text-gray-500">Monthly KM</dt>
                                    <dd class="text-sm sm:text-base text-gray-900" id="monthly_km">
                                        {{ $vehicleOwner->monthly_km }}
                                    </dd>
                                </div>

                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                                    <dt class="text-sm font-medium text-gray-500">Extra KM Charge</dt>
                                    <dd class="text-sm sm:text-base text-gray-900" id="extra_km_chg">
                                        {{ $vehicleOwner->extra_km_chg }}
                                    </dd>
                                </div>

                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                                    <dt class="text-sm font-medium text-gray-500">Bank Account Number</dt>
                                    <dd class="text-sm sm:text-base text-gray-900" id="acc_no">
                                        {{ $vehicleOwner->acc_no }}
                                    </dd>
                                </div>

                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                                    <dt class="text-sm font-medium text-gray-500">Banking Details</dt>
                                    <dd class="text-sm sm:text-base text-gray-900" id="bank_detais">
                                        {{ $vehicleOwner->bank_detais }}
                                    </dd>
                                </div>
                            </dl>

                            <!-- Edit and Delete Buttons -->
                            <div class="mt-8 flex flex-col sm:flex-row gap-3 sm:justify-end">
                                <a href="{{ route('vehicle_owners.edit', $vehicleOwner->id) }}"
                                    class="inline-flex items-center justify-center rounded-lg bg-amber-500 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                                    Edit Vehicle Owner
                                </a>

                                <form action="{{ route('vehicle_owners.destroy', $vehicleOwner->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this vehicle owner?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 w-full sm:w-auto">
                                        Delete Vehicle Owner
                                    </button>
                                </form>
                            </div>
                        </section>
                    @else
                        <p class="text-center text-sm font-medium text-red-600 mt-6">
                            No vehicle owner found.
                        </p>
                    @endif
                </div>
            </main>
        </div>
    </div>
</body>
</html>
