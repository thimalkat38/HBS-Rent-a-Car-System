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
    <!-- Bootstrap CSS and JS for modals -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 CSS and JS for searchable dropdowns -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .select2-container .select2-selection--single {
            height: 40px !important;
            border-radius: 12px !important;
            border: 1px solid #d1d5db !important;
            padding: 12px 16px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 16px !important;
            padding-left: 0 !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px !important;
            right: 8px !important;
        }

        .select2-container--default .select2-results__option {
            padding: 8px 12px;
        }

        .select2-container--default .select2-search--dropdown .select2-search__field {
            border-radius: 8px;
            border: 1px solid #d1d5db;
            padding: 8px 12px;
            height: 40px;
        }
    </style>

</head>

<body>
    <div class="min-h-screen bg-white flex">
        <!-- Sidebar (unchanged) -->
        <aside class="w-64 bg-slate-900 flex flex-col">
            <div class="flex items-center justify-center h-20">
                <span class="text-white text-4xl font-semibold font-poppins">R</span>
                <span class="text-teal-500 text-4xl font-semibold font-poppins">E</span>
                <span class="text-white text-4xl font-semibold font-poppins">NT CAR</span>
            </div>
            <nav class="flex-1 mt-6">
                <ul class="space-y-1">
                    <li><a href="{{ url('manager/dashboard') }}"
                            class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition"><span
                                class="material-icons mr-3">dashboard</span>Dashboard</a></li>
                    <li>
                        <div class="flex items-center px-6 py-3 text-white font-semibold rounded-l-full cursor-default">
                            <span class="material-icons mr-3">directions_car</span>Vehicles</div>
                        <ul class="ml-8 space-y-1">
                            <li><a href="{{ url('addvehicle') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition"><span
                                        class="material-icons mr-3">add_circle_outline</span>Add Vehicle</a></li>
                            <li><a href="{{ url('allvehicles') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition"><span
                                        class="material-icons mr-3">list_alt</span>All Vehicles</a></li>
                            <li><a href="{{ url('vehicle_owners') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition"><span
                                        class="material-icons mr-3">people_outline</span>Vehicle Owners</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="flex items-center px-6 py-3 text-white font-semibold rounded-l-full cursor-default">
                            <span class="material-icons mr-3">assignment</span>Bookings</div>
                        <ul class="ml-8 space-y-1">
                            <li><a href="{{ url('addbooking') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition"><span
                                        class="material-icons mr-3">add_circle_outline</span>Book Vehicle</a></li>
                            <li><a href="{{ url('bookings') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition"><span
                                        class="material-icons mr-3">history</span>Booking History</a></li>
                            <li><a href="{{ url('postbookings') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition"><span
                                        class="material-icons mr-3">check_circle_outline</span>Completed Businesses</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="flex items-center px-6 py-3 text-white font-semibold rounded-l-full cursor-default">
                            <span class="material-icons mr-3">people</span>Customers</div>
                        <ul class="ml-8 space-y-1">
                            <li><a href="{{ route('customers.create') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition"><span
                                        class="material-icons mr-3">person_add</span>Add Customer</a></li>
                            <li><a href="{{ route('customers.index') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition"><span
                                        class="material-icons mr-3">list</span>All Customers</a></li>
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
                    <li><a href="{{ url('crms') }}"
                            class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition"><span
                                class="material-icons mr-3">support_agent</span>CRM</a></li>
                    <li>
                        <div class="flex items-center px-6 py-3 text-white font-semibold rounded-l-full cursor-default">
                            <span class="material-icons mr-3">inventory_2</span>Inventory</div>
                        <ul class="ml-8 space-y-1">
                            <li><a href="{{ route('inventory.index') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition"><span
                                        class="material-icons mr-3">list</span>All Items</a></li>
                            <li><a href="{{ route('inventory.create') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition"><span
                                        class="material-icons mr-3">add_circle_outline</span>Add Item</a></li>
                            <li><a href="{{ route('inventory.grn') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition"><span
                                        class="material-icons mr-3">input</span>Add Stock</a></li>
                            <li><a href="{{ route('inventory.issue') }}"
                                    class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full"><span
                                        class="material-icons mr-3">output</span>Issue Items</a></li>
                            <li><a href="{{ route('inventory.issued-items') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition"><span
                                        class="material-icons mr-3">assignment_turned_in</span>Issued Items</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="flex items-center px-6 py-3 text-white font-semibold rounded-l-full cursor-default">
                            <span class="material-icons mr-3">account_balance_wallet</span>Finance</div>
                        <ul class="ml-8 space-y-1">
                            <li><a href="{{ url('expenses') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition"><span
                                        class="material-icons mr-3">receipt_long</span>Expenses</a></li>
                            <li><a href="{{ url('profit-loss-report') }}"
                                    class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition"><span
                                        class="material-icons mr-3">bar_chart</span>P/L Report</a></li>
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
                    <span class="text-xl font-normal font-poppins text-gray-900">Issued Items</span>
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
                    <div class="bg-white rounded-2xl shadow p-8 border border-gray-200">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-6"
                            data-translate="Issue Items to Vehicle/Employee">Issue Items to Vehicle/Employee</h2>

                        <!-- Alert Messages -->
                        <div id="alert-container" class="mb-6"></div>

                        <!-- Form for Issuing Items -->
                        <form id="issueItemsForm">
                            @csrf

                            <!-- Vehicle and Employee Sections Side by Side -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div class="bg-green-50 rounded-xl p-6 border-l-4 border-green-500">
                                    <h3 class="text-lg font-semibold text-green-800 mb-4 flex items-center">
                                        <span class="material-icons mr-2">directions_car</span>
                                        <span data-translate="Vehicle Details">Vehicle Details</span>
                                    </h3>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1"
                                            data-translate="Select Vehicle">Select Vehicle</label>
                                        <div class="relative">
                                            <select id="vehicle_select"
                                                class="w-full h-12 px-4 py-3 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                                style="height: 48px;">
                                                <option value="">Select vehicle</option>
                                            </select>
                                        </div>
                                        <input type="hidden" id="vehicle_id" name="vehicle_id">
                                        <div id="vehicle_status" class="mt-2 text-sm"></div>
                                    </div>
                                </div>

                                <div class="bg-purple-50 rounded-xl p-6 border-l-4 border-purple-500">
                                    <h3 class="text-lg font-semibold text-purple-800 mb-4 flex items-center">
                                        <span class="material-icons mr-2">badge</span>
                                        <span data-translate="Employee Details">Employee Details</span>
                                    </h3>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1"
                                            data-translate="Select Employee">Select Employee</label>
                                        <div class="relative">
                                            <select id="employee_select"
                                                class="w-full h-12 px-4 py-3 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                                style="height: 48px;">
                                                <option value="">Select employee</option>
                                            </select>
                                        </div>
                                        <input type="hidden" id="employee_id" name="employee_id">
                                        <input type="hidden" id="employee_name" name="employee_name">
                                        <div id="employee_status" class="mt-2 text-sm"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Items to Issue Section -->
                            <div class="bg-orange-50 rounded-xl p-6 mb-6 border-l-4 border-orange-500">
                                <h3 class="text-lg font-semibold text-orange-800 mb-4 flex items-center">
                                    <span class="material-icons mr-2">inventory</span>
                                    <span data-translate="Items to Issue">Items to Issue</span>
                                </h3>

                                <div id="items_container">
                                    <div class="item_row bg-white rounded-lg border p-4 mb-4">
                                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                                            <div class="md:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700 mb-1"
                                                    data-translate="Select Item">Select Item</label>
                                                <select
                                                    class="item_select w-full h-10 px-3 py-2 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                                    name="items[0][inventory_id]">
                                                    <option value="">Select Item</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1"
                                                    data-translate="Available">Available</label>
                                                <input type="text"
                                                    class="stock_info w-full h-10 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300"
                                                    readonly>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1"
                                                    data-translate="Quantity">Quantity</label>
                                                <input type="number"
                                                    class="quantity_input w-full h-10 px-3 py-2 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"
                                                    name="items[0][quantity]" placeholder="Qty" min="1">
                                            </div>
                                            <div class="flex items-end">
                                                <button type="button"
                                                    class="remove_item w-full h-10 bg-red-500 text-white rounded-xl hover:bg-red-600 transition flex items-center justify-center"
                                                    style="display: none;">
                                                    <span class="material-icons">close</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="add_item"
                                    class="flex items-center px-4 py-2 bg-teal-500 text-white rounded-xl hover:bg-teal-600 transition">
                                    <span class="material-icons mr-2">add</span>
                                    <span data-translate="Add Another Item">Add Another Item</span>
                                </button>
                            </div>

                            <!-- Notes Section -->
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2"
                                    data-translate="Notes">Notes (Optional)</label>
                                <textarea id="notes" name="notes" rows="3" placeholder="Add any additional notes about this issue..."
                                    class="w-full px-3 py-2 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500"></textarea>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex justify-end gap-4 mt-8">
                                <button type="button" id="clearBtn"
                                    class="h-12 px-6 bg-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-300 transition"><span
                                        data-translate="CLEAR">CLEAR</span></button>
                                <a href="{{ route('inventory.issued-items') }}"
                                    class="h-12 px-6 bg-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-300 transition flex items-center justify-center"><span
                                        data-translate="BACK">BACK</span></a>
                                <button type="submit" id="submitBtn"
                                    class="h-12 px-6 bg-teal-500 text-white rounded-xl font-semibold hover:bg-teal-600 transition flex items-center"><span
                                        class="material-icons mr-2">send</span><span
                                        data-translate="ISSUE ITEMS">ISSUE ITEMS</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-green-500 text-white">
                    <h5 class="modal-title" id="successModalLabel"><span
                            class="material-icons align-middle me-2">check_circle</span>Items Issued Successfully!</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center py-4">
                        <div class="text-6xl text-green-500 mb-4"><span class="material-icons"
                                style="font-size: 4rem;">check_circle</span></div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Items Issued Successfully!</h3>
                        <p class="text-gray-600 mb-4">Issue ID: <span id="issue-id-display"
                                class="font-semibold text-teal-600"></span></p>
                        <div class="flex justify-center gap-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="{{ route('inventory.issued-items') }}" class="btn btn-primary">View Issued
                                Items</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            let itemCounter = 0;
            let availableItems = [];
            let availableVehicles = [];
            let availableEmployees = [];

            loadAvailableItems();
            loadAvailableVehicles();
            loadAvailableEmployees();

            $('#vehicle_select').change(function() {
                const val = $(this).val();
                if (val) {
                    const vehicle = availableVehicles.find(v => v.id == val);
                    if (vehicle) {
                        $('#vehicle_id').val(vehicle.id);
                        $('#vehicle_status').html(
                            '<div class="flex items-center text-green-600"><span class="material-icons mr-1">check_circle</span>Vehicle found: ' +
                            vehicle.vehicle_model + ' ' + vehicle.vehicle_name + '</div>');
                    }
                } else {
                    $('#vehicle_id').val('');
                    $('#vehicle_status').empty();
                }
            });

            $('#employee_select').change(function() {
                const val = $(this).val();
                if (val) {
                    const employee = availableEmployees.find(e => e.id == val);
                    if (employee) {
                        $('#employee_id').val(employee.id);
                        $('#employee_name').val(employee.emp_name);
                        const nicDisplay = employee.employee_nic || 'N/A';
                        $('#employee_status').html(
                            '<div class="flex items-center text-green-600"><span class="material-icons mr-1">check_circle</span>Employee found: ' +
                            employee.emp_name + ' (' + nicDisplay + ')</div>');
                    }
                } else {
                    $('#employee_id').val('');
                    $('#employee_name').val('');
                    $('#employee_status').empty();
                }
            });

            $('#add_item').click(function() {
                itemCounter++;
                const newRow = `
                    <div class="item_row bg-white rounded-lg border p-4 mb-4">
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Select Item">Select Item</label>
                                <select class="item_select w-full h-10 px-3 py-2 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500" name="items[${itemCounter}][inventory_id]">
                                    <option value="">Select Item</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Available">Available</label>
                                <input type="text" class="stock_info w-full h-10 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Quantity">Quantity</label>
                                <input type="number" class="quantity_input w-full h-10 px-3 py-2 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500" name="items[${itemCounter}][quantity]" placeholder="Qty" min="1">
                            </div>
                            <div class="flex items-end">
                                <button type="button" class="remove_item w-full h-10 bg-red-500 text-white rounded-xl hover:bg-red-600 transition flex items-center justify-center">
                                    <span class="material-icons">close</span>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                $('#items_container').append(newRow);
                populateItemDropdown($('#items_container .item_row:last .item_select'));
                $('#items_container .item_row:last .item_select').select2({
                    placeholder: "Search item",
                    allowClear: false
                });
                updateRemoveButtons();
            });

            $(document).on('click', '.remove_item', function() {
                $(this).closest('.item_row').remove();
                updateRemoveButtons();
            });

            $(document).on('change', '.item_select', function() {
                const itemId = $(this).val();
                const stockSpan = $(this).closest('.item_row').find('.stock_info');
                const quantityInput = $(this).closest('.item_row').find('.quantity_input');

                if (itemId) {
                    const item = availableItems.find(i => i.id == itemId);
                    if (item) {
                        stockSpan.val(item.quantity);
                        quantityInput.attr('max', item.quantity);
                    }
                } else {
                    stockSpan.val('');
                    quantityInput.removeAttr('max');
                }
            });

            $(document).on('input', '.quantity_input', function() {
                let val = parseInt($(this).val()) || 0;
                const select = $(this).closest('.item_row').find('.item_select');
                const itemId = select.val();

                if (itemId) {
                    const item = availableItems.find(i => i.id == itemId);
                    if (item) {
                        if (val > item.quantity) {
                            val = item.quantity;
                            $(this).val(val);
                            showAlert('error',
                                `Maximum available quantity for ${item.it_name}: ${item.quantity}`);
                        }

                        const remaining = item.quantity - val;
                        if (item.min_quantity && remaining <= item.min_quantity && remaining >= 0) {
                            showAlert('warning',
                                `Stock running out for ${item.it_name}. Remaining after issue: ${remaining}`
                                );
                        }
                    }
                }
            });

            $('#clearBtn').click(function() {
                $('#issueItemsForm')[0].reset();
                $('#vehicle_status, #employee_status').empty();
                $('#items_container').html(`
                    <div class="item_row bg-white rounded-lg border p-4 mb-4">
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Select Item">Select Item</label>
                                <select class="item_select w-full h-10 px-3 py-2 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500" name="items[0][inventory_id]">
                                    <option value="">Select Item</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Available">Available</label>
                                <input type="text" class="stock_info w-full h-10 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Quantity">Quantity</label>
                                <input type="number" class="quantity_input w-full h-10 px-3 py-2 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500" name="items[0][quantity]" placeholder="Qty" min="1">
                            </div>
                            <div class="flex items-end">
                                <button type="button" class="remove_item w-full h-10 bg-red-500 text-white rounded-xl hover:bg-red-600 transition flex items-center justify-center" style="display: none;">
                                    <span class="material-icons">close</span>
                                </button>
                            </div>
                        </div>
                    </div>
                `);
                populateItemDropdown($('.item_select'));
                $('.item_select').select2({
                    placeholder: "Search item",
                    allowClear: false
                });
                itemCounter = 0;
                clearAlerts();
            });

            $('#issueItemsForm').submit(function(e) {
                e.preventDefault();

                $('#submitBtn').prop('disabled', true).html(
                    '<span class="material-icons mr-2">hourglass_empty</span>Processing...');

                const formData = new FormData();
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                formData.append('vehicle_id', $('#vehicle_id').val());
                formData.append('employee_id', $('#employee_id').val());
                formData.append('notes', $('#notes').val());

                $('.item_row').each(function(index) {
                    const inventoryId = $(this).find('.item_select').val();
                    const quantity = $(this).find('.quantity_input').val();

                    if (inventoryId && quantity) {
                        const item = availableItems.find(i => i.id == inventoryId);
                        if (item) {
                            formData.append(`items[${index}][inventory_id]`, inventoryId);
                            formData.append(`items[${index}][quantity]`, quantity);
                            formData.append(`items[${index}][item_name]`, item.it_name);
                            formData.append(`items[${index}][price_per_unit]`, item
                                .price_per_unit || 0);
                            formData.append(`items[${index}][total_value]`, (item.price_per_unit ||
                                0) * quantity);
                        }
                    }
                });

                $.ajax({
                    url: '{{ route('inventory.store-issued-items') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.success) {
                            $('#issue-id-display').text(data.issue_id);
                            $('#successModal').modal('show');
                            $('#issueItemsForm')[0].reset();
                            showAlert('success', 'Items issued successfully! Issue ID: ' + data
                                .issue_id);
                            $('#items_container').html(`
                                <div class="item_row bg-white rounded-lg border p-4 mb-4">
                                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                                        <div class="md:col-span-2">
                                            <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Select Item">Select Item</label>
                                            <select class="item_select w-full h-10 px-3 py-2 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500" name="items[0][inventory_id]">
                                                <option value="">Select Item</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Available">Available</label>
                                            <input type="text" class="stock_info w-full h-10 px-3 py-2 bg-gray-100 rounded-xl border border-gray-300" readonly>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1" data-translate="Quantity">Quantity</label>
                                            <input type="number" class="quantity_input w-full h-10 px-3 py-2 bg-white rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-500" name="items[0][quantity]" placeholder="Qty" min="1">
                                        </div>
                                        <div class="flex items-end">
                                            <button type="button" class="remove_item w-full h-10 bg-red-500 text-white rounded-xl hover:bg-red-600 transition flex items-center justify-center" style="display: none;">
                                                <span class="material-icons">close</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            `);
                            populateItemDropdown($('.item_select'));
                            $('.item_select').select2({
                                placeholder: "Search item",
                                allowClear: false
                            });
                            itemCounter = 0;
                            loadAvailableItems();
                        }
                    },
                    error: function(xhr) {
                        const error = xhr.responseJSON;
                        let errorMessage = 'Something went wrong';
                        if (error && error.message) {
                            errorMessage = error.message;
                        }
                        showAlert('error', errorMessage);
                    },
                    complete: function() {
                        $('#submitBtn').prop('disabled', false).html(
                            '<span class="material-icons mr-2">send</span><span data-translate="ISSUE ITEMS">ISSUE ITEMS</span>'
                            );
                    }
                });
            });

            function loadAvailableItems() {
                $.get('{{ route('inventory.available-items') }}')
                    .done(function(data) {
                        availableItems = data;
                        populateItemDropdown($('.item_select'));
                        $('.item_select').select2({
                            placeholder: "Search item",
                            allowClear: false
                        });
                    })
                    .fail(function() {
                        showAlert('error', 'Failed to load available items');
                    });
            }

            function loadAvailableVehicles() {
                $.get('{{ route('inventory.available-vehicles') }}')
                    .done(function(data) {
                        availableVehicles = data;
                        populateVehicleDropdown();
                    })
                    .fail(function() {
                        showAlert('error', 'Failed to load available vehicles');
                    });
            }

            function loadAvailableEmployees() {
                $.get('{{ route('inventory.available-employees') }}')
                    .done(function(data) {
                        availableEmployees = data;
                        populateEmployeeDropdown();
                    })
                    .fail(function() {
                        showAlert('error', 'Failed to load available employees');
                    });
            }

            function populateVehicleDropdown() {
                const select = $('#vehicle_select');
                select.empty().append('<option value="">Select vehicle</option>');
                availableVehicles.forEach(function(v) {
                    select.append(
                        `<option value="${v.id}">${v.vehicle_number} - ${v.vehicle_name} ${v.vehicle_model}</option>`
                        );
                });
                select.select2({
                    placeholder: "Search vehicle by number",
                    allowClear: false
                });
            }

            function populateEmployeeDropdown() {
                const select = $('#employee_select');
                select.empty().append('<option value="">Select employee</option>');
                availableEmployees.forEach(function(e) {
                    const nicDisplay = e.employee_nic || 'N/A';
                    select.append(`<option value="${e.id}">${nicDisplay} - ${e.emp_name}</option>`);
                });
                select.select2({
                    placeholder: "Search employee by NIC",
                    allowClear: false
                });
            }

            function populateItemDropdown(selectElement) {
                selectElement.each(function() {
                    const select = $(this);
                    const currentVal = select.val();
                    select.empty().append('<option value="">Select Item</option>');
                    availableItems.forEach(function(item) {
                        select.append(`<option value="${item.id}">${item.it_name}</option>`);
                    });
                    select.val(currentVal);
                });
            }

            function updateRemoveButtons() {
                const itemRows = $('.item_row');
                if (itemRows.length > 1) {
                    $('.remove_item').show();
                } else {
                    $('.remove_item').hide();
                }
            }

            function showAlert(type, message) {
                clearAlerts();
                const alertClass = type === 'success' ? 'bg-green-50 border-green-500 text-green-800' :
                    type === 'warning' ? 'bg-yellow-50 border-yellow-500 text-yellow-800' :
                    'bg-red-50 border-red-500 text-red-800';
                const iconClass = type === 'success' ? 'check_circle' :
                    type === 'warning' ? 'warning' : 'error';

                const alertHtml = `
                    <div class="alert-message ${alertClass} border-l-4 p-4 rounded-xl">
                        <div class="flex items-center">
                            <span class="material-icons mr-2">${iconClass}</span>
                            <span>${message}</span>
                            <button type="button" class="ml-auto" onclick="clearAlerts()">
                                <span class="material-icons">close</span>
                            </button>
                        </div>
                    </div>
                `;
                $('#alert-container').html(alertHtml);
                setTimeout(clearAlerts, 5000);
            }

            function clearAlerts() {
                $('#alert-container').empty();
            }
        });

        const translations = {
            en: {
                'Issue Items': 'Issue Items',
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
                'All Items': 'All Items',
                'Add Item': 'Add Item',
                'Issue Items': 'Issue Items',
                'Issued Items': 'Issued Items',
                'Finance': 'Finance',
                'Expenses': 'Expenses',
                'P/L Report': 'P/L Report',
                'Vehicle Details': 'Vehicle Details',
                'Select Vehicle': 'Select Vehicle',
                'Employee Details': 'Employee Details',
                'Select Employee': 'Select Employee',
                'Items to Issue': 'Items to Issue',
                'Select Item': 'Select Item',
                'Available': 'Available',
                'Quantity': 'Quantity',
                'Add Another Item': 'Add Another Item',
                'Notes': 'Notes (Optional)',
                'CLEAR': 'CLEAR',
                'BACK': 'BACK',
                'ISSUE ITEMS': 'ISSUE ITEMS',
                'LogOut': 'LogOut',
                'Issue Items to Vehicle/Employee': 'Issue Items to Vehicle/Employee'
            },
            si: {
                'Issue Items': 'භාණ්ඩ නිකුත් කරන්න',
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
                'All Items': 'සියලුම භාණ්ඩ',
                'Add Item': 'භාණ්ඩයක් එකතු කරන්න',
                'Issue Items': 'භාණ්ඩ නිකුත් කරන්න',
                'Issued Items': 'නිකුත් කළ භාණ්ඩ',
                'Finance': 'මූල්ය',
                'Expenses': 'අයවැය',
                'P/L Report': 'ලාභ/නිෂ්පත්ති වාර්තාව',
                'Vehicle Details': 'වාහන විස්තර',
                'Select Vehicle': 'වාහනය තෝරන්න',
                'Employee Details': 'සේවක විස්තර',
                'Select Employee': 'සේවකයා තෝරන්න',
                'Items to Issue': 'නිකුත් කළ යුතු භාණ්ඩ',
                'Select Item': 'භාණ්ඩයක් තෝරන්න',
                'Available': 'තිබෙන ප්‍රමාණය',
                'Quantity': 'ප්‍රමාණය',
                'Add Another Item': 'තවත් භාණ්ඩයක් එකතු කරන්න',
                'Notes': 'සටහන් (විකල්ප)',
                'CLEAR': 'මකන්න',
                'BACK': 'ආපසු',
                'ISSUE ITEMS': 'භාණ්ඩ නිකුත් කරන්න',
                'LogOut': 'ඉවත් වන්න',
                'Issue Items to Vehicle/Employee': 'වාහන/සේවකයන් සඳහා භාණ්ඩ නිකුත් කරන්න'
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
            localStorage.setItem('preferred_language', lang);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const savedLang = localStorage.getItem('preferred_language') || 'en';
            setLanguage(savedLang);
        });

        $('#vehicle_select').select2({
            placeholder: "Search vehicle by number",
            allowClear: false,
            width: '100%',
            dropdownParent: $('#vehicle_select').parent()
        });

        $('#employee_select').select2({
            placeholder: "Search employee by NIC",
            allowClear: false,
            width: '100%',
            dropdownParent: $('#employee_select').parent()
        });

        $('.item_select').select2({
            placeholder: "Search item",
            allowClear: false,
            width: '100%',
            dropdownParent: $('.item_select').parent()
        });
    </script>
</body>

</html>
