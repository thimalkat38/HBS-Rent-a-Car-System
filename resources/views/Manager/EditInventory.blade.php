
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
    <!-- Bootstrap CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @php
        $bName = \App\Models\Business::where('id', auth()->user()->business_id)->value('b_name');
        $bLogo = \App\Models\Business::where('id', auth()->user()->business_id)->value('logo');
    @endphp
    
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
                    <span class="text-xl font-semibold text-gray-900" data-translate="Edit Inventory Item">Edit Inventory Item</span>
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
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <span data-translate="LogOut">LogOut</span>
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 p-8 bg-gray-50 overflow-y-auto">
                <div class="max-w-6xl mx-auto">
                    <div class="bg-white rounded-2xl shadow p-8 border border-gray-200">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-6" data-translate="Edit Inventory Item">Edit Inventory Item</h2>
                        
                        <!-- Success/Error Messages -->
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <!-- Form for Editing Inventory -->
                        <form action="{{ route('inventory.update', $inventory->id) }}" method="POST" enctype="multipart/form-data" id="inventoryForm">
                            @csrf
                            @method('PUT')
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Item ID">Item ID</label>
                                    <input type="text" name="Itm_id" id="Itm_id" placeholder="Item ID"
                                        value="{{ old('Itm_id', $inventory->Itm_id) }}"
                                        class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500 @error('Itm_id') border-red-500 @enderror"
                                        required readonly>
                                    @error('Itm_id')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Item Name">Item Name</label>
                                    <input type="text" name="it_name" id="it_name" placeholder="Item Name"
                                        value="{{ old('it_name', $inventory->it_name) }}"
                                        class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500 @error('it_name') border-red-500 @enderror"
                                        required>
                                    @error('it_name')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <!-- Duplicate warning display -->
                                    <div id="duplicate-warning" class="hidden mt-2 p-3 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 text-sm rounded">
                                        <div class="flex items-center">
                                            <span class="material-icons text-yellow-600 mr-2 text-lg">warning</span>
                                            <span id="duplicate-message" data-translate="This item already exists in your inventory">This item already exists in your inventory.</span>
                                        </div>
                                        <div class="mt-2 text-xs">
                                            <strong data-translate="Existing Item Details">Existing Item Details:</strong>
                                            <div id="existing-item-details"></div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Min Alert Quantity">
                                        <span class="flex items-center">
                                            <span data-translate="Min Alert Quantity">Min Alert Quantity</span>
                                            <span class="material-icons text-orange-500 ml-1 text-sm" title="Set the minimum quantity threshold for low stock alerts">warning</span>
                                        </span>
                                    </label>
                                    <input type="number" name="min_quantity" id="min_quantity" placeholder="Minimum Quantity"
                                        value="{{ old('min_quantity', $inventory->min_quantity) }}"
                                        class="w-full h-12 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-400 @error('min_quantity') border-red-500 @enderror"
                                        min="0" step="1">
                                    @error('min_quantity')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-1 text-xs text-gray-500" data-translate="Alert when stock falls below this level">Alert when stock falls below this level</p>
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2" data-translate="Item Images">Item Images</label>
                                <!-- Existing Images -->
                                <div class="mb-4">
                                    <p class="text-sm text-gray-600" data-translate="Current Images">Current Images</p>
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                        @php
                                            $images = is_array($inventory->it_images)
                                                ? $inventory->it_images
                                                : json_decode($inventory->it_images, true);
                                        @endphp
                                        @if (!empty($images))
                                            @foreach ($images as $index => $image)
                                                <div class="relative">
                                                    <img src="{{ asset('storage/' . $image) }}" alt="Item Image"
                                                        class="w-full h-24 object-cover rounded-lg border">
                                                    <button type="button" class="absolute top-1 right-1 bg-red-500 text-white text-xs px-2 py-1 rounded"
                                                            onclick="removeExistingImage({{ $index }})">
                                                        ×
                                                    </button>
                                                    <input type="hidden" name="existing_images[]" value="{{ $image }}">
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="text-gray-400 text-sm" data-translate="No images available">No images available</p>
                                        @endif
                                    </div>
                                </div>
                                <!-- New Image Upload -->
                                <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center">
                                    <label for="it_images" class="cursor-pointer">
                                        <div class="flex flex-col items-center justify-center">
                                            <span class="material-icons text-gray-400 text-4xl">cloud_upload</span>
                                            <p class="mt-2 text-sm text-gray-600" data-translate="Click to upload or drag and drop">Click to upload or drag and drop</p>
                                            <p class="text-xs text-gray-500" data-translate="PNG, JPG, GIF up to 10MB">PNG, JPG, GIF up to 10MB</p>
                                        </div>
                                        <input type="file" name="it_images[]" id="it_images" multiple accept="image/*"
                                            class="hidden">
                                    </label>
                                </div>
                                <!-- Image preview area -->
                                <div id="image-preview" class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4 hidden"></div>
                                @error('it_images.*')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Error Messages -->
                            @if ($errors->any())
                                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <h3 class="text-sm font-medium text-red-800" data-translate="There were errors with your submission">There were errors with your submission</h3>
                                            <div class="mt-2 text-sm text-red-700">
                                                <ul class="list-disc pl-5 space-y-1">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            <div class="flex justify-end gap-4 mt-8">
                                <button type="reset" id="clearBtn"
                                    class="h-12 px-6 bg-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-300 transition">
                                    <span data-translate="CLEAR">CLEAR</span>
                                </button>
                                <a href="{{ route('inventory.index') }}"
                                    class="h-12 px-6 bg-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-300 transition flex items-center justify-center">
                                    <span data-translate="BACK">BACK</span>
                                </a>
                                <button type="submit" id="submitBtn"
                                    class="h-12 px-6 bg-teal-500 text-white rounded-xl font-semibold hover:bg-teal-600 transition">
                                    <span data-translate="UPDATE">UPDATE</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
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

        // Language switcher functionality
        const translations = {
            en: {
                'Edit Inventory Item': 'Edit Inventory Item',
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
                'Inventory': 'Inventory',
                'Finance': 'Finance',
                'Expenses': 'Expenses',
                'P/L Report': 'P/L Report',
                'Item Name': 'Item Name',
                'Min Alert Quantity': 'Min Alert Quantity',
                'Item Images': 'Item Images',
                'Current Images': 'Current Images',
                'No images available': 'No images available',
                'Click to upload or drag and drop': 'Click to upload or drag and drop',
                'PNG, JPG, GIF up to 10MB': 'PNG, JPG, GIF up to 10MB',
                'Alert when stock falls below this level': 'Alert when stock falls below this level',
                'This item already exists in your inventory': 'This item already exists in your inventory.',
                'Existing Item Details': 'Existing Item Details',
                'There were errors with your submission': 'There were errors with your submission',
                'CLEAR': 'CLEAR',
                'BACK': 'BACK',
                'UPDATE': 'UPDATE',
                'LogOut': 'LogOut',
                'To remove new images, please clear the form and select images again.': 'To remove new images, please clear the form and select images again.'
            },
            si: {
                'Edit Inventory Item': 'ඉන්වෙන්ටරි භාණ්ඩය සංස්කරණය කරන්න',
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
                'Inventory': 'ඉන්වෙන්ටරි',
                'Finance': 'මූල්ය',
                'Expenses': 'වියදම්',
                'P/L Report': 'ලාභ/නිෂ්පත්ති වාර්තාව',
                'Item Name': 'භාණ්ඩයේ නම',
                'Min Alert Quantity': 'අවම අවවාද ප්‍රමාණය',
                'Item Images': 'භාණ්ඩ පින්තූර',
                'Current Images': 'වත්මන් පින්තූර',
                'No images available': 'පින්තූර නොමැත',
                'Click to upload or drag and drop': 'උඩුගත කිරීමට හෝ ඇදගෙන යාමට ක්ලික් කරන්න',
                'PNG, JPG, GIF up to 10MB': 'PNG, JPG, GIF 10MB දක්වා',
                'Alert when stock falls below this level': 'තොගය මෙම මට්ටමට වඩා අඩු වූ විට අවවාද කරන්න',
                'This item already exists in your inventory': 'මෙම භාණ්ඩය ඔබගේ ඉන්වෙන්ටරියේ දැනටමත් පවතී.',
                'Existing Item Details': 'පවතින භාණ්ඩ විස්තර',
                'There were errors with your submission': 'ඔබගේ ඉදිරිපත් කිරීමේ දෝෂ තිබුණි',
                'CLEAR': 'මකන්න',
                'BACK': 'ආපසු',
                'UPDATE': 'යාවත්කාලීන කරන්න',
                'LogOut': 'පිටවීම',
                'To remove new images, please clear the form and select images again.': 'නව පින්තූර ඉවත් කිරීමට, කරුණාකර පෝරමය මකලා නැවත පින්තූර තෝරන්න.'
            }
        };

        function translatePage(lang) {
            Object.keys(translations.en).forEach(function(key) {
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

        // Global variables for duplicate handling
        let existingItemData = null;
        let isDuplicate = false;
        const currentItemId = {{ $inventory->id }};

        // Document ready function
        document.addEventListener("DOMContentLoaded", function() {
            const itemNameInput = document.getElementById("it_name");
            const submitBtn = document.getElementById("submitBtn");
            const clearBtn = document.getElementById("clearBtn");
            const imageInput = document.getElementById("it_images");

            // Function to update submit button state
            function updateSubmitButtonState() {
                submitBtn.disabled = isDuplicate;
                if (submitBtn.disabled) {
                    submitBtn.classList.remove("bg-teal-500", "hover:bg-teal-600");
                    submitBtn.classList.add("bg-gray-400", "cursor-not-allowed");
                } else {
                    submitBtn.classList.remove("bg-gray-400", "cursor-not-allowed");
                    submitBtn.classList.add("bg-teal-500", "hover:bg-teal-600");
                }
            }

            // Duplicate check functionality
            let duplicateCheckTimeout;
            itemNameInput.addEventListener("input", function() {
                const itemName = this.value.trim();
                const duplicateWarning = document.getElementById("duplicate-warning");
                
                clearTimeout(duplicateCheckTimeout);
                if (!itemName) {
                    duplicateWarning.classList.add("hidden");
                    isDuplicate = false;
                    updateSubmitButtonState();
                    return;
                }
                
                duplicateCheckTimeout = setTimeout(() => {
                    checkDuplicateItem(itemName);
                }, 500);
            });

            // Function to check duplicate items via AJAX
            function checkDuplicateItem(itemName) {
                $.ajax({
                    url: '{{ route("inventory.checkDuplicate") }}',
                    method: 'POST',
                    data: {
                        item_name: itemName,
                        exclude_id: currentItemId
                    },
                    success: function(response) {
                        const duplicateWarning = document.getElementById("duplicate-warning");
                        const existingDetails = document.getElementById("existing-item-details");
                        
                        if (response.exists) {
                            existingItemData = response.item;
                            isDuplicate = true;
                            
                            duplicateWarning.classList.remove("hidden");
                            existingDetails.innerHTML = `
                                <div class="mt-1">
                                    <span class="text-xs">ID: ${response.item.Itm_id}</span><br>
                                    <span class="text-xs">Current Qty: ${response.item.total_quantity}</span><br>
                                    <span class="text-xs">Average Price: Rs. ${response.item.average_unit_price ? Number(response.item.average_unit_price).toFixed(2) : 'N/A'}</span>
                                </div>
                            `;
                        } else {
                            duplicateWarning.classList.add("hidden");
                            existingItemData = null;
                            isDuplicate = false;
                        }
                        
                        updateSubmitButtonState();
                    },
                    error: function(xhr) {
                        console.error('Error checking duplicate:', xhr.responseText);
                    }
                });
            }

            // Form submission handler
            document.getElementById("inventoryForm").addEventListener("submit", function(e) {
                if (isDuplicate) {
                    e.preventDefault();
                    alert("Cannot submit form. Item name already exists.");
                    return false;
                }
                return true;
            });

            // Clear button functionality
            clearBtn.addEventListener('click', function() {
                document.getElementById('duplicate-warning').classList.add('hidden');
                document.getElementById('image-preview').classList.add('hidden');
                existingItemData = null;
                isDuplicate = false;
                updateSubmitButtonState();
                // Reset item name and min quantity to original values
                document.getElementById('it_name').value = "{{ $inventory->it_name }}";
                document.getElementById('min_quantity').value = "{{ $inventory->min_quantity }}";
            });

            // Image preview functionality
            imageInput.addEventListener('change', function() {
                const files = this.files;
                const previewContainer = document.getElementById('image-preview');
                previewContainer.innerHTML = '';
                
                if (files.length > 0) {
                    previewContainer.classList.remove('hidden');
                    Array.from(files).forEach((file, index) => {
                        if (file.type.startsWith('image/')) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                const imgDiv = document.createElement('div');
                                imgDiv.className = 'relative';
                                imgDiv.innerHTML = `
                                    <img src="${e.target.result}" class="w-full h-24 object-cover rounded-lg border">
                                    <span class="absolute top-1 right-1 bg-red-500 text-white text-xs px-2 py-1 rounded cursor-pointer" onclick="removeImage(${index})">×</span>
                                `;
                                previewContainer.appendChild(imgDiv);
                            };
                            reader.readAsDataURL(file);
                        }
                    });
                } else {
                    previewContainer.classList.add('hidden');
                }
            });

            // Set initial language to English
            setLanguage('en');
            updateSubmitButtonState();
        });

        // Function to remove existing image
        function removeExistingImage(index) {
            const imageContainer = document.getElementsByClassName('relative')[index];
            if (imageContainer) {
                imageContainer.remove();
                // Remove the corresponding hidden input
                const hiddenInputs = document.getElementsByName('existing_images[]');
                if (hiddenInputs[index]) {
                    hiddenInputs[index].remove();
                }
            }
        }

        // Function to remove new image from preview
        function removeImage(index) {
            alert('To remove new images, please clear the form and select images again.');
        }
    </script>
</body>
</html>
