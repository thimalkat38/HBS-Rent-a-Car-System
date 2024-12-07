<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HBS Car Rental Management System</title>
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
                        <a class="nav-link" href="{{ url('manager/dashboard') }}"><img src="{{ asset('images/1.png') }}"
                                alt="Dashboard" class="nav-icon"> DASHBOARD</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link"><img src="{{ asset('images/2.png') }}" alt="Vehicles" class="nav-icon">
                            VEHICLES</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('addvehicle') }}">Add Vehicle</a>
                            <a class="dropdown-link" href="{{ url('manager/vehicles') }}">List Vehicle</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link"><img src="{{ asset('images/3.png') }}" alt="Bookings" class="nav-icon">
                            BOOKINGS</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('manager/addbook') }}">Book Vehicle</a>
                            <a class="dropdown-link" href="{{ url('bookings') }}">Booking History</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link"><img src="{{ asset('images/4.png') }}" alt="Customers" class="nav-icon">
                            CUSTOMERS</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('/customers/create') }}">Add Customer</a>
                            <a class="dropdown-link" href="{{ url('customers') }}">List Customer</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link active" href="{{ url('hr-management') }}"><img
                                src="{{ asset('images/5.png') }}" alt="HRM" class="nav-icon"> HRM</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ url('crms') }}"><img src="{{ asset('images/6.png') }}" alt="CRM"
                                class="nav-icon"> CRM</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('inventory.index') }}">
                            <img src="{{ asset('images/7.png') }}" alt="Inventory" class="nav-icon">
                            INVENTORY
                        </a>
                    </div>
                    {{-- <div class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ asset('images/8.png') }}" alt="Accounting"
                                class="nav-icon"> ACCOUNTING (under development...)</a>
                    </div> --}}
                </nav>
            </div>
            <!-- Form Section -->
            <div class="content">
                <div class="form-section">
                    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- General Errors -->
                        @if ($errors->any())
                            <div class="error-container">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-row">
                            <select name="title" class="selection-list @error('title') is-invalid @enderror" required>
                                <option value="" disabled selected>Select Title</option>
                                <option value="Mr" {{ old('title') == 'Mr' ? 'selected' : '' }}>Mr</option>
                                <option value="Mrs" {{ old('title') == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                            </select>
                            @error('title')
                                <div class="error-message">{{ $message }}</div>
                            @enderror

                            <input type="text" name="emp_name" placeholder="Full Name" value="{{ old('emp_name') }}" 
                                   class="@error('emp_name') is-invalid @enderror" required>
                            @error('emp_name')
                                <div class="error-message">{{ $message }}</div>
                            @enderror

                            <input type="text" name="nic" placeholder="NIC" value="{{ old('nic') }}" 
                                   class="@error('nic') is-invalid @enderror" required>
                            @error('nic')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-row">
                            <input type="text" name="mobile_number" placeholder="Mobile Number" value="{{ old('mobile_number') }}" 
                                   class="@error('mobile_number') is-invalid @enderror" required>
                            @error('mobile_number')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                            <input type="text" name="bank" placeholder="Bank Name" value="{{ old('bank') }}" 
                                   class="@error('bank') is-invalid @enderror" required>
                            @error('bank')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                            <input type="text" name="acc_number" placeholder="Account Number" value="{{ old('acc_number') }}" 
                                   class="@error('acc_number') is-invalid @enderror" required>
                            @error('acc_number')
                                <div class="error-message">{{ $message }}</div>
                            @enderror

                            <input type="email" name="email" placeholder="E-mail Address" value="{{ old('email') }}" 
                                   class="@error('email') is-invalid @enderror" required>
                            @error('email')
                                <div class="error-message">{{ $message }}</div>
                            @enderror

                            <input type="text" name="address" placeholder="Address" value="{{ old('address') }}" 
                                   class="@error('address') is-invalid @enderror" required>
                            @error('address')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-row">
                            <label for="join_date">Join Date:</label>
                            <input type="date" name="join_date" value="{{ old('join_date') }}" 
                                   class="@error('join_date') is-invalid @enderror" required>
                            @error('join_date')
                                <div class="error-message">{{ $message }}</div>
                            @enderror

                            <label for="birthday">Birthday:</label>
                            <input type="date" name="birthday" id="birthday" max="2005-12-31" 
                                   value="{{ old('birthday') }}" class="@error('birthday') is-invalid @enderror">
                            @error('birthday')
                                <div class="error-message">{{ $message }}</div>
                            @enderror

                            <input type="number" name="remaining_leaves" placeholder="Leaves Per Month" 
                                   value="{{ old('remaining_leaves') }}" min="0" 
                                   class="@error('remaining_leaves') is-invalid @enderror" required>
                            @error('remaining_leaves')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="upload-section">
                            <p>Add Photo of Employee</p>
                            <input type="file" name="photo[]" accept="image/*" multiple>
                            @error('photo')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="upload-section">
                            <p>Add Documents About Employee</p>
                            <input type="file" name="doc_photos[]" accept="image/*" multiple>
                            @error('doc_photos')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="submit-container">
                            <button type="button" class="btn-submit">BACK</button>
                            <button type="submit" class="btn-submit">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© 2024. All rights reserved. Designed by Ezone IT Solutions.</p>
        </div>
    </div>
</body>

</html>
