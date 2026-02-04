{{-- Detailed Payroll View --}}
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

@if (isset($payroll))
    <div class="max-w-2xl mx-auto mt-8 bg-white shadow rounded-lg p-6" id="payroll-details-print">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-teal-700">Payroll Details</h2>
            <button 
                onclick="printPayrollDetails()" 
                class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition print:hidden"
                type="button"
            >
                Print
            </button>
        </div>
        <table class="min-w-full border border-gray-200 rounded">
            <tbody>
                <tr>
                    <th class="text-left px-4 py-2 bg-gray-100">Employee ID</th>
                    <td class="px-4 py-2">{{ $payroll->emp_id }}</td>
                </tr>
                <tr>
                    <th class="text-left px-4 py-2 bg-gray-100">Employee Name</th>
                    <td class="px-4 py-2">{{ $payroll->emp_name }}</td>
                </tr>
                <tr>
                    <th class="text-left px-4 py-2 bg-gray-100">Month</th>
                    <td class="px-4 py-2">{{ $payroll->month }}</td>
                </tr>
                <tr>
                    <th class="text-left px-4 py-2 bg-gray-100">Leaves</th>
                    <td class="px-4 py-2">{{ $payroll->leaves }}</td>
                </tr>
                <tr>
                    <th class="text-left px-4 py-2 bg-gray-100">Paid Date</th>
                    <td class="px-4 py-2">{{ $payroll->paid_date }}</td>
                </tr>
            </tbody>
        </table>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
            {{-- Left Side: Deductions --}}

            <div>
                <div class="flex flex-col gap-4">
                    <div>
                        <h3 class="text-lg font-semibold mb-2 text-teal-700">Basic Salary</h3>
                        <div class="bg-teal-50 border border-teal-200 rounded p-4 text-right font-bold text-teal-800">
                            {{ number_format($payroll->basic, 2) }}
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2 text-green-700">Earnings</h3>
                        <div class="bg-green-50 border border-green-200 rounded p-4 min-h-[120px] text-right">
                            @if (is_array($payroll->earnings) && count($payroll->earnings))
                                <ul class="list-disc ml-4 text-right">
                                    @foreach ($payroll->earnings as $earning)
                                        @if (is_array($earning) && (!empty($earning['name']) || !empty($earning['amount'])))
                                            <li class="flex justify-end">
                                                <span class="font-semibold mr-1 text-left w-full">{{ $earning['name'] ?? '-' }}:</span>
                                                <span>
                                                    {{ isset($earning['amount']) ? number_format($earning['amount'], 2) : '-' }}
                                                </span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- Right Side: Basic Salary & Earnings --}}
            <div>
                <h3 class="text-lg font-semibold mb-2 text-red-700">Deductions</h3>
                <div class="bg-red-50 border border-red-200 rounded p-4 min-h-[120px] text-right">
                    @if (is_array($payroll->deductions) && count($payroll->deductions))
                        <ul class="list-disc ml-4 text-right">
                            @foreach ($payroll->deductions as $deduction)
                                @if (is_array($deduction) && (!empty($deduction['name']) || !empty($deduction['amount'])))
                                    <li class="flex justify-end">
                                        <span class="font-semibold mr-1 text-left w-full">{{ $deduction['name'] ?? '-' }}:</span>
                                        <span>
                                            {{ isset($deduction['amount']) ? number_format($deduction['amount'], 2) : '-' }}
                                        </span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @else
                        <span class="text-gray-400">-</span>
                    @endif
                </div>
            </div>

        </div>

        {{-- Gross Pay --}}
        <div class="mt-8 flex justify-end">
            <div class="bg-green-100 border border-green-300 rounded px-6 py-4 font-bold text-xl text-green-800 shadow">
                Gross Pay: {{ number_format($payroll->gross, 2) }}
            </div>
        </div>
    </div>
    <script>
        function printPayrollDetails() {
            // Get the payroll details element
            var printContents = document.getElementById('payroll-details-print').innerHTML;
            // Create a new window
            var printWindow = window.open('', '', 'height=700,width=900');
            // Write the content with Tailwind CSS
            printWindow.document.write('<html><head><title>Payroll Details</title>');
            printWindow.document.write('<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">');
            printWindow.document.write('<style>@media print { .print\\:hidden { display: none !important; } }</style>');
            printWindow.document.write('</head><body>');
            printWindow.document.write(printContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.focus();
            setTimeout(function() {
                printWindow.print();
                printWindow.close();
            }, 300);
        }
    </script>
@else
    <div class="max-w-xl mx-auto mt-8 p-4 bg-yellow-100 text-yellow-800 rounded">
        Payroll details not found.
    </div>
@endif
