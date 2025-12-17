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
                        <span class="material-icons text-gray-400">assignment</span>
                        <span class="text-xl font-semibold font-poppins text-gray-900">Bookings</span>
                        <span class="material-icons text-gray-400">chevron_right</span>
                        <span class="text-xl font-normal font-poppins text-gray-900">Edit Bookings</span>
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
            <main class="flex-1 w-full px-6 py-6 flex flex-col overflow-y-auto">
                <div class="flex-1 w-full max-w-7xl mx-auto">
                    <form action="{{ route('bookings.update', $booking->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-lg p-8">
                    @csrf
                    @method('PUT')

                    <h1 class="text-2xl font-bold text-gray-700 mb-8 text-center">Edit Booking</h1>

                    <!-- Show Success or Error Messages -->
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" name="full_name" id="full_name" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200"
                                value="{{ old('full_name', $booking->full_name) }}" required>
                            @error('full_name')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="mobile_number" class="block text-sm font-medium text-gray-700 mb-1">Mobile Number</label>
                            <input type="text" name="mobile_number" id="mobile_number" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200"
                                value="{{ old('mobile_number', $booking->mobile_number) }}" required>
                            @error('mobile_number')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="nic" class="block text-sm font-medium text-gray-700 mb-1">NIC</label>
                            <input type="text" name="nic" id="nic" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200"
                                value="{{ old('nic', $booking->nic) }}">
                            @error('nic')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                            <input type="text" name="address" id="address" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200"
                                value="{{ old('address', $booking->address) }}">
                            @error('address')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <input type="hidden" id="daily_free_km"
                        value="{{ $booking->free_kmd / max(\Carbon\Carbon::parse($booking->to_date)->diffInDays($booking->from_date), 1) }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        <div>
                            <label for="from_date" class="block text-sm font-medium text-gray-700 mb-1">From Date</label>
                            <input type="date" name="from_date" id="from_date" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200"
                                value="{{ old('from_date', $booking->from_date) }}" required>
                            @error('from_date')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="to_date" class="block text-sm font-medium text-gray-700 mb-1">To Date</label>
                            <input type="date" name="to_date" id="to_date" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200"
                                value="{{ old('to_date', $booking->to_date) }}" required>
                            @error('to_date')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="booking_time" class="block text-sm font-medium text-gray-700 mb-1">Booking Time</label>
                            <input type="time" name="booking_time" id="booking_time" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200"
                                value="{{ old('booking_time', $booking->booking_time) }}" required>
                            @error('booking_time')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="arrival_time" class="block text-sm font-medium text-gray-700 mb-1">Arrival Time</label>
                            <input type="time" name="arrival_time" id="arrival_time" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200"
                                value="{{ old('arrival_time', $booking->arrival_time) }}" required>
                            @error('arrival_time')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="start_km" class="block text-sm font-medium text-gray-700 mb-1">Starting Milage</label>
                            <input type="text" name="start_km" id="start_km" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200"
                                value="{{ old('start_km', $booking->start_km) }}" required>
                            @error('start_km')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="commissioner" class="block text-sm font-medium text-gray-700 mb-1">Commision Agent</label>
                            <input type="text" name="commissioner" id="commissioner" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200"
                                value="{{ old('commissioner', $booking->commission) }}" required>
                            @error('commissioner')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="free_km" class="block text-sm font-medium text-gray-700 mb-1">Free KM</label>
                            <input type="text" name="free_km" id="free_km" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200"
                                value="{{ old('free_km', $booking->free_km) }}" required>
                            @error('free_km')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        <div>
                            <label for="vehicle_number" class="block text-sm font-medium text-gray-700 mb-1">Vehicle Number</label>
                            <input type="text" id="vehicle_number" name="vehicle_number" list="vehicle_numbers"
                                class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200"
                                placeholder="Enter vehicle number"
                                value="{{ old('vehicle_name', $booking->vehicle_number) }}" maxlength="8"
                                oninput="formatVehicleNumber(this)">
                            @error('vehicle_number')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="vehicle_name" class="block text-sm font-medium text-gray-700 mb-1">Vehicle Name</label>
                            <input type="text" name="vehicle_name" id="vehicle_name" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200"
                                value="{{ old('vehicle_name', $booking->vehicle_name) }}">
                            @error('vehicle_name')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="deposit" class="block text-sm font-medium text-gray-700 mb-1">Deposit</label>
                            <input type="text" name="deposit" id="deposit" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200"
                                value="{{ old('deposit', $booking->deposit) }}">
                            @error('deposit')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="guarantor" class="block text-sm font-medium text-gray-700 mb-1">Guarantor</label>
                            <input type="text" name="guarantor" id="guarantor" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200"
                                value="{{ old('guarantor', $booking->guarantor) }}">
                            @error('guarantor')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="officer" class="block text-sm font-medium text-gray-700 mb-1">Released Officer</label>
                            <input type="text" name="officer" id="officer" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200"
                                value="{{ old('officer', $booking->officer) }}">
                            @error('officer')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        <div>
                            <label for="additional_chagers" class="block text-sm font-medium text-gray-700 mb-1">Additional Charges</label>
                            <input type="text" name="additional_chagers" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200" id="additional_chagers"
                                value="{{ old('additional_chagers', $booking->additional_chagers ?? '0.00') }}">
                            @error('additional_chagers')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="reason" class="block text-sm font-medium text-gray-700 mb-1">Reason For Add Chg</label>
                            <input type="text" name="reason" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200"
                                value="{{ old('reason', $booking->reason) }}">
                            @error('reason')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="discount_price" class="block text-sm font-medium text-gray-700 mb-1">Discount Price</label>
                            <input type="text" name="discount_price" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200" id="discount_price"
                                value="{{ old('discount_price', $booking->discount_price) }}">
                            @error('discount_price')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="payed" class="block text-sm font-medium text-gray-700 mb-1">Paid</label>
                            <input type="text" name="payed" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200" id="payed"
                                value="{{ old('payed', $booking->payed) }}">
                            @error('payed')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="method" class="block text-sm font-medium text-gray-700 mb-1">Payment Note</label>
                            <input type="text" name="method" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200"
                                value="{{ old('method', $booking->method) }}">
                            @error('method')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <input type="hidden" id="price_per_day" value="{{ $booking->price_per_day }}">
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Total Price</label>
                            <input type="text" name="price" class="border rounded w-full p-2 focus:outline-none focus:ring focus:ring-teal-200" id="price"
                                value="{{ old('price', $booking->price) }}" data-original-price="{{ $booking->price }}"
                                data-original-to-date="{{ $booking->to_date }}">
                            @error('price')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <label for="driving_photos" class="block text-sm font-medium text-gray-700 mb-1">Update Driving Photos</label>
                        <input type="file" name="driving_photos[]" id="driving_photos" class="border rounded w-full py-2 px-3 focus:outline-none focus:ring focus:ring-teal-200" multiple>
                        @error('driving_photos')
                            <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mt-6">
                        <label for="nic_photos" class="block text-sm font-medium text-gray-700 mb-1">Update NIC Photos</label>
                        <input type="file" name="nic_photos[]" id="nic_photos" class="border rounded w-full py-2 px-3 focus:outline-none focus:ring focus:ring-teal-200" multiple>
                        @error('nic_photos')
                            <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex justify-between mt-8">
                        <a href="{{ route('bookings.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-6 rounded shadow">Cancel</a>
                        <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-2 px-6 rounded shadow">Update Booking</button>
                    </div>
                    </form>
                </div>
            </main>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const additionalChagers = document.getElementById('additional_chagers');
                    const discountPrice = document.getElementById('discount_price');
                    const payed = document.getElementById('payed');
                    const price = document.getElementById('price');
            
                    // Store the initial values
                    let initialAdditionalChagers = parseFloat(additionalChagers.value) || 0;
                    let initialDiscountPrice = parseFloat(discountPrice.value) || 0;
                    let initialPayed = parseFloat(payed.value) || 0;
                    let initialPrice = parseFloat(price.value) || 0;
            
                    function calculateTotalPrice() {
                        // Get the current values
                        const currentAdditionalChagers = parseFloat(additionalChagers.value) || 0;
                        const currentDiscountPrice = parseFloat(discountPrice.value) || 0;
                        const currentPayed = parseFloat(payed.value) || 0;
            
                        // Calculate the differences
                        const additionalDiff = currentAdditionalChagers - initialAdditionalChagers;
                        const discountDiff = currentDiscountPrice - initialDiscountPrice;
                        const payedDiff = currentPayed - initialPayed;
            
                        // Update the initial values to the current ones
                        initialAdditionalChagers = currentAdditionalChagers;
                        initialDiscountPrice = currentDiscountPrice;
                        initialPayed = currentPayed;
            
                        // Update the price based on the differences
                        let totalPrice = initialPrice + additionalDiff - discountDiff - payedDiff;
            
                        // Update the price field
                        price.value = totalPrice.toFixed(2); // Keep two decimal places
            
                        // Update the initial price to reflect the new total
                        initialPrice = totalPrice;
                    }
            
                    // Attach the calculate function to the input events of the fields
                    additionalChagers.addEventListener('input', calculateTotalPrice);
                    discountPrice.addEventListener('input', calculateTotalPrice);
                    payed.addEventListener('input', calculateTotalPrice);
                });
            </script>
            <script>
                document.getElementById('vehicle_number').addEventListener('change', function() {
                    const vehicleNumber = this.value;
            
                    fetch(`/vehicles/get-details/${vehicleNumber}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.vehicle_name) {
                                document.getElementById('vehicle_name').value =
                                    `${data.vehicle_model} ${data.vehicle_name}`;
                            } else {
                                alert(data.message || 'Vehicle details not found');
                                document.getElementById('vehicle_name').value = '';
                            }
                        })
                        .catch(error => console.error('Error fetching vehicle details:', error));
                });
            </script>
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
            </script>
            <script>
                function updateFreeKMandPrice() {
                    const toDateInput = document.getElementById('to_date').value;
                    const dailyFreeKm = parseFloat(document.getElementById('daily_free_km').value);
                    const freeKmField = document.getElementById('free_km');
            
                    const priceField = document.getElementById('price');
                    const pricePerDay = parseFloat(document.getElementById('price_per_day').value);
                    const originalPrice = parseFloat(priceField.dataset.originalPrice);
                    const originalToDate = new Date(priceField.dataset.originalToDate + 'T00:00:00');
                    const newToDate = new Date(toDateInput + 'T00:00:00');
            
                    if (isNaN(originalToDate.getTime()) || isNaN(newToDate.getTime())) return;
            
                    // ✅ Day difference between NEW to_date and ORIGINAL to_date
                    let dayDifference = Math.ceil((newToDate - originalToDate) / (1000 * 60 * 60 * 24));
            
                    // ✅ Calculate and update price only if date is extended
                    if (dayDifference > 0 && !isNaN(pricePerDay)) {
                        const additionalPrice = dayDifference * pricePerDay;
                        priceField.value = (originalPrice + additionalPrice).toFixed(2);
                    } else {
                        // Reset to original price if date was shortened or unchanged
                        priceField.value = originalPrice.toFixed(2);
                    }
            
                    // ✅ Optional: still update Free KM from from_date to to_date
                    const fromDateInput = document.getElementById('from_date').value;
                    const fromDate = new Date(fromDateInput + 'T00:00:00');
            
                    if (!isNaN(fromDate.getTime()) && !isNaN(newToDate.getTime()) && !isNaN(dailyFreeKm)) {
                        let freeKmDays = Math.ceil((newToDate - fromDate) / (1000 * 60 * 60 * 24));
                        if (freeKmDays < 1) freeKmDays = 1;
                        freeKmField.value = (freeKmDays * dailyFreeKm).toFixed(2);
                    }
                }
            
                document.getElementById('from_date').addEventListener('change', updateFreeKMandPrice);
                document.getElementById('to_date').addEventListener('change', updateFreeKMandPrice);
            </script>
        </div>
    </div>
</body>
</html>
