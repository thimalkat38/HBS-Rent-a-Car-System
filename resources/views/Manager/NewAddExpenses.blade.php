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
    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <style>
        /* Custom Select2 styling to match Tailwind */
        .select2-container--default .select2-selection--single {
            height: 42px;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            padding: 0 0.75rem;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 42px;
            padding-left: 0;
            color: #374151;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
            right: 10px;
        }
        .select2-container--default.select2-container--focus .select2-selection--single,
        .select2-container--default.select2-container--open .select2-selection--single {
            border-color: #14b8a6;
            box-shadow: 0 0 0 2px rgba(20, 184, 166, 0.2);
        }
        .select2-dropdown {
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #14b8a6;
        }
        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: #f0fdfa;
            color: #0f766e;
        }
    </style>
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
                                    class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
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
                        <span class="material-icons text-gray-400">receipt_long</span>
                        <span class="text-xl font-semibold font-poppins text-gray-900">Finance</span>
                        <span class="material-icons text-gray-400">chevron_right</span>
                        <span class="text-xl font-normal text-gray-700">Add Expense</span>
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
                            const translations = {
                                en: {
                                    'Dashboard': 'Dashboard',
                                    'Vehicles': 'Vehicles',
                                    'Add Vehicle': 'Add Vehicle',
                                    'All Vehicles': 'All Vehicles',
                                    'Bookings': 'Bookings',
                                    'Book Hire': 'Book Hire',
                                    'Booking History': 'Booking History',
                                    'Completed Businesses': 'Completed Businesses',
                                    'Customers': 'Customers',
                                    'Add Customer': 'Add Customer',
                                    'All Customers': 'All Customers',
                                    'HRM': 'HRM',
                                    'CRM': 'CRM',
                                    'Inventory': 'Inventory',
                                    'Finance': 'Finance',
                                    'Add Expense': 'Add Expense',
                                    'Expenses': 'Expenses',
                                    'P/L Report': 'P/L Report',
                                    'Commission': 'Commission',
                                    'LogOut': 'LogOut',
                                    'Expense Category': 'Expense Category',
                                    'Date': 'Date',
                                    'Select Expense Category': 'Select Expense Category',
                                    'Fuel': 'Fuel',
                                    'Utility Bills': 'Utility Bills',
                                    'Travel': 'Travel',
                                    'Office Supplies': 'Office Supplies',
                                    'Foods': 'Foods',
                                    'Other': 'Other',
                                    'Please specify other category': 'Please specify other category',
                                    'Select Employee Expense': 'Select Employee Expense',
                                    'Search Employee...': 'Search Employee...',
                                    'Select Customer Expense': 'Select Customer Expense',
                                    'Search Customer...': 'Search Customer...',
                                    'Fuel For Vehicle': 'Fuel For Vehicle',
                                    'Type to search vehicle...': 'Type to search vehicle...',
                                    'Attach Document': 'Attach Document',
                                    'Amount': 'Amount',
                                    'Enter amount': 'Enter amount',
                                    'Note': 'Note',
                                    'Enter additional notes...': 'Enter additional notes...',
                                    'Clear': 'Clear',
                                    'Submit': 'Submit'
                                },
                                si: {
                                    'Dashboard': 'උපකරණ පුවරුව',
                                    'Vehicles': 'වාහන',
                                    'Add Vehicle': 'වාහනයක් එක් කරන්න',
                                    'All Vehicles': 'සියලුම වාහන',
                                    'Bookings': 'වෙන්කරවීම්',
                                    'Book Hire': 'වෙන්කරවීම',
                                    'Booking History': 'වෙන්කරවීම් ඉතිහාසය',
                                    'Completed Businesses': 'සම්පූර්ණ කළ වෙන්කරවීම්',
                                    'Customers': 'පාරිභෝගිකයන්',
                                    'Add Customer': 'පාරිභෝගිකයෙකු එකතු කරන්න',
                                    'All Customers': 'සියලුම පාරිභෝගිකයන්',
                                    'HRM': 'මානව සම්පත් කළමනාකරණය',
                                    'CRM': 'පාරිභෝගික සම්බන්ධතා කළමනාකරණය',
                                    'Inventory': 'ඉන්වෙන්ටරි',
                                    'Finance': 'මූල්ය',
                                    'Add Expense': 'වියදමක් එක් කරන්න',
                                    'Expenses': 'වියදම්',
                                    'P/L Report': 'ලාභ/නිෂ්පත්ති වාර්තාව',
                                    'Commission': 'කොමිසම',
                                    'LogOut': 'පිටවීම',
                                    'Expense Category': 'වියදම් කාණ්ඩය',
                                    'Date': 'දිනය',
                                    'Select Expense Category': 'වියදම් කාණ්ඩය තෝරන්න',
                                    'Fuel': 'ඉන්ධන',
                                    'Utility Bills': 'උපයෝගීතා බිල්පත්',
                                    'Travel': 'ගමන්',
                                    'Office Supplies': 'කාර්යාල උපකරණ',
                                    'Foods': 'ආහාර',
                                    'Other': 'වෙනත්',
                                    'Please specify other category': 'කරුණාකර වෙනත් කාණ්ඩය නිශ්චිතව දක්වන්න',
                                    'Select Employee Expense': 'සේවක වියදම් තෝරන්න',
                                    'Search Employee...': 'සේවකයා සොයන්න...',
                                    'Select Customer Expense': 'පාරිභෝගික වියදම් තෝරන්න',
                                    'Search Customer...': 'පාරිභෝගිකයා සොයන්න...',
                                    'Fuel For Vehicle': 'වාහනය සඳහා ඉන්ධන',
                                    'Type to search vehicle...': 'වාහනය සොයා ගැනීමට ටයිප් කරන්න...',
                                    'Attach Document': 'ලේඛනයක් අමුණන්න',
                                    'Amount': 'මුදල',
                                    'Enter amount': 'මුදල ඇතුළත් කරන්න',
                                    'Note': 'සටහන',
                                    'Enter additional notes...': 'අමතර සටහන් ඇතුළත් කරන්න...',
                                    'Clear': 'මකන්න',
                                    'Submit': 'ඉදිරිපත් කරන්න'
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
            <main class="flex-1 w-full px-8 py-6 overflow-y-auto">
                <div class="max-w-4xl mx-auto">
                    <form action="{{ route('expenses.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 md:p-8">
                        @csrf

                        <!-- Form Section -->
                        <div class="space-y-6">
                            <!-- Category and Date Row -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="expense_category" class="block text-sm font-medium text-gray-700">
                                        Expense Category <span class="text-red-500">*</span>
                                    </label>
                                    <select name="cat" id="expense_category" 
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none transition-colors"
                                        onchange="toggleOtherCategoryInput()" required>
                                        <option value="">Select Expense Category</option>
                                        {{-- <option value="Fuel" {{ old('cat') == 'Fuel' ? 'selected' : '' }}>Fuel</option> --}}
                                        <option value="Utility Bills" {{ old('cat') == 'Utility Bills' ? 'selected' : '' }}>Utility Bills</option>
                                        <option value="Travel" {{ old('cat') == 'Travel' ? 'selected' : '' }}>Travel</option>
                                        <option value="Administration Expences" {{ old('cat') == 'Administration Expences' ? 'selected' : '' }}>Administration Expences</option>
                                        <option value="Foods" {{ old('cat') == 'Foods' ? 'selected' : '' }}>Foods</option>
                                        <option value="Other" {{ old('cat') && !in_array(old('cat'), ['Fuel','Utility Bills','Travel','Administration Expences','Foods']) ? 'selected' : '' }}>Other</option>
                                    </select>
                                    <input 
                                        type="text" 
                                        name="cat" 
                                        id="other_cat_input" 
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none transition-colors mt-2" 
                                        placeholder="Please specify other category"
                                        style="display: none;"
                                        value="{{ old('cat') && !in_array(old('cat'), ['Fuel','Utility Bills','Travel','Administration Expences','Foods']) ? old('cat') : '' }}"
                                    >
                                </div>
                                <div class="space-y-2">
                                    <label for="expense_date" class="block text-sm font-medium text-gray-700">
                                        Date <span class="text-red-500">*</span>
                                    </label>
                                    <input type="date" name="date" id="expense_date" 
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none transition-colors" 
                                        required>
                                </div>
                            </div>

                            <script>
                                function toggleOtherCategoryInput() {
                                    var select = document.getElementById('expense_category');
                                    var otherInput = document.getElementById('other_cat_input');
                                    if (select.value === 'Other') {
                                        otherInput.style.display = 'block';
                                        otherInput.required = true;
                                        otherInput.name = 'cat';
                                        select.name = 'cat_select';
                                    } else {
                                        otherInput.style.display = 'none';
                                        otherInput.required = false;
                                        otherInput.value = '';
                                        otherInput.name = 'cat_other';
                                        select.name = 'cat';
                                    }
                                }
                                document.addEventListener('DOMContentLoaded', function() {
                                    toggleOtherCategoryInput();
                                });
                            </script>

                            <!-- Employee and Customer Selection Row -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="for_emp" class="block text-sm font-medium text-gray-700">
                                        Select Employee Expense
                                    </label>
                                    <select id="for_emp" name="for_emp" 
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none transition-colors">
                                        <option value="">Search Employee...</option>
                                    </select>
                                </div>
                                <div class="space-y-2">
                                    <label for="for_cus" class="block text-sm font-medium text-gray-700">
                                        Select Customer Expense
                                    </label>
                                    <select id="for_cus" name="for_cus" 
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none transition-colors">
                                        <option value="">Search Customer...</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Fuel For Vehicle -->
                            <div class="space-y-2" id="fuel_for_container">
                                <label for="fuel_for" class="block text-sm font-medium text-gray-700">
                                    Fuel For Vehicle
                                </label>
                                <div class="relative">
                                    <input type="text" id="fuel_for" name="fuel_for" 
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none transition-colors"
                                        placeholder="Type to search vehicle..." autocomplete="off">
                                    <div id="vehicle_list" class="absolute left-0 right-0 top-full mt-1 z-50 bg-white border border-gray-300 rounded-lg shadow-lg min-w-full max-h-56 overflow-y-auto hidden">
                                        <!-- Vehicle suggestions will appear here -->
                                    </div>
                                </div>
                            </div>

                            <!-- Document Upload and Amount Row -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label for="expense_docs" class="block text-sm font-medium text-gray-700">
                                        Attach Document
                                    </label>
                                    <input type="file" name="docs" id="expense_docs" 
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100">
                                </div>
                                <div class="space-y-2">
                                    <label for="expense_amount" class="block text-sm font-medium text-gray-700">
                                        Amount
                                    </label>
                                    <input type="text" name="amnt" id="expense_amount" 
                                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none transition-colors" 
                                        placeholder="Enter amount">
                                </div>
                            </div>

                            <!-- Note Field -->
                            <div class="space-y-2">
                                <label for="expense_note" class="block text-sm font-medium text-gray-700">
                                    Note
                                </label>
                                <textarea name="note" id="expense_note" rows="4" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none transition-colors resize-none" 
                                    placeholder="Enter additional notes..."></textarea>
                            </div>
                        </div>

                        <!-- Button Container -->
                        <div class="flex flex-col sm:flex-row gap-4 justify-end mt-8 pt-6 border-t border-gray-200">
                            <button type="reset" 
                                class="px-6 py-2.5 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors">
                                Clear
                            </button>
                            <button type="submit" 
                                class="px-6 py-2.5 bg-teal-600 text-white rounded-lg font-medium hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition-colors">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </main>
            <script>
                $(document).ready(function() {
                    $('#for_emp').select2({
                        placeholder: "Search for Employee",
                        allowClear: true,
                        minimumInputLength: 1,
                        ajax: {
                            url: "{{ route('employees.search') }}",
                            dataType: 'json',
                            delay: 250,
                            data: function(params) {
                                return {
                                    q: params.term
                                };
                            },
                            processResults: function(data) {
                                return {
                                    results: data.map(employee => ({
                                        id: employee.emp_id,
                                        text: employee.emp_name
                                    }))
                                };
                            }
                        }
                    });
            
                    $('#for_cus').select2({
                        placeholder: "Search for Customer",
                        allowClear: true,
                        minimumInputLength: 1,
                        ajax: {
                            url: "{{ route('customers.search') }}",
                            dataType: 'json',
                            delay: 250,
                            data: function(params) {
                                return {
                                    q: params.term
                                };
                            },
                            processResults: function(data) {
                                return {
                                    results: data.map(customer => ({
                                        id: customer.id,
                                        text: customer.full_name
                                    }))
                                };
                            }
                        }
                    });
            
                    // Disable one dropdown when the other is selected
                    $('#for_emp').on('change', function() {
                        if ($(this).val()) {
                            $('#for_cus').prop('disabled', true);
                        } else {
                            $('#for_cus').prop('disabled', false);
                        }
                    });
            
                    $('#for_cus').on('change', function() {
                        if ($(this).val()) {
                            $('#for_emp').prop('disabled', true);
                        } else {
                            $('#for_emp').prop('disabled', false);
                        }
                    });
                });
            </script>
            <script>
                $(document).ready(function() {
                    // Always show the Fuel For field
                    $('#fuel_for_container').show();
            
                    // Fetch vehicle suggestions when typing
                    $('#fuel_for').on('keyup', function() {
                        let query = $(this).val().trim();
                        if (query.length > 1) {
                            $.ajax({
                                url: "{{ route('api.vehicles.search') }}",
                                type: 'GET',
                                data: {
                                    query: query
                                },
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'Accept': 'application/json'
                                },
                                success: function(response) {
                                    let dropdown = $('#vehicle_list');
                                    dropdown.empty(); // Clear old options
            
                                    // Handle response - it should be an array of vehicle numbers
                                    if (response && response.length > 0) {
                                        response.forEach(function(vehicle) {
                                            // Escape HTML to prevent XSS
                                            let vehicleEscaped = $('<div>').text(vehicle).html();
                                            dropdown.append(
                                                '<div class="dropdown-item px-4 py-2 hover:bg-teal-50 cursor-pointer transition-colors" data-value="' +
                                                vehicleEscaped + '">' + vehicleEscaped + '</div>');
                                        });
                                        dropdown.removeClass('hidden'); // Show the dropdown
                                    } else {
                                        dropdown.addClass('hidden'); // Hide if no results
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error("Error fetching vehicles:", {
                                        status: xhr.status,
                                        statusText: xhr.statusText,
                                        responseText: xhr.responseText,
                                        error: error
                                    });
                                    $('#vehicle_list').addClass('hidden');
                                }
                            });
                        } else {
                            $('#vehicle_list').addClass('hidden'); // Hide dropdown if no query
                        }
                    });
            
                    // Select a vehicle from the list
                    $(document).on('click', '.dropdown-item', function() {
                        let selectedValue = $(this).data('value');
                        $('#fuel_for').val(selectedValue); // Set the selected value
                        $('#vehicle_list').addClass('hidden'); // Hide the dropdown
                    });
            
                    // Hide dropdown when clicking outside
                    $(document).on('click', function(e) {
                        if (!$(e.target).closest("#fuel_for_container").length) {
                            $('#vehicle_list').addClass('hidden');
                        }
                    });
                });
            </script>
        </div>
    </div>
</body>
</html>
