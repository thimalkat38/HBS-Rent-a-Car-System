<title>Car Rental Management System</title>
<link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen bg-gray-50 flex">
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
                    <div class="flex items-center px-6 py-3  text-white font-semibold rounded-l-full cursor-default">
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
                    <a href="{{ url('hr-management') }}"
                        class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                        <span class="material-icons mr-3">badge</span>
                        HRM
                    </a>
                </li>
                <li>
                    <a href="{{ url('crms') }}"
                        class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                        <span class="material-icons mr-3">support_agent</span>
                        CRM
                    </a>
                </li>
                <li>
                    <a href="{{ route('inventory.index') }}"
                        class="flex items-center px-6 py-3 text-gray-300 hover:bg-slate-800 hover:text-white transition">
                        <span class="material-icons mr-3">inventory_2</span>
                        Inventory
                    </a>
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
                                class="flex items-center px-6 py-3 text-teal-500 font-semibold bg-slate-800 rounded-l-full">
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
    <div class="flex-1 flex flex-col min-h-screen">
        <!-- Top Nav -->
        <header class="bg-white shadow h-20 flex items-center px-10 justify-between">
            <div class="flex items-center space-x-4">
                <span class="text-xl font-semibold text-slate-900">Finance</span>
                <span class="text-xl text-gray-500">Commissions</span>
            </div>
            <div class="flex items-center space-x-6">
                <div class="flex items-center space-x-2">
                    <button id="lang-en" class="text-lg font-poppins underline text-gray-700 focus:outline-none"
                        onclick="setLanguage('en')">EN</button>
                    <button id="lang-si" class="text-lg font-poppins text-gray-400 focus:outline-none"
                        onclick="setLanguage('si')">SIN</button>
                </div>
                <script>
                    // Full translation dictionary for all visible UI text
                    const translations = {
                        en: {
                            'Customer Information': 'Customer Information',
                            'Full Name': 'Full Name',
                            'NIC': 'NIC',
                            'Contact Number': 'Contact Number',
                            'Booking Information': 'Booking Information',
                            'Vehicle Model': 'Vehicle Model',
                            'Vehicle Number': 'Vehicle Number',
                            'Price Per Day (LKR)': 'Price Per Day (LKR)',
                            'Expenses': 'Expenses',
                            'P/L Report': 'P/L Report',
                            'Finance': 'Finance',
                            'Inventory': 'Inventory',
                            'CRM': 'CRM',
                            'HRM': 'HRM',
                            'Bookings': 'Bookings',
                            'Booking History': 'Booking History',
                            'Post Booking': 'Post Booking',
                            'Dashboard': 'Dashboard',
                            'Vehicles': 'Vehicles',
                            'Add Vehicle': 'Add Vehicle',
                            'All Vehicles': 'All Vehicles',
                            'Book Vehicle': 'Book Vehicle',
                            'Booking History': 'Booking History',
                            'Completed Businesses': 'Completed Businesses',
                            'Add Customer': 'Add Customer',
                            'List Customer': 'List Customer',
                            'Vehicle Owner Management': 'Vehicle Owner Management',
                            'Expences': 'Expenses',
                            'LogOut': 'LogOut',
                            'Contact No': 'Contact No',
                            // Add more keys as needed for the full UI
                        },
                        si: {
                            'Customer Information': 'පාරිභෝගික තොරතුරු',
                            'Full Name': 'සම්පූර්ණ නම',
                            'NIC': 'ජා.හැ.අංකය',
                            'Contact Number': 'දුරකථන අංකය',
                            'Booking Information': 'වෙන්කිරීම් තොරතුරු',
                            'Vehicle Model': 'වාහන ආකෘතිය',
                            'Vehicle Number': 'වාහන අංකය',
                            'Price Per Day (LKR)': 'දිනකට මිල (රු.)',
                            'Expenses': 'වියදම්',
                            'P/L Report': 'ලාභ/අලාභ වාර්තාව',
                            'Finance': 'මුදල් කළමනාකරණය',
                            'Inventory': 'ඉන්වෙන්ටරි',
                            'CRM': 'පාරිභෝගික කළමනාකරණය',
                            'HRM': 'මානව සම්පත් කළමනාකරණය',
                            'Bookings': 'වෙන්කිරීම්',
                            'Booking History': 'වෙන්කිරීම් ඉතිහාසය',
                            'Post Booking': 'පසු වෙන්කිරීම',
                            'Dashboard': 'උපකරණ පුවරුව',
                            'Vehicles': 'වාහන',
                            'Add Vehicle': 'වාහනයක් එක් කරන්න',
                            'All Vehicles': 'සියලු වාහන',
                            'Book Vehicle': 'වාහනය වෙන්කරන්න',
                            'Booking History': 'වෙන්කිරීම් ඉතිහාසය',
                            'Completed Businesses': 'සම්පූර්ණ කළ ව්‍යාපාර',
                            'Add Customer': 'පාරිභෝගිකයෙකු එක් කරන්න',
                            'List Customer': 'පාරිභෝගික ලැයිස්තුව',
                            'Vehicle Owner Management': 'වාහන හිමිකරු කළමනාකරණය',
                            'Expences': 'වියදම්',
                            'LogOut': 'පිටවීම',
                            'Contact No': 'දුරකථන අංකය',
                            // Add more keys as needed for the full UI
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
                <div class="card1-content" style="margin-top: 16.5px;">
                    <form method="POST" class="btn1-submit" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('LogOut') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </header>
        <!-- Page Content: Table in Full Page -->
        <main class="flex-1 p-10 flex flex-col">
            <div class="flex flex-col flex-1">
                @php
                    use Illuminate\Support\Carbon;

                    // Get date range from request or default to current month
                    $startDate = request('start_date')
                        ? Carbon::parse(request('start_date'))
                        : Carbon::now()->startOfMonth();
                    $endDate = request('end_date') ? Carbon::parse(request('end_date')) : Carbon::now()->endOfMonth();
                @endphp

                <form method="GET" class="mb-6 flex flex-wrap items-end gap-4">
                    <div>
                        <label for="start_date" class="block text-xs font-medium text-gray-700 mb-1">Start Date</label>
                        <input type="date" id="start_date" name="start_date"
                            value="{{ $startDate->format('Y-m-d') }}"
                            class="border border-gray-300 rounded px-2 py-1 text-sm focus:ring focus:ring-teal-200">
                    </div>
                    <div>
                        <label for="end_date" class="block text-xs font-medium text-gray-700 mb-1">End Date</label>
                        <input type="date" id="end_date" name="end_date"
                            value="{{ $endDate->format('Y-m-d') }}"
                            class="border border-gray-300 rounded px-2 py-1 text-sm focus:ring focus:ring-teal-200">
                    </div>
                    <div>
                        <label for="commission_type" class="block text-xs font-medium text-gray-700 mb-1">Commission
                            Type</label>
                        <select id="commission_type" name="commission_type"
                            class="border border-gray-300 rounded px-2 py-1 text-sm focus:ring focus:ring-teal-200">
                            <option value="all"
                                {{ request('commission_type', 'all') === 'all' ? 'selected' : '' }}>All Commissions
                            </option>
                            {{-- <option value="normal" {{ request('commission_type') === 'normal' ? 'selected' : '' }}>Normal (Hand Over = 0)</option> --}}
                            <option value="driving" {{ request('commission_type') === 'driving' ? 'selected' : '' }}>
                                Driving Commission</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="bg-slate-900 text-white px-4 py-2 rounded hover:bg-slate-700 text-sm font-semibold">
                        Filter
                    </button>
                </form>

                <div class="mb-4 text-sm text-gray-600">
                    Showing booking counts from <span class="font-semibold">{{ $startDate->format('Y-m-d') }}</span>
                    to <span class="font-semibold">{{ $endDate->format('Y-m-d') }}</span>
                </div>

                <div class="flex-1 overflow-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 bg-slate-900 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Officer Name</th>
                                <th
                                    class="px-6 py-3 bg-slate-900 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Booking Count</th>
                                <th
                                    class="px-6 py-3 bg-slate-900 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Total Commission Amount</th>
                                <th
                                    class="px-6 py-3 bg-slate-900 text-left text-xs font-medium text-white uppercase tracking-wider">
                                    Report</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                use Illuminate\Support\Facades\Auth;

                                $officers = \App\Models\Employee::all();
                                $startAt = $startDate->copy()->startOfDay();
                                $endAt = $endDate->copy()->endOfDay();
                                $type = request('commission_type', 'all');

                                $bizId = Auth::check() ? Auth::user()->business_id : null;
                            @endphp

                            @forelse($officers as $officer)
                                @php
                                    $empName = trim(strtolower($officer->emp_name));

                                    // small helpers to DRY the business scope & name matches
                                    $byBiz = function ($q) use ($bizId) {
                                        if ($bizId) {
                                            $q->where('business_id', $bizId);
                                        }
                                    };
                                    $nameMatchAll = function ($q) use ($empName) {
                                        $q->whereRaw('LOWER(TRIM(commission)) = ?', [$empName])
                                            ->orWhereRaw('LOWER(TRIM(commission2)) = ?', [$empName])
                                            ->orWhereRaw('LOWER(TRIM(driver_name)) = ?', [$empName]);
                                    };
                                    $nameMatchComm = function ($q) use ($empName) {
                                        $q->whereRaw('LOWER(TRIM(commission)) = ?', [$empName])->orWhereRaw(
                                            'LOWER(TRIM(commission2)) = ?',
                                            [$empName],
                                        );
                                    };
                                    $nameMatchDriver = function ($q) use ($empName) {
                                        $q->whereRaw('LOWER(TRIM(driver_name)) = ?', [$empName]);
                                    };

                                    if ($type === 'normal') {
                                        $bookingCountP = \App\Models\PostBooking::where('hand_over_booking', 0)
                                            ->where($byBiz)
                                            ->where($nameMatchComm)
                                            ->whereBetween('created_at', [$startAt, $endAt])
                                            ->count();

                                        $sumFirstP = \App\Models\PostBooking::where('hand_over_booking', 0)
                                            ->where($byBiz)
                                            ->whereRaw('LOWER(TRIM(commission)) = ?', [$empName])
                                            ->whereBetween('created_at', [$startAt, $endAt])
                                            ->sum('commission_amt');

                                        $sumSecondP = \App\Models\PostBooking::where('hand_over_booking', 0)
                                            ->where($byBiz)
                                            ->whereRaw('LOWER(TRIM(commission2)) = ?', [$empName])
                                            ->whereBetween('created_at', [$startAt, $endAt])
                                            ->sum('commission_amt2');

                                        $bookingCount = $bookingCountP;
                                        $totalCommissionAmount = $sumFirstP + $sumSecondP;
                                    } elseif ($type === 'driving') {
                                        $bookingCountP = \App\Models\PostBooking::where('hand_over_booking', 1)
                                            ->where($byBiz)
                                            ->where($nameMatchDriver)
                                            ->whereBetween('created_at', [$startAt, $endAt])
                                            ->count();

                                        $sumDriverP = \App\Models\PostBooking::where('hand_over_booking', 1)
                                            ->where($byBiz)
                                            ->where($nameMatchDriver)
                                            ->whereBetween('created_at', [$startAt, $endAt])
                                            ->sum('driver_commission_amt');

                                        $bookingCount = $bookingCountP;
                                        $totalCommissionAmount = $sumDriverP;
                                    } else {
                                        $bookingCountP = \App\Models\PostBooking::where($byBiz)
                                            ->where($nameMatchAll)
                                            ->whereBetween('created_at', [$startAt, $endAt])
                                            ->count();

                                        $sumFirstP = \App\Models\PostBooking::where($byBiz)
                                            ->whereRaw('LOWER(TRIM(commission)) = ?', [$empName])
                                            ->whereBetween('created_at', [$startAt, $endAt])
                                            ->sum('commission_amt');

                                        $sumSecondP = \App\Models\PostBooking::where($byBiz)
                                            ->whereRaw('LOWER(TRIM(commission2)) = ?', [$empName])
                                            ->whereBetween('created_at', [$startAt, $endAt])
                                            ->sum('commission_amt2');

                                        $sumDriverP = \App\Models\PostBooking::where($byBiz)
                                            ->where($nameMatchDriver)
                                            ->whereBetween('created_at', [$startAt, $endAt])
                                            ->sum('driver_commission_amt');

                                        $bookingCount = $bookingCountP;
                                        $totalCommissionAmount =
                                            $sumFirstP +
                                            $sumSecondP +
                                            $sumDriverP;
                                    }
                                @endphp

                                <tr class="border-b border-gray-100 hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $officer->emp_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $bookingCount }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ number_format($totalCommissionAmount, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <a href="{{ route('commission.export_csv', [
                                            'officer' => $officer->emp_name,
                                            'start_date' => $startDate->format('Y-m-d'),
                                            'end_date' => $endDate->format('Y-m-d'),
                                            'commission_type' => request('commission_type', 'all'),
                                        ]) }}"
                                            class="inline-flex items-center px-3 py-1 rounded bg-teal-600 text-white hover:bg-teal-700 mr-2">
                                            Download
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">No data available.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </main>
    </div>
</div>
<!-- Material Icons CDN for sidebar icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
