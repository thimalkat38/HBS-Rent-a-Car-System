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
                            class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
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
            @php
                $bName = \App\Models\Business::where('id', auth()->user()->business_id)->value('b_name');
            @endphp
            <header class="w-full h-20 bg-white border-b border-gray-200 flex items-center px-8">
                <div class="w-full flex justify-between items-center">
                    <div class="flex-1 flex justify-center">
                        <div class="flex items-center gap-2">
                            <span class="text-xl font-semibold font-poppins text-gray-900">{{ $bName }}</span>
                        </div>
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
                <div class="flex flex-col gap-6 p-6">
                    <!-- Welcome and All Bookings Button -->
                    <div class="bg-gradient-to-r from-blue-600 to-slate-800 rounded-xl shadow-lg p-6 flex justify-between items-center text-white mb-2">
                        <div>
                            <h1 class="text-2xl md:text-3xl font-semibold mb-2">Hi! Welcome Back</h1>
                        </div>
                        <a href="{{ route('bookings.index') }}"
                           class="inline-block px-6 py-2 font-semibold bg-white text-blue-700 rounded shadow hover:bg-blue-200 transition">
                            All Bookings
                        </a>
                    </div>

                    <!-- Alerts Section -->
                    <div class="flex flex-col gap-6 md:flex-row md:gap-6">
                        @if ($expiringVehicles->isNotEmpty())
                            <div class="flex-1 bg-red-50 border border-red-200 rounded-2xl shadow-xl p-6 flex flex-col gap-4">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="material-icons text-3xl text-red-600 align-middle">warning</span>
                                    <h3 class="text-lg md:text-xl font-bold text-red-700 tracking-tight">Document Expiry Alert</h3>
                                </div>
                                <ul class="divide-y divide-red-100">
                                    @foreach ($expiringVehicles as $vehicle)
                                        @php
                                            $licenseExpiryDate = \Carbon\Carbon::parse($vehicle->license_exp_date);
                                            $insuranceExpiryDate = \Carbon\Carbon::parse($vehicle->insurance_exp_date);
                                            $today = now();
                                            $licenseDaysLeft = ceil($today->diffInDays($licenseExpiryDate, false));
                                            $insuranceDaysLeft = ceil($today->diffInDays($insuranceExpiryDate, false));
                                        @endphp
                                        @if ($licenseDaysLeft >= 0 && $licenseDaysLeft <= 10)
                                            <li class="py-3 flex items-center gap-2">
                                                <span class="material-icons text-lg text-blue-600 align-middle">directions_car</span>
                                                <span class="font-semibold text-slate-700">{{ $vehicle->vehicle_number }}</span>
                                                <span class="ml-1 text-slate-600">
                                                    <span class="inline px-1 py-0.5 rounded bg-red-200/80 text-red-900 font-semibold">License expires in {{ $licenseDaysLeft }} {{ $licenseDaysLeft == 1 ? 'day' : 'days' }}</span>
                                                    <span class="ml-1 text-xs text-slate-500">(Exp: {{ $licenseExpiryDate->format('d M Y') }})</span>
                                                </span>
                                            </li>
                                        @elseif ($licenseDaysLeft < 0)
                                            <li class="py-3 flex items-center gap-2">
                                                <span class="material-icons text-lg text-blue-600 align-middle">directions_car</span>
                                                <span class="font-semibold text-slate-700">{{ $vehicle->vehicle_number }}</span>
                                                <span class="ml-1">
                                                    <span class="inline px-1 py-0.5 rounded bg-red-500 text-white font-semibold">License Expired {{ abs($licenseDaysLeft) }} {{ abs($licenseDaysLeft) == 1 ? 'day' : 'days' }} ago</span>
                                                    <span class="ml-1 text-xs text-slate-500">(Exp: {{ $licenseExpiryDate->format('d M Y') }})</span>
                                                </span>
                                            </li>
                                        @endif

                                        @if ($insuranceDaysLeft >= 0 && $insuranceDaysLeft <= 10)
                                            <li class="py-3 flex items-center gap-2">
                                                <span class="material-icons text-lg text-blue-600 align-middle">directions_car</span>
                                                <span class="font-semibold text-slate-700">{{ $vehicle->vehicle_number }}</span>
                                                <span class="ml-1 text-slate-600">
                                                    <span class="inline px-1 py-0.5 rounded bg-yellow-200/80 text-yellow-800 font-semibold">Insurance expires in {{ $insuranceDaysLeft }} {{ $insuranceDaysLeft == 1 ? 'day' : 'days' }}</span>
                                                    <span class="ml-1 text-xs text-slate-500">(Exp: {{ $insuranceExpiryDate->format('d M Y') }})</span>
                                                </span>
                                            </li>
                                        @elseif ($insuranceDaysLeft < 0)
                                            <li class="py-3 flex items-center gap-2">
                                                <span class="material-icons text-lg text-blue-600 align-middle">directions_car</span>
                                                <span class="font-semibold text-slate-700">{{ $vehicle->vehicle_number }}</span>
                                                <span class="ml-1">
                                                    <span class="inline px-1 py-0.5 rounded bg-red-500 text-white font-semibold">Insurance Expired {{ abs($insuranceDaysLeft) }} {{ abs($insuranceDaysLeft) == 1 ? 'day' : 'days' }} ago</span>
                                                    <span class="ml-1 text-xs text-slate-500">(Exp: {{ $insuranceExpiryDate->format('d M Y') }})</span>
                                                </span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if ($serviceAlertVehicles->isNotEmpty())
                            <div class="flex-1 bg-yellow-50 border border-yellow-200 rounded-2xl shadow-xl p-6 flex flex-col gap-4">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-2xl text-yellow-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 11l-6 6m0 0a2.121 2.121 0 003 3l6-6m-6 6l3-3m7.071-14.142a2.121 2.121 0 013 3l-3.536 3.536"/>
                                        </svg>
                                    </span>
                                    <h3 class="text-lg md:text-xl font-bold text-yellow-700">Service Alert</h3>
                                </div>
                                <ul class="divide-y divide-yellow-100">
                                    @foreach ($serviceAlertVehicles as $row)
                                        @php
                                            $vehicle = $row['vehicle'];
                                            $service = $row['service'];
                                            $left = (int) $row['mileage_left']; // can be negative
                                            $isOver = $left <= 0;
                                        @endphp

                                        <li class="py-3 flex items-center gap-2 {{ $isOver ? 'font-bold text-red-700' : 'text-yellow-800' }}">
                                            <span class="material-icons text-lg text-blue-600 align-middle">directions_car</span>
                                            <span class="font-semibold">{{ $vehicle->vehicle_number }}</span>
                                            @if ($isOver)
                                                <span class="ml-2 px-2 py-1 rounded bg-red-600 text-white text-xs tracking-wide uppercase animate-pulse">OVERDUE</span>
                                                <span class="ml-2 text-slate-700">Service overdue by <span class="font-semibold">{{ abs($left) }} km</span></span>

                                            @else
                                                <span class="ml-2 text-slate-700">Next service in <span class="font-semibold">{{ $left }} km</span></span>
                                            @endif
                                            <span class="ml-2 text-xs text-gray-500">(Current: {{ (int) $vehicle->current_mileage }} km / Next: {{ (int) $service->next_mileage }} km)</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @php
                            $today = \Carbon\Carbon::today();
                            $limit = \Carbon\Carbon::today()->addDays(3);
                            $handoverBookings = \App\Models\Booking::where('business_id', auth()->user()->business_id)
                                ->where('hand_over_booking', 1)
                                ->whereBetween('to_date', [$today->toDateString(), $limit->toDateString()])
                                ->orderBy('to_date')
                                ->get();
                        @endphp
                        @if ($handoverBookings->isNotEmpty())
                            <div class="flex-1 bg-gradient-to-tr from-blue-100 via-sky-100 to-blue-50 border border-blue-200 rounded-2xl shadow-xl p-6 flex flex-col gap-4">
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="material-icons text-2xl text-sky-700 align-middle">directions_car</span>
                                    <h3 class="text-lg md:text-xl font-bold text-sky-900">Vehicle Pickup Reminders <span class="text-xs font-normal text-sky-600">(next 3 days)</span></h3>
                                </div>
                                <ul class="divide-y divide-blue-100">
                                    @foreach ($handoverBookings as $hb)
                                        <li class="py-3 flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                                            <div class="flex flex-wrap gap-2 items-center">
                                                <span class="rounded bg-sky-700 text-white text-xs font-bold px-2 py-1 mr-1">{{ $hb->driver_name }}</span>
                                                <span class="text-gray-800">to pick up</span>
                                                <span class="font-semibold text-blue-700">{{ $hb->vehicle_number }}</span>
                                                <span class="italic text-slate-600">({{ $hb->vehicle_name }})</span>
                                                <span class="inline px-2 py-1 rounded bg-sky-200/50 text-blue-900">from {{ $hb->location ?? 'specified location' }}</span>
                                                <span class="ml-1 text-slate-700">on</span>
                                                <span class="font-semibold">{{ \Carbon\Carbon::parse($hb->to_date)->format('d M Y') }}</span>
                                                <span class="ml-1">by <span class="text-blue-800 font-bold">{{ $hb->arrival_time }}</span></span>
                                                <span class="ml-2 text-xs text-gray-700">
                                                    <span class="inline-block align-middle material-icons text-base text-sky-600" style="font-size:1em;vertical-align:middle;">phone_iphone</span>
                                                    {{ $hb->mobile_number }}, ID: {{ $hb->id }}
                                                </span>
                                            </div>
                                            <a href="{{ route('bookings.show', ['id' => $hb->id]) }}"
                                               class="mt-2 md:mt-0 ml-0 md:ml-2 inline-block bg-green-600 hover:bg-green-800 text-white font-semibold rounded-lg px-5 py-1.5 text-sm shadow transition-all duration-150">
                                                View
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <!-- Calendar Section -->
                    <div id="calendar" class="bg-white rounded-2xl shadow-lg p-6 mt-6 w-full mx-0 overflow-x-auto border border-slate-100">
                        <div class="flex items-center justify-between mb-5">
                            <a href="{{ route('manager.dashboard', ['month' => $currentMonth - 1, 'year' => $currentYear]) }}#calendar"
                                class="text-blue-500 hover:underline font-semibold px-3 py-2 rounded-lg hover:bg-blue-100 transition flex items-center gap-1">
                                <span class="material-icons text-lg">chevron_left</span>
                                Prev
                            </a>
                            <div class="text-xl md:text-2xl font-bold text-gray-800 tracking-wide">
                                {{ Carbon\Carbon::create($currentYear, $currentMonth)->format('F Y') }}
                            </div>
                            <a href="{{ route('manager.dashboard', ['month' => $currentMonth + 1, 'year' => $currentYear]) }}#calendar"
                                class="text-blue-500 hover:underline font-semibold px-3 py-2 rounded-lg hover:bg-blue-100 transition flex items-center gap-1">
                                Next
                                <span class="material-icons text-lg">chevron_right</span>
                            </a>
                        </div>
                        <div class="grid grid-cols-7 gap-1 text-center font-semibold text-slate-500 mb-2">
                            <div>Sun</div>
                            <div>Mon</div>
                            <div>Tue</div>
                            <div>Wed</div>
                            <div>Thu</div>
                            <div>Fri</div>
                            <div>Sat</div>
                        </div>
                        <div class="grid grid-cols-7 gap-1 min-h-[220px]">
                            @php
                                $daysInMonth = Carbon\Carbon::create($currentYear, $currentMonth)->daysInMonth;
                                $firstDayOfMonth = Carbon\Carbon::create($currentYear, $currentMonth)->startOfMonth()->dayOfWeek;
                                $todayDate = \Carbon\Carbon::today()->toDateString();
                            @endphp

                            <!-- Empty cells for days before the first day of the month -->
                            @for ($i = 0; $i < $firstDayOfMonth; $i++)
                                <div class="bg-gray-50 rounded-2xl h-16"></div>
                            @endfor

                            <!-- Days of the month with tailwind color mapping for booking count -->
                            @for ($i = 1; $i <= $daysInMonth; $i++)
                                @php
                                    $date = Carbon\Carbon::create($currentYear, $currentMonth, $i)->toDateString();
                                    $count = $bookingCounts[$date] ?? 0;
                                    $isToday = $date == $todayDate;
                                    // Color mapping: you can customize breakpoints as needed
                                    if ($count === 0) {
                                        $colorClass = "bg-slate-50 border border-slate-200 text-gray-400";
                                    } elseif ($count <= 3) {
                                        $colorClass = "bg-emerald-50 border border-emerald-100 text-emerald-600";
                                    } elseif ($count <= 6) {
                                        $colorClass = "bg-yellow-50 border border-yellow-200 text-yellow-700";
                                    } elseif ($count <= 10) {
                                        $colorClass = "bg-orange-50 border border-orange-200 text-orange-600";
                                    } else {
                                        $colorClass = "bg-red-100 border border-red-300 text-red-700";
                                    }
                                    $todayRing = $isToday ? "ring-2 ring-blue-400" : "";
                                @endphp
                                <div class="calendar-day flex flex-col items-center justify-center h-16 w-full rounded-2xl shadow-sm cursor-pointer {{$colorClass}} hover:ring-2 hover:ring-blue-400 {{$todayRing}} transition group relative"
                                    data-date="{{ $date }}">
                                    <span class="font-semibold text-base @if($isToday) underline underline-offset-4 @endif">
                                        {{ $i }}
                                    </span>
                                    @if($count > 0)
                                        <span class="text-[11px] px-2 font-medium rounded-full mt-1
                                            @if($count <= 3)
                                                bg-emerald-200 text-emerald-800
                                            @elseif($count <= 6)
                                                bg-yellow-200 text-yellow-900
                                            @elseif($count <= 10)
                                                bg-orange-200 text-orange-900
                                            @else
                                                bg-red-300 text-red-900
                                            @endif
                                        ">
                                            {{ $count }}
                                            {{ \Illuminate\Support\Str::plural('Booking', $count) }}
                                        </span>
                                    @endif
                                    @if($isToday)
                                        <span class="absolute top-1 right-1 text-xs text-blue-500 font-bold">Today</span>
                                    @endif
                                </div>
                            @endfor
                        </div>
                        <div class="flex flex-row flex-wrap gap-3 mt-4 justify-center text-xs">
                            <div class="flex items-center gap-1"><span class="inline-block w-4 h-4 bg-slate-50 border border-slate-200 rounded mr-1"></span>No Bookings</div>
                            <div class="flex items-center gap-1"><span class="inline-block w-4 h-4 bg-emerald-50 border border-emerald-100 rounded mr-1"></span>1&ndash;3</div>
                            <div class="flex items-center gap-1"><span class="inline-block w-4 h-4 bg-yellow-50 border border-yellow-200 rounded mr-1"></span>4&ndash;6</div>
                            <div class="flex items-center gap-1"><span class="inline-block w-4 h-4 bg-orange-50 border border-orange-200 rounded mr-1"></span>7&ndash;10</div>
                            <div class="flex items-center gap-1"><span class="inline-block w-4 h-4 bg-red-100 border border-red-300 rounded mr-1"></span>11+</div>
                            <div class="flex items-center gap-1 text-blue-500"><span class="material-icons text-base align-bottom">circle</span>Today</div>
                        </div>
                    </div>
                    </div>

                    <!-- Booking Modal -->
                    <div id="bookingModal" class="fixed inset-0 z-30 hidden flex items-center justify-center px-3">
                        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"></div>
                        <div class="relative mx-auto w-full max-w-4xl px-0 sm:px-4">
                            <div class="bg-white rounded-2xl shadow-2xl border border-slate-100 my-10 overflow-hidden max-h-[90vh] flex flex-col">
                                <div class="flex items-center justify-between px-6 py-4 bg-gradient-to-r from-blue-700 to-slate-900 text-white">
                                    <div class="flex items-center gap-3">
                                        <span class="material-icons">event_note</span>
                                        <div>
                                            <p class="text-xs uppercase tracking-[0.2em] opacity-80">Booking overview</p>
                                            <h3 class="text-lg font-semibold" id="bookingModalDate">Selected Date</h3>
                                        </div>
                                    </div>
                                    <button type="button" class="close-btn inline-flex items-center justify-center h-9 w-9 rounded-full bg-white/15 hover:bg-white/25 text-white transition">
                                        <span class="material-icons text-2xl">close</span>
                                    </button>
                                </div>
                                <div id="bookingDetails" class="p-6 bg-slate-50 overflow-y-auto">
                                    <div class="flex items-center gap-3 text-slate-600">
                                        <span class="material-icons animate-spin">progress_activity</span>
                                        <p class="text-sm">Loading details...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    // If page was loaded with #calendar, keep the calendar in view after navigation
                    if (window.location.hash === '#calendar') {
                        const calendarSection = document.getElementById('calendar');
                        if (calendarSection) {
                            calendarSection.scrollIntoView({ behavior: 'auto', block: 'start' });
                        }
                    }

                    const modal = document.getElementById('bookingModal');
                    const modalContent = document.getElementById('bookingDetails');
                    const modalDate = document.getElementById('bookingModalDate');
                    const closeModalBtn = document.querySelector('.close-btn');
        
                    document.querySelectorAll('.calendar-day').forEach(day => {
                        day.addEventListener('click', () => {
                            const date = day.getAttribute('data-date');
                            if (date) {
                                modalDate.textContent = new Date(date).toLocaleDateString(undefined, {
                                    weekday: 'long',
                                    year: 'numeric',
                                    month: 'short',
                                    day: 'numeric'
                                });
                                fetch(`/manager/bookings?date=${date}`)
                                    .then(response => response.json())
                                    .then(data => {
                                        const section = (title, subtitle, icon, color, itemsHtml, emptyText) => `
                                            <div class="bg-white border border-slate-100 rounded-xl shadow-sm p-4 flex flex-col gap-3">
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center gap-3">
                                                        <span class="material-icons ${color}">${icon}</span>
                                                        <div>
                                                            <p class="text-xs uppercase tracking-[0.2em] text-slate-400">${subtitle}</p>
                                                            <h4 class="text-base font-semibold text-slate-800">${title}</h4>
                                                        </div>
                                                    </div>
                                                    <span class="text-xs px-2 py-1 rounded-full ${itemsHtml ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500'}">
                                                        ${itemsHtml ? 'Vehicles' : 'None'}
                                                    </span>
                                                </div>
                                                <div class="divide-y divide-slate-100">
                                                    ${itemsHtml || `<p class="text-sm text-slate-500">${emptyText}</p>`}
                                                </div>
                                            </div>
                                        `;

                                        const listItems = (arr, formatter) => arr.map(item => `
                                            <div class="py-2 flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                                                <div class="flex flex-wrap items-center gap-2 text-slate-800">
                                                    ${formatter(item)}
                                                </div>
                                            </div>
                                        `).join('');

                                        const outList = listItems(data.in_bookings || [], b => `
                                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-blue-50 text-blue-700 text-sm font-semibold">${b.vehicle_number}</span>
                                            <span class="text-sm text-slate-600">${b.vehicle_name}</span>
                                            <span class="text-xs text-slate-500">Pickup: <span class="font-semibold text-slate-800">${b.booking_time}</span></span>
                                        `);

                                        const inList = listItems(data.out_bookings || [], b => `
                                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-emerald-50 text-emerald-700 text-sm font-semibold">${b.vehicle_number}</span>
                                            <span class="text-sm text-slate-600">${b.vehicle_name}</span>
                                            <span class="text-xs text-slate-500">Return: <span class="font-semibold text-slate-800">${b.arrival_time}</span></span>
                                        `);

                                        const availableList = listItems(data.available_vehicles || [], v => `
                                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-indigo-50 text-indigo-700 text-sm font-semibold">${v.vehicle_number}</span>
                                            <span class="text-sm text-slate-600">${v.vehicle_name}</span>
                                        `);

                                        const serviceList = listItems((data.in_service_vehicles || []), v => `
                                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-amber-50 text-amber-700 text-sm font-semibold">${v.vehicle_number}</span>
                                            <span class="text-sm text-slate-600">${v.vehicle_name}</span>
                                            <span class="text-xs text-amber-700">In service</span>
                                        `);

                                        modalContent.innerHTML = `
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                ${section('Outbound', 'Vehicles going out', 'north_east', 'text-blue-600', outList, 'No vehicles are booked to go out on this day.')}
                                                ${section('Inbound', 'Vehicles returning', 'south_west', 'text-emerald-600', inList, 'No vehicles return on this day.')}
                                                ${section('Available Vehicles', 'Ready to allocate', 'directions_car', 'text-indigo-600', availableList, 'No vehicles available on this day.')}
                                                ${section('Unavailable', 'In service or blocked', 'build', 'text-amber-600', serviceList, 'No vehicles are marked as in service.')}
                                            </div>
                                        `;
                                        modal.classList.remove('hidden');
                                    })
                                    .catch(error => {
                                        modalContent.innerHTML = `
                                            <div class="flex items-center gap-3 text-red-600">
                                                <span class="material-icons">error_outline</span>
                                                <p class="text-sm">Error loading bookings.</p>
                                            </div>`;
                                        console.error(error);
                                    });
                            }
                        });
                    });
        
                    closeModalBtn.addEventListener('click', () => {
                        modal.classList.add('hidden');
                    });
                });
            </script>
        </div>
    </div>
</body>
</html>
