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
                            class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
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
                        <span class="material-icons text-gray-400">support_agent</span>
                        <span class="text-xl font-semibold font-poppins text-gray-900">CRM</span>
                        <span class="material-icons text-gray-400">chevron_right</span>
                        <span class="text-xl font-normal text-gray-700">CRMs</span>
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
            <main class="flex-1 w-full overflow-y-auto">
                <div class="container mx-auto px-6 py-6">
                    <!-- Header Section with Add Button -->
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                        <h3 class="text-2xl font-semibold text-slate-800">UPCOMING SCHEDULE</h3>
                        <a href="{{ url('crms/create') }}"
                            class="bg-teal-600 hover:bg-teal-700 text-white font-bold py-2 px-5 rounded-lg transition shadow-md hover:shadow-lg">
                            <span class="material-icons inline-block mr-2 align-middle">add</span>
                            Add Reminder
                        </a>
                    </div>

                    <!-- Filter Section -->
                    <form method="GET" action="{{ route('crms.upcoming') }}" class="mb-6">
                        <div class="bg-white rounded-lg shadow-md p-4">
                            <div class="flex flex-col sm:flex-row gap-3 items-start sm:items-center">
                                <!-- Full Name Filter -->
                                <div class="flex-1 w-full sm:w-auto">
                                    <input type="text" name="full_name" value="{{ request('full_name') }}"
                                        placeholder="Customer Name"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2 text-base focus:outline-none focus:ring-2 focus:ring-teal-400 focus:border-transparent" />
                                </div>
                                <!-- Date Filter -->
                                <div class="w-full sm:w-auto">
                                    <input type="date" name="date" value="{{ request('date') }}"
                                        class="w-full sm:w-auto border border-gray-300 rounded-lg px-4 py-2 text-base focus:outline-none focus:ring-2 focus:ring-teal-400 focus:border-transparent" />
                                </div>
                                <!-- Action Buttons -->
                                <div class="flex gap-2 w-full sm:w-auto">
                                    <button type="submit"
                                        class="flex-1 sm:flex-none bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg px-5 py-2 transition shadow-md hover:shadow-lg">
                                        <span
                                            class="material-icons inline-block mr-1 align-middle text-sm">search</span>
                                        Search
                                    </button>
                                    <a href="{{ route('crms.upcoming') }}"
                                        class="flex-1 sm:flex-none bg-gray-400 hover:bg-gray-500 text-white font-semibold rounded-lg px-5 py-2 transition shadow-md hover:shadow-lg text-center">
                                        <span
                                            class="material-icons inline-block mr-1 align-middle text-sm">clear</span>
                                        Clear
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- CRM Cards Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
                        @forelse ($crms as $crm)
                            <div class="rounded-lg shadow-md hover:shadow-xl p-5 cursor-pointer transition-all duration-300 transform hover:-translate-y-1 {{ $loop->index % 4 == 0
                                ? 'bg-green-50 border-l-4 border-green-500'
                                : ($loop->index % 4 == 1
                                    ? 'bg-orange-50 border-l-4 border-orange-400'
                                    : ($loop->index % 4 == 2
                                        ? 'bg-pink-50 border-l-4 border-pink-400'
                                        : 'bg-purple-50 border-l-4 border-purple-400')) }} relative"
                                data-full_name="{{ $crm->full_name }}" data-phone="{{ $crm->phone }}"
                                data-date="{{ \Carbon\Carbon::parse($crm->date)->format('F j, Y') }}"
                                data-subject="{{ $crm->subject }}" data-note="{{ $crm->note }}"
                                onclick="showDetails(this)">
                                <div class="mb-3">
                                    <h3 class="font-bold text-lg mb-2 text-slate-900 line-clamp-2">{{ $crm->subject }}
                                    </h3>
                                    <p class="text-slate-700 font-medium flex items-center">
                                        <span class="material-icons text-sm mr-1">person</span>
                                        {{ $crm->full_name }}
                                    </p>
                                    <p class="text-slate-700 font-medium flex items-center">
                                        <span class="material-icons text-sm mr-1">event</span>
                                        {{ \Carbon\Carbon::parse($crm->date)->format('F j, Y') }}
                                    </p>
                                </div>
                                <div class="flex gap-2 mt-4 pt-3 border-t border-gray-200">
                                    <a href="{{ route('crms.edit', $crm->id) }}"
                                        class="flex-1 bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-md transition shadow text-sm text-center"
                                        onclick="event.stopPropagation();">
                                        <span class="material-icons inline-block mr-1 align-middle text-sm">edit</span>
                                        Edit
                                    </a>
                                    <form action="{{ route('crms.destroy', $crm->id) }}" method="POST"
                                        class="flex-1 inline" onclick="event.stopPropagation();">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-full bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md transition shadow text-sm"
                                            onclick="return confirm('Are you sure you want to delete this reminder?')">
                                            <span
                                                class="material-icons inline-block mr-1 align-middle text-sm">delete</span>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full">
                                <div class="bg-white rounded-lg shadow-md p-12 text-center">
                                    <span class="material-icons text-gray-400 text-6xl mb-4 block">event_busy</span>
                                    <p class="text-gray-500 text-lg font-medium">No upcoming schedules available.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Details Section -->
                    <div class="mt-8">
                        <div id="details-content" style="display: none;"
                            class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-6 border border-gray-200">
                            <div class="flex justify-between items-center mb-4">
                                <h4 class="text-xl font-semibold text-slate-800">Reminder Details</h4>
                                <button onclick="closeDetails()" class="text-gray-500 hover:text-gray-700 transition">
                                    <span class="material-icons">close</span>
                                </button>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-start">
                                    <span class="material-icons text-teal-600 mr-3 mt-1">person</span>
                                    <div>
                                        <strong class="text-gray-800 block mb-1">Customer Name:</strong>
                                        <span id="details-full_name" class="text-gray-700"></span>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <span class="material-icons text-teal-600 mr-3 mt-1">phone</span>
                                    <div>
                                        <strong class="text-gray-800 block mb-1">Mobile Number:</strong>
                                        <span id="phone" class="text-gray-700"></span>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <span class="material-icons text-teal-600 mr-3 mt-1">event</span>
                                    <div>
                                        <strong class="text-gray-800 block mb-1">Date:</strong>
                                        <span id="details-date" class="text-gray-700"></span>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <span class="material-icons text-teal-600 mr-3 mt-1">subject</span>
                                    <div>
                                        <strong class="text-gray-800 block mb-1">Subject:</strong>
                                        <span id="details-subject" class="text-gray-700"></span>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <span class="material-icons text-teal-600 mr-3 mt-1">note</span>
                                    <div>
                                        <strong class="text-gray-800 block mb-1">Note:</strong>
                                        <span id="details-note" class="text-gray-700"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <script>
                function showDetails(card) {
                    // Extract data attributes from the clicked card
                    const fullName = card.getAttribute('data-full_name');
                    const phone = card.getAttribute('data-phone');
                    const date = card.getAttribute('data-date');
                    const subject = card.getAttribute('data-subject');
                    const note = card.getAttribute('data-note');

                    // Update the details section
                    document.getElementById('details-full_name').innerText = fullName || 'N/A';
                    document.getElementById('phone').innerText = phone || 'N/A';
                    document.getElementById('details-date').innerText = date || 'N/A';
                    document.getElementById('details-subject').innerText = subject || 'N/A';
                    document.getElementById('details-note').innerText = note || 'N/A';

                    // Show the details content with smooth scroll
                    const detailsContent = document.getElementById('details-content');
                    detailsContent.style.display = 'block';
                    detailsContent.scrollIntoView({
                        behavior: 'smooth',
                        block: 'nearest'
                    });
                }

                function closeDetails() {
                    document.getElementById('details-content').style.display = 'none';
                }
            </script>
            <script>
                function disableOtherButton(buttonId) {
                    document.getElementById(buttonId).disabled = true;
                }
            </script>
        </div>
    </div>
</body>

</html>
