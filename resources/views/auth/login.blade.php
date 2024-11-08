<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Management System Login</title>
    <!-- Import Google Fonts for Oxanium -->
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap and Icon CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Import Oxanium Font */
@import url('https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;700&display=swap');

/* Global Styles */
body, html {
    height: 100%;
    margin: 0;
    font-family: 'Oxanium', sans-serif; /* Use Oxanium font */
}
.container-fluid {
    padding: 0;
    background-color: #fff;
}

/* Logo Styles */
.top-left-logo {
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 1000;
}

.logo-img {
    padding: 1% 1%;
    width: 100%;
    max-width: 15%;
    height: auto;
}

/* Left Panel Styles */
.left-panel {
    background-color: #ffff;
    color: #004080;
    padding: 50px 30px;
    margin-top: 30px;
}

.welcome-text {
    font-size: 48px;
    font-weight: bold;
    color: #365C96;
}

.car-image {
    max-width: 100%;
    width: 400px;
    height: auto;
}
/* Right Panel Styles */
.right-panel {
    background-color: #FA000B;
    padding: 20px;
    color: white;
}

.login-form {
    border-radius: 10px;
    width: 100%;
    max-width: 550px;
    padding: 50px 40px;
    background-color: #FA000B; /* Add background color for contrast */
}

/* Header Styles */
h2 {
    font-weight: bold;
    font-size: 70px;
}

/* Login Button Styles */
.login-button {
    background-color: #365C96;
    color: white;
    font-weight: bold;
    border: none;
    border-radius: 15px;
    padding: 10px;
    cursor: pointer;
    transition: background-color 0.3s; /* Smooth transition */
}

.login-button:hover {
    background-color: #244870; /* Darker shade on hover */
}

/* Input Field Placeholder Styles */
input::placeholder {
    color: #00000059;
    font-size: 25px;
    padding: 3%;
}

/* Label Styles */
label {
    font-size: 30px;
    font-weight: bold;
    margin-bottom: 5px;
}

/* Rounded Input Styles */
.rounded-input {
    border-radius: 50px;
    border: 1px solid #ced4da;
    padding: 10px 40px;
    width: 100%;
    height: 80px; /* Height multiplied by 2 (original height assumed to be 40px) */
    box-shadow: none;
    background-size: 20px 20px;
    background-repeat: no-repeat;
    background-position: 10px center;
    font-weight: bold; /* Make input text bold */
}

/* Username and Password Icon Styles */
#username {
    background-image: url('L3.jpg');
}

#password {
    background-image: url('L4.jpg');
}

/* Rounded Input Focus Styles */
.rounded-input:focus {
    border-color: #004080;
    box-shadow: 0 0 5px rgba(0, 64, 128, 0.5);
}

/* Image Styles */
img {
    max-width: 100%;
    height: auto;
}

/* Media Query for Smaller Screens */
@media (max-width: 768px) {
    .welcome-text {
        font-size: 32px;
    }

    h2 {
        font-size: 28px;
    }

    .login-form {
        padding: 20px;
    }

    .rounded-input {
        padding: 10px 20px;
        height: 40px; /* Adjusted height for smaller screens */
        font-size: 10px;
    }

    .checkbox-section {
    display: flex;
    flex-wrap: wrap;
    gap: 5%; /* Space between checkboxes */
    margin-top: 1%; /* Margin above checkbox section */
}

.checkbox-section div {
    flex: 1 1 30%; /* Responsive layout for checkboxes */
}

.checkbox-section input {
    margin-right: 1%; /* Space between checkbox and label */
}
}
    </style>
    </head>
    <body>

<div class="container-fluid vh-100 d-flex p-0 flex-column flex-md-row"">
        <div class="top-left-logo">
            <img src="{{ asset('images/L1.jpg') }}" alt="E Zone Logo" class="logo-img">
        </div>
        <div class="left-panel col-md-6 d-flex align-items-center justify-content-center text-center">
            <div>
            <h2 class="welcome-text">Welcome to HBS car rental management system</h1>
            <img src="{{ asset('images/L2.jpg') }}" alt="Car Image" class="car-image mt-4">
        </div>
    </div>

        <div class="right-panel col-md-6 d-flex align-items-center justify-content-center">
        <div class="login-form p-4">
        <h2 class="text-center mb-4">Log in</h2>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-control rounded-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="form-group mb-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="form-control rounded-input"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="checkbox-section">
                <input id="remember_me" type="checkbox" name="remember">
                <span>{{ __('Remember me') }}</span>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                    {{ __('Register') }}
                </a><br>
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="btn btn-primary btn-block login-button">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    </body>
    </html>