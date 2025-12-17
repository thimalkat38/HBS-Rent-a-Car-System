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
                                    class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
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
                        <span class="material-icons text-gray-400">people</span>
                        <span class="text-xl font-semibold font-poppins text-gray-900">Customers</span>
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
                <!-- Search Bar -->
                <div class="w-full mb-4 px-8 pt-6">
                    <form method="GET" action="{{ route('customers.index') }}" class="flex items-center gap-4 bg-white p-4 rounded-lg shadow border border-gray-200 max-w-full">
                        <input
                            type="text"
                            name="search"
                            placeholder="Search by Name, NIC & Mobile"
                            value="{{ request('search') }}"
                            class="flex-1 px-4 py-2 rounded-md border border-gray-300 text-gray-700 text-sm font-normal font-['Poppins'] leading-tight bg-white focus:outline-none focus:ring-2 focus:ring-teal-400"
                        />
                        <button type="submit" class="w-10 h-10 flex items-center justify-center bg-teal-500 hover:bg-teal-600 rounded-full transition">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z"/>
                            </svg>
                        </button>
                    </form>
                </div>
                <!-- Table Full Page -->
                <div class="flex-1 w-full px-8 pb-6 flex flex-col overflow-hidden">
                    <div class="flex-1 overflow-auto bg-white rounded-lg shadow border border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-slate-100 sticky top-0 z-10">
                                <tr>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-800 capitalize tracking-tight">#</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-800 capitalize tracking-tight">Customer Name</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-800 capitalize tracking-tight">Contact Number</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-800 capitalize tracking-tight">NIC</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-800 capitalize tracking-tight">Status</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-800 capitalize tracking-tight">Address</th>
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-800 capitalize tracking-tight">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @forelse($customers as $index => $customer)
                                    <tr 
                                        class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-slate-50' }} group hover:bg-teal-50 cursor-pointer" 
                                        onclick="if(event.target.closest('.action-cell'))return; window.location='{{ route('Customer.show', $customer->id) }}';"
                                    >
                                        <td class="px-4 py-3 text-sm text-gray-800">
                                            @if(method_exists($customers, 'currentPage') && method_exists($customers, 'perPage'))
                                                {{ $loop->iteration + ($customers->currentPage() - 1) * $customers->perPage() }}
                                            @else
                                                {{ $loop->iteration }}
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-800">{{ $customer->full_name }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-800">{{ $customer->phone }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-800">{{ $customer->nic }}</td>
                                        <td class="px-4 py-3 text-sm">
                                            @if($customer->status === 'active')
                                                <span class="inline-block px-3 py-1 bg-green-200 rounded-2xl text-center text-lime-800 text-sm leading-tight">Active</span>
                                            @else
                                                <span class="inline-block px-3 py-1 bg-red-200 rounded-2xl text-center text-red-900 text-sm leading-tight">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-800">{{ $customer->address }}</td>
                                        <td class="px-4 py-3 text-sm flex items-center gap-2 action-cell" style="cursor: auto !important;">
                                            {{-- <a href="{{ route('customers.show', $customer->id) }}" class="text-blue-600 hover:underline mr-2">View</a> --}}
                                            <a href="{{ route('customers.edit', $customer->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline ml-2" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">No customers found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <script>
                            // Prevent table row click from firing when clicking inside the .action-cell
                            document.addEventListener('DOMContentLoaded', function() {
                                const actions = document.querySelectorAll('.action-cell a, .action-cell button, .action-cell form');
                                actions.forEach(el => {
                                    el.addEventListener('click', function(e){
                                        e.stopPropagation();
                                    });
                                });
                            });
                        </script>
                    </div>
                    <!-- Pagination -->
                    <div class="w-full flex justify-end mt-4">
                        @if(method_exists($customers, 'links'))
                            {{ $customers->appends(request()->query())->links() }}
                        @endif
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
