<title>Car Rental Management System</title>
<link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="min-h-screen bg-gray-50 flex">
    <!-- Sidebar -->
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
                                class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
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
    <div class="flex-1 flex flex-col">
        <!-- Top Nav -->
        <header class="bg-white shadow h-20 flex items-center px-10 justify-between">
            <div class="flex items-center space-x-4">
                <span class="material-icons text-gray-400">assignment</span>
                <span class="text-xl font-semibold text-slate-900">Bookings</span>
                <span class="material-icons text-gray-400">chevron_right</span>
                <span class="text-xl text-gray-500">Booking History</span>
                <span class="material-icons text-gray-400">chevron_right</span>
                <span class="text-xl text-teal-500">Post Booking</span>
            </div>
            <div class="flex items-center space-x-6">
                <div class="flex items-center space-x-2">
                    <button id="lang-en" class="text-lg font-poppins underline text-gray-700 focus:outline-none"
                        onclick="setLanguage('en')">EN</button>
                    <button id="lang-si" class="text-lg font-poppins text-gray-400 focus:outline-none"
                        onclick="setLanguage('si')">SIN</button>
                </div>
                <script>
                    // Full translation dictionary for all visible UI text
                    const translations = {
                        en: {
                            'Customer Information': 'Customer Information',
                            'Full Name': 'Full Name',
                            'NIC': 'NIC',
                            'Contact Number': 'Contact Number',
                            'Booking Information': 'Booking Information',
                            'Vehicle Model': 'Vehicle Model',
                            'Vehicle Number': 'Vehicle Number',
                            'Price Per Day (LKR)': 'Price Per Day (LKR)',
                            'Expenses': 'Expenses',
                            'P/L Report': 'P/L Report',
                            'Finance': 'Finance',
                            'Inventory': 'Inventory',
                            'CRM': 'CRM',
                            'HRM': 'HRM',
                            'Bookings': 'Bookings',
                            'Booking History': 'Booking History',
                            'Post Booking': 'Post Booking',
                            'Dashboard': 'Dashboard',
                            'Vehicles': 'Vehicles',
                            'Add Vehicle': 'Add Vehicle',
                            'All Vehicles': 'All Vehicles',
                            'Book Vehicle': 'Book Vehicle',
                            'Booking History': 'Booking History',
                            'Completed Businesses': 'Completed Businesses',
                            'Add Customer': 'Add Customer',
                            'List Customer': 'List Customer',
                            'Vehicle Owner Management': 'Vehicle Owner Management',
                            'Expences': 'Expenses',
                            'LogOut': 'LogOut',
                            'Contact No': 'Contact No',
                            // Add more keys as needed for the full UI
                        },
                        si: {
                            'Customer Information': 'පාරිභෝගික තොරතුරු',
                            'Full Name': 'සම්පූර්ණ නම',
                            'NIC': 'ජා.හැ.අංකය',
                            'Contact Number': 'දුරකථන අංකය',
                            'Booking Information': 'වෙන්කිරීම් තොරතුරු',
                            'Vehicle Model': 'වාහන ආකෘතිය',
                            'Vehicle Number': 'වාහන අංකය',
                            'Price Per Day (LKR)': 'දිනකට මිල (රු.)',
                            'Expenses': 'වියදම්',
                            'P/L Report': 'ලාභ/අලාභ වාර්තාව',
                            'Finance': 'මුදල් කළමනාකරණය',
                            'Inventory': 'ඉන්වෙන්ටරි',
                            'CRM': 'පාරිභෝගික කළමනාකරණය',
                            'HRM': 'මානව සම්පත් කළමනාකරණය',
                            'Bookings': 'වෙන්කිරීම්',
                            'Booking History': 'වෙන්කිරීම් ඉතිහාසය',
                            'Post Booking': 'පසු වෙන්කිරීම',
                            'Dashboard': 'උපකරණ පුවරුව',
                            'Vehicles': 'වාහන',
                            'Add Vehicle': 'වාහනයක් එක් කරන්න',
                            'All Vehicles': 'සියලු වාහන',
                            'Book Vehicle': 'වාහනය වෙන්කරන්න',
                            'Booking History': 'වෙන්කිරීම් ඉතිහාසය',
                            'Completed Businesses': 'සම්පූර්ණ කළ ව්‍යාපාර',
                            'Add Customer': 'පාරිභෝගිකයෙකු එක් කරන්න',
                            'List Customer': 'පාරිභෝගික ලැයිස්තුව',
                            'Vehicle Owner Management': 'වාහන හිමිකරු කළමනාකරණය',
                            'Expences': 'වියදම්',
                            'LogOut': 'පිටවීම',
                            'Contact No': 'දුරකථන අංකය',
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
        <!-- Page Content -->
        <main class="flex-1 p-10">
            <form action="{{ route('postbookings.store') }}" method="POST">
                @csrf
                <div class="max-w-7xl mx-auto space-y-8">
                    <div>
                        <label class="block text-sm font-medium text-slate-800 mb-1">Booking ID</label>
                        <input type="text" name="booking_id" id="booking_id"
                            value="{{ $booking->id }}" 
                            class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                            readonly />
                    </div
                    <!-- Customer Information -->
                    <section class="bg-white rounded-2xl shadow p-8">
                        <h2 class="text-xl font-semibold text-slate-900 mb-6">Customer Information</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <input type="hidden" name="id" value="{{ $booking->id }}">
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Full Name</label>
                                <input type="text" name="full_name" id="full_name"
                                    value="{{ $booking->full_name }}"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="Enter full name" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">NIC</label>
                                <input type="text" name="nic" id="nic" value="{{ $booking->nic }}"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="Enter NIC" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Contact Number</label>
                                <input type="text" name="mobile_number" id="mobile_number"
                                    value="{{ $booking->mobile_number }}"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="Enter contact number" />
                            </div>
                        </div>
                    </section>
                    <!-- Booking Information -->
                    <section class="bg-white rounded-2xl shadow p-8">
                        <h2 class="text-xl font-semibold text-slate-900 mb-6">Booking Information</h2>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Vehicle Model</label>
                                <input type="text" name="vehicle" id="vehicle_name"
                                    value="{{ $booking->vehicle_name }}"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="Enter vehicle model" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Vehicle Number</label>
                                <input type="text" name="vehicle_number" id="vehicle_number"
                                    value="{{ $booking->vehicle_number }}"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="Enter vehicle number" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Price Per Day
                                    (LKR)</label>
                                <input type="number" name="price_per_day" id="price_per_day"
                                    value="{{ $booking->price_per_day }}"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="0.00" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Free Tour Per Day
                                    (KM)</label>
                                <input type="number" name="free_kmd" id="free_kmd"
                                    value="{{ $booking->free_kmd }}"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="0" />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">From</label>
                                <input type="date" name="from_date" id="from_date"
                                    value="{{ $booking->from_date }}"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">To</label>
                                <input type="date" name="to_date" id="to_date" value="{{ $booking->to_date }}"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Arrived Date</label>
                                <input type="date" name="ar_date" id="ar_date"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Extended Days</label>
                                <input type="number" name="ex_date" id="ex_date"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="0" readonly />
                            </div>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const toDateInput = document.getElementById('to_date');
                                const arDateInput = document.getElementById('ar_date');
                                const exDateInput = document.getElementById('ex_date');

                                function setArDateMin() {
                                    if (toDateInput.value) {
                                        arDateInput.min = toDateInput.value;
                                    } else {
                                        arDateInput.removeAttribute('min');
                                    }
                                }

                                function calculateExtendedDays() {
                                    const toDateValue = toDateInput.value;
                                    const arDateValue = arDateInput.value;

                                    if (toDateValue && arDateValue) {
                                        const toDate = new Date(toDateValue);
                                        const arDate = new Date(arDateValue);

                                        if (arDate < toDate) {
                                            alert('Arrived Date cannot be before To Date.');
                                            arDateInput.value = '';
                                            exDateInput.value = '';
                                            return;
                                        }

                                        // Calculate difference in days
                                        const diffTime = arDate.getTime() - toDate.getTime();
                                        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                                        exDateInput.value = diffDays;
                                    } else {
                                        exDateInput.value = '';
                                    }
                                }

                                // Set min attribute on page load and when to_date changes
                                setArDateMin();
                                toDateInput.addEventListener('change', function() {
                                    setArDateMin();
                                    // If ar_date is now before to_date, clear it
                                    if (arDateInput.value && arDateInput.value < toDateInput.value) {
                                        arDateInput.value = '';
                                        exDateInput.value = '';
                                    }
                                    calculateExtendedDays();
                                });

                                arDateInput.addEventListener('change', calculateExtendedDays);
                            });
                        </script>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Starting Mileage
                                    (KM)</label>
                                <input type="number" name="start_km" id="start_km"
                                    value="{{ $booking->start_km }}"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="0" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Ending Mileage
                                    (KM)</label>
                                <input type="number" name="end_km" id="end_km"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="0" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Drive Mileage (KM)</label>
                                <input type="number" name="drived" id="drived"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="0" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Free Tour (KM)</label>
                                <input type="number" name="free_km" id="free_km" value="{{ $booking->free_km }}"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="0" />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Over Drive Distance
                                    (KM)</label>
                                <input type="number" name="over" id="over"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="0" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Extra 1KM Charges
                                    (LKR)</label>
                                <input type="number" name="extra_km_chg" id="extra_km_chg"
                                    value="{{ $booking->extra_km_chg }}"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="0.00" />
                            </div>
                        </div>
                    </section>
                    <!-- Billing Information -->
                    <section class="bg-white rounded-2xl shadow p-8">
                        <h2 class="text-xl font-semibold text-slate-900 mb-6">Billing Information</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Before Base Price
                                    (LKR)</label>
                                <input type="number" name="base_price" id="base_price"
                                    value="{{ $booking->price + $booking->payed }}"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="0.00" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Paid Amount (LKR)</label>
                                <input type="number" name="paid" id="payed" value="{{ $booking->payed }}"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="0.00" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Payment Note</label>
                                <input type="text" name="method" value="{{ $booking->method }}"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="Payment note" />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Due Payment <span
                                        class="text-xs font-normal">(Remaining to be pay)</span></label>
                                <input type="number" name="due" id="price" value="{{ $booking->price }}"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="0.00" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Extra Mileage Charges
                                    (LKR)</label>
                                <input type="number" name="extra_km" id="extra_km"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="0.00" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Extra Hour Charges
                                    (LKR)</label>
                                <input type="number"name="extra_hours" id="extra_hours"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="0.00" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Damage Fee (LKR)</label>
                                <input type="number" name="damage_fee" id="damage_fee"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="0.00" />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Other Additional Charges
                                    (LKR)</label>
                                <input type="number" name="after_additional" id="after_additional"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="0.00" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Reason for Additional
                                    Charges</label>
                                <input type="text" name="reason"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="Reason" />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">After Discount Price
                                    (LKR)</label>
                                <input type="number" name="after_discount" id="after_discount"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="0.00" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Total Income (LKR)</label>
                                <input type="number" name="total_income" id="total_income"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="0.00" />
                            </div>
                        </div>
                    </section>
                    <!-- Vehicle Photos When Released -->
                    <section class="bg-white rounded-2xl shadow p-8">
                        <h2 class="text-xl font-semibold text-slate-900 mb-6">Vehicle Photos When Released</h2>
                        <div class="flex space-x-8">
                            @if (!empty($booking->driving_photos))
                                <div class="image-gallery">
                                    @foreach ($booking->driving_photos as $photo)
                                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                                            <img src="{{ asset('storage/' . $photo) }}"
                                                class="img-fluid img-thumbnail gallery-image" alt="Driving Photo">
                                        </div>
                                    @endforeach
                                    <h6>(Click on Image to see in full screen)</h6>
                                </div>

                                <!-- Popup Modal -->
                                <div id="imageModal" class="modal">
                                    <span class="close">&times;</span>
                                    <img class="modal-content" id="modalImage">
                                    <button id="prevButton">&#8249;</button>
                                    <button id="nextButton">&#8250;</button>
                                </div>
                            @else
                                <p class="text-muted">No Images before vehicle release.</p>
                            @endif
                        </div>
                    </section>
                    <!-- Release/Check Info -->
                    <section class="bg-white rounded-2xl shadow p-8">
                        <div
                            class="flex flex-col md:flex-row md:items-center md:space-x-16 space-y-4 md:space-y-0 mb-8">
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="due_paid" value="1"
                                    class="form-checkbox h-5 w-5 text-teal-500 rounded focus:ring-teal-500" />
                                <span class="text-base text-gray-700">Due paid checked</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="deposit_refunded" value="1"
                                    class="form-checkbox h-5 w-5 text-teal-500 rounded focus:ring-teal-500" />
                                <span class="text-base text-gray-700">Due paid checked</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="vehicle_checked" value="1"
                                    class="form-checkbox h-5 w-5 text-teal-500 rounded focus:ring-teal-500" />
                                <span class="text-base text-gray-700">Vehicle</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Released Officer’s
                                    Name</label>
                                <input type="text" name="rel_officer" value="{{ $booking->officer }}"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="Enter name" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Checked Officer’s
                                    Name</label>
                                <input type="text" name="officer"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="Enter name" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-800 mb-1">Agreement Number</label>
                                <input type="text" name="agn"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="Enter agreement number" required />
                            </div>
                            <div style="position: relative;">
                                <label class="block text-sm font-medium text-slate-800 mb-1">1st Commission
                                    Officer</label>
                                <input id="commission" type="text" name="commission" value="{{ $booking->commission }}"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="Enter Commison Agent Name" autocomplete="off"
                                    @if (!empty($booking->commission)) readonly style="background-color: #f8f8f8; cursor: not-allowed;" @endif
                                />
                                <ul id="commission-list" class="list-group"
                                    style="position: absolute; z-index: 10; width: 100%; display: none; background: white; border: 1px solid #ccc; border-radius: 0 0 0.75rem 0.75rem; max-height: 180px; overflow-y: auto;">
                                </ul>
                            </div>
                            <div style="position: relative;">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="commission_amt">1st
                                    Commission
                                    Officer's Amount</label>
                                <input id="commission_amt" name="commission_amt"
                                    value="{{ $booking->commission_amt }}" type="number" min="0"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="Enter commission amount" />
                                <span id="commission_amt_error" style="display:none;color:red;font-size:0.9em;">Amount
                                    required!</span>
                            </div>
                            <div style="position: relative;">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="commission2">2nd
                                    Commission
                                    Officer</label>
                                <input id="commission2" name="commission2" value="{{ $booking->commission2 }}"
                                    type="text"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="Enter commission name" autocomplete="off"
                                    @if (!empty($booking->commission2)) readonly style="background-color: #f8f8f8; cursor: not-allowed;" @endif
                                />
                                <ul id="commission2-list" class="list-group"
                                    style="position: absolute; z-index: 10; width: 100%; display: none; background: white; border: 1px solid #ccc; border-radius: 0 0 0.75rem 0.75rem; max-height: 180px; overflow-y: auto;">
                                </ul>
                            </div>
                            <div style="position: relative;">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="commission_amt2">2nd
                                    Commission
                                    Officer's Amount</label>
                                <input id="commission_amt2" name="commission_amt2"
                                    value="{{ $booking->commission_amt2 }}" type="number" min="0"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="Enter commission amount"
                                    @if (empty($booking->commission2)) readonly style="background-color:#f8f8f8; cursor:not-allowed;" @endif />
                                <span id="commission_amt2_error"
                                    style="display:none;color:red;font-size:0.9em;">Amount
                                    required!</span>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var commission2 = document.getElementById('commission2');
                                    var commissionAmt2 = document.getElementById('commission_amt2');

                                    function toggleCommissionAmt2() {
                                        if (commission2.value.trim() === '') {
                                            commissionAmt2.readOnly = true;
                                            commissionAmt2.style.backgroundColor = '#f8f8f8';
                                            commissionAmt2.style.cursor = 'not-allowed';
                                            commissionAmt2.value = '';
                                        } else {
                                            commissionAmt2.readOnly = false;
                                            commissionAmt2.style.backgroundColor = '';
                                            commissionAmt2.style.cursor = '';
                                        }
                                    }
                                    commission2.addEventListener('input', toggleCommissionAmt2);
                                    // Initial state
                                    toggleCommissionAmt2();
                                });
                            </script>

                            <div style="position: relative;">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="driver_name">Driver
                                    Name</label>
                                <input id="driver_name" name="driver_name" value="{{ $booking->driver_name }}"
                                    type="text"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="Enter driver name" autocomplete="off" @if (!empty($booking->driver_name)) readonly style="background-color: #f8f8f8; cursor: not-allowed;" @endif />
                                <ul id="driver-name-list" class="list-group"
                                    style="position: absolute; z-index: 10; width: 100%; display: none; background: white; border: 1px solid #ccc; border-radius: 0 0 0.75rem 0.75rem; max-height: 180px; overflow-y: auto;">
                                </ul>
                            </div>
                            <div style="position: relative;">
                                <label class="block text-sm font-medium text-gray-700 mb-1"
                                    for="driver_commission_amt">Driver's Commission Amount (LKR)</label>
                                <input id="driver_commission_amt" name="driver_commission_amt"
                                    value="{{ $booking->driver_commission_amt }}" type="number" min="0"
                                    step="any"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="Enter commission amount" autocomplete="off"
                                    @if (empty($booking->driver_name)) readonly style="background-color:#f8f8f8; cursor:not-allowed;" @endif />
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var driverName = document.getElementById('driver_name');
                                    var driverCommissionAmt = document.getElementById('driver_commission_amt');

                                    function toggleDriverCommissionAmt() {
                                        if (driverName.value.trim() === '') {
                                            driverCommissionAmt.readOnly = true;
                                            driverCommissionAmt.style.backgroundColor = '#f8f8f8';
                                            driverCommissionAmt.style.cursor = 'not-allowed';
                                            driverCommissionAmt.value = '';
                                        } else {
                                            driverCommissionAmt.readOnly = false;
                                            driverCommissionAmt.style.backgroundColor = '';
                                            driverCommissionAmt.style.cursor = '';
                                        }
                                    }
                                    driverName.addEventListener('input', toggleDriverCommissionAmt);
                                    // Initial state
                                    toggleDriverCommissionAmt();
                                });
                            </script>
                            <div class="flex items-center gap-2 mt-4">
                                <label class="text-sm font-medium text-gray-700">Hand Over Booking:</label>
                                <span
                                    class="text-base font-semibold {{ $booking->hand_over_booking ? 'text-green-600' : 'text-red-500' }}">
                                    {{ $booking->hand_over_booking ? 'Yes' : 'No' }}
                                </span>
                            </div>

                            {{-- submit 1/0 along with the form --}}
                            <input type="hidden" name="hand_over_booking"
                                value="{{ $booking->hand_over_booking ? 1 : 0 }}">

                            <div style="position: relative;">
                                <label class="block text-sm font-medium text-gray-700 mb-1"
                                    for="location">Location</label>
                                <input id="location" name="location" value="{{ $booking->location }}"
                                    type="text"
                                    class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    placeholder="Enter location" />
                            </div>

                        </div>
                    </section>
                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-4">
                        <button
                            class="px-8 py-3 rounded-3xl border border-red-400 text-red-400 font-semibold hover:bg-red-50 transition">Cancel</button>
                        <button
                            class="px-8 py-3 rounded-3xl bg-teal-500 text-white font-semibold hover:bg-teal-600 transition">Completed</button>
                    </div>
                </div>
            </form>
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const images = document.querySelectorAll('.gallery-image');
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            const closeBtn = document.querySelector('.close');
            const prevButton = document.getElementById('prevButton');
            const nextButton = document.getElementById('nextButton');

            let currentIndex = 0;

            function showImage(index) {
                modal.style.display = 'block';
                modalImage.src = images[index].src;
            }

            images.forEach((image, index) => {
                image.addEventListener('click', () => {
                    currentIndex = index;
                    showImage(currentIndex);
                });
            });

            closeBtn.addEventListener('click', () => {
                modal.style.display = 'none';
            });

            prevButton.addEventListener('click', () => {
                currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1;
                showImage(currentIndex);
            });

            nextButton.addEventListener('click', () => {
                currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0;
                showImage(currentIndex);
            });

            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>

    <script>
        function updateCalculations() {
            const startKm = parseFloat(document.getElementById('start_km').value) || 0;
            const endKm = parseFloat(document.getElementById('end_km').value) || 0;
            const freeKm = parseFloat(document.getElementById('free_km').value) || 0;
            const extraKmChg = parseFloat(document.getElementById('extra_km_chg').value) || 0;

            const additionalCharges = parseFloat(document.getElementById('after_additional').value) || 0;
            const discountPrice = parseFloat(document.getElementById('after_discount').value) || 0;
            const extraHoursCharges = parseFloat(document.getElementById('extra_hours').value) || 0;
            const damageFee = parseFloat(document.getElementById('damage_fee').value) || 0;
            const payed = parseFloat(document.getElementById('payed').value) || 0;

            const basePrice = parseFloat(document.getElementById('base_price').value) || 0;

            // Calculate drived and over
            const drived = endKm - startKm;
            document.getElementById('drived').value = drived;

            const over = drived - freeKm;
            document.getElementById('over').value = over;

            // Calculate extra km charges
            const extraKm = over > 0 ? over * extraKmChg : 0;
            document.getElementById('extra_km').value = extraKm.toFixed(2);

            // Calculate the updated due
            const updatedDue = basePrice - payed + additionalCharges + extraKm + extraHoursCharges + damageFee -
                discountPrice;
            document.getElementById('price').value = updatedDue.toFixed(2);

            // Calculate total income
            const totalIncome = basePrice + additionalCharges + extraKm + extraHoursCharges + damageFee - discountPrice;
            document.getElementById('total_income').value = totalIncome.toFixed(2);
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Set default values
            document.getElementById('after_additional').value = "0";
            document.getElementById('after_discount').value = "0";
            document.getElementById('extra_km').value = "0";
            document.getElementById('extra_hours').value = "0";
            document.getElementById('damage_fee').value = "0";

            const basePrice = parseFloat(document.getElementById('base_price').value) || 0;
            document.getElementById('total_income').value = basePrice.toFixed(2);

            // Add event listeners to recalculate on input
            document.querySelectorAll(
                '#end_km, #after_additional, #after_discount, #extra_km, #extra_hours, #damage_fee').forEach(
                input => {
                    input.addEventListener('input', updateCalculations);
                });

            // Initial calculation
            updateCalculations();
        });
    </script>
    <script>
        document.getElementById('ar_date').addEventListener('change', function() {
            let toDate = document.getElementById('to_date').value;
            let arDate = this.value;
            let exDateField = document.getElementById('ex_date');
            let basePriceField = document.getElementById('base_price');
            let freeKmField = document.getElementById('free_km');
            let freeKmdField = document.getElementById('free_kmd');
            let pricePerDayField = document.getElementById('price_per_day');

            if (toDate && arDate) {
                let toDateObj = new Date(toDate);
                let arDateObj = new Date(arDate);

                let diffTime = arDateObj - toDateObj;
                let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); // Convert milliseconds to days
                let extendedDays = diffDays > 0 ? diffDays : 0; // Ensure no negative values
                exDateField.value = extendedDays;

                if (extendedDays > 0) {
                    let freeKmd = parseFloat(freeKmdField.value) || 0;
                    let pricePerDay = parseFloat(pricePerDayField.value) || 0;
                    let basePrice = parseFloat(basePriceField.value) || 0;
                    let freeKm = parseFloat(freeKmField.value) || 0;

                    // Calculate additional free KM
                    let additionalFreeKm = freeKmd * extendedDays;
                    freeKmField.value = freeKm + additionalFreeKm;

                    // Calculate additional base price
                    let additionalPrice = pricePerDay * extendedDays;
                    basePriceField.value = basePrice + additionalPrice;
                }
            }
            updateCalculations();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function setupEmployeeAutocomplete(inputId, listId) {
                const input = document.getElementById(inputId);
                const list = document.getElementById(listId);

                if (!input || !list) {
                    return;
                }

                const $input = $(input);
                const $list = $(list);

                function applyLockedStyles() {
                    input.style.backgroundColor = '#f8f8f8';
                    input.style.cursor = 'not-allowed';
                }

                function clearLockedStyles() {
                    input.style.backgroundColor = '';
                    input.style.cursor = '';
                }

                function lockInput() {
                    input.readOnly = true;
                    applyLockedStyles();
                }

                function unlockInput() {
                    input.readOnly = false;
                    clearLockedStyles();
                }

                function hideList() {
                    $list.hide();
                }

                if (input.readOnly) {
                    applyLockedStyles();
                } else {
                    clearLockedStyles();
                }

                $input.on('input', function() {
                    if (input.readOnly) {
                        hideList();
                        return;
                    }

                    const query = $input.val().trim();

                    if (!query.length) {
                        hideList();
                        return;
                    }

                    $.ajax({
                        url: '/autocomplete-employees',
                        type: 'GET',
                        data: {
                            term: query
                        },
                        dataType: 'json',
                        success: function(data) {
                            $list.empty();

                            if (Array.isArray(data) && data.length > 0) {
                                data.forEach(function(item) {
                                    const $item = $('<li class="list-group-item px-4 py-2 cursor-pointer hover:bg-teal-100"></li>').text(item);
                                    $item.on('click', function() {
                                        $input.val(item);
                                        hideList();
                                        $input.trigger('input');
                                        $input.trigger('change');
                                        lockInput();
                                    });
                                    $list.append($item);
                                });
                                $list.show();
                            } else {
                                hideList();
                            }
                        },
                        error: hideList
                    });
                });

                $(document).on('click', function(event) {
                    if (!$(event.target).closest($input).length && !$(event.target).closest($list).length) {
                        hideList();
                    }
                });

                if (!input.readOnly) {
                    $input.on('blur', function() {
                        if ($input.val().trim().length > 0) {
                            lockInput();
                        } else {
                            unlockInput();
                        }
                    });
                }
            }

            setupEmployeeAutocomplete('commission', 'commission-list');
            setupEmployeeAutocomplete('commission2', 'commission2-list');
            setupEmployeeAutocomplete('driver_name', 'driver-name-list');
        });
    </script>

</div>
<!-- Material Icons CDN for sidebar icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
