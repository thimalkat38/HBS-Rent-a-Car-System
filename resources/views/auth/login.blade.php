<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Management System | Login</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, 'Oxanium', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen">

    <!-- MAIN WRAPPER WITH COMBINED BACKGROUND -->
    <div class="min-h-screen flex bg-gradient-to-r from-white via-[#dbe4f3] to-[#133E87]">

        <!-- LOGO -->
        <div class="absolute top-6 left-6">
            <img src="{{ asset('images/L1.jpg') }}" alt="Logo" class="h-12">
        </div>

        <!-- LEFT SECTION -->
        <div class="hidden md:flex w-1/2 items-center justify-center px-12 relative">
            <div class="text-center w-full">
                <h1 class="text-4xl lg:text-5xl font-bold text-[#365C96] mb-6">
                    Welcome to EzoneIT
                </h1>
                <p class="text-lg text-gray-600 mb-10">
                    Rental Service Management Solution
                </p>
            </div>
            <p class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-lg text-gray-600">
                Ezone IT Solutions 2025 ©
            </p>
        </div>

        <!-- RIGHT SECTION -->
        <div class="w-full md:w-1/2 flex items-center justify-center px-6">
            <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">

                <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">
                    Log In
                </h2>

                <!-- Laravel Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email"
                            class="mt-1 block w-full rounded-full px-5 py-3 border-gray-300 focus:border-[#133E87] focus:ring-[#133E87]"
                            type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password"
                            class="mt-1 block w-full rounded-full px-5 py-3 border-gray-300 focus:border-[#133E87] focus:ring-[#133E87]"
                            type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember + Forgot -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember"
                                class="rounded border-gray-300 text-[#133E87] focus:ring-[#133E87]">
                            <span class="ml-2 text-sm text-gray-600">
                                Remember me
                            </span>
                        </label>

                        <a href="{{ route('password.request') }}" class="text-sm text-[#133E87] hover:underline">
                            Forgot password?
                        </a>
                    </div>

                    <!-- Button -->
                    <button type="submit"
                        class="w-full bg-[#133E87] hover:bg-[#0f2f66] text-white font-semibold py-3 rounded-full transition duration-300">
                        Log In
                    </button>
                </form>
            </div>
        </div>

    </div>

</body>

</html>
