<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Management System</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <!-- Google Fonts for Oxanium -->
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
                        <a class="nav-link" href="{{ url('superadmin') }}"><img src="{{ asset('images/1.png') }}"
                                alt="Dashboard" class="nav-icon"> DASHBOARD</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link active" href="{{ url('addbus') }}">
                            <img src="{{ asset('images/9.png') }}" alt="Vehicles" class="nav-icon">
                            Add Business
                        </a>
                </nav>
            </div>

            <!-- Form Section -->
            <div class="content">
                <form action="{{ route('storebus') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-section">

                        {{-- error handling --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-row">
                            <input type="text" name="b_name" placeholder="Name Of Business">
                            <input type="text" name="o_name" placeholder="Name Of Business Owner">
                        </div>
                        <div class="form-row">
                            <input type="text" name="b_phone" placeholder="Contact Number Of Business">
                            <input type="text" name="o_phone" placeholder="Contact Number Of Owner">
                        </div>
                        <div class="form-row">
                            <input type="text" name="email" placeholder="Email Of Business">
                            <input type="text" name="address" placeholder="Business Address">
                        </div>
                        <div class="form-row">
                            <input type="date" name="reg_date" placeholder="Registered Date">
                        </div>
                    </div>
                    <div class="submit-container">
                        <button type="reset" class="btn-submit">CANCEL</button>
                        <button type="submit" class="btn-submit">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="footer">
            <p>© 2024. All rights reserved. Designed by Ezone IT Solutions.</p>
        </div>
    </div>
</body>

</html>
