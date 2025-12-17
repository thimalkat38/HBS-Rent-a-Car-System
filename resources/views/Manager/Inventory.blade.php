
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Rental Management System</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- CSRF Token -->
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
                <span class="text-xl font-semibold text-gray-900" data-translate="Inventory">Inventory</span>
                <span class="text-xl font-normal text-gray-700" data-translate="Manage Stock">Manage Stock</span>
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
            <!-- Search and Action Buttons -->
            <div class="max-w-6xl mx-auto mb-6">
                <div class="bg-white rounded-2xl shadow p-6 border border-gray-200">
                    <!-- Action Buttons Container -->
                    <div class="flex justify-between items-center mb-6">
                        <!-- Left side buttons -->
                        <div class="flex justify-start gap-4">
                            <a href="{{ route('inventory.issued-items') }}"
                               class="h-12 px-6 bg-blue-500 text-white rounded-xl font-semibold hover:bg-blue-600 transition flex items-center justify-center">
                                <span data-translate="Issued Products">Issued Products</span>
                            </a>
                            <a href="{{ route('inventory.grn') }}"
                               class="h-12 px-6 bg-orange-500 text-white rounded-xl font-semibold hover:bg-orange-600 transition flex items-center justify-center">
                                <span data-translate="Add Stock">Add Stock</span>
                            </a>
                        </div>
                        <!-- Right side buttons -->
                        <div class="flex justify-end gap-4">
                            <a href="{{ route('inventory.create') }}"
                               class="h-12 px-6 bg-green-500 text-white rounded-xl font-semibold hover:bg-green-600 transition flex items-center justify-center">
                                <span data-translate="Add Item">Add Item</span>
                            </a>
                            <a href="{{ url('manager/dashboard') }}"
                               class="h-12 px-6 bg-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-300 transition flex items-center justify-center">
                                <span data-translate="BACK">BACK</span>
                            </a>
                        </div>
                    </div>

                    <!-- Unified Search Form -->
                    <form method="GET" action="{{ route('inventory.filter') }}" class="flex items-end gap-4">
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Search Inventory">Search Inventory</label>
                            <input type="text" name="search" placeholder="Search by Item ID or Item Name"
                                   data-translate="Search by Item ID or Item Name"
                                   value="{{ request('search') }}"
                                   class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500">
                        </div>
                        <button type="submit"
                                class="h-12 px-6 bg-teal-500 text-white rounded-xl font-semibold hover:bg-teal-600 transition">
                            <span data-translate="SEARCH">SEARCH</span>
                        </button>
                    </form>

                    <!-- Clear Search -->
                    <div class="mt-4">
                        <a href="{{ route('inventory.index') }}"
                           class="h-10 px-4 bg-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-300 transition flex items-center justify-center inline-flex">
                            <span data-translate="Clear Search">Clear Search</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Inventory Table -->
            <div class="max-w-6xl mx-auto">
                <div class="bg-white rounded-2xl shadow overflow-hidden border border-gray-200">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <span data-translate="Item ID">Item ID</span>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <span data-translate="Item">Item</span>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <span data-translate="Image">Image</span>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <span data-translate="Total Quantity">Total Quantity</span>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <span data-translate="Total Value">Total Value</span>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <span data-translate="Action">Action</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($inventories as $inventory)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $inventory->Itm_id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $inventory->it_name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if (!empty($inventory->it_images))
                                            @php
                                                $images = is_array($inventory->it_images)
                                                    ? $inventory->it_images
                                                    : json_decode($inventory->it_images, true);
                                            @endphp
                                            @if (!empty($images) && isset($images[0]))
                                                <img src="{{ asset('storage/' . $images[0]) }}" alt="Item Image"
                                                     class="h-10 w-10 rounded-full object-cover">
                                            @else
                                                <span class="text-gray-400 text-xs" data-translate="No Image">No Image</span>
                                            @endif
                                        @else
                                            <span class="text-gray-400 text-xs" data-translate="No Image">No Image</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ number_format($inventory->total_quantity, 0) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        Rs. {{ number_format($inventory->total_value, 2) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('inventory.edit', $inventory->id) }}"
                                               class="text-blue-600 hover:text-blue-900 flex items-center">
                                                <span class="material-icons mr-1" style="font-size: 18px;">edit</span>
                                                <span data-translate="Edit">Edit</span>
                                            </a>
                                            <form action="{{ route('inventory.destroy', $inventory->id) }}"
                                                  method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-900 flex items-center"
                                                        onclick="return confirm('Are you sure you want to delete this inventory?')">
                                                    <span class="material-icons mr-1" style="font-size: 18px;">delete</span>
                                                    <span data-translate="Delete">Delete</span>
                                                </button>
                                            </form>
                                            <a href="{{ route('inventory.batches', $inventory->id) }}"
                                               class="text-green-600 hover:text-green-900 flex items-center">
                                                <span class="material-icons mr-1" style="font-size: 18px;">list_alt</span>
                                                <span data-translate="View Batches">View Batches</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                        <div class="flex flex-col items-center">
                                            <span class="material-icons text-6xl mb-4">inventory_2</span>
                                            <p class="text-lg font-medium" data-translate="No inventory items found">
                                                No inventory items found
                                                @if(request('search'))
                                                    for "{{ request('search') }}"
                                                @endif
                                            </p>
                                            <p class="text-sm" data-translate="Try a different search term or add new items">
                                                Try a different search term or add new items
                                            </p>
                                            <a href="{{ route('inventory.create') }}"
                                               class="mt-4 px-4 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600 transition">
                                                <span data-translate="Add Item Now">Add Item Now</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    @if($inventories->hasPages())
                        <div class="px-6 py-4 border-t border-gray-200">
                            {{ $inventories->appends(request()->query())->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </main>
    </div>
</div>

<!-- JavaScript for Translations -->
<script>
    // Dictionary for all translatable text on the page
    const translations = {
        en: {
            'Inventory': 'Inventory',
            'Manage Stock': 'Manage Stock',
            'Search Inventory': 'Search Inventory',
            'Search by Item ID or Item Name': 'Search by Item ID or Item Name',
            'SEARCH': 'SEARCH',
            'Clear Search': 'Clear Search',
            'Add Item': 'Add Item',
            'Add Stock': 'Add Stock',
            'Issued Products': 'Issued Products',
            'BACK': 'BACK',
            'Item ID': 'Item ID',
            'Item': 'Item',
            'Image': 'Image',
            'Total Quantity': 'Total Quantity',
            'Total Value': 'Total Value',
            'Action': 'Action',
            'Edit': 'Edit',
            'Delete': 'Delete',
            'View Batches': 'View Batches',
            'LogOut': 'LogOut',
            'No inventory items found': 'No inventory items found',
            'Try a different search term or add new items': 'Try a different search term or add new items',
            'Add Item Now': 'Add Item Now',
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
            'Finance': 'Finance',
            'Expenses': 'Expenses',
            'P/L Report': 'P/L Report'
        },
        si: {
            'Inventory': 'ඉන්වෙන්ටරි',
            'Manage Stock': 'බඩු ගබඩා කළමනාකරණය',
            'Search Inventory': 'ඉන්වෙන්ටරි සොයන්න',
            'Search by Item ID or Item Name': 'භාණ්ඩ හැඳුනුම්පත හෝ භාණ්ඩයේ නමින් සොයන්න',
            'SEARCH': 'සොයන්න',
            'Clear Search': 'සෙවීම හිස් කරන්න',
            'Add Item': 'භාණ්ඩය එකතු කරන්න',
            'Add Stock': 'තොග එකතු කරන්න',
            'Issued Products': 'නිකුත් කළ භාණ්ඩ',
            'BACK': 'ආපසු',
            'Item ID': 'භාණ්ඩ හැඳුනුම්පත',
            'Item': 'භාණ්ඩය',
            'Image': 'පින්තූරය',
            'Total Quantity': 'මුළු ප්‍රමාණය',
            'Total Value': 'මුළු වටිනාකම',
            'Action': 'ක්‍රියාමාර්ග',
            'Edit': 'සංස්කරණය',
            'Delete': 'මකන්න',
            'View Batches': 'බැච් බලන්න',
            'LogOut': 'පිටවීම',
            'No inventory items found': 'ඉන්වෙන්ටරි භාණ්ඩ හමු නොවීය',
            'Try a different search term or add new items': 'වෙනත් සෙවුම් යෙදුමක් උත්සාහ කරන්න හෝ නව භාණ්ඩ එකතු කරන්න',
            'Add Item Now': 'දැන් භාණ්ඩය එකතු කරන්න',
            'Dashboard': 'උපකරණ පුවරුව',
            'Vehicles': 'වාහන',
            'Add Vehicle': 'වාහනයක් එකතු කරන්න',
            'All Vehicles': 'සියලුම වාහන',
            'Vehicle Owners': 'වාහන හිමියන්',
            'Bookings': 'වෙන්කරවීම්',
            'Book Vehicle': 'වාහනයක් වෙන්කරවන්න',
            'Booking History': 'වෙන්කරවීම් ඉතිහාසය',
            'Completed Businesses': 'සම්පූර්ණ කළ වෙන්කරවීම්',
            'Customers': 'පාරිභෝගිකයන්',
            'Add Customer': 'පාරිභෝගිකයෙකු එකතු කරන්න',
            'All Customers': 'සියලුම පාරිභෝගිකයන්',
            'HRM': 'මානව සම්පත් කළමනාකරණය',
            'CRM': 'පාරිභෝගික සම්බන්ධතා කළමනාකරණය',
            'Finance': 'මූල්ය',
            'Expenses': 'වියදම්',
            'P/L Report': 'ලාභ/නිෂ්පත්ති වාර්තාව'
        }
    };

    // Helper: Replace text in all elements matching a translation key
    function translatePage(lang) {
        Object.keys(translations.en).forEach(function (key) {
            const elements = document.querySelectorAll(`[data-translate="${key}"]`);
            elements.forEach(el => {
                if (translations[lang][key]) {
                    el.textContent = translations[lang][key];
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

    // On page load, set language from localStorage or default to English
    document.addEventListener('DOMContentLoaded', function () {
        const lang = localStorage.getItem('lang') || 'en';
        setLanguage(lang);
    });
</script>
</body>
</html>