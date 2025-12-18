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
                            <li>
                                <a href="{{ url('vehicle_owners') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
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
                        <div class="flex items-center px-6 py-3 text-white font-semibold rounded-l-full cursor-default">
                            <span class="material-icons mr-3">badge</span>
                            HRM
                        </div>
                        <ul class="ml-8 space-y-1">
                            <li>
                                <a href="{{ url('employees') }}"
                                    class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
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
                        <span class="material-icons text-gray-400">badge</span>
                        <span class="text-xl font-semibold font-poppins text-gray-900">HRM</span>
                        <span class="material-icons text-gray-400">chevron_right</span>
                        <span class="text-xl font-normal text-gray-700">Edit Employee</span>
                        <span class="material-icons text-gray-400">chevron_right</span>
                        <span class="text-xl font-normal text-gray-700">{{$employee->emp_name}}</span>
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
            <main class="flex-1 w-full px-4 py-6 flex flex-col overflow-y-auto">
                <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data" class="w-full max-w-3xl mx-auto bg-white p-8 rounded-lg shadow">
                    @csrf
                    @method('PUT')

                    <h1 class="text-2xl font-bold mb-6 text-center text-gray-700">Edit Employee</h1>

                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- General Error Message -->
                    @if ($errors->any())
                        <div class="mb-4 p-3 bg-red-100 border border-red-300 text-red-700 rounded">
                            <ul class="list-disc ml-6">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Employee ID -->
                    <div class="mb-4 flex flex-col">
                        <label for="emp_id" class="mb-1 font-semibold text-gray-600">Employee ID</label>
                        <input type="text" name="emp_id" value="{{ old('emp_id', $employee->emp_id) }}" class="input input-bordered border-gray-300 px-3 py-2 rounded bg-gray-100" required readonly>
                    </div>

                    <!-- Employee Name and Mobile Number -->
                    <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex flex-col">
                            <label for="emp_name" class="mb-1 font-semibold text-gray-600">Employee Name</label>
                            <input type="text" name="emp_name" value="{{ old('emp_name', $employee->emp_name) }}" class="input input-bordered border-gray-300 px-3 py-2 rounded bg-gray-100" readonly>
                            @error('emp_name')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="mobile_number" class="mb-1 font-semibold text-gray-600">Mobile Number</label>
                            <input type="text" name="mobile_number" value="{{ old('mobile_number', $employee->mobile_number) }}" class="input input-bordered border-gray-300 px-3 py-2 rounded" required>
                            @error('mobile_number')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Join Date and Email -->
                    <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex flex-col">
                            <label for="join_date" class="mb-1 font-semibold text-gray-600">Join Date</label>
                            <input type="date" name="join_date" value="{{ old('join_date', $employee->join_date) }}" class="input input-bordered border-gray-300 px-3 py-2 rounded bg-gray-100" readonly>
                            @error('join_date')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="email" class="mb-1 font-semibold text-gray-600">Email Address</label>
                            <input type="email" name="email" value="{{ old('email', $employee->email) }}" class="input input-bordered border-gray-300 px-3 py-2 rounded" required>
                            @error('email')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Age and NIC -->
                    <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex flex-col">
                            <label for="age" class="mb-1 font-semibold text-gray-600">Age</label>
                            <input type="number" name="age" value="{{ old('age', $employee->age) }}" class="input input-bordered border-gray-300 px-3 py-2 rounded" required>
                            @error('age')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="nic" class="mb-1 font-semibold text-gray-600">NIC</label>
                            <input type="text" name="nic" value="{{ old('nic', $employee->nic) }}" class="input input-bordered border-gray-300 px-3 py-2 rounded bg-gray-100" readonly>
                            @error('nic')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Bank and Account Number -->
                    <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex flex-col">
                            <label for="bank" class="mb-1 font-semibold text-gray-600">Bank</label>
                            <input type="text" name="bank" value="{{ old('bank', $employee->bank) }}" class="input input-bordered border-gray-300 px-3 py-2 rounded" required>
                            @error('bank')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="acc_number" class="mb-1 font-semibold text-gray-600">Account Number</label>
                            <input type="text" name="acc_number" value="{{ old('acc_number', $employee->acc_number) }}" class="input input-bordered border-gray-300 px-3 py-2 rounded" required>
                            @error('acc_number')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Address and File Inputs -->
                    <div class="mb-6">
                        <label for="address" class="mb-1 font-semibold text-gray-600 block">Address</label>
                        <textarea name="address" rows="4" class="input input-bordered border-gray-300 px-3 py-2 rounded w-full" required>{{ old('address', $employee->address) }}</textarea>
                        @error('address')
                            <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                        @enderror

                        <div class="mt-4 flex flex-col md:flex-row md:space-x-6">
                            <div class="flex-1 flex flex-col mb-2 md:mb-0">
                                <label for="photo" class="mb-1 font-semibold text-gray-600">Upload New Employee Image (optional)</label>
                                <input type="file" name="photo[]" multiple class="file-input file-input-bordered w-full">
                            </div>
                            <div class="flex-1 flex flex-col">
                                <label for="doc_photos" class="mb-1 font-semibold text-gray-600">Upload New Documents (optional)</label>
                                <input type="file" name="doc_photos[]" multiple class="file-input file-input-bordered w-full">
                            </div>
                        </div>
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <div class="flex justify-end gap-4">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded shadow">Update Employee</button>
                        <a href="{{ route('employees.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-900 font-semibold px-6 py-2 rounded shadow">Cancel</a>
                    </div>
                </form>
            </main>
        </div>
    </div>
</body>
</html>
