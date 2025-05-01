<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Management System</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <!-- Google Fonts for Oxanium -->
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo-section">
                <img src="{{ asset('images/logo.png') }}" class="logo-icon" alt="HBS Car Rental Logo">
            </div>
            <div class="header-title">HBS RENT A CAR</div>
            <div class="card1">
                <div class="card1-content">
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
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Sidebar -->
            <div class="sidebar">
                <nav class="nav">
                    <div class="nav-item">
                        <a class="nav-link active" href="{{ url('superadmin') }}"><img src="{{ asset('images/1.png') }}"
                                alt="Dashboard" class="nav-icon"> DASHBOARD</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ url('addbus') }}">
                            <img src="{{ asset('images/9.png') }}" alt="Vehicles" class="nav-icon">
                            Add Business
                        </a>
                </nav>
            </div>
            {{-- Search --}}
            <div class="content">
                <div class="card6-form-row">
                    <div class="form-section">
                        <form action="{{ route('bus.search') }}" method="GET" id="searchForm">
                            <div class="form-row">
                                <!-- Vehicle Number Input (Auto-Search on Typing) -->
                                <input type="text" name="b_name" placeholder="Search by b_name"
                                    value="{{ request('b_name') }}" oninput="autoSubmitForm()">

                                <!-- Vehicle Name Input (Auto-Search on Typing) -->
                                <input type="text" name="o_name" placeholder="Search by o_name"
                                    value="{{ request('o_name') }}" oninput="autoSubmitForm()">

                                <input type="date" name="reg_date" placeholder="Search by reg_date"
                                    value="{{ request('reg_date') }}" oninput="autoSubmitForm()">


                                <!-- Remove Search Button -->
                                <a href="{{ url('superadmin') }}" class="btn-search">Clear</a>
                            </div>

                            <div class="flex justify-center items-center bg-gray-100 p-4 rounded-lg shadow-md">
                                <div class="text-center">
                                    <h2 class="text-lg font-semibold text-gray-700">Total Business =
                                        {{ \App\Models\Business::count() }}</h2>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="table-content">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Busines ID</th>
                                <th>Busines Name</th>
                                <th>Busines Contact</th>
                                <th>Owner's Name</th>
                                <th>Owner's Contact</th>
                                <th>Email</th>
                                <th>Address</th>
                                {{-- <th>Status</th> --}}
                                <th>REG Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($businesses as $Busines)
                                <tr onclick="window.location='{{ route('user.index') }}?business_id={{ $Busines->id }}'"
                                    style="cursor: pointer;">
                                    <td>{{ $Busines->id }}</td>
                                    <td>{{ $Busines->b_name }}</td>
                                    <td>{{ $Busines->b_phone }}</td>
                                    <td>{{ $Busines->o_name }}</td>
                                    <td>{{ $Busines->o_phone }}</td>
                                    <td>{{ $Busines->email }}</td>
                                    <td>{{ $Busines->address }}</td>
                                    <td>{{ $Busines->reg_date }}</td>
                                    <td>
                                        <div style="display: flex; justify-content: center; gap: 5px;">

                                            <button type="button" class="btn-blue"
                                                onclick="event.stopPropagation(); openCreateLoginModal('{{ $Busines->id }}')">
                                                Create Login
                                            </button>

                                            <a href="{{ route('bus.edit', $Busines->id) }}" class="btn-edit"
                                                onclick="event.stopPropagation();">Edit</a>

                                            <form action="{{ route('bus.destroy', $Busines->id) }}" method="POST"
                                                style="display:inline;" onclick="event.stopPropagation();">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete"
                                                    onclick="return confirm('Are you sure you want to delete this Busines?')">Delete</button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Modal -->
                    <div id="createLoginModal"
                        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:9999; justify-content:center; align-items:center;">
                        <div style="background:white; padding:20px; width:600px; border-radius:8px; position:relative;">
                            <h2>Create New User</h2>
                            <form method="POST" action="{{ route('user.store') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="business_id">Select Business</label>
                                    <select name="business_id" id="modalBusinessId" class="form-control" required>
                                        <option value="">-- Select Business --</option>
                                        @foreach ($businesses as $business)
                                            <option value="{{ $business->id }}">{{ $business->b_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Name:</label>
                                    <input type="text" name="name" class="form-control" required />
                                </div>

                                <div class="mb-3">
                                    <label>Email:</label>
                                    <input type="email" name="email" class="form-control" required />
                                </div>

                                <div class="mb-3">
                                    <label>Password:</label>
                                    <input type="password" name="password" class="form-control" required />
                                </div>

                                <div class="mb-3">
                                    <label>Confirm Password:</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        required />
                                </div>

                                <div class="mb-3">
                                    <label>User Type:</label>
                                    <select name="userType" class="form-control" required>
                                        <option value="user">User</option>
                                        <option value="manager">Manager</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>

                                <div style="margin-top:10px;">
                                    <button type="submit" class="btn-blue">Create User</button>
                                    <button type="button" onclick="closeCreateLoginModal()"
                                        class="btn-delete">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© 2024. All rights reserved. Designed by Ezone IT Solutions.</p>
        </div>
</body>
<script>
    function openCreateLoginModal(businessId) {
        document.getElementById('createLoginModal').style.display = 'flex';
        const select = document.getElementById('modalBusinessId');
        select.value = businessId;
    }

    function closeCreateLoginModal() {
        document.getElementById('createLoginModal').style.display = 'none';
    }
</script>
<script>
    let typingTimer;

    // Auto-submit form when typing (with delay)
    function autoSubmitForm() {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(() => {
            document.getElementById('searchForm').submit();
        }, 500); // 0.5-second delay to prevent excessive requests
    }
</script>

</html>
