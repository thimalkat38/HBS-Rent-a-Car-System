<head>
    <meta charset="UTF-8">
    <title>{{ $vehicle->vehicle_number }} - Car Rental Management System</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-white min-h-screen">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-slate-900 flex flex-col">
            <div class="flex items-center justify-center h-20">
                <span class="text-white text-4xl font-semibold font-poppins">R</span>
                <span class="text-teal-500 text-4xl font-semibold font-poppins">E</span>
                <span class="text-white text-4xl font-semibold font-poppins">NT CAR</span>
            </div>
            <nav class="flex-1 mt-6">
                <ul class="space-y-1">
                    <!-- ... Sidebar content unchanged ... -->
                    <li>
                        <a href="{{ url('manager/dashboard') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
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
                                <a href="{{ url('addvehicle') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">add_circle_outline</span>
                                    Add Vehicle
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('allvehicles') }}" class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
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
                                <a href="{{ url('addbooking') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">add_circle_outline</span>
                                    Book Hire
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('bookings') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">history</span>
                                    Booking History
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('postbookings') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
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
                                <a href="{{ route('customers.create') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">person_add</span>
                                    Add Customer
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('customers.index') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">list</span>
                                    All Customers
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('hr-management') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                            <span class="material-icons mr-3">badge</span>
                            HRM
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('crms') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                            <span class="material-icons mr-3">support_agent</span>
                            CRM
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('inventory.index') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
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
                                <a href="{{ url('expenses') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">receipt_long</span>
                                    Expenses
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('profit-loss-report') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">bar_chart</span>
                                    P/L Report
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>
        <!-- Main Content -->
        <div class="flex-1 flex flex-col relative">
            <!-- Header -->
            <header class="w-full h-20 bg-white border-b border-gray-200 flex items-center px-8 justify-between" style="margin-left: 0;">
                <div class="flex items-center gap-2">
                    <span class="material-icons text-gray-500">menu</span>
                    <span class="text-neutral-900 text-xl font-semibold font-poppins">Vehicles</span>
                    <span class="material-icons text-gray-400">chevron_right</span>
                    <span class="text-neutral-700 text-xl font-normal font-poppins">Vehicle Details</span>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center gap-4">
                        <button id="lang-en" class="text-neutral-700 text-lg font-normal font-poppins underline focus:outline-none" onclick="setLanguage('en')">EN</button>
                        <button id="lang-si" class="text-neutral-700 text-lg font-normal font-poppins opacity-50 focus:outline-none" onclick="setLanguage('si')">SIN</button>
                    </div>
                    <script>
                        // Translation dictionary for the full UI
                        const translations = {
                            en: {
                                "Vehicles": "Vehicles",
                                "Vehicle Details": "Vehicle Details",
                                "Model Year:": "Model Year:",
                                "Fuel Type:": "Fuel Type:",
                                "Price per day:": "Price per day:",
                                "Engine Number:": "Engine Number:",
                                "Chassis Number:": "Chassis Number:",
                                "LogOut": "LogOut",
                                "Finance": "Finance",
                                "Expenses": "Expenses",
                                "P/L Report": "P/L Report",
                                "HRM": "HRM",
                                "CRM": "CRM",
                                "Inventory": "Inventory",
                                "EN": "EN",
                                "සිං": "SIN",
                                // Add more keys as needed
                            },
                            si: {
                                "Vehicles": "වාහන",
                                "Vehicle Details": "වාහන විස්තර",
                                "Model Year:": "මාදිලි වර්ෂය:",
                                "Fuel Type:": "ඉන්ධන වර්ගය:",
                                "Price per day:": "දිනකට මිල:",
                                "Engine Number:": "එන්ජිම අංකය:",
                                "Chassis Number:": "චැසි අංකය:",
                                "LogOut": "පිටවීම",
                                "Finance": "මුදල් කළමනාකරණය",
                                "Expenses": "වියදම්",
                                "P/L Report": "ලාභ/අලාභ වාර්තාව",
                                "HRM": "මානව සම්පත් කළමනාකරණය",
                                "CRM": "පාරිභෝගික කළමනාකරණය",
                                "Inventory": "ඉන්වෙන්ටරි",
                                "EN": "ඉංග්‍රීසි",
                                "සිං": "සිංහල",
                                // Add more keys as needed
                            }
                        };

                        function setLanguage(lang) {
                            // Update language button styles
                            document.getElementById('lang-en').classList.toggle('underline', lang === 'en');
                            document.getElementById('lang-en').classList.toggle('opacity-50', lang !== 'en');
                            document.getElementById('lang-si').classList.toggle('underline', lang === 'si');
                            document.getElementById('lang-si').classList.toggle('opacity-50', lang !== 'si');

                            // Translate all elements with data-i18n attribute
                            document.querySelectorAll('[data-i18n]').forEach(function(el) {
                                const key = el.getAttribute('data-i18n');
                                if (translations[lang][key]) {
                                    el.textContent = translations[lang][key];
                                }
                            });
                        }

                        // On page load, set default language to English
                        document.addEventListener('DOMContentLoaded', function() {
                            setLanguage('en');
                        });
                    </script>
                    <script>
                        // Immediately translate static UI elements on page load
                        document.addEventListener('DOMContentLoaded', function() {
                            setLanguage('en');
                        });
                    </script>
                    <script>
                        // Helper to mark all static UI text for translation
                        // You must add data-i18n="KEY" to all elements you want to translate.
                        // Example: <span data-i18n="Vehicles">Vehicles</span>
                        //          <span data-i18n="Vehicle Details">Vehicle Details</span>
                        //          <span data-i18n="Model Year:">Model Year:</span>
                        //          etc.
                    </script>
                    <div class="w-7 h-0 border-l border-gray-300 mx-2"></div>
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
            <!-- Main Sections -->
            <main class="flex-1 relative">
                <!-- Top Row: Vehicle Info + Calendar -->
                <div class="flex flex-row gap-4 mt-8 px-8">
                    <!-- Wrap the three sections tightly with no extra space between them -->
                    <div class="flex flex-row gap-4 w-full">
                        <!-- Vehicle Info Card -->
                        <section class="w-[350px] min-w-[300px] bg-gradient-to-br from-black to-slate-900 rounded-2xl border border-gray-200 p-5 flex flex-col gap-3 relative">
                            @if ($vehicle)
                                <div>
                                    <div class="text-white text-3xl font-bold font-poppins">{{ $vehicle->vehicle_number }}</div>
                                    <div class="text-white text-xl font-normal font-poppins mt-1">
                                        {{ $vehicle->vehicle_model }} {{ $vehicle->vehicle_name }} [{{ $vehicle->vehicle_type }}]
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2 mt-2">
                                    <div class="flex items-center">
                                        <span class="text-slate-400 text-xs font-normal font-poppins w-32">Engine Number:</span>
                                        <span class="text-white text-xs font-semibold font-poppins ml-1">{{ $vehicle->engine_number }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-slate-400 text-xs font-normal font-poppins w-32">Chassis Number:</span>
                                        <span class="text-white text-xs font-semibold font-poppins ml-1">{{ $vehicle->chassis_number }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-slate-400 text-xs font-normal font-poppins w-32">Model Year:</span>
                                        <span class="text-white text-xs font-semibold font-poppins ml-1">{{ $vehicle->model_year }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-slate-400 text-xs font-normal font-poppins w-32">Fuel Type:</span>
                                        <span class="text-white text-xs font-semibold font-poppins ml-1">{{ $vehicle->fuel_type }}</span>
                                    </div>
                                </div>
                                <div class="flex flex-row items-center gap-4 mt-3">
                                    <div>
                                        <span class="text-slate-400 text-xs font-normal font-poppins">Price per day:</span>
                                        <span class="text-white text-xs font-semibold font-poppins ml-1">LKR {{ number_format($vehicle->price_per_day, 2) }}</span>
                                    </div>
                                    <div class="w-px h-5 bg-slate-500"></div>
                                    <div>
                                        <span class="text-slate-400 text-xs font-normal font-poppins">Free KM:</span>
                                        <span class="text-white text-xs font-semibold font-poppins ml-1">{{ $vehicle->free_km }}</span>
                                    </div>
                                </div>
                                {{-- <div class="flex flex-row items-center gap-4">
                                    <div>
                                        <span class="text-slate-400 text-xs font-normal font-poppins">Extra KM Charge:</span>
                                        <span class="text-white text-xs font-semibold font-poppins ml-1">LKR {{ number_format($vehicle->extra_km_chg, 2) }}</span>
                                    </div>
                                </div> --}}
                            @else
                                <div class="text-white text-base font-poppins">No vehicle data found.</div>
                            @endif
                            <div class="flex-grow"></div>
                            <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="mt-4 px-2 py-2 bg-blue-500 rounded-3xl text-white text-xs font-semibold font-poppins hover:bg-blue-600 transition text-center w-full self-end">Edit Vehicle Details</a>
                            <a href="{{ route('vehicle.renewDocs', $vehicle->id) }}" 
                               class="mt-4 px-2 py-2 bg-teal-500 rounded-3xl text-white text-xs font-semibold font-poppins hover:bg-teal-600 transition text-center w-full self-end"
                               onclick="return confirmRenewal();">
                                Renew License/Insurance
                            </a>
                            <a href="{{ route('services.index', ['vehicle_number' => $vehicle->vehicle_number]) }}" 
                               class="mt-4 px-2 py-2 bg-red-500 rounded-3xl text-white text-xs font-semibold font-poppins hover:bg-red-600 transition text-center w-full self-end">
                                Log Service
                            </a>
                        </section>
                        <section class="w-80 min-w-[220px]  bg-gray-100 rounded-2xl border border-gray-200 p-5 flex flex-col gap-4">
                            <div>
                                <div class="text-slate-950 text-lg font-medium font-poppins">License & Insurance</div>
                                <div class="h-px bg-zinc-400 my-2"></div>
                            </div>
                            @if ($vehicle)
                            <div class="flex flex-col gap-6">
                                <div>
                                    <div class="text-slate-950 text-xs font-normal font-poppins">Next License Date:</div>
                                    <div class="text-slate-950 text-xl font-semibold font-poppins">
                                        {{ \Carbon\Carbon::parse($vehicle->license_exp_date)->format('jS M Y') }}
                                    </div>
                                </div>
                                <div>
                                    <div class="text-slate-950 text-xs font-normal font-poppins">Next Insurance Date:</div>
                                    <div class="text-slate-950 text-xl font-semibold font-poppins">
                                        {{ \Carbon\Carbon::parse($vehicle->insurance_exp_date)->format('jS M Y') }}
                                    </div>
                                </div>
                                {{-- <a href="{{ route('vehicle.renewDocs', $vehicle->id) }}" class="btn-blue"
                                    onclick="return confirmRenewal();">
                                    Doc Renewed
                                </a> --}}
                                {{-- <a href="{{ route('vehicle.renewDocs', $vehicle->id) }}" 
                                   class="mt-2 px-2 py-2 bg-blue-500 rounded-3xl text-white text-xs font-semibold font-poppins hover:bg-blue-600 transition text-center"
                                   onclick="return confirmRenewal();">
                                    Document Renewed
                                </a> --}}
                                <script>
                                    function confirmRenewal() {
                                        return confirm("Are you sure documents are renewed? Expiry date will be extended by 1 year.");
                                    }
                                </script>
                            </div>
                            @else
                                <div class="text-slate-500 text-base font-poppins">No license/insurance data.</div>
                            @endif
                        </section>
                        <section class="w-80 min-w-[220px] bg-pink-50 rounded-2xl border border-red-400 p-5 flex flex-col gap-7">
                            <div>
                                <div class="text-slate-950 text-lg font-medium font-poppins">Vehicle Service</div>
                                <div class="h-px bg-zinc-400 my-2"></div>
                            </div>
                            <div class="flex flex-col gap-2">
                                <div>
                                    <div class="text-slate-950 text-xs font-normal font-poppins">Next Service Date:</div>
                                    <div class="text-slate-950 text-xl font-semibold font-poppins">
                                        @php
                                            // Find the next service for this vehicle_number
                                            $nextService = \DB::table('services')
                                                ->where('vehicle_number', $vehicle->vehicle_number)
                                                ->orderBy('next_date', 'asc')
                                                ->whereDate('next_date', '>=', now())
                                                ->first();
                                        @endphp
                                        @if($nextService && $nextService->next_date)
                                            {{ \Carbon\Carbon::parse($nextService->next_date)->format('jS M Y') }}
                                        @else
                                            <span class="text-slate-500 text-base font-poppins">No upcoming service date.</span>
                                        @endif
                                    </div>
                                </div>
                                {{-- <a href="{{ route('services.index', ['vehicle_number' => $vehicle->vehicle_number]) }}" class="mt-4 px-2 py-2 bg-teal-500 rounded-3xl text-white text-xs font-semibold font-poppins hover:bg-teal-600 transition text-center">Service Page</a> --}}
                            </div>
                        </section>
                        <!-- Vehicle Image + Calendar -->
                        <section class="flex-1 flex flex-col gap-3 min-w-[300px]">
                            <div class="relative w-full h-80">
                                @php
                                    $images = $vehicle->images ?? [];
                                @endphp
                                @if (!empty($images) && count($images) > 0)
                                    <img 
                                        id="vehicle-image"
                                        class="w-full h-full object-cover rounded-2xl transition-all duration-300"
                                        src="{{ asset('storage/' . $images[0]) }}"
                                        alt="Vehicle"
                                    />
                                    @if(count($images) > 1)
                                        <!-- Navigation Buttons -->
                                        <button 
                                            id="prev-image-btn"
                                            class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white rounded-full p-2 shadow"
                                            onclick="showPrevImage()"
                                            type="button"
                                        >
                                            <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </button>
                                        <button 
                                            id="next-image-btn"
                                            class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white rounded-full p-2 shadow"
                                            onclick="showNextImage()"
                                            type="button"
                                        >
                                            <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>
                                    @endif
                                    <!-- Dots Indicator -->
                                    <div class="absolute left-1/2 -translate-x-1/2 bottom-4 flex items-center gap-2">
                                        @foreach($images as $idx => $img)
                                            <div 
                                                class="transition-all"
                                                id="image-dot-{{ $idx }}"
                                                style="width: {{ $idx == 0 ? '48px' : '10px' }}; height: 10px; border-radius: 9999px; background: {{ $idx == 0 ? '#a1a1aa' : '#fff' }}; border: 1px solid #a1a1aa;"
                                            ></div>
                                        @endforeach
                                    </div>
                                    <script>
                                        const images = @json(array_map(fn($img) => asset('storage/' . $img), $images));
                                        let currentImageIdx = 0;

                                        function updateVehicleImage() {
                                            const img = document.getElementById('vehicle-image');
                                            img.src = images[currentImageIdx];

                                            // Update dots
                                            images.forEach((_, idx) => {
                                                const dot = document.getElementById('image-dot-' + idx);
                                                if (dot) {
                                                    if (idx === currentImageIdx) {
                                                        dot.style.width = '48px';
                                                        dot.style.background = '#a1a1aa';
                                                    } else {
                                                        dot.style.width = '10px';
                                                        dot.style.background = '#fff';
                                                    }
                                                }
                                            });
                                        }

                                        function showPrevImage() {
                                            currentImageIdx = (currentImageIdx - 1 + images.length) % images.length;
                                            updateVehicleImage();
                                        }

                                        function showNextImage() {
                                            currentImageIdx = (currentImageIdx + 1) % images.length;
                                            updateVehicleImage();
                                        }
                                    </script>
                                @else
                                    <img class="w-full h-full object-cover rounded-2xl" src="https://placehold.co/650x430?text=No+Image" alt="No Vehicle Image" />
                                @endif
                            </div>
                            <div class="flex flex-col gap-1">
                                <div class="flex items-center justify-between bg-gray-100 rounded-2xl px-6 py-3 border border-gray-200">
                                    <span class="text-slate-950 text-lg font-medium font-poppins">Booking Calendar</span>
                                    <div class="flex items-center gap-1">
                                        <button class="p-2 bg-white rounded hover:bg-gray-100" onclick="changeMonth(-1)">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </button>
                                        <button class="p-2 bg-white rounded hover:bg-gray-100" onclick="changeMonth(1)">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>
                                        <span id="calendar-month-label" class="text-slate-950 text-lg font-medium font-poppins ml-2"></span>
                                    </div>
                                </div>
                                <div class="bg-gray-100 rounded-2xl border border-gray-200 px-2 py-3 flex flex-col items-center">
                                    <div id="calendar-container" class="w-full"></div>
                                </div>
                            </div>
                            <script>
                                // Get all bookings for this vehicle_number from the backend
                                // We'll pass them as a PHP array to JS
                                @php
                                    $vehicleBookings = \App\Models\Booking::where('vehicle_number', $vehicle->vehicle_number)
                                        ->select('from_date', 'to_date')
                                        ->get();
                                    $bookedDates = [];
                                    foreach ($vehicleBookings as $booking) {
                                        $from = \Carbon\Carbon::parse($booking->from_date);
                                        $to = \Carbon\Carbon::parse($booking->to_date);
                                        for ($date = $from->copy(); $date->lte($to); $date->addDay()) {
                                            $bookedDates[] = $date->format('Y-m-d');
                                        }
                                    }
                                @endphp
                                const bookedDates = @json($bookedDates);

                                const dayNames = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                                const monthNames = [
                                    'January', 'February', 'March', 'April', 'May', 'June',
                                    'July', 'August', 'September', 'October', 'November', 'December'
                                ];

                                // Default to current month/year
                                let today = new Date();
                                let currentMonth = today.getMonth();
                                let currentYear = today.getFullYear();

                                function renderCalendar(year, month) {
                                    const container = document.getElementById('calendar-container');
                                    const monthLabel = document.getElementById('calendar-month-label');
                                    monthLabel.textContent = `${monthNames[month]} ${year}`;

                                    // Get first day of month (0=Sunday, 1=Monday, ...)
                                    const firstDay = new Date(year, month, 1);
                                    // JS: 0=Sunday, 1=Monday, ..., 6=Saturday
                                    let startDay = firstDay.getDay();
                                    // Adjust so Monday is first column
                                    startDay = startDay === 0 ? 6 : startDay - 1;

                                    const daysInMonth = new Date(year, month + 1, 0).getDate();

                                    // Build calendar grid
                                    let html = '<div class="grid grid-cols-7 gap-2 w-full">';
                                    // Day names
                                    for (let i = 0; i < 7; i++) {
                                        html += `<div class="text-center text-black text-xs font-normal font-['Inter'] ${i === 6 ? 'text-red-600' : ''}">${dayNames[i]}</div>`;
                                    }
                                    // Empty cells before first day
                                    for (let i = 0; i < startDay; i++) {
                                        html += `<div></div>`;
                                    }
                                    // Days
                                    for (let day = 1; day <= daysInMonth; day++) {
                                        const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                                        let cellClass = "rounded-lg text-center text-base font-poppins font-medium cursor-default";
                                        let style = "";
                                        if (bookedDates.includes(dateStr)) {
                                            // Booked: green background
                                            cellClass += " bg-green-400 text-white";
                                        } else if (
                                            year === today.getFullYear() &&
                                            month === today.getMonth() &&
                                            day === today.getDate()
                                        ) {
                                            // Today: blue border
                                            cellClass += " border-2 border-blue-500";
                                        } else {
                                            cellClass += " bg-white";
                                        }
                                        html += `<div class="${cellClass}" style="${style}">${day}</div>`;
                                    }
                                    html += '</div>';
                                    container.innerHTML = html;
                                }

                                function changeMonth(delta) {
                                    currentMonth += delta;
                                    if (currentMonth < 0) {
                                        currentMonth = 11;
                                        currentYear--;
                                    } else if (currentMonth > 11) {
                                        currentMonth = 0;
                                        currentYear++;
                                    }
                                    renderCalendar(currentYear, currentMonth);
                                }

                                // Initial render
                                renderCalendar(currentYear, currentMonth);
                            </script>
                        </section>
                    </div>
                </div>
                <!-- Profit Information and Service: tightly wrapped, no extra space -->
                <div class="flex flex-row gap-4 mt-4 px-8">
                    <div class="flex flex-row gap-4 w-full">
                        <section class="flex-1 min-w-[300px] bg-gray-100 rounded-2xl border border-gray-200 p-6 flex flex-col gap-3">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-slate-950 text-lg font-medium font-poppins">Profit Information</span>
                                <div class="flex items-center gap-3">
                                    <div class="flex flex-col items-start">
                                        <label class="text-zinc-400 text-xs font-normal font-poppins">From Date</label>
                                        <input id="from-date" type="date" class="w-32 h-8 px-2 rounded-lg border border-gray-300 bg-white text-black text-xs"
                                            value="{{ request('from_date', '') }}" />
                                    </div>
                                    <span class="text-black text-xs font-semibold font-poppins">To</span>
                                    <div class="flex flex-col items-start">
                                        <label class="text-zinc-400 text-xs font-normal font-poppins">To Date</label>
                                        <input id="to-date" type="date" class="w-32 h-8 px-2 rounded-lg border border-gray-300 bg-white text-black text-xs"
                                            value="{{ request('to_date', '') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white rounded-2xl border border-gray-200 p-4 flex flex-col gap-4">
                                <div class="flex items-baseline justify-between">
                                    <div class="flex items-end gap-2">
                                        <span class="text-gray-700 text-2xl font-normal font-poppins">Total Income:</span>
                                        <span id="total-income" class="text-gray-900 text-2xl font-semibold font-poppins">
                                            LKR {{ isset($vehicleProfit['total_income']) ? number_format($vehicleProfit['total_income'], 2) : '0' }}
                                        </span>
                                        {{-- <span class="px-2 py-1 bg-green-200 rounded text-emerald-600 text-xs font-medium font-poppins ml-2" id="profit-change">
                                            {{ isset($vehicleProfit['profit_change']) ? $vehicleProfit['profit_change'] : '+0%' }}
                                        </span> --}}
                                    </div>
                                    <div class="text-right">
                                        <span class="text-gray-700 text-base font-normal font-poppins">Total Booked days: </span>
                                        <span class="text-gray-900 text-base font-semibold font-poppins" id="total-days">
                                            {{ isset($vehicleProfit['total_days']) ? $vehicleProfit['total_days'] : '0' }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-1 flex flex-col justify-end">
                                    <canvas id="profitChart" class="w-full h-28 mt-4"></canvas>
                                </div>
                            </div>
                        </section>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                const fromDateInput = document.getElementById("from-date");
                                const toDateInput = document.getElementById("to-date");
                                // Use the actual vehicle number from the backend
                                const vehicleNumber = "{{ $vehicle->vehicle_number ?? '' }}";
                                const incomeDisplay = document.getElementById("total-income");
                                const daysDisplay = document.getElementById("total-days");
                                const changeDisplay = document.getElementById("profit-change");

                                const ctx = document.getElementById("profitChart").getContext("2d");
                                const chart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: {!! isset($vehicleProfit['labels']) ? json_encode($vehicleProfit['labels']) : '[]' !!},
                                        datasets: [{
                                            label: 'Daily Income',
                                            data: {!! isset($vehicleProfit['values']) ? json_encode($vehicleProfit['values']) : '[]' !!},
                                            borderColor: 'rgb(34,197,94)',
                                            backgroundColor: 'rgba(34,197,94,0.2)',
                                            tension: 0.3,
                                            fill: true,
                                            pointRadius: 3,
                                            pointBackgroundColor: 'rgb(34,197,94)',
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        plugins: {
                                            legend: { display: false }
                                        },
                                        scales: {
                                            x: { title: { display: true, text: 'Date' }},
                                            y: {
                                                beginAtZero: true,
                                                title: { display: true, text: 'Income (LKR)' },
                                                ticks: { callback: val => `LKR ${val}` }
                                            }
                                        }
                                    }
                                });

                                function fetchProfitData() {
                                    const fromDate = fromDateInput.value;
                                    const toDate = toDateInput.value;

                                    // If both dates are empty, do not fetch
                                    if (!fromDate && !toDate) return;

                                    fetch(`/profit-data?vehicle_number=${vehicleNumber}&from_date=${fromDate}&to_date=${toDate}`)
                                        .then(res => res.json())
                                        .then(data => {
                                            // Update totals
                                            incomeDisplay.innerText = `LKR ${Number(data.total_income).toLocaleString()}`;
                                            daysDisplay.innerText = data.data.length;

                                            // Update chart
                                            const labels = data.data.map(entry => entry.date);
                                            const values = data.data.map(entry => entry.total);
                                            chart.data.labels = labels;
                                            chart.data.datasets[0].data = values;
                                            chart.update();

                                            // Profit % calculation
                                            let change = 0;
                                            if (values.length >= 2 && values[0] != 0) {
                                                change = ((values[values.length - 1] - values[0]) / Math.abs(values[0])) * 100;
                                            }
                                            const changeRounded = change.toFixed(1);
                                            changeDisplay.innerText = `${change > 0 ? '+' : ''}${changeRounded}%`;
                                            changeDisplay.classList.toggle("text-emerald-600", change >= 0);
                                            changeDisplay.classList.toggle("text-red-600", change < 0);
                                            changeDisplay.classList.toggle("bg-green-200", change >= 0);
                                            changeDisplay.classList.toggle("bg-red-200", change < 0);
                                        });
                                }

                                fromDateInput.addEventListener("change", fetchProfitData);
                                toDateInput.addEventListener("change", fetchProfitData);

                                // If there is initial data, do not auto-fetch
                                @if(empty($vehicleProfit['labels']) || empty($vehicleProfit['values']))
                                fetchProfitData();
                                @endif
                            });
                        </script>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>