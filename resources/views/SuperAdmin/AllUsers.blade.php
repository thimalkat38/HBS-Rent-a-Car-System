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
                        <form action="{{ route('user.search') }}" method="GET" id="searchForm">
                            <div class="form-row">
                                <!-- Vehicle Number Input (Auto-Search on Typing) -->
                                <input type="text" name="name" placeholder="Search by User's Name"
                                    value="{{ request('name') }}" oninput="autoSubmitForm()">

                                <!-- Vehicle Name Input (Auto-Search on Typing) -->
                                <select name="userType" onchange="autoSubmitForm()">
                                    <option value="">Search by userType</option>
                                    <option value="Manager" {{ request('userType') == 'Manager' ? 'selected' : '' }}>
                                        Manager</option>
                                    <option value="Admin" {{ request('userType') == 'Admin' ? 'selected' : '' }}>Admin
                                    </option>
                                    <option value="User" {{ request('userType') == 'User' ? 'selected' : '' }}>User
                                    </option>
                                </select>


                                <input type="text" name="email" placeholder="Search by Email"
                                    value="{{ request('email') }}" oninput="autoSubmitForm()">


                                <!-- Remove Search Button -->
                                <a href="{{ url('users') }}" class="btn-search">Clear</a>
                            </div>

                            {{-- <div class="flex justify-center items-center bg-gray-100 p-4 rounded-lg shadow-md">
                                <div class="text-center">
                                    <h2 class="text-lg font-semibold text-gray-700">Total Business =
                                        {{ \App\Models\Business::count() }}</h2>
                                </div>
                            </div> --}}
                        </form>
                    </div>
                </div>

                <div class="table-content">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>User's Name</th>
                                <th>User Type</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Users as $User)
                                <td>{{ $User->name }}</td>
                                <td>{{ $User->userType }}</td>
                                <td>{{ $User->email }}</td>
                                <td>
                                    <div style="display: flex; justify-content: center; gap: 5px;">


                                        <a href="javascript:void(0);" class="btn-blue"
                                            onclick="openPasswordModal('{{ $User->id }}', '{{ $User->name }}')">
                                            Update Password
                                        </a>



                                        <form action="{{ route('user.destroy', $User->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete"
                                                onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                        </form>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Password Update Modal -->
                    <div id="passwordModal"
                        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:9999; justify-content:center; align-items:center;">
                        <div style="background:white; padding:20px; width:500px; border-radius:8px; position:relative;">
                            <h3>Update Password for <span id="modalUserName"></span></h3>
                            <form method="POST" action="{{ route('user.updatePassword') }}">
                                @csrf
                                <input type="hidden" name="user_id" id="modalUserId" />

                                <div class="mb-3">
                                    <label>New Password:</label>
                                    <input type="password" name="password" class="form-control" required />
                                </div>

                                <div class="mb-3">
                                    <label>Confirm Password:</label>
                                    <input type="password" name="password_confirmation" class="form-control" required />
                                </div>

                                <div style="margin-top:10px;">
                                    <button type="submit" class="btn-blue">Update</button>
                                    <button type="button" onclick="closePasswordModal()"
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
    function openPasswordModal(userId, userName) {
        document.getElementById('modalUserId').value = userId;
        document.getElementById('modalUserName').innerText = userName;
        document.getElementById('passwordModal').style.display = 'flex';
    }

    function closePasswordModal() {
        document.getElementById('passwordModal').style.display = 'none';
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
