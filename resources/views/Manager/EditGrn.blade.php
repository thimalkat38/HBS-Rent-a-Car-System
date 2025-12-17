<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Rental Management System</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="min-h-screen bg-white flex">
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
                            <span data-translate="Dashboard">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center px-6 py-3 text-white font-semibold rounded-l-full cursor-default">
                            <span class="material-icons mr-3">directions_car</span>
                            <span data-translate="Vehicles">Vehicles</span>
                        </div>
                        <ul class="ml-8 space-y-1">
                            <li>
                                <a href="{{ url('addvehicle') }}"
                                   class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">add_circle_outline</span>
                                    <span data-translate="Add Vehicle">Add Vehicle</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('allvehicles') }}"
                                   class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">list_alt</span>
                                    <span data-translate="All Vehicles">All Vehicles</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('vehicle_owners') }}"
                                   class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">people_outline</span>
                                    <span data-translate="Vehicle Owners">Vehicle Owners</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="flex items-center px-6 py-3 text-white font-semibold rounded-l-full cursor-default">
                            <span class="material-icons mr-3">assignment</span>
                            <span data-translate="Bookings">Bookings</span>
                        </div>
                        <ul class="ml-8 space-y-1">
                            <li>
                                <a href="{{ url('addbooking') }}"
                                   class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">add_circle_outline</span>
                                    <span data-translate="Book Vehicle">Book Vehicle</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('bookings') }}"
                                   class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">history</span>
                                    <span data-translate="Booking History">Booking History</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('postbookings') }}"
                                   class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">check_circle_outline</span>
                                    <span data-translate="Completed Businesses">Completed Businesses</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="flex items-center px-6 py-3 text-white font-semibold rounded-l-full cursor-default">
                            <span class="material-icons mr-3">people</span>
                            <span data-translate="Customers">Customers</span>
                        </div>
                        <ul class="ml-8 space-y-1">
                            <li>
                                <a href="{{ route('customers.create') }}"
                                   class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">person_add</span>
                                    <span data-translate="Add Customer">Add Customer</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('customers.index') }}"
                                   class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">list</span>
                                    <span data-translate="All Customers">All Customers</span>
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
                            <span data-translate="CRM">CRM</span>
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
                                   class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
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
                            <span data-translate="Finance">Finance</span>
                        </div>
                        <ul class="ml-8 space-y-1">
                            <li>
                                <a href="{{ url('expenses') }}"
                                   class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">receipt_long</span>
                                    <span data-translate="Expenses">Expenses</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('profit-loss-report') }}"
                                   class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">bar_chart</span>
                                    <span data-translate="P/L Report">P/L Report</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col min-h-screen">
            <!-- Header -->
            <header class="w-full bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <span class="text-xl font-semibold text-gray-900" data-translate="Edit GRN">Edit GRN</span>
                    <span class="text-xl font-normal text-gray-700" data-translate="Item">Item: {{ $inventory->it_name }}</span>
                </div>
                <div class="flex items-center gap-8">
                    <div class="flex gap-2">
                        <button type="button" id="lang-en"
                                class="text-lg font-normal text-neutral-700 transition focus:outline-none underline"
                                onclick="setLanguage('en')">EN</button>
                        <button type="button" id="lang-si"
                                class="text-lg font-normal text-neutral-700 opacity-50 transition focus:outline-none"
                                onclick="setLanguage('si')">SIN</button>
                    </div>
                    <div class="card1-content">
                        <form method="POST" class="btn1-submit" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-gray-900 transition">
                                <span data-translate="LogOut">LogOut</span>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 p-8 bg-gray-50 overflow-y-auto">
                <div class="max-w-6xl mx-auto">
                    <div class="bg-white rounded-2xl shadow p-6 border border-gray-200">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-semibold text-gray-800" data-translate="Edit GRN">Edit GRN {{ $grn->grn_id }}</h2>
                            <a href="{{ route('inventory.batches', $inventory->id) }}"
                               class="h-12 px-6 bg-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-300 transition flex items-center justify-center">
                                <span data-translate="BACK">BACK</span>
                            </a>
                        </div>

                        @if (session('success'))
                            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('inventory.update-grn', [$inventory->id, $grn->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Supplier Selection -->
                                <div>
                                    <label for="supplier_id" class="block text-sm font-medium text-gray-700" data-translate="Supplier">Supplier</label>
                                    <select name="supplier_id" id="supplier_id"
                                            class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring-teal-500 focus:border-teal-500 supplier-select"
                                            required>
                                        <option value="">Select a supplier...</option>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}"
                                                    {{ old('supplier_id', $grn->supplier_id) == $supplier->id ? 'selected' : '' }}>
                                                {{ $supplier->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('supplier_id')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Date -->
                                <div>
                                    <label for="date" class="block text-sm font-medium text-gray-700" data-translate="Date">Date</label>
                                    <input type="date" name="date" id="date" value="{{ old('date', $grn->date->format('Y-m-d')) }}"
                                           class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring-teal-500 focus:border-teal-500"
                                           required>
                                    @error('date')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Reference No -->
                                <div>
                                    <label for="reference_no" class="block text-sm font-medium text-gray-700" data-translate="Reference No">Reference No</label>
                                    <input type="text" name="reference_no" id="reference_no" value="{{ old('reference_no', $grn->reference_no) }}"
                                           class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring-teal-500 focus:border-teal-500">
                                    @error('reference_no')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Total GRN Value -->
                                <div>
                                    <label for="total_grn_value" class="block text-sm font-medium text-gray-700" data-translate="Total GRN Value">Total GRN Value</label>
                                    <input type="number" name="total_grn_value" id="total_grn_value" value="{{ old('total_grn_value', $grn->total_grn_value) }}"
                                           step="0.01" min="0"
                                           class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring-teal-500 focus:border-teal-500"
                                           required>
                                    @error('total_grn_value')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Paid Value -->
                                <div>
                                    <label for="paid_value" class="block text-sm font-medium text-gray-700" data-translate="Paid Value">Paid Value</label>
                                    <input type="number" name="paid_value" id="paid_value" value="{{ old('paid_value', $grn->paid_value) }}"
                                           step="0.01" min="0"
                                           class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring-teal-500 focus:border-teal-500">
                                    @error('paid_value')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Quantity -->
                                <div>
                                    <label for="quantity" class="block text-sm font-medium text-gray-700" data-translate="Quantity">Quantity</label>
                                    <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $grn->items->first()->quantity) }}"
                                           min="1"
                                           class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring-teal-500 focus:border-teal-500"
                                           required>
                                    @error('quantity')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Price Per Unit -->
                                <div>
                                    <label for="price_per_unit" class="block text-sm font-medium text-gray-700" data-translate="Price Per Unit">Price Per Unit</label>
                                    <input type="number" name="price_per_unit" id="price_per_unit" value="{{ old('price_per_unit', $grn->items->first()->price_per_unit) }}"
                                           step="0.01" min="0"
                                           class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring-teal-500 focus:border-teal-500"
                                           required>
                                    @error('price_per_unit')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Notes -->
                                <div class="md:col-span-2">
                                    <label for="notes" class="block text-sm font-medium text-gray-700" data-translate="Notes">Notes</label>
                                    <textarea name="notes" id="notes"
                                              class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring-teal-500 focus:border-teal-500"
                                              rows="4">{{ old('notes', $grn->notes) }}</textarea>
                                    @error('notes')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end">
                                <button type="submit"
                                        class="h-12 px-6 bg-teal-500 text-white rounded-xl font-semibold hover:bg-teal-600 transition">
                                    <span data-translate="Update GRN">Update GRN</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- JavaScript for Translations -->
    <script>
        const translations = {
            en: {
                'Edit GRN': 'Edit GRN',
                'Item': 'Item',
                'Supplier Name': 'Supplier Name',
                'Date': 'Date',
                'Reference No': 'Reference No',
                'Total GRN Value': 'Total GRN Value',
                'Paid Value': 'Paid Value',
                'Quantity': 'Quantity',
                'Price Per Unit': 'Price Per Unit',
                'Notes': 'Notes',
                'Update GRN': 'Update GRN',
                'BACK': 'BACK',
                'Dashboard': 'Dashboard',
                'Vehicles': 'Vehicles',
                'Add Vehicle': 'Add Vehicle',
                'All Vehicles': 'All Vehicles',
                'Vehicle Owners': 'Vehicle Owners',
                'Bookings': 'Bookings',
                'Book Vehicle': 'Book Vehicle',
                'Booking History': 'Booking History',
                'Completed Businesses': 'Completed Businesses',
                'Customers': 'Customers',
                'Add Customer': 'Add Customer',
                'All Customers': 'All Customers',
                'HRM': 'HRM',
                'CRM': 'CRM',
                'Inventory': 'Inventory',
                'All Items': 'All Items',
                'Add Item': 'Add Item',
                'Add Stock': 'Add Stock',
                'Issue Items': 'Issue Items',
                'Issued Items': 'Issued Items',
                'Finance': 'Finance',
                'Expenses': 'Expenses',
                'P/L Report': 'P/L Report',
                'LogOut': 'LogOut'
            },
            si: {
                // Add Sinhala translations if needed
            }
        };

        function setLanguage(lang) {
            document.querySelectorAll('[data-translate]').forEach(element => {
                const key = element.getAttribute('data-translate');
                element.textContent = translations[lang][key] || key;
            });
            document.getElementById('lang-en').classList.toggle('underline', lang === 'en');
            document.getElementById('lang-en').classList.toggle('opacity-50', lang !== 'en');
            document.getElementById('lang-si').classList.toggle('underline', lang === 'si');
            document.getElementById('lang-si').classList.toggle('opacity-50', lang !== 'si');
        }

        // Set default language to English
        setLanguage('en');

        // Initialize Select2 for supplier dropdown
        $(document).ready(function() {
            $('.supplier-select').select2({
                placeholder: 'Search and select a supplier...',
                allowClear: true,
                width: '100%',
                theme: 'default'
            });
        });
    </script>
</body>
</html>
