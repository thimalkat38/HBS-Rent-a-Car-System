<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Car Rental Management System</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        /* Better styling for jQuery UI autocomplete to match Tailwind look */
        .ui-autocomplete {
            max-height: 16rem;
            overflow-y: auto;
            overflow-x: hidden;
            background-color: #ffffff;
            border-radius: 0.75rem;
            border: 1px solid #e5e7eb;
            box-shadow: 0 10px 15px -3px rgba(15, 23, 42, 0.2),
                0 4px 6px -4px rgba(15, 23, 42, 0.15);
            padding: 0.25rem 0;
            font-size: 0.875rem;
            z-index: 50;
        }

        .ui-menu-item-wrapper {
            padding: 0.5rem 0.75rem;
            color: #111827;
        }

        .ui-menu-item-wrapper.ui-state-active {
            margin: 0;
            border: none;
            background-color: #0d9488;
            color: #ffffff;
        }
    </style>
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
        <div class="flex-1 flex flex-col min-h-screen bg-gray-50 overflow-x-hidden">
            <!-- Header -->
            <header class="w-full h-20 bg-white border-b border-gray-200 flex items-center px-8">
                <div class="w-full flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <span class="material-icons text-gray-400">directions_car</span>
                        <span class="text-xl font-semibold font-poppins text-gray-900">Vehicle Owners</span>
                        <span class="material-icons text-gray-400">chevron_right</span>
                        <span class="text-xl font-normal font-poppins text-gray-900">Add Vehicle Owners</span>
                    </div>>
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
                <div class="w-full max-w-5xl mx-auto">
                    <div class="mb-6">
                        <h1 class="text-2xl font-semibold text-gray-900">Add Vehicle Owner</h1>
                        <p class="text-sm text-gray-500 mt-1">Register a new owner and link their vehicle details.</p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 md:p-8">
                        <form method="POST" action="{{ route('vehicle_owners.store') }}" enctype="multipart/form-data" class="space-y-6">
                            @csrf

                            {{-- error handling --}}
                            @if ($errors->any())
                                <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 mb-2">
                                    <p class="text-sm font-semibold text-red-700 mb-1">There were some problems with your input:</p>
                                    <ul class="list-disc list-inside text-sm text-red-600 space-y-0.5">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Owner Details -->
                            <div>
                                <h2 class="text-sm font-semibold text-gray-700 uppercase tracking-wide mb-3">Owner details</h2>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                                        <select id="title" name="title"
                                            class="block w-full rounded-lg border-gray-300 bg-white py-2.5 px-3 text-sm text-gray-900 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                                            <option value="" disabled selected>Choose title</option>
                                            <option value="Mr">Mr</option>
                                            <option value="Mrs">Mrs</option>
                                        </select>
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Full name</label>
                                        <input type="text" id="full_name" name="full_name" placeholder="Enter full name"
                                            class="block w-full rounded-lg border-gray-300 py-2.5 px-3 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-teal-500 focus:ring-teal-500"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <!-- Vehicle Details -->
                            <div class="pt-2 border-t border-gray-100">
                                <h2 class="text-sm font-semibold text-gray-700 uppercase tracking-wide mb-3">Vehicle details</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="vehicle_number" class="block text-sm font-medium text-gray-700 mb-1">Vehicle number</label>
                                        <input type="text" id="vehicle_number" name="vehicle_number" placeholder="e.g. ABC-1234"
                                            class="block w-full rounded-lg border-gray-300 py-2.5 px-3 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-teal-500 focus:ring-teal-500"
                                            required>
                                    </div>
                                    <div>
                                        <label for="vehicle_name" class="block text-sm font-medium text-gray-700 mb-1">Vehicle name</label>
                                        <input type="text" id="vehicle_name" name="vehicle_name" placeholder="e.g. Toyota Axio"
                                            class="block w-full rounded-lg border-gray-300 py-2.5 px-3 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-teal-500 focus:ring-teal-500">
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Details -->
                            <div class="pt-2 border-t border-gray-100">
                                <h2 class="text-sm font-semibold text-gray-700 uppercase tracking-wide mb-3">Contact details</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Mobile number</label>
                                        <input type="tel" id="phone" name="phone" placeholder="Enter mobile number"
                                            class="block w-full rounded-lg border-gray-300 py-2.5 px-3 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-teal-500 focus:ring-teal-500"
                                            required>
                                    </div>
                                    <div>
                                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                                        <input type="text" id="address" name="address" placeholder="Enter address"
                                            class="block w-full rounded-lg border-gray-300 py-2.5 px-3 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-teal-500 focus:ring-teal-500">
                                    </div>
                                </div>
                            </div>

                            <!-- Contract Period -->
                            <div class="pt-2 border-t border-gray-100">
                                <h2 class="text-sm font-semibold text-gray-700 uppercase tracking-wide mb-3">Contract period</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Start date</label>
                                        <input type="date" id="start_date" name="start_date"
                                            class="block w-full rounded-lg border-gray-300 py-2.5 px-3 text-sm text-gray-900 shadow-sm focus:border-teal-500 focus:ring-teal-500"
                                            required>
                                    </div>
                                    <div>
                                        <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">End date (optional)</label>
                                        <input type="date" id="end_date" name="end_date"
                                            class="block w-full rounded-lg border-gray-300 py-2.5 px-3 text-sm text-gray-900 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                                    </div>
                                </div>
                            </div>

                            <!-- Rental Details -->
                            <div class="pt-2 border-t border-gray-100">
                                <h2 class="text-sm font-semibold text-gray-700 uppercase tracking-wide mb-3">Rental details</h2>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label for="rental_amnt" class="block text-sm font-medium text-gray-700 mb-1">Rental amount</label>
                                        <input type="text" id="rental_amnt" name="rental_amnt" placeholder="Monthly rental"
                                            class="block w-full rounded-lg border-gray-300 py-2.5 px-3 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-teal-500 focus:ring-teal-500"
                                            required>
                                    </div>
                                    <div>
                                        <label for="monthly_km" class="block text-sm font-medium text-gray-700 mb-1">Monthly KM</label>
                                        <input type="text" id="monthly_km" name="monthly_km" placeholder="Allowed KM"
                                            class="block w-full rounded-lg border-gray-300 py-2.5 px-3 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-teal-500 focus:ring-teal-500"
                                            required>
                                    </div>
                                    <div>
                                        <label for="extra_km_chg" class="block text-sm font-medium text-gray-700 mb-1">Extra KM charges</label>
                                        <input type="text" id="extra_km_chg" name="extra_km_chg" placeholder="Rate per extra KM"
                                            class="block w-full rounded-lg border-gray-300 py-2.5 px-3 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-teal-500 focus:ring-teal-500"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <!-- Bank Details -->
                            <div class="pt-2 border-t border-gray-100">
                                <h2 class="text-sm font-semibold text-gray-700 uppercase tracking-wide mb-3">Bank details</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="acc_no" class="block text-sm font-medium text-gray-700 mb-1">Bank account number</label>
                                        <input type="text" id="acc_no" name="acc_no" placeholder="Account number"
                                            class="block w-full rounded-lg border-gray-300 py-2.5 px-3 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-teal-500 focus:ring-teal-500"
                                            required>
                                    </div>
                                    <div>
                                        <label for="bank_detais" class="block text-sm font-medium text-gray-700 mb-1">Bank details</label>
                                        <input type="text" id="bank_detais" name="bank_detais" placeholder="Bank, branch, account name, etc."
                                            class="block w-full rounded-lg border-gray-300 py-2.5 px-3 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-teal-500 focus:ring-teal-500">
                                    </div>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
                                <a href="{{ url()->previous() }}"
                                   class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-1">
                                    Cancel
                                </a>
                                <button type="submit"
                                    class="inline-flex items-center justify-center rounded-lg bg-teal-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-1">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
            <script>
                var input = document.querySelector("#phone");
                window.intlTelInput(input, {
                    initialCountry: "auto",
                    geoIpLookup: function(success, failure) {
                        fetch("https://ipinfo.io", {
                                headers: {
                                    "Accept": "application/json"
                                }
                            })
                            .then(function(resp) {
                                return resp.json();
                            })
                            .then(function(resp) {
                                success(resp.country);
                            })
                            .catch(function() {
                                success("us");
                            });
                    },
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
                });
            </script>
            <script>
                $(document).ready(function() {
                    $("#vehicle_number").autocomplete({
                        source: function(request, response) {
                            $.ajax({
                                url: "{{ url('/get-vehicle-numbers') }}",
                                data: {
                                    query: request.term
                                },
                                dataType: "json",
                                success: function(data) {
                                    // data is an array of { label, value, display_name }
                                    response(data);
                                }
                            });
                        },
                        minLength: 1,
                        select: function(event, ui) {
                            // Set the selected vehicle number
                            $("#vehicle_number").val(ui.item.value);

                            // Fill vehicle name as "model + name"
                            if (ui.item.display_name) {
                                $("#vehicle_name").val(ui.item.display_name);
                            }

                            return false; // prevent default behaviour
                        }
                    });
                });
            </script>
        </div>
    </div>
</body>
</html>
