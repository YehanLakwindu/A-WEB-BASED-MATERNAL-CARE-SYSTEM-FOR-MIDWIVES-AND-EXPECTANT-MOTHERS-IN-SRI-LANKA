<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('CraddleSoft') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind and Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50">
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-50">
        <!-- Logo and Title Section -->
        <div class="flex flex-col items-center mb-4">
            <img src="{{ asset('images/prologo.png') }}" alt="CraddleSoft Logo" class="w-16 h-16 mb-2">
            <h1 class="text-2xl font-bold text-gray-800">
                {{ __('CraddleSoft') }}
            </h1>
            <p class="text-xs text-gray-600">
                {{ __('Empowering Maternity Care') }}
            </p>
        </div>

        <!-- Form Section -->
        <div class="w-full max-w-sm px-4 py-6 bg-white shadow-md sm:rounded-lg">
            <div class="mb-4 text-center">
                <h2 class="text-lg font-semibold text-gray-700">
                    {{ __('Welcome Back!') }}
                </h2>
                <p class="text-xs text-gray-600">
                    {{ __('Please log in to continue.') }}
                </p>
            </div>

            {{ $slot }}
        </div>

        <!-- Footer -->
        <footer class="mt-4 text-xs text-gray-500">
            <p>
                &copy; {{ date('Y') }} {{ __('CraddleSoft') }}. {{ __('Empowering Maternity Care.') }}
            </p>
        </footer>
    </div>
</body>
</html>
