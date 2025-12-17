<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Rental Management System</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        .select2-container {
            width: 100% !important;
        }
        .select2-container .select2-selection--single {
            height: 40px;
            border: 1px solid #d1d5db;
            border-radius: 0.75rem;
            padding: 0.5rem 1rem;
            background-color: #fff;
            display: flex;
            align-items: center;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 1.5rem;
            color: #374151;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
            right: 8px;
        }
        .select2-container--default .select2-results__option {
            padding: 8px 12px;
            color: #374151;
        }
        .select2-container--default .select2-search--dropdown .select2-search__field {
            border-radius: 0.5rem;
            border: 1px solid #d1d5db;
            padding: 8px 12px;
            height: 40px;
        }
        .select2-container--default .select2-selection--single:focus {
            outline: none;
            border-color: #14b8a6;
            box-shadow: 0 0 0 2px rgba(20, 184, 166, 0.2);
        }
        .alert-message {
            animation: slideIn 0.5s ease-in-out;
        }
        @keyframes slideIn {
            from { transform: translateX(100%); }
            to { transform: translateX(0); }
        }
    </style>
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
                                   class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
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
                <div class="flex items-center gap-2">
                    <span class="material-icons text-gray-400">inventory_2</span>
                    <span class="text-xl font-semibold font-poppins text-gray-900">Inventory</span>
                    <span class="material-icons text-gray-400">chevron_right</span>
                    <span class="text-xl font-normal font-poppins text-gray-900">Add GRN Items</span>
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
                    <button type="button" class="text-gray-700 hover:text-gray-900 transition">
                        <span data-translate="LogOut">LogOut</span>
                    </button>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 p-8 bg-gray-50 overflow-y-auto">
                <div class="max-w-6xl mx-auto">
                    <div class="bg-white rounded-2xl shadow p-8 border border-gray-200">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-6" data-translate="Add New Inventory Items">Add Purchase</h2>
                        
                        <!-- Alert Messages -->
                        <div id="alert-container" class="mb-6"></div>

                        <!-- Form for Adding Items -->
                        <form id="addItemsForm">
                            @csrf
                            
                            <!-- Purchase Details Section -->
                            <div class="bg-blue-50 rounded-xl p-6 mb-6 border-l-4 border-blue-500">
                                <h3 class="text-lg font-semibold text-blue-700 mb-4 flex items-center">
                                    <span class="material-icons mr-2">info</span>
                                    <span data-translate="Purchase Details">Purchase Details</span>
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div class="relative">
                                        <div class="flex items-center mb-1">
                                            <label class="block text-sm font-medium text-gray-700" data-translate="Supplier Name">Supplier Name</label>
                                            <button type="button" id="add-supplier-btn" class="ml-2 text-teal-500 hover:text-teal-700" style="font-size: 16px;" title="Add New Supplier" data-bs-toggle="modal" data-bs-target="#supplierModal">
                                                <span class="material-icons">add</span>
                                            </button>
                                        </div>
                                        <select id="supplier_select" class="w-full h-10 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500 select2" name="supplier_id" required>
                                            <option value="" data-translate="Select Supplier">Select Supplier</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Date">Date</label>
                                        <input type="date" id="purchase_date" name="date" class="w-full h-10 px-3 py-2 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Reference No">Reference No</label>
                                        <input type="text" id="reference_no" name="reference_no" class="w-full h-10 px-3 py-2 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500" data-translate-placeholder="Enter reference number" placeholder="Enter reference number">
                                    </div>
                                </div>
                            </div>

                            <!-- Items to Add Section -->
                            <div class="bg-orange-50 rounded-xl p-6 mb-6 border-l-4 border-orange-500">
                                <h3 class="text-lg font-semibold text-orange-700 mb-4 flex items-center justify-between">
                                    <div class="flex items-center">
                                        <span class="material-icons mr-2">inventory</span>
                                        <span data-translate="Items to Add">Purchased Items</span>
                                    </div>
                                </h3>
                                
                                <div id="items_container">
                                    <div class="item_row bg-white rounded-lg border p-4 mb-4">
                                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                                            <div class="md:col-span-2">
                                                <div class="flex items-center mb-1">
                                                    <label class="block text-sm font-medium text-gray-700" data-translate="Select Item">Select Item</label>
                                                    <button type="button" class="add-item-btn ml-2 text-teal-500 hover:text-teal-700" style="font-size: 16px;" title="Create New Item">
                                                        <span class="material-icons">add</span>
                                                    </button>
                                                </div>
                                                <!-- FIXED: Changed name to match controller validation -->
                                                <select class="item_select w-full h-10 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500 select2" name="items[0][existing_item_id]" required>
                                                    <option value="" data-translate="Select Item">Select Item</option>
                                                </select>
                                                <input type="hidden" class="item_name_input" name="items[0][item_name]">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Quantity">Quantity</label>
                                                <input type="number" class="quantity_input w-full h-10 px-3 py-2 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500" name="items[0][quantity_to_add]" data-translate-placeholder="Enter quantity" placeholder="Enter quantity" value="1" min="1" required>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Unit Price">Unit Price</label>
                                                <input type="number" class="unit_price_input w-full h-10 px-3 py-2 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500" name="items[0][price_per_unit]" data-translate-placeholder="Enter unit price" placeholder="Enter unit price" step="0.01" min="0" required>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Item Total Value">Item Total Value</label>
                                                <input type="number" class="item_total_value w-full h-10 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300" readonly data-translate-placeholder="Calculated automatically" placeholder="Calculated automatically">
                                            </div>
                                            <div class="flex items-end">
                                                <button type="button" class="remove_item w-full h-10 bg-red-500 text-white rounded-xl hover:bg-red-600 transition flex items-center justify-center" style="display: none;">
                                                    <span class="material-icons">close</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="add_item" class="flex items-center px-4 py-2 bg-teal-500 text-white rounded-xl hover:bg-teal-600 transition">
                                    <span class="material-icons mr-2">add</span>
                                    <span data-translate="Add Another Item">Add Another Item</span>
                                </button>
                            </div>

                            <!-- Notes Section -->
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2" data-translate="Notes">Notes (Optional)</label>
                                <textarea id="notes" name="notes" rows="3" data-translate-placeholder="Add any additional notes about these items..." placeholder="Add any additional notes about these items..." class="w-full px-3 py-2 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"></textarea>
                            </div>

                            <!-- Purchase Totals Section -->
                            <div class="bg-blue-50 rounded-xl p-6 mb-6 border-l-4 border-blue-500">
                                <h3 class="text-lg font-semibold text-blue-700 mb-4 flex items-center">
                                    <span class="material-icons mr-2">attach_money</span>
                                    <span data-translate="Purchase Totals">Purchase Totals</span>
                                </h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Total GRN Value">Total GRN Value</label>
                                        <input type="number" id="total_grn_value" name="total_grn_value" class="w-full h-10 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300 focus:outline-none" placeholder="0.00" step="0.01" readonly>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Paid Value">Paid Value</label>
                                        <input type="number" id="paid_value" name="paid_value" class="w-full h-10 px-3 py-2 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500" data-translate-placeholder="Enter paid value" placeholder="Enter paid value" step="0.01" min="0" value="0">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="flex justify-end gap-4 mt-8">
                                <button type="button" id="clearBtn" class="h-12 px-6 bg-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-300 transition">
                                    <span data-translate="CLEAR">CLEAR</span>
                                </button>
                                <a href="{{ route('inventory.index') }}" class="h-12 px-6 bg-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-300 transition flex items-center justify-center">
                                    <span data-translate="BACK">BACK</span>
                                </a>
                                <button type="submit" id="submitBtn" class="h-12 px-6 bg-teal-500 text-white rounded-xl font-semibold hover:bg-teal-600 transition flex items-center">
                                    <span class="material-icons mr-2">add_box</span>
                                    <span data-translate="ADD ITEMS">ADD ITEMS</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Supplier Registration Modal -->
    <div class="modal fade" id="supplierModal" tabindex="-1" aria-labelledby="supplierModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supplierModalLabel" data-translate="Add New Supplier">Add New Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="supplierForm">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" data-translate="Supplier Name">Supplier Name</label>
                            <input type="text" class="form-control" name="supplier_name" required data-translate-placeholder="Enter supplier name" placeholder="Enter supplier name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" data-translate="Contact Number">Contact Number</label>
                            <input type="text" class="form-control" name="contact_number" data-translate-placeholder="Enter contact number" placeholder="Enter contact number">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" data-translate="Email">Email</label>
                            <input type="email" class="form-control" name="email" data-translate-placeholder="Enter email" placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" data-translate="Address">Address</label>
                            <textarea class="form-control" name="address" rows="3" data-translate-placeholder="Enter address" placeholder="Enter address"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-translate="Close">Close</button>
                    <button type="button" class="btn btn-primary" id="saveSupplierBtn" data-translate="Save Supplier">Save Supplier</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Item Creation Modal -->
    <div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="itemModalLabel" data-translate="Add New Item">Add New Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="itemForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" data-translate="Item Name">Item Name</label>
                            <input type="text" class="form-control" name="it_name" required data-translate-placeholder="Enter item name" placeholder="Enter item name">
                            <!-- Duplicate warning display -->
                            <div id="duplicate-warning" class="hidden mt-2 p-3 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 text-sm rounded">
                                <div class="flex items-center">
                                    <span class="material-icons text-yellow-600 mr-2 text-lg">warning</span>
                                    <span data-translate="This item already exists in your inventory">This item already exists in your inventory.</span>
                                </div>
                                <div class="mt-2 text-xs">
                                    <strong data-translate="Existing Item Details">Existing Item Details:</strong>
                                    <div id="existing-item-details"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" data-translate="Min Alert Quantity">Min Alert Quantity</label>
                            <input type="number" class="form-control" name="min_quantity" min="0" data-translate-placeholder="Enter minimum alert quantity" placeholder="Enter minimum alert quantity">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" data-translate="Price Per Unit">Price Per Unit</label>
                            <input type="number" class="form-control" name="price_per_unit" step="0.01" min="0" required data-translate-placeholder="Enter price per unit" placeholder="Enter price per unit">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" data-translate="Item Images">Item Images (Optional)</label>
                            <input type="file" class="form-control" name="it_images[]" multiple accept="image" data-translate-placeholder="Upload images" placeholder="Upload images">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-translate="Close">Close</button>
                    <button type="button" class="btn btn-primary" id="saveItemBtn" data-translate="Save Item">Save Item</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-green-500 text-white">
                    <h5 class="modal-title" id="successModalLabel">
                        <span class="material-icons align-middle me-2">check_circle</span>
                        <span data-translate="Items Added Successfully">Items Added Successfully!</span>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center py-4">
                        <div class="text-6xl text-green-500 mb-4">
                            <span class="material-icons" style="font-size: 4rem;">check_circle</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2" data-translate="Stocks Added Successfully">Stocks Added Successfully!</h3>
                        <p class="text-gray-600 mb-2"><span data-translate="Batch ID">Batch ID</span>: <span id="batch-id-display" class="font-semibold text-teal-600"></span></p>
                        <p class="text-gray-600 mb-2"><span data-translate="Supplier Name">Supplier Name</span>: <span id="supplier-name-display" class="font-semibold text-teal-600"></span></p>
                        <p class="text-gray-600 mb-2"><span data-translate="Date">Date</span>: <span id="date-display" class="font-semibold text-teal-600"></span></p>
                        <p class="text-gray-600 mb-2"><span data-translate="Reference No">Reference No</span>: <span id="reference-no-display" class="font-semibold text-teal-600"></span></p>
                        <p class="text-gray-600 mb-2"><span data-translate="Total GRN Value">Total GRN Value</span>: <span id="total-grn-value-display" class="font-semibold text-teal-600"></span></p>
                        <p class="text-gray-600 mb-4"><span data-translate="Paid Value">Paid Value</span>: <span id="paid-value-display" class="font-semibold text-teal-600"></span></p>
                        <div id="added-items-list" class="text-left mb-4"></div>
                        <div class="flex justify-center gap-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span data-translate="Close">Close</span></button>
                            <a href="{{ route('inventory.index') }}" class="btn btn-primary"><span data-translate="View All Items">View All Items</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Language translations
        const translations = {
            en: {
                'Add New Inventory Items': 'Add Purchase',
                'Purchase Details': 'Purchase Details',
                'Supplier Name': 'Supplier Name',
                'Select Supplier': 'Select Supplier',
                'Date': 'Date',
                'Reference No': 'Reference No',
                'Enter reference number': 'Enter reference number',
                'Items to Add': 'Purchased Items',
                'Create New Item': 'Create New Item',
                'Select Item': 'Select Item',
                'Quantity': 'Quantity',
                'Enter quantity': 'Enter quantity',
                'Unit Price': 'Unit Price',
                'Enter unit price': 'Enter unit price',
                'Item Total Value': 'Item Total Value',
                'Calculated automatically': 'Calculated automatically',
                'Add Another Item': 'Add Another Item',
                'Notes': 'Notes (Optional)',
                'Add any additional notes about these items...': 'Add any additional notes about these items...',
                'Purchase Totals': 'Purchase Totals',
                'Total GRN Value': 'Total GRN Value',
                'Paid Value': 'Paid Value',
                'Enter paid value': 'Enter paid value',
                'CLEAR': 'CLEAR',
                'BACK': 'BACK',
                'ADD ITEMS': 'ADD ITEMS',
                'Add New Supplier': 'Add New Supplier',
                'Enter supplier name': 'Enter supplier name',
                'Contact Number': 'Contact Number',
                'Enter contact number': 'Enter contact number',
                'Email': 'Email',
                'Enter email': 'Enter email',
                'Address': 'Address',
                'Enter address': 'Enter address',
                'Close': 'Close',
                'Save Supplier': 'Save Supplier',
                'Add New Item': 'Add New Item',
                'Item Name': 'Item Name',
                'Enter item name': 'Enter item name',
                'Min Alert Quantity': 'Min Alert Quantity',
                'Enter minimum alert quantity': 'Enter minimum alert quantity',
                'Price Per Unit': 'Price Per Unit',
                'Enter price per unit': 'Enter price per unit',
                'Item Images': 'Item Images (Optional)',
                'Upload images': 'Upload images',
                'Save Item': 'Save Item',
                'Items Added Successfully': 'Items Added Successfully!',
                'Stocks Added Successfully': 'Stocks Added Successfully!',
                'Batch ID': 'Batch ID',
                'View All Items': 'View All Items',
                'Failed to load suppliers': 'Failed to load suppliers',
                'Failed to load items': 'Failed to load items',
                'Item already exists': 'Item already exists',
                'Select this item?': 'Select this item?',
                'This item already exists in your inventory': 'This item already exists in your inventory.',
                'Existing Item Details': 'Existing Item Details',
                'No items selected': 'Please select at least one valid item to add.',
                'Invalid form data': 'Please fill in all required fields correctly.',
                'An error occurred': 'An error occurred'
            },
            si: {
                'Add New Inventory Items': 'නව භාණ්ඩ එකතු කරන්න',
                'Purchase Details': 'මිලදී ගැනීමේ විස්තර',
                'Supplier Name': 'සැපයුම්කරුගේ නම',
                'Select Supplier': 'සැපයුම්කරු තෝරන්න',
                'Date': 'දිනය',
                'Reference No': 'යොමු අංකය',
                'Enter reference number': 'යොමු අංකය ඇතුලත් කරන්න',
                'Items to Add': 'මිලදී ගත් භාණ්ඩ',
                'Create New Item': 'නව භාණ්ඩයක් සාදන්න',
                'Select Item': 'භාණ්ඩය තෝරන්න',
                'Quantity': 'ප්‍රමාණය',
                'Enter quantity': 'ප්‍රමාණය ඇතුලත් කරන්න',
                'Unit Price': 'ඒකක මිල',
                'Enter unit price': 'ඒකක මිල ඇතුලත් කරන්න',
                'Item Total Value': 'භාණ්ඩයේ මුළු වටිනාකම',
                'Calculated automatically': 'ස්වයංක්‍රීයව ගණනය කෙරේ',
                'Add Another Item': 'තවත් භාණ්ඩයක් එකතු කරන්න',
                'Notes': 'සටහන් (විකල්ප)',
                'Add any additional notes about these items...': 'මෙම භාණ්ඩ ගැන අමතර සටහන් එකතු කරන්න...',
                'Purchase Totals': 'මිලදී ගැනීමේ එකතුව',
                'Total GRN Value': 'මුළු GRN වටිනාකම',
                'Paid Value': 'ගෙවූ වටිනාකම',
                'Enter paid value': 'ගෙවූ වටිනාකම ඇතුලත් කරන්න',
                'CLEAR': 'හිස් කරන්න',
                'BACK': 'ආපසු',
                'ADD ITEMS': 'භාණ්ඩ එකතු කරන්න',
                'Add New Supplier': 'නව සැපයුම්කරු එකතු කරන්න',
                'Enter supplier name': 'සැපයුම්කරුගේ නම ඇතුලත් කරන්න',
                'Contact Number': 'සම්බන්ධතා අංකය',
                'Enter contact number': 'සම්බන්ධතා අංකය ඇතුලත් කරන්න',
                'Email': 'විද්‍යුත් තැපෑල',
                'Enter email': 'විද්‍යුත් තැපෑල ඇතුලත් කරන්න',
                'Address': 'ලිපිනය',
                'Enter address': 'ලිපිනය ඇතුලත් කරන්න',
                'Close': 'වසන්න',
                'Save Supplier': 'සැපයුම්කරු සුරකින්න',
                'Add New Item': 'නව භාණ්ඩය එකතු කරන්න',
                'Item Name': 'භාණ්ඩයේ නම',
                'Enter item name': 'භාණ්ඩයේ නම ඇතුලත් කරන්න',
                'Min Alert Quantity': 'අවම අනතුරු ඇඟවීමේ ප්‍රමාණය',
                'Enter minimum alert quantity': 'අවම අනතුරු ඇඟවීමේ ප්‍රමාණය ඇතුලත් කරන්න',
                'Price Per Unit': 'ඒකකයක මිල',
                'Enter price per unit': 'ඒකකයක මිල ඇතුලත් කරන්න',
                'Item Images': 'භාණ්ඩයේ රූප (විකල්ප)',
                'Upload images': 'රූප උඩුගත කරන්න',
                'Save Item': 'භාණ්ඩය සුරකින්න',
                'Items Added Successfully': 'භාණ්ඩ සාර්ථකව එකතු කරන ලදි!',
                'Stocks Added Successfully': 'තොග සාර්ථකව එකතු කරන ලදි!',
                'Batch ID': 'කාණ්ඩ අංකය',
                'View All Items': 'සියලුම භාණ්ඩ බලන්න',
                'Failed to load suppliers': 'සැපයුම්කරුවන් ලබා ගැනීමට අපොහොසත් විය',
                'Failed to load items': 'භාණ්ඩ ලබා ගැනීමට අපොහොසත් විය',
                'Item already exists': 'භාණ්ඩය දැනටමත් පවතී',
                'Select this item?': 'මෙම භාණ්ඩය තෝරා ගන්නද?',
                'This item already exists in your inventory': 'මෙම භාණ්ඩය ඔබගේ ඉන්වෙන්ටරියේ දැනටමත් පවතී.',
                'Existing Item Details': 'පවතින භාණ්ඩ විස්තර',
                'No items selected': 'කරුණාකර අවම වශයෙන් එක් වලංගු භාණ්ඩයක් තෝරන්න.',
                'Invalid form data': 'කරුණාකර සියලුම අවශ්‍ය ක්ෂේත්‍ර නිවැරදිව පුරවන්න.',
                'An error occurred': 'දෝෂයක් සිදුවිය'
            }
        };

        let currentLanguage = 'en';

        function setLanguage(lang) {
            currentLanguage = lang;
            $('[data-translate]').each(function() {
                const key = $(this).data('translate');
                $(this).text(translations[lang][key] || key);
            });
            $('[data-translate-placeholder]').each(function() {
                const key = $(this).data('translate-placeholder');
                $(this).attr('placeholder', translations[lang][key] || key);
            });
            $('#lang-en').toggleClass('underline opacity-50', lang !== 'en');
            $('#lang-si').toggleClass('underline opacity-50', lang !== 'si');
        }

        // Set CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            let itemCounter = 0;
            let availableItems = [];
            let availableSuppliers = [];
            let isDuplicate = false;
            let existingItemData = null;

            // Initialize Select2 with search enabled
            function initializeSelect2(selectElement, placeholderKey) {
                const placeholder = translations[currentLanguage][placeholderKey] || placeholderKey;
                selectElement.select2({
                    theme: 'bootstrap-5',
                    width: '100%',
                    dropdownCssClass: 'select2-dropdown',
                    placeholder: placeholder,
                    allowClear: true,
                    minimumResultsForSearch: 0 // Always show search box
                });
            }

            // Load available items
            function loadAvailableItems() {
                $.get('{{ route("inventory.available-items") }}')
                    .done(function(data) {
                        availableItems = data || [];
                        $('.item_select').each(function() {
                            populateItems($(this));
                        });
                    })
                    .fail(function() {
                        showAlert('error', translations[currentLanguage]['Failed to load items'] || 'Failed to load items');
                    });
            }

            // Populate items dropdown
            function populateItems(selectElement) {
                selectElement.empty();
                selectElement.append(`<option value="" data-translate="Select Item">${translations[currentLanguage]['Select Item'] || 'Select Item'}</option>`);
                availableItems.forEach(item => {
                    selectElement.append(`<option value="${item.id}" data-price="${item.price_per_unit}">${item.it_name}</option>`);
                });
                selectElement.trigger('change');
            }

            // Load available suppliers
            function loadAvailableSuppliers() {
                $.get('{{ route("inventory.available-suppliers") }}')
                    .done(function(data) {
                        availableSuppliers = data || [];
                        populateSupplierDropdown();
                    })
                    .fail(function() {
                        showAlert('error', translations[currentLanguage]['Failed to load suppliers'] || 'Failed to load suppliers');
                    });
            }

            // Populate supplier dropdown
            function populateSupplierDropdown() {
                const select = $('#supplier_select');
                select.empty();
                select.append(`<option value="" data-translate="Select Supplier">${translations[currentLanguage]['Select Supplier'] || 'Select Supplier'}</option>`);
                availableSuppliers.forEach(supplier => {
                    select.append(`<option value="${supplier.id}">${supplier.name}</option>`);
                });
                select.trigger('change');
            }

            // Set default date to today
            $('#purchase_date').val(new Date().toISOString().split('T')[0]);

            // Calculate and update total GRN value and item totals
            function updateTotals() {
                let totalGrnValue = 0;
                $('.item_row').each(function() {
                    const quantity = parseFloat($(this).find('.quantity_input').val()) || 0;
                    const unitPrice = parseFloat($(this).find('.unit_price_input').val()) || 0;
                    const itemTotal = quantity * unitPrice;
                    $(this).find('.item_total_value').val(itemTotal.toFixed(2));
                    totalGrnValue += itemTotal;
                });
                $('#total_grn_value').val(totalGrnValue.toFixed(2));
            }

            // Update totals on input change
            $(document).on('input', '.quantity_input, .unit_price_input', function() {
                updateTotals();
            });

            // Add new item row
            $('#add_item').click(function() {
                itemCounter++;
                const newRow = `
                    <div class="item_row bg-white rounded-lg border p-4 mb-4">
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                            <div class="md:col-span-2">
                                <div class="flex items-center mb-1">
                                    <label class="block text-sm font-medium text-gray-700" data-translate="Select Item">Select Item</label>
                                    <button type="button" class="add-item-btn ml-2 text-teal-500 hover:text-teal-700" style="font-size: 16px;">
                                        <span class="material-icons">add</span>
                                    </button>
                                </div>
                                <select class="item_select w-full h-10 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500 select2" name="items[${itemCounter}][existing_item_id]" required>
                                    <option value="" data-translate="Select Item">Select Item</option>
                                </select>
                                <input type="hidden" class="item_name_input" name="items[${itemCounter}][item_name]">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Quantity">Quantity</label>
                                <input type="number" class="quantity_input w-full h-10 px-3 py-2 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500" name="items[${itemCounter}][quantity_to_add]" data-translate-placeholder="Enter quantity" placeholder="Enter quantity" value="1" min="1" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Unit Price">Unit Price</label>
                                <input type="number" class="unit_price_input w-full h-10 px-3 py-2 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500" name="items[${itemCounter}][price_per_unit]" data-translate-placeholder="Enter unit price" placeholder="Enter unit price" step="0.01" min="0" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Item Total Value">Item Total Value</label>
                                <input type="number" class="item_total_value w-full h-10 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300" readonly data-translate-placeholder="Calculated automatically" placeholder="Calculated automatically">
                            </div>
                            <div class="flex items-end">
                                <button type="button" class="remove_item w-full h-10 bg-red-500 text-white rounded-xl hover:bg-red-600 transition flex items-center justify-center">
                                    <span class="material-icons">close</span>
                                </button>
                            </div>
                        </div>
                    </div>`;
                $('#items_container').append(newRow);
                const newSelect = $(`select[name="items[${itemCounter}][existing_item_id]"]`);
                initializeSelect2(newSelect, 'Select Item');
                populateItems(newSelect);
                updateTotals();
            });

            // Remove item row
            $(document).on('click', '.remove_item', function() {
                if ($('.item_row').length > 1) {
                    $(this).closest('.item_row').remove();
                    updateTotals();
                }
            });

            // Initialize Select2 for supplier and initial item select
            initializeSelect2($('#supplier_select'), 'Select Supplier');
            initializeSelect2($('.item_select'), 'Select Item');

            // Supplier Modal
            $('#add-supplier-btn').click(function() {
                $('#supplierModal').modal('show');
            });

            $('#saveSupplierBtn').click(function() {
                const formData = new FormData($('#supplierForm')[0]);
                $.ajax({
                    url: '{{ route("inventory.create-supplier") }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.success) {
                            showAlert('success', data.message || 'Supplier created successfully');
                            $('#supplierModal').modal('hide');
                            loadAvailableSuppliers();
                            $('#supplier_select').val(data.supplier_id).trigger('change');
                            $('#supplierForm')[0].reset();
                        } else {
                            showAlert('error', data.message || 'Failed to create supplier');
                        }
                    },
                    error: function(xhr) {
                        const error = xhr.responseJSON;
                        showAlert('error', error ? Object.values(error.errors).flat().join('<br>') : 'An error occurred');
                    }
                });
            });

            // Item Modal
            $(document).on('click', '.add-item-btn', function() {
                $('#itemModal').modal('show');
                $(this).closest('.item_row').find('.item_select').data('target-select', true);
                $('#duplicate-warning').addClass('hidden'); // Reset duplicate warning
                isDuplicate = false;
                updateSaveItemButtonState();
            });

            // Update Save Item button state
            function updateSaveItemButtonState() {
                const saveItemBtn = $('#saveItemBtn');
                saveItemBtn.prop('disabled', isDuplicate);
                if (isDuplicate) {
                    saveItemBtn.removeClass('btn-primary').addClass('btn-secondary cursor-not-allowed');
                } else {
                    saveItemBtn.removeClass('btn-secondary cursor-not-allowed').addClass('btn-primary');
                }
            }

            // Duplicate check for item name
            let duplicateCheckTimeout;
            $('#itemForm input[name="it_name"]').on('input', function() {
                const itemName = $(this).val().trim();
                const duplicateWarning = $('#duplicate-warning');
                
                clearTimeout(duplicateCheckTimeout);
                if (!itemName) {
                    duplicateWarning.addClass('hidden');
                    isDuplicate = false;
                    updateSaveItemButtonState();
                    return;
                }
                
                duplicateCheckTimeout = setTimeout(() => {
                    $.ajax({
                        url: '{{ route("inventory.checkDuplicate") }}',
                        type: 'POST',
                        data: { item_name: itemName },
                        success: function(data) {
                            const existingDetails = $('#existing-item-details');
                            if (data.exists) {
                                existingItemData = data.item;
                                isDuplicate = true;
                                duplicateWarning.removeClass('hidden');
                                existingDetails.html(`
                                    <div class="mt-1">
                                        <span class="text-xs">ID: ${data.item.Itm_id}</span><br>
                                        <span class="text-xs">Current Qty: ${data.item.total_quantity}</span><br>
                                        <span class="text-xs">Average Price: Rs. ${data.item.average_unit_price ? Number(data.item.average_unit_price).toFixed(2) : 'N/A'}</span>
                                    </div>
                                `);
                            } else {
                                duplicateWarning.addClass('hidden');
                                existingItemData = null;
                                isDuplicate = false;
                            }
                            updateSaveItemButtonState();
                        },
                        error: function() {
                            showAlert('error', translations[currentLanguage]['Failed to check for duplicate item'] || 'Failed to check for duplicate item');
                        }
                    });
                }, 500);
            });

            $('#saveItemBtn').click(function() {
                if (isDuplicate) {
                    const message = `${translations[currentLanguage]['Item already exists']}: ${existingItemData.it_name}. ${translations[currentLanguage]['Select this item?']}`;
                    if (confirm(message)) {
                        const targetSelect = $('.item_select').filter(function() {
                            return $(this).data('target-select');
                        });
                        if (targetSelect.length) {
                            targetSelect.val(existingItemData.id).trigger('change');
                            targetSelect.closest('.item_row').find('.item_name_input').val(existingItemData.it_name);
                            $('#itemModal').modal('hide');
                            $('#itemForm')[0].reset();
                            $('#duplicate-warning').addClass('hidden');
                            isDuplicate = false;
                            updateSaveItemButtonState();
                            return;
                        }
                    }
                    return;
                }

                const formData = new FormData($('#itemForm')[0]);
                $.ajax({
                    url: '{{ route("inventory.create-item") }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.success) {
                            showAlert('success', data.message || 'Item created successfully');
                            $('#itemModal').modal('hide');
                            loadAvailableItems();
                            const targetSelect = $('.item_select').filter(function() {
                                return $(this).data('target-select');
                            });
                            if (targetSelect.length) {
                                targetSelect.val(data.item_id).trigger('change');
                                targetSelect.closest('.item_row').find('.quantity_input').val(data.quantity);
                                targetSelect.closest('.item_row').find('.unit_price_input').val(data.price_per_unit);
                                targetSelect.closest('.item_row').find('.item_name_input').val(data.item_name);
                                targetSelect.removeData('target-select');
                                updateTotals();
                            }
                            $('#itemForm')[0].reset();
                            $('#duplicate-warning').addClass('hidden');
                            isDuplicate = false;
                            updateSaveItemButtonState();
                        } else {
                            showAlert('error', data.message || 'Failed to create item');
                        }
                    },
                    error: function(xhr) {
                        const error = xhr.responseJSON;
                        showAlert('error', error ? Object.values(error.errors).flat().join('<br>') : 'An error occurred');
                    }
                });
            });

            // FIXED: Auto-fill unit price and item name on item selection
            $(document).on('change', '.item_select', function() {
                const selectedItemId = $(this).val();
                const item = availableItems.find(i => i.id == selectedItemId);
                const row = $(this).closest('.item_row');
                if (item) {
                    // Ensure price_per_unit is a number before calling toFixed
                    const price = parseFloat(item.price_per_unit) || 0;
                    row.find('.unit_price_input').val(price.toFixed(2));
                    row.find('.item_name_input').val(item.it_name);
                    updateTotals();
                } else {
                    row.find('.unit_price_input').val('');
                    row.find('.item_name_input').val('');
                    row.find('.item_total_value').val('');
                }
            });

            // Clear form
            $('#clearBtn').click(function() {
                resetForm();
            });

            // FIXED: Helper function to reset form
            function resetForm() {
                $('#addItemsForm')[0].reset();
                $('#items_container').html(`
                    <div class="item_row bg-white rounded-lg border p-4 mb-4">
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                            <div class="md:col-span-2">
                                <div class="flex items-center mb-1">
                                    <label class="block text-sm font-medium text-gray-700" data-translate="Select Item">Select Item</label>
                                    <button type="button" class="add-item-btn ml-2 text-teal-500 hover:text-teal-700" style="font-size: 16px;">
                                        <span class="material-icons">add</span>
                                    </button>
                                </div>
                                <select class="item_select w-full h-10 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500 select2" name="items[0][existing_item_id]" required>
                                    <option value="" data-translate="Select Item">Select Item</option>
                                </select>
                                <input type="hidden" class="item_name_input" name="items[0][item_name]">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Quantity">Quantity</label>
                                <input type="number" class="quantity_input w-full h-10 px-3 py-2 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500" name="items[0][quantity_to_add]" data-translate-placeholder="Enter quantity" placeholder="Enter quantity" value="1" min="1" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Unit Price">Unit Price</label>
                                <input type="number" class="unit_price_input w-full h-10 px-3 py-2 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500" name="items[0][price_per_unit]" data-translate-placeholder="Enter unit price" placeholder="Enter unit price" step="0.01" min="0" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Item Total Value">Item Total Value</label>
                                <input type="number" class="item_total_value w-full h-10 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300" readonly data-translate-placeholder="Calculated automatically" placeholder="Calculated automatically">
                            </div>
                            <div class="flex items-end">
                                <button type="button" class="remove_item w-full h-10 bg-red-500 text-white rounded-xl hover:bg-red-600 transition flex items-center justify-center" style="display: none;">
                                    <span class="material-icons">close</span>
                                </button>
                            </div>
                        </div>
                    </div>
                `);
                
                itemCounter = 0;
                $('#total_grn_value').val('');
                $('#paid_value').val('0');
                $('#purchase_date').val(new Date().toISOString().split('T')[0]);
                
                initializeSelect2($('.item_select'), 'Select Item');
                populateItems($('.item_select'));
                loadAvailableSuppliers();
                setLanguage(currentLanguage);
            }

            // FIXED: Validate form before submission
            function validateFormData(formData) {
                const supplierId = formData.get('supplier_id');
                const date = formData.get('date');
                const totalGrnValue = formData.get('total_grn_value');
                const items = [];
                
                $('.item_row').each(function(index) {
                    const inventoryId = $(this).find('.item_select').val();
                    const itemName = $(this).find('.item_name_input').val();
                    const quantity = parseInt($(this).find('.quantity_input').val());
                    const pricePerUnit = parseFloat($(this).find('.unit_price_input').val());
                    
                    if (inventoryId && itemName && !isNaN(quantity) && quantity > 0 && !isNaN(pricePerUnit) && pricePerUnit >= 0) {
                        items.push({
                            existing_item_id: inventoryId,
                            item_name: itemName,
                            quantity_to_add: quantity,
                            price_per_unit: pricePerUnit
                        });
                    }
                });
                
                return {
                    isValid: supplierId && date && totalGrnValue && items.length > 0,
                    items: items
                };
            }   

            // FIXED: Form submission
            $('#addItemsForm').submit(function(e) {
                e.preventDefault();

                // Validate form data first
                const tempFormData = new FormData(this);
                const validation = validateFormData(tempFormData);
                
                if (!validation.isValid) {
                    showAlert('error', translations[currentLanguage]['Invalid form data'] || 'Please fill in all required fields correctly.');
                    return;
                }

                // Create clean FormData object with only necessary fields
                const formData = new FormData();
                
                // Add basic fields
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                formData.append('supplier_id', $('#supplier_select').val());
                formData.append('date', $('#purchase_date').val());
                formData.append('reference_no', $('#reference_no').val() || '');
                formData.append('notes', $('#notes').val() || '');
                formData.append('total_grn_value', $('#total_grn_value').val());
                formData.append('paid_value', $('#paid_value').val() || '0');

                // Add items with correct field names matching controller validation
                validation.items.forEach((item, index) => {
                    formData.append(`items[${index}][existing_item_id]`, item.existing_item_id);
                    formData.append(`items[${index}][item_name]`, item.item_name);
                    formData.append(`items[${index}][quantity_to_add]`, item.quantity_to_add);
                    formData.append(`items[${index}][price_per_unit]`, item.price_per_unit);
                });

                // Log FormData for debugging
                console.log('FormData contents:');
                for (let [key, value] of formData.entries()) {
                    console.log(`${key}: ${value}`);
                }

                $.ajax({
                    url: '{{ route("inventory.add-to-existing") }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.success) {
                            $('#batch-id-display').text(data.grn_id);
                            $('#supplier-name-display').text($('#supplier_select option:selected').text());
                            $('#date-display').text($('#purchase_date').val());
                            $('#reference-no-display').text($('#reference_no').val() || 'N/A');
                            $('#total-grn-value-display').text($('#total_grn_value').val());
                            $('#paid-value-display').text($('#paid_value').val() || '0.00');
                            
                            let itemsHtml = '<ul class="list-disc pl-5">';
                            validation.items.forEach(item => {
                                itemsHtml += `<li>${item.item_name}: ${item.quantity_to_add} units @ ${item.price_per_unit}</li>`;
                            });
                            itemsHtml += '</ul>';
                            $('#added-items-list').html(itemsHtml);
                            
                            $('#successModal').modal('show');
                            
                            // Reset form after success
                            resetForm();
                        } else {
                            showAlert('error', data.message || 'Failed to add items');
                        }
                    },
                    error: function(xhr) {
                        console.log('AJAX Error:', xhr.responseText);
                        let errorMessage = translations[currentLanguage]['An error occurred'] || 'An error occurred';
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            errorMessage = Object.values(xhr.responseJSON.errors).flat().join('<br>');
                        } else if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        showAlert('error', errorMessage);
                    }
                });
            });

            // Show alert
            function showAlert(type, message) {
                const alertClass = type === 'success' ? 'bg-green-100 border-green-500 text-green-700' : 'bg-red-100 border-red-500 text-red-700';
                const alertHtml = `
                    <div class="alert alert-${type} ${alertClass} border-l-4 p-4 mb-4 alert-message flex items-center">
                        <span class="material-icons mr-2">${type === 'success' ? 'check_circle' : 'error'}</span>
                        <div>${message}</div>
                        <button type="button" class="ml-auto text-gray-500 hover:text-gray-700" onclick="$(this).parent().remove()">
                            <span class="material-icons">close</span>
                        </button>
                    </div>`;
                $('#alert-container').append(alertHtml);
                setTimeout(() => {
                    $('.alert-message').fadeOut(500, function() { $(this).remove(); });
                }, 5000);
            }

            // Load initial data
            loadAvailableItems();
            loadAvailableSuppliers();
        });
    </script>
</body>
</html>