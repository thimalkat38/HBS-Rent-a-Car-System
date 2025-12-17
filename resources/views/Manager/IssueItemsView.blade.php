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
                                    class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
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
                    <span class="text-xl font-semibold text-gray-900" data-translate="Issued Items">Issued Items</span>
                    <span class="text-xl font-normal text-gray-700" data-translate="Track Issued Inventory">Track Issued Inventory</span>
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
                        <!-- Action Buttons at Top Right -->
                        <div class="flex justify-end gap-4 mb-6">
                            <a href="{{ route('inventory.issue') }}"
                                class="h-12 px-6 bg-green-500 text-white rounded-xl font-semibold hover:bg-green-600 transition flex items-center justify-center">
                                <span class="material-icons mr-2">add</span>
                                <span data-translate="Issue New Items">Issue New Items</span>
                            </a>
                            <a href="{{ route('inventory.index') }}"
                                class="h-12 px-6 bg-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-300 transition flex items-center justify-center">
                                <span data-translate="BACK">BACK</span>
                            </a>
                        </div>

                        <!-- Unified Search Form -->
                        <form method="GET" action="{{ route('inventory.issued-items') }}" class="flex items-end gap-4">
                            <div class="flex-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Search Issued Items">Search Issued Items</label>
                                <input type="text" name="search" placeholder="Search by any field (ID, Item, Vehicle, Employee, etc.)"
                                    value="{{ request('search') }}"
                                    class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                    data-translate-placeholder="Search Placeholder">
                            </div>
                            <button type="submit"
                                class="h-12 px-6 bg-teal-500 text-white rounded-xl font-semibold hover:bg-teal-600 transition">
                                <span data-translate="SEARCH">SEARCH</span>
                            </button>
                        </form>

                        <!-- Clear Search -->
                        <div class="mt-4">
                            <a href="{{ route('inventory.issued-items') }}"
                                class="h-10 px-4 bg-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-300 transition flex items-center justify-center inline-flex">
                                <span data-translate="Clear Search">Clear Search</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Issued Items Table -->
                <div class="max-w-6xl mx-auto">
                    <div class="bg-white rounded-2xl shadow overflow-hidden border border-gray-200">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                            data-translate="Issue ID">
                                            Issue ID
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                            data-translate="Item Name">
                                            Item Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                            data-translate="Quantity">
                                            Quantity
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                            data-translate="Issue Type">
                                            Issue Type
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                            data-translate="Issued To">
                                            Issued To
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                            data-translate="Issue Date">
                                            Issue Date
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($issuedItems as $issuedItem)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $issuedItem->issue_id }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $issuedItem->item_name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $issuedItem->quantity_issued }}
                                                @if($issuedItem->return_quantity)
                                                    <span class="text-xs text-green-600" data-translate="Returned">({{ $issuedItem->return_quantity }} returned)</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                                    @if($issuedItem->issue_type == 'vehicle') bg-blue-100 text-blue-800
                                                    @elseif($issuedItem->issue_type == 'employee') bg-purple-100 text-purple-800
                                                    @else bg-gray-100 text-gray-800 @endif">
                                                    @if($issuedItem->issue_type == 'vehicle') 
                                                        <span data-translate="Vehicle Only">Vehicle Only</span>
                                                    @elseif($issuedItem->issue_type == 'employee') 
                                                        <span data-translate="Employee Only">Employee Only</span>
                                                    @else 
                                                        <span data-translate="Both">Both</span>
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                @if($issuedItem->vehicle_number)
                                                    <div class="flex items-center text-green-600">
                                                        <span class="material-icons mr-1" style="font-size: 16px;">directions_car</span>
                                                        {{ $issuedItem->vehicle_number }}
                                                    </div>
                                                @endif
                                                @if($issuedItem->employee_name)
                                                    <div class="flex items-center text-purple-600 {{ $issuedItem->vehicle_number ? 'mt-1' : '' }}">
                                                        <span class="material-icons mr-2" style="font-size: 16px;">badge</span>
                                                        {{ $issuedItem->employee_name }}
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $issuedItem->issue_date->format('Y-m-d') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                                <div class="flex flex-col items-center">
                                                    <span class="material-icons text-6xl mb-4">assignment</span>
                                                    <p class="text-lg font-medium" data-translate="No Issued Items Found">
                                                        No issued items found
                                                        @if(request('search'))
                                                            <span data-translate="For Search">for "{{ request('search') }}"</span>
                                                        @endif
                                                    </p>
                                                    <p class="text-sm" data-translate="Try Different Search">Try a different search term or issue new items</p>
                                                    <a href="{{ route('inventory.issue') }}"
                                                        class="mt-4 px-4 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600 transition">
                                                        <span data-translate="Issue Items Now">Issue Items Now</span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        @if($issuedItems->hasPages())
                            <div class="px-6 py-4 border-t border-gray-200">
                                {{ $issuedItems->appends(request()->query())->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Notes Modal -->
    <div id="notesModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex items-center mb-4">
                    <span class="material-icons text-blue-600 mr-2">note</span>
                    <h3 class="text-lg font-medium text-gray-900" data-translate="Issue Notes">Issue Notes</h3>
                </div>
                <div id="notesContent" class="text-sm text-gray-700 bg-gray-50 p-4 rounded-lg whitespace-pre-wrap"></div>
                <button type="button" onclick="closeNotesModal()"
                    class="w-full mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    <span data-translate="Close">Close</span>
                </button>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Set CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Notes Modal Functions
        function showNotes(notes) {
            $('#notesContent').text(notes);
            $('#notesModal').removeClass('hidden');
        }

        function closeNotesModal() {
            $('#notesModal').addClass('hidden');
        }

        // Language switcher
        const translations = {
            en: {
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
                'LogOut': 'LogOut',
                'Track Issued Inventory': 'Track Issued Inventory',
                'Issue New Items': 'Issue New Items',
                'BACK': 'BACK',
                'Search Issued Items': 'Search Issued Items',
                'Search Placeholder': 'Search by any field (ID, Item, Vehicle, Employee, etc.)',
                'SEARCH': 'SEARCH',
                'Clear Search': 'Clear Search',
                'Issue ID': 'Issue ID',
                'Item Name': 'Item Name',
                'Quantity': 'Quantity',
                'Issue Type': 'Issue Type',
                'Issued To': 'Issued To',
                'Issue Date': 'Issue Date',
                'Vehicle Only': 'Vehicle Only',
                'Employee Only': 'Employee Only',
                'Both': 'Both',
                'Returned': 'returned',
                'No Issued Items Found': 'No issued items found',
                'For Search': 'for',
                'Try Different Search': 'Try a different search term or issue new items',
                'Issue Items Now': 'Issue Items Now',
                'Issue Notes': 'Issue Notes',
                'Close': 'Close'
            },
            si: {
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
                'CRM': 'පාරිභෝගික සබඳතා කළමනාකරණය',
                'Inventory': 'ඉන්වෙන්ටරි',
                'All Items': 'සියලුම භාණ්ඩ',
                'Add Item': 'භාණ්ඩයක් එකතු කරන්න',
                'Add Stock': 'බඩු තොග එකතු කරන්න',
                'Issue Items': 'භාණ්ඩ නිකුත් කරන්න',
                'Issued Items': 'නිකුත් කළ භාණ්ඩ',
                'Finance': 'මූල්ය',
                'Expenses': 'වියදම්',
                'P/L Report': 'ලාභ/නිෂ්පත්ති වාර්තාව',
                'LogOut': 'ඉවත් වන්න',
                'Track Issued Inventory': 'නිකුත් කළ ඉන්වෙන්ටරි ලුහුබැඳීම',
                'Issue New Items': 'නව භාණ්ඩ නිකුත් කරන්න',
                'BACK': 'ආපසු',
                'Search Issued Items': 'නිකුත් කළ භාණ්ඩ සොයන්න',
                'Search Placeholder': 'ඕනෑම ක්ෂේත්‍රයකින් සොයන්න (ID, භාණ්ඩය, වාහනය, සේවකයා, ආදිය)',
                'SEARCH': 'සොයන්න',
                'Clear Search': 'සෙවුම් හිස් කරන්න',
                'Issue ID': 'නිකුත් කිරීමේ ID',
                'Item Name': 'භාණ්ඩයේ නම',
                'Quantity': 'ප්‍රමාණය',
                'Issue Type': 'නිකුත් කිරීමේ වර්ගය',
                'Issued To': 'නිකුත් කළ අය',
                'Issue Date': 'නිකුත් කළ දිනය',
                'Vehicle Only': 'වාහනය පමණක්',
                'Employee Only': 'සේවකයා පමණක්',
                'Both': 'දෙකම',
                'Returned': 'ආපසු ලබාදුන්',
                'No Issued Items Found': 'නිකුත් කළ භාණ්ඩ හමු නොවීය',
                'For Search': 'සඳහා',
                'Try Different Search': 'වෙනත් සෙවුම් යෙදුමක් උත්සාහ කරන්න හෝ නව භාණ්ඩ නිකුත් කරන්න',
                'Issue Items Now': 'දැන් භාණ්ඩ නිකුත් කරන්න',
                'Issue Notes': 'නිකුත් කිරීමේ සටහන්',
                'Close': 'වසන්න'
            }
        };

        let currentLanguage = 'en';

        function setLanguage(lang) {
            currentLanguage = lang;
            document.querySelectorAll('[id^="lang-"]').forEach(btn => {
                btn.classList.remove('underline');
                btn.classList.add('opacity-50');
            });
            document.getElementById('lang-' + lang).classList.add('underline');
            document.getElementById('lang-' + lang).classList.remove('opacity-50');
            document.querySelectorAll('[data-translate]').forEach(element => {
                const key = element.getAttribute('data-translate');
                if (translations[lang] && translations[lang][key]) {
                    element.textContent = translations[lang][key];
                }
            });
            document.querySelectorAll('[data-translate-placeholder]').forEach(element => {
                const key = element.getAttribute('data-translate-placeholder');
                if (translations[lang] && translations[lang][key]) {
                    element.placeholder = translations[lang][key];
                }
            });
            localStorage.setItem('preferred_language', lang);
        }

        // Initialize language on page load
        document.addEventListener('DOMContentLoaded', function() {
            const savedLang = localStorage.getItem('preferred_language') || 'en';
            setLanguage(savedLang);
        });

        // Close modals when clicking outside
        $(document).click(function(e) {
            if ($(e.target).is('#notesModal')) {
                closeNotesModal();
            }
        });
    </script>
</body>
</html>