
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory GRNs - Car Rental Management System</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .alert-message {
            animation: slideIn 0.5s ease-in-out;
        }
        @keyframes slideIn {
            from { transform: translateX(100%); }
            to { transform: translateX(0); }
        }
        .status-badge {
            padding: 0.25rem 0.5rem;
            border-radius: 0.375rem;
            font-size: 0.75rem;
            font-weight: 500;
            cursor: pointer;
            transition: opacity 0.2s;
        }
        .status-due { background-color: #fee2e2; color: #dc2626; }
        .status-partial { background-color: #fed7aa; color: #ea580c; }
        .status-paid { background-color: #d1fae5; color: #059669; cursor: default; }
        .status-paid:hover { opacity: 0.7; }
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
                        <a href="{{ url('manager/dashboard') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
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
                                <a href="{{ url('addvehicle') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">add_circle_outline</span>
                                    <span data-translate="Add Vehicle">Add Vehicle</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('allvehicles') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">list_alt</span>
                                    <span data-translate="All Vehicles">All Vehicles</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('vehicle_owners') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
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
                                <a href="{{ url('addbooking') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">add_circle_outline</span>
                                    <span data-translate="Book Vehicle">Book Vehicle</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('bookings') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">history</span>
                                    <span data-translate="Booking History">Booking History</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('postbookings') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
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
                                <a href="{{ route('customers.create') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">person_add</span>
                                    <span data-translate="Add Customer">Add Customer</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('customers.index') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">list</span>
                                    <span data-translate="All Customers">All Customers</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('hr-management') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                            <span class="material-icons mr-3">badge</span>
                            <span data-translate="HRM">HRM</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('crms') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
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
                                <a href="{{ route('inventory.index') }}" class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
                                    <span class="material-icons mr-3">list</span>
                                    <span data-translate="All Items">All Items</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('inventory.create') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">add_circle_outline</span>
                                    <span data-translate="Add Item">Add Item</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('inventory.grn') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">input</span>
                                    <span data-translate="Add Stock">Add Stock</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('inventory.issue') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">output</span>
                                    <span data-translate="Issue Items">Issue Items</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('inventory.issued-items') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
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
                                <a href="{{ url('expenses') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                                    <span class="material-icons mr-3">receipt_long</span>
                                    <span data-translate="Expenses">Expenses</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('profit-loss-report') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
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
                    <span class="text-xl font-semibold text-gray-900">GRN for {{ $inventory->it_name }}</span>
                </div>
                <div class="flex items-center gap-8">
                    <div class="flex gap-2">
                        <button type="button" id="lang-en" class="text-lg font-normal text-neutral-700 transition focus:outline-none underline" onclick="setLanguage('en')">EN</button>
                        <button type="button" id="lang-si" class="text-lg font-normal text-neutral-700 opacity-50 transition focus:outline-none" onclick="setLanguage('si')">SIN</button>
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
                        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Goods Received Notes</h2>

                        <!-- Alert Messages -->
                        @if (session('success'))
                            <div class="alert alert-success bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 flex items-center alert-message">
                                <span class="material-icons mr-2">check_circle</span>
                                <div>{{ session('success') }}</div>
                                <button type="button" class="ml-auto text-gray-500 hover:text-gray-700" onclick="$(this).parent().remove()">
                                    <span class="material-icons">close</span>
                                </button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 flex items-center alert-message">
                                <span class="material-icons mr-2">error</span>
                                <div>{{ session('error') }}</div>
                                <button type="button" class="ml-auto text-gray-500 hover:text-gray-700" onclick="$(this).parent().remove()">
                                    <span class="material-icons">close</span>
                                </button>
                            </div>
                        @endif

                        <!-- GRNs Table -->
                        <div class="overflow-x-auto">
                            <table id="grnsTable" class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">GRN ID</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Supplier Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reference No</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item Names</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total GRN Value</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Paid Value</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Notes</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($grns as $grn)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $grn->grn_id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $grn->supplier ? $grn->supplier->name : ($grn->supplier_name ?? 'N/A') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $grn->date ? $grn->date->format('Y-m-d') : 'N/A' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $grn->reference_no ?? 'N/A' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $grn->items->pluck('inventory.it_name')->implode(', ') ?: 'N/A' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rs. {{ number_format($grn->total_grn_value, 2) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rs. {{ number_format($grn->paid_value, 2) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                @if ($grn->status == 'due' || $grn->status == 'partial')
                                                    <button type="button" class="status-badge status-{{ $grn->status }} payment-btn" data-grn-id="{{ $grn->id }}" data-total="{{ $grn->total_grn_value }}" data-paid="{{ $grn->paid_value }}">
                                                        {{ ucfirst($grn->status) }}
                                                    </button>
                                                @else
                                                    <span class="status-badge status-{{ $grn->status }}">{{ ucfirst($grn->status) }}</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-900">{{ $grn->notes ?? 'N/A' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('inventory.edit-grn', [$inventory->id, $grn->id]) }}" class="text-teal-500 hover:text-teal-700">Edit</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="px-6 py-4 text-center text-sm text-gray-500">No GRNs found for this inventory item.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-4">
                            {{ $grns->links() }}
                        </div>
                    </div>
                </div>

                <!-- Payment Modal -->
                <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="paymentModalLabel">Make Payment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Payment Summary -->
                                <div class="mb-4 p-3 bg-gray-100 rounded">
                                    <div class="row">
                                        <div class="col-6"><strong>Total Amount:</strong> Rs. <span id="totalAmount">0.00</span></div>
                                        <div class="col-6"><strong>Already Paid:</strong> Rs. <span id="alreadyPaid">0.00</span></div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12"><strong>Remaining Balance:</strong> Rs. <span id="remainingAmount">0.00</span></div>
                                    </div>
                                </div>

                                <form id="paymentForm">
                                    @csrf
                                    <input type="hidden" id="grnId" name="grn_id">
                                    <div class="mb-3">
                                        <label for="paymentAmount" class="form-label">Payment Amount (Rs.)</label>
                                        <input type="number" class="form-control" id="paymentAmount" name="payment_amount" step="0.01" min="0" required>
                                        <div class="form-text">You can pay any amount up to the remaining balance</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="paymentNotes" class="form-label">Notes (Optional)</label>
                                        <textarea class="form-control" id="paymentNotes" name="notes" rows="3"></textarea>
                                    </div>
                                </form>

                                <!-- Previous Payments History -->
                                <div class="mt-4">
                                    <h6 class="fw-bold">Payment History</h6>
                                    <div id="paymentHistory" class="mt-2">
                                        <!-- Payment history will be loaded here -->
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="submitPayment">Make Payment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- JavaScript for Language Switching and Payment Handling -->
    <script>
        const translations = {
            en: {
                'Dashboard': 'Dashboard',
                'Inventory': 'Inventory',
                'All Items': 'All Items',
                'Add Item': 'Add Item',
                'Add Stock': 'Add Stock',
                'Issue Items': 'Issue Items',
                'Issued Items': 'Issued Items',
                'LogOut': 'LogOut'
            },
            si: {
                'Dashboard': 'උපකරණ පුවරුව',
                'Inventory': 'ඉන්වෙන්ටරි',
                'All Items': 'සියලුම භාණ්ඩ',
                'Add Item': 'භාණ්ඩ එකතු කරන්න',
                'Add Stock': 'තොග එකතු කරන්න',
                'Issue Items': 'භාණ්ඩ නිකුත් කරන්න',
                'Issued Items': 'නිකුත් කළ භාණ්ඩ',
                'LogOut': 'ලොග්අවුට්'
            }
        };

        let currentLanguage = 'en';

        function setLanguage(lang) {
            currentLanguage = lang;
            $('[data-translate]').each(function() {
                const key = $(this).data('translate');
                $(this).text(translations[lang][key] || key);
            });
            $('#lang-en').toggleClass('underline opacity-50', lang !== 'en');
            $('#lang-si').toggleClass('underline opacity-50', lang !== 'si');
        }

        $(document).ready(function() {
            setLanguage('en');

            // Test modal function (run testModal() in console to debug)
            window.testModal = function() {
                console.log('Testing modal...');
                try {
                    const modalElement = document.getElementById('paymentModal');
                    console.log('Modal element found:', modalElement);
                    if (modalElement) {
                        const modal = new bootstrap.Modal(modalElement);
                        modal.show();
                        console.log('Modal show() called successfully');
                    } else {
                        console.error('Modal element not found!');
                    }
                } catch (error) {
                    console.error('Modal test error:', error);
                }
            };

            // Auto-dismiss alerts after 5 seconds
            setTimeout(() => {
                $('.alert-message').fadeOut(500, function() { $(this).remove(); });
            }, 5000);

            // Handle payment button click - simple jQuery event delegation
            $(document).on('click', '.payment-btn', function(e) {
                e.preventDefault();
                e.stopPropagation();
                console.log('Payment button clicked'); // Debug log

                const grnId = $(this).data('grn-id');
                const total = parseFloat($(this).data('total')) || 0;
                const paid = parseFloat($(this).data('paid')) || 0;
                const remaining = Math.max(0, total - paid);

                console.log('GRN Data:', { grnId, total, paid, remaining }); // Debug log
                console.log('Button element:', this); // Debug log

                $('#grnId').val(grnId);
                $('#paymentAmount').val('');
                $('#paymentNotes').val('');

                // Update payment summary
                $('#totalAmount').text(total.toFixed(2));
                $('#alreadyPaid').text(paid.toFixed(2));
                $('#remainingAmount').text(remaining.toFixed(2));

                // Set max amount but allow user to change
                $('#paymentAmount').attr('max', remaining.toFixed(2));
                $('#paymentAmount').removeAttr('readonly');

                // Load payment history
                loadPaymentHistory(grnId);

                // Show the modal manually
                try {
                    const modalElement = document.getElementById('paymentModal');
                    console.log('Modal element:', modalElement); // Debug log
                    const modal = new bootstrap.Modal(modalElement);
                    modal.show();
                    console.log('Modal should be showing now'); // Debug log
                } catch (error) {
                    console.error('Error showing modal:', error);
                    // Fallback to jQuery method
                    $('#paymentModal').modal('show');
                }
            });

            // Alternative: Also handle status-badge clicks directly
            $(document).on('click', '.status-badge', function(e) {
                if ($(this).hasClass('status-paid')) return;

                e.preventDefault();
                e.stopPropagation();
                console.log('Status badge clicked directly'); // Debug log

                // If it's not a payment-btn, trigger the payment logic anyway
                if (!$(this).hasClass('payment-btn')) {
                    $(this).addClass('payment-btn');
                    $(this).trigger('click');
                }
            });

            // Function to load payment history
            function loadPaymentHistory(grnId) {
                $('#paymentHistory').html('<div class="text-center"><div class="spinner-border spinner-border-sm" role="status"></div> Loading...</div>');

                $.ajax({
                    url: '{{ route("inventory.grn-payment-history", ["grn_id" => ":id"]) }}'.replace(':id', grnId),
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success && response.payments.length > 0) {
                            let historyHtml = '<div class="table-responsive"><table class="table table-sm table-striped">';
                            historyHtml += '<thead><tr><th>Date</th><th>Amount</th><th>Paid By</th><th>Notes</th></tr></thead><tbody>';

                            response.payments.forEach(function(payment) {
                                historyHtml += `<tr>
                                    <td class="small">${payment.date}</td>
                                    <td class="small fw-bold text-success">${payment.amount}</td>
                                    <td class="small">${payment.paid_by}</td>
                                    <td class="small">${payment.notes}</td>
                                </tr>`;
                            });

                            historyHtml += '</tbody></table></div>';
                            historyHtml += `<div class="mt-2 small text-muted">
                                <div>Total Payments: Rs. ${response.total_payments.toFixed(2)}</div>
                                <div>Remaining: Rs. ${response.remaining.toFixed(2)}</div>
                            </div>`;

                            $('#paymentHistory').html(historyHtml);
                        } else {
                            $('#paymentHistory').html('<div class="text-muted small">No payment history found for this GRN.</div>');
                        }
                    },
                    error: function(xhr) {
                        console.error('Failed to load payment history:', xhr);
                        $('#paymentHistory').html('<div class="text-danger small">Failed to load payment history.</div>');
                    }
                });
            }

            // Handle payment submission
            $('#submitPayment').on('click', function() {
                console.log('Submit payment clicked'); // Debug log

                const grnId = $('#grnId').val();
                const paymentAmount = parseFloat($('#paymentAmount').val());
                const paymentNotes = $('#paymentNotes').val();
                const maxAmount = parseFloat($('#paymentAmount').attr('max'));

                console.log('Payment data:', { grnId, paymentAmount, paymentNotes, maxAmount }); // Debug log

                if (!grnId) {
                    alert('No GRN selected.');
                    return;
                }

                if (!paymentAmount || paymentAmount <= 0) {
                    alert('Please enter a valid payment amount.');
                    return;
                }

                if (paymentAmount > maxAmount) {
                    alert(`Payment amount cannot exceed the remaining balance of Rs. ${maxAmount.toFixed(2)}`);
                    return;
                }

                // Prepare data for submission
                const postData = {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    payment_amount: paymentAmount,
                    notes: paymentNotes
                };

                console.log('Sending AJAX request...', postData); // Debug log

                $.ajax({
                    url: '{{ route("inventory.update-grn-payment", ["grn_id" => ":id"]) }}'.replace(':id', grnId),
                    type: 'POST',
                    data: postData,
                    dataType: 'json',
                    success: function(response) {
                        console.log('Payment response:', response); // Debug log
                        if (response.success) {
                            // Hide modal using Bootstrap 5 method
                            const modal = bootstrap.Modal.getInstance(document.getElementById('paymentModal'));
                            modal.hide();

                            // Update the table row directly (no DataTables)
                            const button = $(`button[data-grn-id="${grnId}"]`);
                            const row = button.closest('tr');

                            // Update paid amount column
                            row.find('td:eq(6)').text(`Rs. ${parseFloat(response.grn.paid_value).toFixed(2)}`);

                            // Update status column
                            const statusCell = row.find('td:eq(7)');
                            const newStatus = response.grn.status;
                            if (newStatus === 'paid') {
                                statusCell.html(`<span class="status-badge status-${newStatus}">${newStatus.charAt(0).toUpperCase() + newStatus.slice(1)}</span>`);
                            } else {
                                statusCell.html(`<button type="button" class="status-badge status-${newStatus} payment-btn" data-grn-id="${grnId}" data-total="${response.grn.total_grn_value}" data-paid="${response.grn.paid_value}">${newStatus.charAt(0).toUpperCase() + newStatus.slice(1)}</button>`);
                            }

                            // Refresh payment history if modal is still open
                            if ($('#paymentModal').hasClass('show')) {
                                loadPaymentHistory(grnId);
                            }

                            // Show success alert
                            const alert = `<div class="alert alert-success bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 flex items-center alert-message">
                                <span class="material-icons mr-2">check_circle</span>
                                <div>${response.message}</div>
                                <button type="button" class="ml-auto text-gray-500 hover:text-gray-700" onclick="$(this).parent().remove()">
                                    <span class="material-icons">close</span>
                                </button>
                            </div>`;
                            $('.bg-white.rounded-2xl').prepend(alert);
                            setTimeout(() => {
                                $('.alert-message').fadeOut(500, function() { $(this).remove(); });
                            }, 5000);
                        } else {
                            alert(response.message || 'Payment failed.');
                        }
                    },
                    error: function(xhr) {
                        console.log('Payment error:', xhr); // Debug log
                        let errorMessage = 'An error occurred.';

                        if (xhr.responseJSON) {
                            if (xhr.responseJSON.message) {
                                errorMessage = xhr.responseJSON.message;
                            } else if (xhr.responseJSON.errors) {
                                errorMessage = Object.values(xhr.responseJSON.errors).flat().join('\n');
                            }
                        } else if (xhr.responseText) {
                            errorMessage = xhr.responseText;
                        }

                        alert(errorMessage);
                    }
                });
            });
        });
    </script>
</body>
</html>